<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seaexport\models\JobsheetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job sheets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobsheet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jobs_name',
            'date',
            'jobs_no',
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
            //'shippercompany.companyname',
            //'consigneecompany.companyname',
            'commodity',
            // 'po_sty',
            // 'ctnqty',
            // 'dimensions',
            // 'destination',
            // 'freight',
            // 'date_rcvd',
            // 'pic',
            // 'telp_fax',
            // 'gross_w',
            // 'vol_w',
            // 'measurement',
            // 'overseas_agent',
            // 'handling',
            'mbl',
            'hbl',
            // 'fl',
            // 'remarks',
            // 'handling_by',
            // 'remarks2',
            // 'pickup',
            // 'delivery',
            // 'bl_id',
            // 'active',
            // 'status',
            // 'insert_by',
            // 'insert_date',
            // 'update_by',
            // 'update_date',
            // 'prepain_by',
            // 'approve_by',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {link}',
            'buttons' => [
                    'link' => function ($url,$data,$key) {
                            return Html::a('<span class="glyphicon glyphicon-th-list"></span>', ['/seaexport/jobsheetdet/detailq', 'id'=>$data->jobs_id]);
                    },
                    'view' => function ($url,$data){
                            $url = '/seaexport/jobsheet/jobsheetview/';
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', [$url, 'id'=>$data->jobs_id]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
</div>
