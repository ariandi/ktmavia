<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\QuotationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quotationid') ?>

    <?= $form->field($model, 'quotationtitle') ?>

    <?= $form->field($model, 'picto') ?>

    <?= $form->field($model, 'picfrom') ?>

    <?= $form->field($model, 'companyid') ?>

    <?php // echo $form->field($model, 'quotationdate') ?>

    <?php // echo $form->field($model, 'senderreerence') ?>

    <?php // echo $form->field($model, 'createby') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'updateby') ?>

    <?php // echo $form->field($model, 'updatedate') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'portofloading') ?>

    <?php // echo $form->field($model, 'freightageofpayment') ?>

    <?php // echo $form->field($model, 'commodity') ?>

    <?php // echo $form->field($model, 'termofshipment') ?>

    <?php // echo $form->field($model, 'validdate') ?>

    <?php // echo $form->field($model, 'termofpayment') ?>

    <?php // echo $form->field($model, 'kindofexport') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
