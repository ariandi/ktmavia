<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\CreditnotedetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="creditnotedet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'creditnotedet_id') ?>

    <?= $form->field($model, 'creditnote_id') ?>

    <?= $form->field($model, 'costing') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'insert_by') ?>

    <?php // echo $form->field($model, 'insert_date') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
