<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\report\models\JobsheetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobsheets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobsheet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jobsheet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jobs_id',
            'jobs_name',
            'date',
            'jobs_no',
            'shipper',
            // 'consignee',
            // 'commodity',
            // 'po_sty',
            // 'ctn_qty',
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
            // 'mbl',
            // 'hbl',
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
            // 'tot_expenses',
            // 'tot_bill',
            // 'tot_profit',
            // 'tot_usd',
            // 'tot_dn',
            // 'tot_cn',
            // 'kindofexport',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
