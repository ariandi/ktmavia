<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\BilllandingSearch */
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

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
