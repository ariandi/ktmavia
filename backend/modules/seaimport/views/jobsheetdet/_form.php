<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\masterdata\models\Costing;
use yii\jui\AutoComplete;
/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Jobsheetdet */
/* @var $form yii\widgets\ActiveForm */

$cost = Costing::find()
    ->select(['costing_name as value'])
    ->where(['not in', '`active`', ['0']])
    ->orderBy('costing_name')
    ->asArray()
    ->all();
?>

<div class="jobsheetdet-form">

    <?php $form = ActiveForm::begin(['id' => 'project-form']); ?>

    <?= $form->field($model, 'jobs_id')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <div class="form-group field-jobsheetdet-costing">
    <label class="control-label" for="jobsheetdet-costing">Costing</label>
        <?php
        echo AutoComplete::widget([
        'model' => $model,
        'attribute' => 'costing',
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $cost,
            'autoFill'=>true,
            'minLength'=>'1',
            'appendTo'=>'#project-form',
            
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?php $pecah = explode(' / ', $model->bill_cost);?>
    <?= Html::label('Bill Cost USD / Rupiah')?><br />
    <?= Html::TextInput('USD', isset($pecah[1]) ? $pecah[1] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'USD'])?>
    <?= Html::TextInput('Rp', isset($pecah[2]) ? $pecah[2] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Rupiah'])?><br /><br />

    <?php $pecah3 = explode(' / ', $model->bill_shipper);?>
    <?= Html::label('Bill Shipper USD / Rupiah')?><br />
    <?= Html::TextInput('USD3', isset($pecah3[1]) ? $pecah3[1] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'USD'])?>
    <?= Html::TextInput('Rp3', isset($pecah3[2]) ? $pecah3[2] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Rupiah'])?><br /><br />    

    <?php $pecah2 = explode(' / ', $model->bil_agent);?>
    <?= Html::label('Bill Agent USD / Rupiah')?><br />
    <?= Html::TextInput('USD2', isset($pecah2[1]) ? $pecah2[1] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'USD'])?>
    <?= Html::TextInput('Rp2', isset($pecah2[2]) ? $pecah2[2] : '', ['style'=>'width:300px;display:inline;', 'class' => 'form-control', 'placeholder' => 'Rupiah'])?><br /><br />

    <?= $form->field($model, 'invoice_db_cr')->dropDownList([ 'INVOICE' => 'INVOICE', 'DEBIT NOTE' => 'DEBIT NOTE', 'CREDIT NOTE' => 'CREDIT NOTE', ]) ?>

    <?= $form->field($model, 'inv')->checkbox(['maxlength' => true]); ?>
    <?= $form->field($model, 'dbn')->checkbox(['maxlength' => true]); ?>
    <?= $form->field($model, 'crn')->checkbox(['maxlength' => true]); ?>

    <?php if(!$model->isNewRecord){?>
    <?= $form->field($model, 'active')->textInput() ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
