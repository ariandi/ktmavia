<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\JobsheetdetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobsheetdet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jobsdet_id') ?>

    <?= $form->field($model, 'jobs_id') ?>

    <?= $form->field($model, 'costing') ?>

    <?= $form->field($model, 'bill_cost') ?>

    <?= $form->field($model, 'bill_shipper') ?>

    <?php // echo $form->field($model, 'bil_agent') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'insert_by') ?>

    <?php // echo $form->field($model, 'insert_date') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'invoice_db_cr') ?>

    <?php // echo $form->field($model, 'inv') ?>

    <?php // echo $form->field($model, 'dbn') ?>

    <?php // echo $form->field($model, 'crn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
