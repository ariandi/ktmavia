<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\report\models\JobsheetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Sheets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobsheet-index">

    <h1 style="margin-top:0px;"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'attribute' =>'jobs_no',
                'noWrap' => true,
                'pageSummary'=>'Total',
            ],
            [
                'attribute'=>'from_date',
                'value'=>'date', 
                'header' => 'From Date',
                'format'=>['date', 'php:d-M-Y'],
                'noWrap' => true, 
            ],

            [
                'attribute'=>'to_date',
                'value'=>'date', 
                'header' => 'To Date',
                'format'=>['date', 'php:d-M-Y'],
                'noWrap' => true, 
            ],
            
            [
                'header' => 'Shipper',
                'attribute' =>'shipper',
                'value' => 'shippercompany.companyname',
            ],
            [
                'header' => 'Consignee',
                'attribute' =>'consignee',
                'value' => 'consigneecompany.companyname',
            ],
            'ctn_qty',
            [
                'header' => 'Tot Prof USD',
                'attribute' =>'tot_usd',
                'class'=>'kartik\grid\FormulaColumn',  
                'format' => ['decimal', 2],
                'hAlign'=>'right', 
                'pageSummary'=>true,
                'value'=>function($model){
                    $totusd = explode(' / ',$model->tot_usd);
                    if(isset($totusd[1])){
                        $totnetusd = (double)$totusd[1] - (double)$totusd[0];
                        $cari = explode(".", $totusd[0]);
                        if(isset($cari[1])){
                            return floatval($totnetusd);
                        }
                        else{
                            $fn = $totnetusd.'.00';
                            return floatval($fn);
                        }
                    }else{
                        return 0.00;
                    }
                },
                'noWrap' => true,
            ],
            [
                'header' => 'Tot Prof IDR',
                'attribute' =>'tot_profit',
                'class'=>'kartik\grid\FormulaColumn',  
                'format' => ['decimal', 2],
                'hAlign'=>'right', 
                'pageSummary'=>true,
                'noWrap' => true,
            ],
            [
                'attribute' =>'mbl',
                'noWrap' => true,
            ],
            [
                'attribute' =>'hbl',
                'noWrap' => true,
            ],
            [
                'attribute' =>'kindofexport',
                'header' =>'Kind of Export',
                'value' => 'kindexport.kindexport_name',
            ],

        ],
        'pjax'=>true,
        'responsive'=>true,
        //'responsiveWrap'=>false,
        'showPageSummary'=>true,
        'panel'=>[
            'type'=>'primary',
            'heading'=>'Payment Report'
        ]
    ]); ?>

</div>
