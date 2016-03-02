<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\report\models\BilllandingdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Billlandingdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billlandingdetail-index">

    <h1 style="margin-top:0px;"><?= Html::encode('Container Report') ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel, 'from_date' => $from_date, 'to_date' => $to_date, 'dataProvider' => $dataProvider]); ?>


    <?php
    echo GridView::widget([
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
                'header' => 'Shipper',
                'attribute' =>'companyname',
                'value' => 'billinfo.shippercompany.companyname',
            ],
            [
                'header' => 'Consignee',
                'attribute' =>'companyname2',
                'value' => 'billinfo.consigneecompany.companyname',
            ],
            [
                'header' =>'kind of export',
                'attribute'=>'kindofexport',
                'value' => function($model){
                    $kind="";
                    if($model->billinfo['kindofexport'] == 1){
                        $kind = 'Sea Export';
                    }elseif($model->billinfo['kindofexport'] == 2){
                        $kind = 'Sea Import';
                    }
                    elseif($model->billinfo['kindofexport']== 3){
                        $kind = 'Air Export';
                    }
                    elseif($model->billinfo['kindofexport'] == 4){
                        $kind = 'Air Import';
                    }
                        return $kind;   
                                        
                } 
                
            ],
            [
                'header' => 'From Date',
                'attribute' =>'from_date',
                'value' => 'billinfo.bl_date',
                'format'=>['date', 'php:d-M-Y'],
                'noWrap' => true,
            ],
            [
                'header' => 'To Date',
                'attribute' =>'to_date',
                'value' => 'billinfo.bl_date',
                'format'=>['date', 'php:d-M-Y'],
                'noWrap' => true,
            ],
            'container_seal_no',
            //'kind_of_package_desc_goods:ntext',
            'weight',
            [
                'header' => 'BL Name',
                'attribute' =>'bl_number',
                'value' => 'billinfo.bl_number',
                //'value' => function($data){
                //    return $data->billinfo['bl_number'];
                //},
            ]
            //['class' => 'yii\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'responsive'=>true,
        'showPageSummary'=>false,
        'panel'=>[
            'type'=>'primary',
            'heading'=>'Container Report'
        ]
    ]); ?>

</div>