<?php

namespace backend\modules\report\controllers;

use Yii;
use backend\modules\report\models\Payment;
use backend\modules\report\models\PaymentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use backend\modules\report\models\Paymentdet;

use backend\modules\report\models\Model;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\web\Response;



/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller
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
     * Lists all Payment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $from_date = $request->post('from_date');
        $to_date = $request->post('to_date');

        $searchModel = new PaymentSearch();
        $searchModel->from_date = $from_date;
        $searchModel->to_date = $to_date;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'from_date' => $from_date,
            'to_date' => $to_date,
        ]);
    }

    /**
     * Displays a single Payment model.
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
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Payment();
        $modeldet = [new Paymentdet];

        if ($model->load(Yii::$app->request->post()) ) {

            $max = Payment::find()->max('payment_id');
                    
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

            $model->payment_number          = $nol.'/KTM-PAY/'.strtoupper(date('M')).'/'.date('Y');
            $model->insert_by               = Yii::$app->user->identity->id;
            $model->insert_date             = date('Y-m-d');

            //model detail
            $modeldet = Model::createMultiple(Paymentdet::classname());
            Model::loadMultiple($modeldet, Yii::$app->request->post());

            

            // validate all models
            $valid = $model->validate();
            //$valid = Model::validateMultiple($modeldet) && $valid;

            if ($valid) 
            {
                //echo $model->payment_number;die;
                $transaction = \Yii::$app->db->beginTransaction();
                $totamt = 0;

                try {
                    if ($flag = $model->save(false)) {

                        foreach ($modeldet as $modeldets) {
                            $modeldets->payment_id   = $model->payment_id;
                            $modeldets->insert_by    = Yii::$app->user->identity->id;
                            $modeldets->insert_date  = date('Y-m-d');
                            $totamt += $modeldets->amount;
                            if (! ($flag = $modeldets->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        $model->total_amount = $totamt;
                        $flag = $model->save(false);
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    echo "wew";die;
                    $transaction->rollBack();

                }
            }else{
                print_r($model->getErrors());die;              
            }



        } else {
            return $this->render('create', [
                'model' => $model,
                'modeldet' => (empty($modeldet)) ? [new Paymentdet] : $modeldet,
            ]);
        }
    }

    /**
     * Updates an existing Payment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modeldet = $model->paymentdetinfo;

        //print_r($modeldet);die;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modeldet, 'paymentdet_id', 'paymentdet_id');
            $modeldet = Model::createMultiple(Paymentdet::classname(), $modeldet);
            Model::loadMultiple($modeldet, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modeldet, 'paymentdet_id', 'paymentdet_id')));

            // validate all models
            $valid = $model->validate();
            //$valid = Model::validateMultiple($modeldet) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                $totamt = 0;
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            Paymentdet::deleteAll(['paymentdet_id' => $deletedIDs]);
                        }
                        foreach ($modeldet as $modeldets) {
                            //$modelAddress->customer_id = $modelCustomer->id;
                            $modeldets->payment_id   = $model->payment_id;
                            $modeldets->update_by    = Yii::$app->user->identity->id;
                            $modeldets->update_date  = date('Y-m-d');
                            $totamt += $modeldets->amount;
                            if (! ($flag = $modeldets->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        $model->total_amount = $totamt;
                        $flag = $model->save(false);
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
                'modeldet' => (empty($modeldet)) ? [new Paymentdet] : $modeldet,
            ]);
        }
    }

    /**
     * Deletes an existing Payment model.
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
     * Finds the Payment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
