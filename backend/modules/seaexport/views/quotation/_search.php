<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\QuotationSearch */
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

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
