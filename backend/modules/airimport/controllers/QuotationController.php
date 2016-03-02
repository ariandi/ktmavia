<?php

namespace backend\modules\airimport\controllers;

use Yii;
use backend\modules\airimport\models\Quotation;
use backend\modules\airimport\models\QuotationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\modules\airimport\models\Billlanding;
use backend\modules\airimport\models\Billlandingdetail;
use backend\modules\airimport\models\Quotationdetail;
use backend\modules\masterdata\models\Company;
use backend\modules\airimport\models\Shippinginstruction;
use yii\filters\AccessControl;
use mPDF;
/**
 * QuotationController implements the CRUD actions for Quotation model.
 */
class QuotationController extends Controller
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
     * Lists all Quotation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuotationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quotation model.
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
     * Creates a new Quotation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quotation();

        if ( $model->load(Yii::$app->request->post()) ) {
            //return $this->redirect(['view', 'id' => $model->quotationid]);
            $model->picto = Yii::$app->request->post('picto2');
            $model->picfrom = Yii::$app->user->identity->id;
            $model->createby = Yii::$app->user->identity->id;
            $model->createdate = date('Y-m-d');
            $model->updateby = Yii::$app->user->identity->id;
            $model->updatedate = date('Y-m-d');
            $model->active = 1;
            $model->status = 'Send';
            $model->kindofexport = 4;
            
            if($model->save())
            {
                return $this->redirect(['index']);
            }
            else
            {
                var_dump ($model->getErrors()); die();
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Quotation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->post('makesi') == '1')
        {
            $max = Billlanding::find()->max('bl_id');
                    
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

            $quotation = Quotation::findOne($model->quotationid);
            //print_r($quotation);die;

            $mbl = new Billlanding();
            $mbl->bl_number         = 'KTM-'.$nol.'-';
            $mbl->bl_type           = 'house';
            $mbl->si_id             = 0;
            $mbl->quotationid       = $model->quotationid;
            $mbl->shipper           = 1;
            $mbl->consignee         = $quotation->companyid;
            $mbl->ocean_vessel      = '-';
            $mbl->port_of_discharge = '-';
            $mbl->place_of_receipt  = '-';
            $mbl->port_of_loading   = '-';
            $mbl->place_of_delivery = '-';
            $mbl->freight_term      = '-';
            $mbl->rate              = '-';
            $mbl->prepaid_at        = '-';
            $mbl->payable_at        = '-';
            $mbl->insert_by         = Yii::$app->user->identity->id;
            $mbl->insert_date       = date('Y-m-d');
            $mbl->kindofexport      = 4;

            if($mbl->save()){
                
                $mbldet                                 = new Billlandingdetail();
                $mbldet->bl_id                          = $mbl->bl_id;
                $mbldet->container_seal_no              = '-';
                $mbldet->kind_of_package_desc_goods     = '-';
                $mbldet->weight                         = '-';
                $mbldet->insert_by                      = Yii::$app->user->identity->id;
                $mbldet->insert_date                    = date('Y-m-d');

                if($mbldet->save()){
                    return $this->redirect(['/airimport/billlanding']);
                }
                else{
                    var_dump ($mbldet->getErrors()); die();
                }

            }else{
                var_dump ($mbl->getErrors()); die();
            }
        }

        if ($model->load(Yii::$app->request->post()) ) {
            
            $model->picto = Yii::$app->request->post('picto2');
                $model->updateby = Yii::$app->user->identity->id;
                $model->updatedate = date('Y-m-d');
            
            if($model->save()){
                return $this->redirect(['index']);
            }
            else{
                var_dump ($model->getErrors()); die();
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Deletes an existing Quotation model.
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
     * Finds the Quotation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quotation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quotation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionQuotationview($id = null)
    {
        $this->layout = 'blankpage';

        $model = Quotation::findOne($id);

        $qdetail  = Quotationdetail::findAll(['quotationid' => $id, 'status' => 'Destination']);
        $qdetail2 = Quotationdetail::findAll(['quotationid' => $id, 'status' => 'Local']);
        $company = Company::findOne(1);

        $mpdf = new mPDF;
        $mpdf->WriteHTML(
                            $this->renderPartial('quotationview', [
                                                                    'quotationid' => $id,
                                                                    'model' => $model,
                                                                    'quotationdetail' => $qdetail,
                                                                    'local' => $qdetail2,
                                                                    'company' => $company,
                                                            ])
                        );
        $mpdf->Output();
        exit;
        
    }
}
