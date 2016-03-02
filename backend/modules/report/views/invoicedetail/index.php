<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\report\models\InvoicedetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoice detail Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoicedetail-index">

    <h1 style="margin-top: 0px;"><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel, 'from_date' => $from_date, 'to_date' => $to_date, 'dataProvider' => $dataProvider]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'autoXlFormat'=>true,
        'export'=>[
            'fontAwesome'=>true,
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],
        'columns' => [
            [
                'attribute'=>'invoice_id', 
                'header' => 'Invoice No',
                'value'=>'invoiceinfo.invoice_no', 
                'format'=>'text',
                'pageSummary'=>'Total'
            ],

            [
                'attribute' =>'kindofexport',
                'header' =>'Kind of Export',
                'value' => function($data){
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
                'attribute'=>'from_date',
                'value'=>'invoiceinfo.due_date', 
                'header' => 'From Date',
                'format'=>['date', 'php:d-M-Y'], 
            ],

            [
                'attribute'=>'to_date',
                'value'=>'invoiceinfo.due_date', 
                'header' => 'To Date',
                'format'=>['date', 'php:d-M-Y'], 
            ],

            'costing',
            [
                'attribute'=>'amount', 
                'class'=>'kartik\grid\FormulaColumn', 
                'label'=>'Amount', 
                'format' => ['decimal', 2],
                'hAlign'=>'right', 
                'pageSummary'=>true
            ],
            [
                'attribute'=>'company_name', 
                'format' => 'text',
                'value'=>'invoiceinfo.custinfo.companyname', 
            ],
            //'insert_by',
            // 'insert_date',
            // 'update_by',
            // 'update_date',
            // 'active',

            //['class' => 'yii\grid\ActionColumn'],
            
        ],
        'pjax'=>true,
        'responsive'=>true,
        'showPageSummary'=>true,
        'panel'=>[
            'type'=>'primary',
            'heading'=>'Invoice Detail Report'
        ]
    ]); ?>

</div>
