<?php

namespace backend\modules\airexport\controllers;

use Yii;
use backend\modules\airexport\models\Invoice;
use backend\modules\airexport\models\Invoicedetail;
use backend\modules\airexport\models\InvoiceSearch;
use backend\modules\airexport\models\InvoicedetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use mPDF;
use backend\modules\airexport\models\Debitnote;
use backend\modules\airexport\models\Creditnote;

/**
 * InvoiceController implements the CRUD actions for Invoice model.
 */
class InvoiceController extends Controller
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
     * Lists all Invoice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Invoice model.
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
     * Creates a new Invoice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Invoice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->invoice_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Invoice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ( $model->load(Yii::$app->request->post()) ) {

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
     * Deletes an existing Invoice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        Invoicedetail::deleteAll("invoice_id = ".$id);
        Debitnote::deleteAll("invoice_id = ".$id);
        Creditnote::deleteAll("invoice_id = ".$id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Invoice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Invoice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Invoice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionInvoiceview($id)
    {
        $this->layout = 'blankpage';

        $model      = $this->findModel($id);
        $modeldet   = Invoicedetail::findAll(['invoice_id' => $id]);

        $terbilang = $this->terbilang($model->tot_amount);

        $mpdf = new mPDF;
        $mpdf->WriteHTML(
                            $this->renderPartial('invoicepdfview', ['model' => $model, 'modeldet' => $modeldet, 'terbilang' => $terbilang])
                        );
        $mpdf->Output();
        exit;    
    }

    public function terbilang($x)
    {
        $arr = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12){
            return " " . $arr[$x];
        }
        elseif ($x < 20){
            return $this->terbilang($x - 10) . " belas";
        }
        elseif ($x < 100){
            return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
        }
        elseif ($x < 200){
            return " seratus" . $this->terbilang($x - 100);
        }
        elseif ($x < 1000){
            return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
        }
        elseif ($x < 2000){
            return " seribu" . $this->terbilang($x - 1000);
        }
        elseif ($x < 1000000){
            return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
        }
        elseif ($x < 1000000000){
            return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);
        }
    }
}
