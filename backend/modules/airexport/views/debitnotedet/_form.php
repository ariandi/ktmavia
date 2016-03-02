<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Debitnotedet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="debitnotedet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'debitnote_id')->textInput() ?>

    <?= $form->field($model, 'costing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'insert_by')->textInput() ?>

    <?= $form->field($model, 'insert_date')->textInput() ?>

    <?= $form->field($model, 'update_by')->textInput() ?>

    <?= $form->field($model, 'update_date')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
