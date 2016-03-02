<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Billlandingdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="billlandingdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bl_id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'container_seal_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kind_of_package_desc_goods')->textarea(['rows' => 6]) ?>

    <?php         
        $pecah  = explode(' / ', $model->weight);
        isset($pecah[0]) ? $specah = explode(' ', $pecah[0]) : $specah = '';
    ?>
    <?= Html::label('Gross Weight')?><br />
    <?= Html::TextInput('G', isset($specah[0]) ? $specah[0] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Gross Weight'])?>
    <?= Html::TextInput('Gu', isset($specah[1]) ? $specah[1] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Unit'])?><br /><br />

    <?php 
        isset($pecah[1]) ? $specah2 = explode(' ', $pecah[1]) : $specah2 = '';
    ?>
    <?= Html::label('Comodity Item No')?><br />
    <?= Html::TextInput('C', isset($specah2[0]) ? $specah2[0] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Comodity Item No'])?>
    <?= Html::TextInput('Cu', isset($specah2[1]) ? $specah2[1] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Unit'])?><br /><br />

    <?php 
        isset($pecah[2]) ? $specah3 = explode(' ', $pecah[2]) : $specah3 = '';
    ?>
    <?= Html::label('Chargeable Weight')?><br />
    <?= Html::TextInput('CW', isset($specah3[0]) ? $specah3[0] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Chargeable Weight'])?>
    <?= Html::TextInput('CWu', isset($specah3[1]) ? $specah3[1] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Unit'])?><br /><br />

    <?php 
        isset($pecah[3]) ? $specah4 = explode(' ', $pecah[3]) : $specah4 = '';
    ?>
    <?= Html::label('Rate')?><br />
    <?= Html::TextInput('R', isset($specah4[0]) ? $specah4[0] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Rate'])?>
    <?= Html::TextInput('Ru', isset($specah4[1]) ? $specah4[1] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Unit'])?><br /><br />

    <?= $form->field($model, 'total_container')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
