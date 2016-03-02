<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\ShippinginstructionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shippinginstruction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'si_id') ?>

    <?= $form->field($model, 'no_ref') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'booking_number') ?>

    <?= $form->field($model, 'depo') ?>

    <?php // echo $form->field($model, 'stucking') ?>

    <?php // echo $form->field($model, 'topic') ?>

    <?php // echo $form->field($model, 'frompic') ?>

    <?php // echo $form->field($model, 'telp_fax') ?>

    <?php // echo $form->field($model, 'attn') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'shipper') ?>

    <?php // echo $form->field($model, 'consignee') ?>

    <?php // echo $form->field($model, 'notify_party') ?>

    <?php // echo $form->field($model, 'vessel') ?>

    <?php // echo $form->field($model, 'connecting_vessel') ?>

    <?php // echo $form->field($model, 'port_of_loading') ?>

    <?php // echo $form->field($model, 'etd_jkt') ?>

    <?php // echo $form->field($model, 'eta_pus') ?>

    <?php // echo $form->field($model, 'via_transit') ?>

    <?php // echo $form->field($model, 'etd_pus') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'freight_term') ?>

    <?php // echo $form->field($model, 'stuffing') ?>

    <?php // echo $form->field($model, 'gw_nw_cbm') ?>

    <?php // echo $form->field($model, 'description_good') ?>

    <?php // echo $form->field($model, 'cont_seal_no') ?>

    <?php // echo $form->field($model, 'shipping_mark') ?>

    <?php // echo $form->field($model, 'destination') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'peb_no') ?>

    <?php // echo $form->field($model, 'tgl') ?>

    <?php // echo $form->field($model, 'kpbc') ?>

    <?php // echo $form->field($model, 'hs_code') ?>

    <?php // echo $form->field($model, 'bl_no') ?>

    <?php // echo $form->field($model, 'insertby') ?>

    <?php // echo $form->field($model, 'insertdate') ?>

    <?php // echo $form->field($model, 'updateby') ?>

    <?php // echo $form->field($model, 'updatedate') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'quotationid') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
