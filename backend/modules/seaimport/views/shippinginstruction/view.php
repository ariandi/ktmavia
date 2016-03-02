<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Shippinginstruction */

$this->title = $model->si_id;
$this->params['breadcrumbs'][] = ['label' => 'Shippinginstructions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shippinginstruction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->si_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->si_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'si_id',
            'no_ref',
            'date',
            'booking_number',
            'depo',
            'stucking',
            'topic',
            'frompic',
            'telp_fax',
            'attn',
            'email:email',
            'shipper',
            'consignee',
            'notify_party',
            'vessel',
            'connecting_vessel',
            'port_of_loading',
            'etd_jkt',
            'eta_pus',
            'via_transit',
            'etd_pus',
            'quantity',
            'freight_term',
            'stuffing',
            'gw_nw_cbm',
            'description_good:ntext',
            'cont_seal_no',
            'shipping_mark',
            'destination',
            'rate',
            'note:ntext',
            'peb_no',
            'tgl',
            'kpbc',
            'hs_code',
            'bl_no',
            'insertby',
            'insertdate',
            'updateby',
            'updatedate',
            'active',
            'quotationid',
            'status',
        ],
    ]) ?>

</div>
