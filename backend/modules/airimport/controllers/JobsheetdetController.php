<?php

namespace backend\modules\airimport\controllers;

use Yii;
use backend\modules\airimport\models\Jobsheetdet;
use backend\modules\airimport\models\JobsheetdetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\modules\airimport\models\Jobsheet;
/**
 * JobsheetdetController implements the CRUD actions for Jobsheetdet model.
 */
class JobsheetdetController extends Controller
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
     * Lists all Jobsheetdet models.
     * @return mixed
     */
    public function actionIndex($id = null)
    {
         $searchModel = new JobsheetdetSearch();
        
        if($id == null){
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination->pageSize=10;
        }else{
			$searchModel->jobs_id = $id;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);
            $dataProvider->pagination->pageSize=10;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'jobs_id' => $id,
        ]);
    }

    /**
     * Displays a single Jobsheetdet model.
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
     * Creates a new Jobsheetdet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        $model = new Jobsheetdet();
        $model->jobs_id = $id;

        if ( $model->load(Yii::$app->request->post()) ) {

            $model->insert_by   = Yii::$app->user->identity->id;
            $model->insert_date = date('Y-m-d');
		
		$model->bill_cost   = "0 / ".Yii::$app->request->post('USD')." / ".Yii::$app->request->post('Rp');

        $model->bil_agent   = "0 / ".Yii::$app->request->post('USD2')." / ".Yii::$app->request->post('Rp2');

        $model->bill_shipper = "0 / ".Yii::$app->request->post('USD3')." / ".Yii::$app->request->post('Rp3');

            if($model->save()){

                $totcos = 0;
                $totbill = 0;
                $totdn = 0;
                $totcn = 0;
                $totusd = 0;

                $model2 = Jobsheetdet::findAll(['active' => 1, 'jobs_id' => $id]);

                foreach ($model2 as $m2) {
                    $exbillcost = explode(' / ', $m2->bill_cost);
                    $exbillship = explode(' / ', $m2->bill_shipper);
                    $exbillagen = explode(' / ', $m2->bil_agent);

                    if( isset($exbillcost[2]) ){
                    $totcos += $exbillcost[2];
                    }

                    if( isset($exbillship[2]) ){
                        $totbill += $exbillship[2];
                    }

                    if( isset($exbillagen[2]) ){
                        $totbill += $exbillagen[2];
                    }

                    if( isset($exbillship[1]) ){
                        $totdn += $exbillship[1];
                    }

                    if( isset($exbillagen[1]) ){
                        $totdn += $exbillagen[1];
                    }

                    if( trim($m2->costing) == 'AFR SYSTEMS AT AGENT' ){
                        $totcn += $exbillcost[1];
                    }

			if( isset($exbillcost[1]) ){
                    		$totusd += $exbillcost[1];
                	}

			
                }

                $jobs_id = $model->jobs_id;
                $jobsheet = Jobsheet::find()
                ->where('jobs_id = :jobs_id', [':jobs_id' => $id])
                ->one();

                $jobsheet->tot_expenses = $totcos;
                $jobsheet->tot_bill = $totbill;
                $jobsheet->tot_profit = $totbill - $totcos;

                $jobsheet->tot_dn = $totdn;
                $jobsheet->tot_cn = $totcn;

		  $jobsheet->tot_usd = $totusd." / ".$totdn." / 0";

                $jobsheet->save();

                return $this->redirect(['index', 'id' => $model->jobs_id]);
            }

        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jobsheetdet model.
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

        $model->bill_cost   = "0 / ".Yii::$app->request->post('USD')." / ".Yii::$app->request->post('Rp');

		$model->bil_agent   = "0 / ".Yii::$app->request->post('USD2')." / ".Yii::$app->request->post('Rp2');

        $model->bill_shipper = "0 / ".Yii::$app->request->post('USD3')." / ".Yii::$app->request->post('Rp3');

            if( $model->save() ){

                $totcos = 0;
                $totbill = 0;
                $totdn = 0;
                $totcn = 0;
                $totusd = 0;

                $model2 = Jobsheetdet::findAll(['active' => 1, 'jobs_id' => $model->jobs_id]);

                foreach ($model2 as $m2) {
                $exbillcost = explode(' / ', $m2->bill_cost);
                $exbillship = explode(' / ', $m2->bill_shipper);
                $exbillagen = explode(' / ', $m2->bil_agent);

                if( isset($exbillcost[2]) ){
                    $totcos += $exbillcost[2];
                }

                if( isset($exbillship[2]) ){
                    $totbill += $exbillship[2];
                }

                if( isset($exbillagen[2]) ){
                    $totbill += $exbillagen[2];
                }

                if( isset($exbillship[1]) ){
                    $totdn += $exbillship[1];
                }

                if( isset($exbillagen[1]) ){
                    $totdn += $exbillagen[1];
                }
		
                if( trim($m2->costing) == 'AFR SYSTEMS AT AGENT' ){
                    $totcn += $exbillcost[1];
                }
                //echo trim($m2->costing)."<br />";
		

		  if( isset($exbillcost[1]) ){
                    $totusd += $exbillcost[1];
                }
            }
            //echo $totcn;die;
            $jobs_id = $model->jobs_id;
            $jobsheet = Jobsheet::find()
                ->where('jobs_id = :jobs_id', [':jobs_id' => $jobs_id])
                ->one();

            $jobsheet->tot_expenses = $totcos;
            $jobsheet->tot_bill = $totbill;
            $jobsheet->tot_profit = $totbill - $totcos;

            $jobsheet->tot_dn = $totdn;
            $jobsheet->tot_cn = $totcn;

	     $jobsheet->tot_usd = $totusd." / ".$totdn." / 0";


            $jobsheet->save();

                return $this->redirect(['index', 'id' => $model->jobs_id]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jobsheetdet model.
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
     * Finds the Jobsheetdet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jobsheetdet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jobsheetdet::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionDetailq($id = null)
    {
        $bl = Jobsheetdet::findAll(['jobs_id' => $id]);

        
        if($id == null){
            return $this->actionIndex();
        }


        if($bl == null){
            return $this->actionCreate();
        }else{
            return $this->actionIndex($id);
        }
    }
}
