<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\Costing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="costing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'costing_name')->textInput(['maxlength' => true]) ?>

    <?php if(!$model->isNewRecord){?>
    
        <?= $form->field($model, 'active')->textInput() ?>
    
    <?php }?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
