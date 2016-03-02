<?php

namespace backend\modules\masterdata\controllers;

use Yii;
use backend\modules\masterdata\models\User;
use backend\modules\masterdata\models\UserSearch;
use backend\modules\masterdata\models\AuthAssignment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                    [
                    'allow' => false,
                    'verbs' => ['POST']
                    ],
                ],
                /*
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create','update','delete'],
                        'roles' => ['customer'],
                    ]
                ]
                */
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
		
        if ($model->load(Yii::$app->request->post())) {

			$userp = Yii::$app->request->post('User');

            $model->created_at = time();
            $model->updated_at = time();
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString();

			if($model->save())
			{
                    $role = new AuthAssignment();
                    $role->item_name = $userp['Role'];
                    $role->user_id = $model->id;
                    $role->save();
                    //print_r($role->getErrors());die;

				return $this->redirect(['index']);    
			}
			else
			{
				$model->setAttributes(['password_hash'=>$_POST['User']['password_hash']]);
				return $this->render('create', [
					'model' => $model,
				]);
			}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

            $userp = Yii::$app->request->post('User');
            //print $userp['Role'];die;
            if($model->save())
            {
                $AuthAssignment = AuthAssignment::findOne(['item_name' => $userp['Role'], 'user_id' => $id]);
                if($AuthAssignment == null){
                    $AuthAssignment = new AuthAssignment();
                }
                $AuthAssignment->item_name = $userp['Role'];
                $AuthAssignment->user_id = $model->id;
                $AuthAssignment->save();

                return $this->redirect(['index']);    
            }
            else
            {
                var_dump ($model->getErrors()); die();
            }
 
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = 0;
        $model->save();
        //print_r($model->getErrors());die;

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCpassword($id)
    {
        $model = $this->findModel($id);

        $model->setAttributes(['password_hash'=>null]);

        if ($model->load(Yii::$app->request->post()) ) {

            $userp = Yii::$app->request->post('User');

            if (isset($userp['password_hash']))
            {
                $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
                $model->auth_key = Yii::$app->security->generateRandomString();
            }

            if($model->save())
            {
                if(Yii::$app->request->post('Role'))
                {
                    //$role = new AuthAssignment();
                    //$role->setAttributes(['item_name'=>Yii::$app->request->post('Role'),'user_id'=>$model->id]);
                }

                return $this->redirect(['index']);    
            }
            else
            {
                var_dump ($model->getErrors()); die();
            }
 
        } else {
            return $this->render('changepassword', [
                'model' => $model,
            ]);
        }
    }
}