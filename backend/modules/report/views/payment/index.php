<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\modules\report\models\PaymentdetSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\report\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1 style="margin-top: 0px;"><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel, 'from_date' => $from_date, 'to_date' => $to_date, 'dataProvider' => $dataProvider]); ?>

    <p>
        <?= Html::a('Create Payment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    
    <?php
    echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel' => $searchModel,
    'autoXlFormat'=>true,
    'export'=>[
        'fontAwesome'=>true,
        'showConfirmAlert'=>false,
        'target'=>GridView::TARGET_BLANK
    ],
    'columns'=>[
        [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new PaymentdetSearch();
                    $searchModel->payment_id = $model->payment_id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_paymentdet', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],
        [
            'attribute'=>'payment_number', 
            'pageSummary'=>'Total'
        ],
        [
            'attribute'=>'invoice_id', 
            'header' => 'Invoice No',
            'value'=>'invoiceinfo.invoice_no', 
            'format'=>'text', 
        ],
        [
            'attribute'=>'from_date',
            'value'=>'payment_date', 
            'header' => 'From Date',
            'format'=>['date', 'php:d-M-Y'],
            'noWrap' => true, 
        ],
        [
            'attribute'=>'to_date',
            'value'=>'payment_date', 
            'header' => 'To Date',
            'format'=>['date', 'php:d-M-Y'],
            'noWrap' => true, 
        ],
        [
            'attribute'=>'invoice_amt', 
            'value'=>'invoiceinfo.tot_amount', 
            'class'=>'kartik\grid\FormulaColumn', 
            'label'=>'Invoice Amount', 
            'format' => ['decimal', 2],
            'hAlign'=>'right', 
            'pageSummary'=>true 
        ],
        [
            'attribute'=>'total_amount', 
            'class'=>'kartik\grid\FormulaColumn', 
            'label'=>'Payment Amount', 
            'format' => ['decimal', 2],
            'hAlign'=>'right', 
            'pageSummary'=>true
        ],
        [
            'header'=>'Sisa Tagihan', 
            'value' => function($data){
                                        $inv = $data->invoiceinfo['tot_amount'];
                                        $pay = $data->total_amount;

                                        return $inv - $pay;
                                        },
            'class'=>'kartik\grid\FormulaColumn', 
            'format' => ['decimal', 2],
            'hAlign'=>'right', 
            'pageSummary'=>true
        ],
        [
            'attribute' =>'kindofexport',
            'header' =>'Kind of Export',
            'value' => function($data){
                $kind = '';
                if($data->invoiceinfo['kindofexport'] == 1){
                    $kind = 'Sea Export';
                }elseif($data->invoiceinfo['kindofexport'] == 2){
                    $kind = 'Sea Import';
                }
                elseif($data->invoiceinfo['kindofexport'] == 3){
                    $kind = 'Air Export';
                }
                elseif($data->invoiceinfo['kindofexport'] == 4){
                    $kind = 'Air Import';
                }
                return $kind; 
            }
        ],
        [
            'attribute'=>'company_name',
            'header'=>'Company Name', 
            'value'=>'invoiceinfo.companyinfo.companyname', 
        ],
        [
            'class' => '\kartik\grid\ActionColumn',
            'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>'],
            'noWrap' => true,
        ]
    ],
    'pjax'=>true,
    'responsive'=>true,
    //'responsiveWrap'=>false,
    'showPageSummary'=>true,
    'panel'=>[
        'type'=>'primary',
        'heading'=>'Payment Report'
    ]
]);
?>
</div>
