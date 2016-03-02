<?php

namespace backend\modules\masterdata\controllers;

use Yii;
use backend\modules\masterdata\models\Quotation;
use backend\modules\masterdata\models\QuotationSearch;
use backend\modules\masterdata\models\Quotationdetail;
use backend\modules\masterdata\models\QuotationdetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
                        'actions' => ['create','update'],
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->quotationid]);
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
            $dataProvider = $searchModel->search(['QuotationdetailSearch'=>['quotationid'=>$id]]);

            return $this->render('index_qd', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
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
    				return $this->redirect(['detailq']);
    			}
            } else {
                return $this->render('create_qd', [
                    'model' => $model,
                ]);
            }
		}
		else{//kalo ga ada quotation detail nya
			$searchModel = new QuotationdetailSearch();
			$dataProvider = $searchModel->search(['QuotationdetailSearch'=>['quotationid'=>$id]]);

			return $this->render('index_qd', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
        ]);
		}
    }
}
