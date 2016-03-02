<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\modules\airexport\models\CreditnotedetSearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\airexport\models\CreditnoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Credit Notes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditnote-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new CreditnotedetSearch();
                    $searchModel->creditnote_id = $model->criditnote_id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_creditnotedet', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],

            //'criditnote_id',
            'invoice_no',
            'invoice_date',
            [
                'header' => 'Company',
                'attribute' =>'jobs_id',
                'value' => 'jobsheetinfo.shippercompany.companyname',
            ],
            'due_date',
            //'term',
            //'tot_amount',
            [
                'attribute' =>'tot_amount',
                'format'=>['decimal',2]
            ],
            'status',
            // 'due_date',
            // 'term',
            // 'tot_amount',
            // 'companyid',
            // 'insert_by',
            // 'insert_date',
            // 'update_by',
            // 'update_date',
            // 'active',
            // 'sign',
            // 'status',
            // 'invoice_id',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update}',
            'buttons' => [
                    'view' => function ($url,$data){
                            $url = '/airexport/creditnote/creditnoteview/';
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', [$url, 'id'=>$data->criditnote_id]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
