<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Shippinginstruction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shippinginstruction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'booking_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'depo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stucking')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topic')->textInput() ?>

    <?= $form->field($model, 'frompic')->textInput() ?>

    <?= $form->field($model, 'telp_fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attn')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipper')->textInput() ?>

    <?= $form->field($model, 'consignee')->textInput() ?>

    <?= $form->field($model, 'notify_party')->textInput() ?>

    <?= $form->field($model, 'vessel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'connecting_vessel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'port_of_loading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'etd_jkt')->textInput() ?>

    <?= $form->field($model, 'eta_pus')->textInput() ?>

    <?= $form->field($model, 'via_transit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'etd_pus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'freight_term')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stuffing')->textInput() ?>

    <?= $form->field($model, 'gw_nw_cbm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_good')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cont_seal_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipping_mark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'peb_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl')->textInput() ?>

    <?= $form->field($model, 'kpbc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hs_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bl_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'insertby')->textInput() ?>

    <?= $form->field($model, 'insertdate')->textInput() ?>

    <?= $form->field($model, 'updateby')->textInput() ?>

    <?= $form->field($model, 'updatedate')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'quotationid')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'PENDING' => 'PENDING', 'FAILED' => 'FAILED', 'SUCCESS' => 'SUCCESS', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
