<?php

namespace backend\modules\seaexport\controllers;

use Yii;
use backend\modules\seaexport\models\Billlandingdetail;
use backend\modules\seaexport\models\BilllandingdetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;

/**
 * BilllandingdetailController implements the CRUD actions for Billlandingdetail model.
 */
class BilllandingdetailController extends Controller
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
     * Lists all Billlandingdetail models.
     * @return mixed
     */
    public function actionIndex($id = null)
    {
        $searchModel = new BilllandingdetailSearch();
        if($id == null){
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination->pageSize=10;
        }else{
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);
            $dataProvider->pagination->pageSize=10;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'bl_id' => $id,
        ]);
    }

    /**
     * Displays a single Billlandingdetail model.
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
     * Creates a new Billlandingdetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        $model = new Billlandingdetail();
        $model->bl_id = $id;

        if ( $model->load(Yii::$app->request->post()) ) {

            $model->insert_by   = Yii::$app->user->identity->id;
            $model->insert_date = date('Y-m-d');
            
            if($model->save()){
                return $this->redirect(['index', 'id' => $model->bl_id]);
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Billlandingdetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->update_by   = Yii::$app->user->identity->id;
            $model->update_date = date('Y-m-d');

            if($model->save()){
                return $this->redirect(['index', 'id' => $model->bl_id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Billlandingdetail model.
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
     * Finds the Billlandingdetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Billlandingdetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Billlandingdetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDetailq($id = null)
    {
        $bl = Billlandingdetail::findAll(['bl_id' => $id]);

        if($id == null){
            return $this->actionIndex();
        }
        elseif($bl == null){
            return $this->actionCreate($id);
        }else{
            return $this->actionIndex($id);
        }
    }
}
