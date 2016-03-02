<?php

namespace backend\modules\seaexport\controllers;

use Yii;
use backend\modules\seaexport\models\ShippingInstruction;
use backend\modules\seaexport\models\ShippingInstructionSearch;
use backend\modules\seaexport\models\Billlanding;
use backend\modules\seaexport\models\Billlandingdetail;
use backend\modules\seaexport\models\Quotation;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use mPDF;

/**
 * ShippingInstructionController implements the CRUD actions for ShippingInstruction model.
 */
class ShippinginstructionController extends Controller
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
     * Lists all ShippingInstruction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShippinginstructionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShippingInstruction model.
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
     * Creates a new ShippingInstruction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ShippingInstruction();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->si_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ShippingInstruction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->email = Yii::$app->user->identity->email;

        if(Yii::$app->request->post('makebl') == '1'){
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
            if(Yii::$app->request->post('fsi') == '1'){
                $mbl = Billlanding::findOne(Yii::$app->request->post('bl_id'));
                $mbl->update_by         = Yii::$app->user->identity->id;
                $mbl->update_date       = date('Y-m-d');

                if(!isset($model->cont_seal_no) || $model->cont_seal_no == ''){
                    echo 'Container and Seal Number Cannot Empty';die;
                }
                if(!isset($model->bl_no) || $model->bl_no == ''){
                    echo 'MBL Cannot Empty';die;
                }
                if(!isset($model->booking_number) || $model->booking_number == ''){
                    echo 'Booking Number Cannot Empty';die;
                }
                //echo $model->booking_number;die;
            }else{
                $mbl = new Billlanding();
                $mbl->bl_number         = 'KTM-'.$nol.'-';
                $mbl->insert_by         = Yii::$app->user->identity->id;
                $mbl->insert_date       = date('Y-m-d');
            }
            
            $mbl->bl_type           = 'house';
            $mbl->si_id             = $id;
            $mbl->quotationid       = $model->quotationid;
            $mbl->shipper           = $quotation->companyid;
            $mbl->ocean_vessel      = $model->vessel;
            $mbl->port_of_discharge = $model->destination;
            $mbl->place_of_receipt  = $model->port_of_loading;
            $mbl->port_of_loading   = $model->port_of_loading;
            $mbl->place_of_delivery = $model->destination;
            $mbl->freight_term      = $model->freight_term;
            $mbl->rate              = $model->rate;
            $mbl->prepaid_at        = 'Jakarta';
            $mbl->payable_at        = 'Jakarta';
            
            if($mbl->save()){
                if(Yii::$app->request->post('fsi') == '1'){
                    $mbldet                                 = Billlandingdetail::find()
                                                                ->where(['bl_id' => $mbl->bl_id])
                                                                ->One();
                    $mbldet->update_by                      = Yii::$app->user->identity->id;
                    $mbldet->update_date                    = date('Y-m-d');
                }else{
                    $mbldet                                 = new Billlandingdetail();
                    $mbldet->insert_by                      = Yii::$app->user->identity->id;
                    $mbldet->insert_date                    = date('Y-m-d');
                    $mbldet->bl_id                          = $mbl->bl_id;
                }

                $mbldet->container_seal_no              = $model->cont_seal_no;
                $mbldet->kind_of_package_desc_goods     = $model->description_good;
                $mbldet->weight                         = $model->gw_nw_cbm;

                if($mbldet->save()){
                    return $this->redirect(['/seaexport/billlanding']);
                }
                else{
                    var_dump ($mbldet->getErrors()); die();
                }

            }else{
                var_dump ($mbl->getErrors()); die();
            }
        }

        if ($model->load(Yii::$app->request->post()) ) {

            //print_r(Yii::$app->request->post());die;

            $model->updateby    = Yii::$app->user->identity->id;
            $model->updatedate  = date('Y-m-d');
            $model->frompic     = Yii::$app->user->identity->id;
            $model->frompic     = Yii::$app->user->identity->id;            

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
     * Deletes an existing ShippingInstruction model.
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
     * Finds the ShippingInstruction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShippingInstruction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShippingInstruction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSipdfview($id)
    {
        $this->layout = 'blankpage';

        $model = Shippinginstruction::findOne($id);

        //return $this->render('sipdfview', ['model' => $model]);

        $mpdf = new mPDF;
        $mpdf->WriteHTML(
                            $this->renderPartial('sipdfview', ['model' => $model])
                        );
        $mpdf->Output();
        exit;
    }
}
