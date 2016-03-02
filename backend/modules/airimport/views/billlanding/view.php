<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Billlanding */

$this->title = $model->bl_id;
$this->params['breadcrumbs'][] = ['label' => 'Billlandings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billlanding-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bl_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bl_id], [
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
            'bl_id',
            'bl_number',
            'bl_place',
            'bl_date',
            'bl_type',
            'si_id',
            'quotationid',
            'shipper',
            'consignee',
            'notify_party',
            'ocean_vessel',
            'port_of_discharge',
            'place_of_receipt',
            'port_of_loading',
            'place_of_delivery',
            'delivery_agent',
            'freight_charges',
            'revenue_tons',
            'rate',
            'freight_term',
            'exchange_rate',
            'currency',
            'prepaid_at',
            'payable_at',
            'total_prepaid_national_currency',
            'number_of_original',
            'status',
            'initial_carriage',
            'active',
            'update_by',
            'update_date',
            'insert_by',
            'insert_date',
            'collect',
            'kindofexport',
            'agent_iata_code',
            'account_no',
            'to_code',
            'by_first_carrier',
            'to_carrier_1',
            'by_carrier_1',
            'to_carrier_2',
            'by_carrier_2',
            'requested_flight_date_1',
            'requested_flight_date_2',
            'wt_val_ppd',
            'wt_val_coll',
            'other_ppd',
            'other_coll',
            'declared_val_carriege',
            'declared_val_cust',
            'holding_info',
            'weigth_charge_prepaid',
            'weigth_charge_collect',
            'valuation_charge_prepaid',
            'valuation_charge_collect',
            'tax_prepaid',
            'tax_collect',
            'tot_agent_prepaid',
            'tot_agent_collect',
            'tot_carrier_prepaid',
            'tot_carrier_collect',
            'tot_prepaid',
            'tot_collect',
            'oth_charger',
            'cartage',
            'doc_stamp_fee',
            'agent_certified',
        ],
    ]) ?>

</div>
