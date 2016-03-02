<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use backend\modules\masterdata\models\User;
use yii\jui\AutoComplete;
/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
$datauser = User::find()
    ->select(['concat(FirstName," ",LastName) as value', 'concat(FirstName," ",LastName) as label', '`user`.`id` as uid'])
    //->leftJoin('company', '`company`.`companyid` = `user`.`companyid`')
    //->where(['not in', '`user`.`companyid`', ['1', '0']])
    ->orderBy('FirstName')
    ->asArray()
    ->all();

?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'invoice_date')->textInput() ?>

    <?= $form->field($model, 'due_date')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'tot_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'ON GOING' => 'ON GOING', 'FINISH' => 'FINISH', 'CANCEL' => 'CANCEL' ]) ?>

    <div class="form-group field-invoice-sign">
    <label class="control-label" for="invoice-sign">Sign</label>
        <?php
        echo AutoComplete::widget([
        'model' => $model,
        'attribute' => 'sign',
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datauser,
            'autoFill'=>true,
            'minLength'=>'1',
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
