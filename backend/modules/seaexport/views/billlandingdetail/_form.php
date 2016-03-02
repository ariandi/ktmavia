<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Billlandingdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="billlandingdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bl_id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'container_seal_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kind_of_package_desc_goods')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_container')->textInput(['maxlength' => true]) ?>

    <?php
    if(!$model->isNewRecord)
        echo $form->field($model, 'active')->textInput(['maxlength' => true]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
