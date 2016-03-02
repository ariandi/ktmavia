<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\report\models\PaymentdetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment detail Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentdet-index">

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
                'attribute' => 'payment_id',
                'header' => 'Payment No',
                'value' => 'paymentinfo.payment_number',
                'format' => 'text',
                'pageSummary'=>'Total'
            ],
            [
                'attribute' =>'kindofexport',
                'header' =>'Kind of Export',
                'value' => function($data){
                    $kind = '';
                    if($data->paymentinfo->invoiceinfo['kindofexport'] == 1){
                        $kind = 'Sea Export';
                    }elseif($data->paymentinfo->invoiceinfo['kindofexport'] == 2){
                        $kind = 'Sea Import';
                    }
                    elseif($data->paymentinfo->invoiceinfo['kindofexport'] == 3){
                        $kind = 'Air Export';
                    }
                    elseif($data->paymentinfo->invoiceinfo['kindofexport'] == 4){
                        $kind = 'Air Import';
                    }
                    return $kind; 
                }
            ],
            'payment_name',
            [
                'attribute' => 'amount',
                'class'=>'kartik\grid\FormulaColumn', 
                'format' => ['decimal', 2],
                'hAlign'=>'right', 
                'pageSummary'=>true
            ],
            [
                'header'=>'From Date',
                'attribute'=>'from_date',
                'value'=>'paymentinfo.payment_date', 
                'format'=>['date', 'php:d-M-Y'], 
            ],
            [
                'header'=>'To Date',
                'attribute'=>'to_date',
                'value'=>'paymentinfo.payment_date', 
                'format'=>['date', 'php:d-M-Y'], 
            ],
            [
                'attribute'=>'company_name',
                'value'=>'paymentinfo.invoiceinfo.custinfo.companyname', 
                'format'=>'text', 
            ]
            // 'insert_date',
            // 'update_by',
            // 'update_date',
            // 'active',
        ],
        'pjax'=>true,
        'responsive'=>true,
        'showPageSummary'=>true,
        'panel'=>[
            'type'=>'primary',
            'heading'=>'Payment Detail Report'
        ],
    ]); ?>

</div>
