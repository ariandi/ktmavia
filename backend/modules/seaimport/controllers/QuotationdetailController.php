<?php

namespace backend\modules\seaimport\controllers;

use Yii;
use backend\modules\seaimport\models\Quotationdetail;
use backend\modules\seaimport\models\QuotationdetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;
/**
 * QuotationdetailController implements the CRUD actions for Quotationdetail model.
 */
class QuotationdetailController extends Controller
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
     * Lists all Quotationdetail models.
     * @return mixed
     */
    public function actionIndex($id = null)
    {
        $searchModel = new QuotationdetailSearch();

        if($id == null){
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination->pageSize=10;
        }else{
            $searchModel->quotationid = $id;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination->pageSize=10;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'quotationid' => $id,
        ]);
    }

    /**
     * Displays a single Quotationdetail model.
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
     * Creates a new Quotationdetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null, $detq = null)
    {
        $model = new Quotationdetail();
        $model->quotationid = $id;

        if ($model->load(Yii::$app->request->post()) ) {
            
            if($model->save()){
                return $this->redirect(['index', 'id' => $model->quotationid]);
            }

        } else {
            if($detq == 1){
                return $this->render('create', [
                'model' => $model,
                ]);
            }else{
                return $this->renderAjax('create', [
                'model' => $model,
                ]);                
            }

        }
    }

    /**
     * Updates an existing Quotationdetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->quotationid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Quotationdetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'id' => $model->quotationid]);
    }

    /**
     * Finds the Quotationdetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quotationdetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quotationdetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDetailq($id = null, $detq = 1)
    {
        $qd = Quotationdetail::findAll(['quotationid' => $id]);

        if($id == null){
            return $this->actionIndex();
        }
        elseif($qd == null){
            //echo "wewe";die;
            return $this->actionCreate($id, $detq);
        }
        else{
            return $this->actionIndex($id);
        }
    }
}
