<?php

namespace backend\modules\seaexport\controllers;

use Yii;
use backend\modules\seaexport\models\Billlanding;
use backend\modules\seaexport\models\BilllandingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use backend\modules\seaexport\models\Billlandingdetail;
use backend\modules\seaexport\models\Jobsheet;
use backend\modules\seaexport\models\Jobsheetdet;
use backend\modules\seaexport\models\Shippinginstruction;
use mPDF;
/**
 * BilllandingController implements the CRUD actions for Billlanding model.
 */
class BilllandingController extends Controller
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
     * Lists all Billlanding models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BilllandingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Billlanding model.
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
     * Creates a new Billlanding model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Billlanding();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bl_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Billlanding model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->post('makejs') == 1){
            $max = Jobsheet::find()->max('jobs_id');
                    
                    $max == null ? $max = 0+1 : $max = $max + 1;

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

            $si = Shippinginstruction::findOne($model->si_id);

            $gross_w = explode(' / ', $si->gw_nw_cbm);

            $jsi = new Jobsheet();
            $jsi->jobs_no           = $nol.'/KTM-SE/'.strtoupper(date('M')).'/'.date('Y');
            $jsi->shipper           = $model->shipper;
            $jsi->consignee         = $model->consignee;
            $jsi->ctn_qty           = $si->quantity;
            $jsi->destination       = $si->destination;
            $jsi->gross_w           = $gross_w[0];
            $jsi->mbl               = $si->bl_no;
            $jsi->hbl               = $model->bl_number;
            $jsi->fl                = $si->vessel;
            $jsi->bl_id             = $model->bl_id;
            $jsi->measurement       = $gross_w[2];
            $jsi->insert_by         = Yii::$app->user->identity->id;
            $jsi->insert_date       = date('Y-m-d');
            $jsi->tot_expenses      = 0;
            $jsi->tot_bill          = 0;
            $jsi->tot_profit        = 0;

            if($jsi->save()){
                $jsidet                                 = new Jobsheetdet();
                $jsidet->jobs_id                        = $jsi->jobs_id;
                $jsidet->insert_by                      = Yii::$app->user->identity->id;
                $jsidet->insert_date                    = date('Y-m-d');

                if($jsidet->save()){
                    return $this->redirect(['/seaexport/jobsheet']);
                }
            }
            else{
                print_r($jsi->getErrors());die;
            }
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->update_by   = Yii::$app->user->identity->id;
            $model->update_date = date('Y-m-d');
            if($model->save()){
                return $this->redirect(['index']);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Billlanding model.
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
     * Finds the Billlanding model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Billlanding the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Billlanding::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBilllandingview($id)
    {
        $this->layout = 'blankpage';

        $model      = Billlanding::findOne($id);
        $modeldet   = Billlandingdetail::findAll(['bl_id' => $id]);
        
        $mpdf = new mPDF;
        $mpdf->WriteHTML(
                            $this->renderPartial('blpdfview', ['model' => $model, 'modeldet' => $modeldet])
                        );
        $mpdf->Output();
        exit;
        
        //return $this->renderPartial('blpdfview', ['model' => $model, 'modeldet' => $modeldet]);
    }

    public function actionBilllandingcoview($id)
    {
        $this->layout = 'blankpage';

        $model      = Billlanding::findOne($id);
        $modeldet   = Billlandingdetail::findAll(['bl_id' => $id, 'active' => 1]);
        
        $mpdf = new mPDF;
        $mpdf->WriteHTML(
                            $this->renderPartial('blpdfview_co', ['model' => $model, 'modeldet' => $modeldet])
                        );
        $mpdf->Output();
        exit;
        
        //return $this->renderPartial('blpdfview', ['model' => $model, 'modeldet' => $modeldet]);
    }

    public function actionBilllandingdesview($id)
    {
        $this->layout = 'blankpage';

        $model      = Billlanding::findOne($id);
        $modeldet   = Billlandingdetail::findAll(['bl_id' => $id, 'active' => 1]);
        
        $mpdf = new mPDF;
        $mpdf->WriteHTML(
                            $this->renderPartial('blpdfview_des', ['model' => $model, 'modeldet' => $modeldet])
                        );
        $mpdf->Output();
        exit;
        
        //return $this->renderPartial('blpdfview', ['model' => $model, 'modeldet' => $modeldet]);
    }

    public function actionBilllandingconview($id)
    {
        $this->layout = 'blankpage';

        $model      = Billlanding::findOne($id);
        $modeldet   = Billlandingdetail::findAll(['bl_id' => $id, 'active' => 1]);
        
        $mpdf = new mPDF;
        $mpdf->WriteHTML(
                            $this->renderPartial('blpdfview_con', ['model' => $model, 'modeldet' => $modeldet])
                        );
        $mpdf->Output();
        exit;
        
        //return $this->renderPartial('blpdfview', ['model' => $model, 'modeldet' => $modeldet]);
    }
}
