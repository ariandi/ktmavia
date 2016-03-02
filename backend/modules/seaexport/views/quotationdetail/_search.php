<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\QuotationdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotationdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quotationdetid') ?>

    <?= $form->field($model, 'quotationid') ?>

    <?= $form->field($model, 'cost') ?>

    <?= $form->field($model, 'twentyft') ?>

    <?= $form->field($model, 'fourtyft') ?>

    <?php  echo $form->field($model, 'fourtyhc') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'local_cost') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
