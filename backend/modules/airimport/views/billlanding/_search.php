<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\BilllandingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="billlanding-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bl_id') ?>

    <?= $form->field($model, 'bl_number') ?>

    <?= $form->field($model, 'bl_place') ?>

    <?= $form->field($model, 'bl_date') ?>

    <?= $form->field($model, 'bl_type') ?>

    <?php // echo $form->field($model, 'si_id') ?>

    <?php // echo $form->field($model, 'quotationid') ?>

    <?php // echo $form->field($model, 'shipper') ?>

    <?php // echo $form->field($model, 'consignee') ?>

    <?php // echo $form->field($model, 'notify_party') ?>

    <?php // echo $form->field($model, 'ocean_vessel') ?>

    <?php // echo $form->field($model, 'port_of_discharge') ?>

    <?php // echo $form->field($model, 'place_of_receipt') ?>

    <?php // echo $form->field($model, 'port_of_loading') ?>

    <?php // echo $form->field($model, 'place_of_delivery') ?>

    <?php // echo $form->field($model, 'delivery_agent') ?>

    <?php // echo $form->field($model, 'freight_charges') ?>

    <?php // echo $form->field($model, 'revenue_tons') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'freight_term') ?>

    <?php // echo $form->field($model, 'exchange_rate') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'prepaid_at') ?>

    <?php // echo $form->field($model, 'payable_at') ?>

    <?php // echo $form->field($model, 'total_prepaid_national_currency') ?>

    <?php // echo $form->field($model, 'number_of_original') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'initial_carriage') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'insert_by') ?>

    <?php // echo $form->field($model, 'insert_date') ?>

    <?php // echo $form->field($model, 'collect') ?>

    <?php // echo $form->field($model, 'kindofexport') ?>

    <?php // echo $form->field($model, 'agent_iata_code') ?>

    <?php // echo $form->field($model, 'account_no') ?>

    <?php // echo $form->field($model, 'to_code') ?>

    <?php // echo $form->field($model, 'by_first_carrier') ?>

    <?php // echo $form->field($model, 'to_carrier_1') ?>

    <?php // echo $form->field($model, 'by_carrier_1') ?>

    <?php // echo $form->field($model, 'to_carrier_2') ?>

    <?php // echo $form->field($model, 'by_carrier_2') ?>

    <?php // echo $form->field($model, 'requested_flight_date_1') ?>

    <?php // echo $form->field($model, 'requested_flight_date_2') ?>

    <?php // echo $form->field($model, 'wt_val_ppd') ?>

    <?php // echo $form->field($model, 'wt_val_coll') ?>

    <?php // echo $form->field($model, 'other_ppd') ?>

    <?php // echo $form->field($model, 'other_coll') ?>

    <?php // echo $form->field($model, 'declared_val_carriege') ?>

    <?php // echo $form->field($model, 'declared_val_cust') ?>

    <?php // echo $form->field($model, 'holding_info') ?>

    <?php // echo $form->field($model, 'weigth_charge_prepaid') ?>

    <?php // echo $form->field($model, 'weigth_charge_collect') ?>

    <?php // echo $form->field($model, 'valuation_charge_prepaid') ?>

    <?php // echo $form->field($model, 'valuation_charge_collect') ?>

    <?php // echo $form->field($model, 'tax_prepaid') ?>

    <?php // echo $form->field($model, 'tax_collect') ?>

    <?php // echo $form->field($model, 'tot_agent_prepaid') ?>

    <?php // echo $form->field($model, 'tot_agent_collect') ?>

    <?php // echo $form->field($model, 'tot_carrier_prepaid') ?>

    <?php // echo $form->field($model, 'tot_carrier_collect') ?>

    <?php // echo $form->field($model, 'tot_prepaid') ?>

    <?php // echo $form->field($model, 'tot_collect') ?>

    <?php // echo $form->field($model, 'oth_charger') ?>

    <?php // echo $form->field($model, 'cartage') ?>

    <?php // echo $form->field($model, 'doc_stamp_fee') ?>

    <?php // echo $form->field($model, 'agent_certified') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
