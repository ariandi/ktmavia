<?php

namespace backend\modules\seaimport\controllers;

use Yii;
use backend\modules\seaimport\models\Jobsheet;
use backend\modules\seaimport\models\JobsheetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use backend\modules\seaimport\models\Jobsheetdet;
use backend\modules\seaimport\models\Invoice;
use backend\modules\seaimport\models\InvoiceDetail;
use backend\modules\seaimport\models\Debitnote;
use backend\modules\seaimport\models\Debitnotedet;
use backend\modules\seaimport\models\Creditnote;
use backend\modules\seaimport\models\Creditnotedet;

use mPDF;
/**
 * JobsheetController implements the CRUD actions for Jobsheet model.
 */
class JobsheetController extends Controller
{
    public function behaviors()
    {
        return [
		
	     
		
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','update','delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create','update','delete'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Jobsheet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JobsheetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize=10;	
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jobsheet model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Jobsheet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jobsheet();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->jobs_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jobsheet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->post('makeinvo') == 1){
            $max = Invoice::find()
                    ->where(['kindofexport' => 2])
                    ->select('invoice_no')
                    ->orderby(['invoice_id' => SORT_DESC])
                    ->one();
                    //->max('invoice_id');

            if($max == null){
                $max = 1;
            }else{
                $ex_max = explode("/",$max->invoice_no);

                $max = intval($ex_max[0]);
                        
                $max == 0 ? $max = 0+1 : $max = $max + 1;
            }

            if($max < 10){
                $nol = '000'.$max;
            }
            elseif($max < 100){
                $nol = '00'.$max;
            }
            elseif($max < 1000){
                $nol = '0'.$max;
            }
            else{
                $nol = (string)$max;
            }

            $vinvoice = new Invoice();
            $vinvoice->invoice_no     = $nol.'/KTM-SI/'.strtoupper(date('M')).'/'.date('Y');
            $vinvoice->invoice_date   = date('Y-m-d');
            $vinvoice->jobs_id        = $model->jobs_id;
            $vinvoice->bl_id          = $model->bl_id;
            $vinvoice->companyid      = 1;
            $vinvoice->customer_id    = $model->consignee;
            $vinvoice->tot_amount     = $model->tot_bill;

            $vinvoice->insert_by      = Yii::$app->user->identity->id;
            $vinvoice->insert_date    = date('Y-m-d');
            $vinvoice->kindofexport   = 2;

            if($vinvoice->save()){

                /*Debit Note*/
                $dn = new Debitnote();
                $dn->invoice_no     = $vinvoice->invoice_no.'-A';
                $dn->invoice_date   = date('Y-m-d');
                $dn->jobs_id        = $vinvoice->jobs_id;
                $dn->bl_id          = $vinvoice->bl_id;
                $dn->companyid      = 1;
                $dn->tot_amount     = $model->tot_dn;
                $dn->invoice_id     = $vinvoice->invoice_id;

                $dn->insert_by      = Yii::$app->user->identity->id;
                $dn->insert_date    = date('Y-m-d');
                $dn->kindofexport   = 2;
                $dn->save();
                /*End Debit Note*/

            /*Kredit Note*/
            $cn = new Creditnote();
                    $cn->invoice_no     = $vinvoice->invoice_no.'-A';
                    $cn->invoice_date   = date('Y-m-d');
                    $cn->jobs_id        = $vinvoice->jobs_id;
                    $cn->bl_id          = $vinvoice->bl_id;
                    $cn->companyid      = 1;
                    $cn->tot_amount     = $model->tot_cn;
                    $cn->invoice_id     = $vinvoice->invoice_id;

                    $cn->insert_by      = Yii::$app->user->identity->id;
                    $cn->insert_date    = date('Y-m-d');
                    $cn->kindofexport   = 2;
                    $cn->save();
            /*End Credit Note*/


                $vjs = $model->jobs_id;
                $vinvoice_db_cr = 1;
                $modeljsd = Jobsheetdet::find()
                ->where('jobs_id = :jobs_id and inv = :invoice_db_cr', [':jobs_id' => $vjs, ':invoice_db_cr' =>$vinvoice_db_cr])
                ->all();
             
            $totinv = 0;
            if( count($modeljsd) > 0 )
            {
                foreach ($modeljsd as $data) 
                {
                    $exbillship = explode(' / ', $data->bill_shipper);
                    $rows[] = [
                                'invoice_id' => $vinvoice->invoice_id,
                                'costing' => $data->costing,
                                'amount' => $exbillship[2],
                                'insert_by' => Yii::$app->user->identity->id,
                                'insert_date' => date('Y-m-d'),
                            ];
                    $totinv += $exbillship[2];
                }

                $model_inv = Invoice::findOne($vinvoice->invoice_id);
                $model_inv->tot_amount     = $totinv;
                $model_inv->save();


                Yii::$app->db->createCommand()->batchInsert(InvoiceDetail::tableName(), ['invoice_id', 'costing', 'amount', 'insert_by', 'insert_date'], $rows)->execute();
            }
            /*Debit Note Det*/
            $dbn = 1;
                    $modeldbn = Jobsheetdet::find()
                    ->where('jobs_id = :jobs_id and dbn = :dbn', [':jobs_id' => $vjs, ':dbn' =>$dbn])
                    ->all();
            
            $totdbn = 0;

            if( count($modeldbn) > 0 )
            {
                foreach ($modeldbn as $mdbn) 
                {
                    $exbillship2 = explode(' / ', $mdbn->bil_agent);
                    $rows2[] = [
                            'debitnote_id' => $dn->debitnote_id,
                            'costing' => $mdbn->costing,
                            'amount' => $exbillship2[1],
                            'insert_by' => Yii::$app->user->identity->id,
                            'insert_date' => date('Y-m-d'),
                        ];
                    $totdbn += $exbillship2[1];
                }

                $model_dbn = Debitnote::findOne($dn->debitnote_id);
                $model_dbn->tot_amount     = $totdbn;
                $model_dbn->save(); 

                Yii::$app->db->createCommand()->batchInsert(Debitnotedet::tableName(), ['debitnote_id', 'costing', 'amount', 'insert_by', 'insert_date'], $rows2)->execute();
            }
            /*End Debit Note*/



            /*Credit Note Det*/
            $crn = 1;
                    $modelcrn = Jobsheetdet::find()
                    ->where('jobs_id = :jobs_id and crn = :crn', [':jobs_id' => $vjs, ':crn' =>$crn])
                    ->all();

            $totcrn = 0;

            if( count($modelcrn) > 0 )
            {
                foreach ($modelcrn as $mcrn) 
                {
                    $exbillship3 = explode(' / ', $mcrn->bill_cost);
                    $rows3[] = [
                            'creditnote_id' => $cn->criditnote_id,
                            'costing' => $mcrn->costing,
                            'amount' => $exbillship3[1],
                            'insert_by' => Yii::$app->user->identity->id,
                            'insert_date' => date('Y-m-d'),
                        ];
                    $totcrn += $exbillship3[1];
                }

                $model_crn = Creditnote::findOne($cn->criditnote_id);
                $model_crn->tot_amount     = $totcrn;
                $model_crn->save();

                Yii::$app->db->createCommand()->batchInsert(Creditnotedet::tableName(), ['creditnote_id', 'costing', 'amount', 'insert_by', 'insert_date'], $rows3)->execute();
            }
            /*End Credit Note*/

                    return $this->redirect(['/seaimport/invoice']);

                }

            else{
                print_r($vinvoice->getErrors());die;
            }
        }

        if ( $model->load(Yii::$app->request->post()) ) {

            $model->tot_expenses = (int)$model->tot_expenses;
            $model->tot_bill = (int)$model->tot_bill;
            $model->tot_profit = (int)$model->tot_profit;

            $model->update_by   = Yii::$app->user->identity->id;
            $model->update_date = date('Y-m-d');

            if($model->save()){
                return $this->redirect(['index']);
            }
            else{
                var_dump($model->getErrors());die;
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jobsheet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jobsheet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jobsheet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jobsheet::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionJobsheetview($id)
    {
        $this->layout = 'blankpage';

        $model      = Jobsheet::findOne($id);
        $modeldet   = Jobsheetdet::findAll(['jobs_id' => $id]);

        $mpdf = new mPDF;
        $mpdf->WriteHTML(
                            $this->renderPartial('jobsheetpdfview', ['model' => $model, 'modeldet' => $modeldet])
                        );
        $mpdf->Output();
        exit;    
    }
}
