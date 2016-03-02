<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\modules\seaimport\models\InvoiceDetailSearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seaimport\models\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="table-responsive">
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
                    $searchModel = new InvoicedetailSearch();
                    $searchModel->invoice_id = $model->invoice_id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_invoicedet', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],

            //'invoice_id',
            'invoice_no',
            'invoice_date',
            //'jobs_id',
            //'bl_id',
            [
                'header' => 'Company',
                'attribute' =>'jobs_id',
                'value' => 'jobsheetinfo.companyname',
            ],
            'due_date',
            //'term',
            //'tot_amount',
            [
                'attribute' =>'tot_amount',
                'format'=>['decimal',2]
            ],
            'status',
            // 'companyid',
            // 'insert_by',
            // 'insert_date',
            // 'update_by',
            // 'update_date',
            // 'active',
            // 'sign',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                    'view' => function ($url,$data){
                            $url = '/seaimport/invoice/invoiceview/';
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', [$url, 'id'=>$data->invoice_id]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
</div>
