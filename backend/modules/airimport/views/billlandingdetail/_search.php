<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\BilllandingdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="billlandingdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bl_det_id') ?>

    <?= $form->field($model, 'bl_id') ?>

    <?= $form->field($model, 'container_seal_no') ?>

    <?= $form->field($model, 'kind_of_package_desc_goods') ?>

    <?= $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'measurement') ?>

    <?php // echo $form->field($model, 'total_container') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'insert_by') ?>

    <?php // echo $form->field($model, 'insert_date') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
