<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seaexport\models\BilllandingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Billlandings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billlanding-index">

    <h1><?= Html::encode('Bill of Landing') ?></h1>
    <br />
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    &nbsp;  
    </p>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'bl_id',
            'bl_number',
            'bl_place',
            'bl_date',
            //'bl_type',
            // 'si_id',
            // 'quotationid',
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
            // 'notify_party',
            'ocean_vessel',
            'status',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {link}',
            'buttons' => [
                    'link' => function ($url,$data,$key) {
                            $url = '/wedew/wedew';
                            return Html::a('<span class="glyphicon glyphicon-th-list"></span>', ['/seaimport/billlandingdetail/detailq', 'id'=>$data->bl_id]);
                    },
                    'view' => function ($url,$data){
                            $url = '/seaimport/billlanding/billlandingview/';
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', [$url, 'id'=>$data->bl_id]);
                    },
                ],
            ],
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{container_attachment} {description_attachment} {city_ocean_BL}',
            'buttons' => [
                    'container_attachment' => function ($url,$data,$key) {
                            $url = '/seaimport/billlanding/billlandingconview/';
                            return Html::a('<span class="glyphicon glyphicon-road"></span>', [$url, 'id'=>$data->bl_id]);
                    },
                    'description_attachment' => function ($url,$data){
                            $url = '/seaimport/billlanding/billlandingdesview/';
                            return Html::a('<span class="glyphicon glyphicon-align-justify"></span>', [$url, 'id'=>$data->bl_id]);
                    },
                    'city_ocean_BL' => function ($url,$data){
                            $url = '/seaimport/billlanding/billlandingcoview/';
                            return Html::a('<span class="glyphicon glyphicon-duplicate"></span>', [$url, 'id'=>$data->bl_id]);
                    },
                ],
            ],
        ],
    ]); ?>
    </div>
</div>
