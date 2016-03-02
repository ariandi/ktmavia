<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\modules\report\models\InvoiceDetailSearch;

use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\report\models\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoice Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-index">

    <h1 style="margin-top: 0px;"><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel, 'from_date' => $from_date, 'to_date' => $to_date, 'dataProvider' => $dataProvider]); ?>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if(date('Y-m-d') >= $model->due_date && $model->due_date !== null){
                return ['class' => 'danger'];
            }
        },
        'autoXlFormat'=>true,
        'export'=>[
            'fontAwesome'=>true,
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],
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
            [
                'attribute'=>'invoice_no',
                'pageSummary'=>'Total Invoice',
            ],
            [
                'attribute'=>'from_date',
                'value' => 'invoice_date',
                'header' => 'From Date',
                'format'=>['date', 'php:d-M-Y'], 
            ],
            [
                'attribute'=>'to_date',
                'value' => 'invoice_date',
                'header' => 'To Date',
                'format'=>['date', 'php:d-M-Y'], 
            ],
            //'jobs_id',
            //'bl_id',
            [
                'header' => 'Company',
                'attribute' =>'jobs_id',
                'value' => 'companyinfo.companyname',
            ],
            [
                'attribute'=>'due_date',
                'format'=>['date', 'php:d-M-Y'], 
            ],
            //'term',
            //'tot_amount',
            [
                'attribute' =>'tot_amount',
                'class'=>'kartik\grid\FormulaColumn', 
                'format'=>['decimal',2],
                'hAlign'=>'right', 
                'pageSummary'=>true,
            ],
            'status',
            [
                'attribute' =>'kindofexport',
                'value' => function($data){
                    if($data->kindofexport == 1){
                        $kind = 'Sea Export';
                    }elseif($data->kindofexport == 2){
                        $kind = 'Sea Import';
                    }
                    elseif($data->kindofexport == 3){
                        $kind = 'Air Export';
                    }
                    elseif($data->kindofexport == 4){
                        $kind = 'Air Import';
                    }
                    return $kind; 
                }
            ],
            // 'insert_by',
            // 'insert_date',
            // 'update_by',
            // 'update_date',
            // 'active',
            // 'sign',
        ],
        'pjax'=>true,
        'responsive'=>true,
        'showPageSummary'=>true,
        'panel'=>[
            'type'=>'primary',
            'heading'=>'Invoice Report'
        ],
    ]); ?>
</div>

</div>