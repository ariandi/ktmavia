<?php

namespace backend\modules\seaexport\controllers;

use Yii;
use backend\modules\seaexport\models\Quotation;
use backend\modules\seaexport\models\QuotationSearch;
use backend\modules\seaexport\models\Quotationdetail;
use backend\modules\seaexport\models\QuotationdetailSearch;
use backend\modules\masterdata\models\Company;
use backend\modules\seaexport\models\ShippingInstruction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
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
        $searchModel->kindofexport = 1;
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

        if ($model->load(Yii::$app->request->post())) {
			
            $model->picto = Yii::$app->request->post('picto2');
			$model->picfrom = Yii::$app->user->identity->id;
			$model->createby = Yii::$app->user->identity->id;
            $model->createdate = date('Y-m-d');
			$model->updateby = Yii::$app->user->identity->id;
			$model->updatedate = date('Y-m-d');
			$model->active = 1;
			$model->status = 'Send';
			
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

        //print_r(Yii::$app->request->post());die;
                if(Yii::$app->request->post('makesi') == '1'){
                    $max = Shippinginstruction::find()
                            ->where(['kindofexport' => 1])
                            ->select('no_ref')
                            ->orderby(['si_id' => SORT_DESC])
                            ->one();
                    
                    $ex_max = explode("/",$max->no_ref);

                    $max = intval($ex_max[0]);

                    $max == 0 ? $max = 0+1 : $max = $max + 1;

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

                    //echo $model->company->companyid.'/'.$model->company->fax;die;

                    $shippinginstruction = new Shippinginstruction();
                    $shippinginstruction->no_ref        = $nol.'/KTM-SE/'.strtoupper(date('M')).'/'.date('Y');
                    $shippinginstruction->topic         = $model->picto;
                    $shippinginstruction->frompic       = Yii::$app->user->identity->id;
                    $shippinginstruction->telp_fax      = $model->company->phone.'/'.$model->company->fax;
                    $shippinginstruction->email         = "-";
                    $shippinginstruction->shipper       = 1;
                    $shippinginstruction->consignee     = $model->company->companyid;
                    $shippinginstruction->notify_party  = $model->company->companyid;
                    $shippinginstruction->insertby      = Yii::$app->user->identity->id;
                    $shippinginstruction->insertdate    = date('Y-m-d');
                    $shippinginstruction->active        = 1;
                    $shippinginstruction->quotationid   = $id;
                    $shippinginstruction->freight_term  = $model->termofpayment;
                    $shippinginstruction->status        = 'PENDING';
                    
                    if($shippinginstruction->save()){
                        return $this->redirect(['/seaexport/shippinginstruction']);
                    }else{
                        var_dump ($shippinginstruction->getErrors()); die();
                    }
                }

        if ( $model->load(Yii::$app->request->post()) ) {
                
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
	
	public function actionDetailq($id = null)
    {
		if($id == null)//kalo id nya null (user klik quotation det di module samping)
        {
            $searchModel = new QuotationdetailSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index_qd', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'quotationid' => null,
            ]);
        }


        $quotdet = Quotationdetail::findAll(['quotationid' => $id]);

		if($quotdet == null){//kalo id nya tidak null (user klik quotation det dari tabel quotation)
			$model = new Quotationdetail();

            if ($model->load(Yii::$app->request->post())) 
    		{	
    			$model->quotationid = $id;
    			
    			if($model->save())
    			{
    				return $this->redirect(['detailq', 'id' => $model->quotationid]);
    			}
            } else {
                return $this->render('create_qd', [
                    'model' => $model,
                ]);
            }
		}
		else{//kalo ga ada quotation detail nya
			$searchModel = new QuotationdetailSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);
            $dataProvider->pagination->pageSize=10;

			return $this->render('index_qd', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
                'quotationid' => $id,
        ]);
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
