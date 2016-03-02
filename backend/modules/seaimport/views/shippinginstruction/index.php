<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seaimport\models\ShippinginstructionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shippinginstructions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shippinginstruction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shippinginstruction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'si_id',
            'no_ref',
            'date',
            'booking_number',
            'depo',
            // 'stucking',
            // 'topic',
            // 'frompic',
            // 'telp_fax',
            // 'attn',
            // 'email:email',
            // 'shipper',
            // 'consignee',
            // 'notify_party',
            // 'vessel',
            // 'connecting_vessel',
            // 'port_of_loading',
            // 'etd_jkt',
            // 'eta_pus',
            // 'via_transit',
            // 'etd_pus',
            // 'quantity',
            // 'freight_term',
            // 'stuffing',
            // 'gw_nw_cbm',
            // 'description_good:ntext',
            // 'cont_seal_no',
            // 'shipping_mark',
            // 'destination',
            // 'rate',
            // 'note:ntext',
            // 'peb_no',
            // 'tgl',
            // 'kpbc',
            // 'hs_code',
            // 'bl_no',
            // 'insertby',
            // 'insertdate',
            // 'updateby',
            // 'updatedate',
            // 'active',
            // 'quotationid',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
