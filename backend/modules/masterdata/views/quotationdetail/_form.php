<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\Quotationdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotationdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quotationid')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '20ft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '40ft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '40hc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'local_cost')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
