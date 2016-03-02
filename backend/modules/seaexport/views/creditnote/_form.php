<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use backend\modules\masterdata\models\User;
use backend\modules\masterdata\models\Company;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Creditnote */
/* @var $form yii\widgets\ActiveForm */
$datauser = User::find()
    ->select(['concat(FirstName," ",LastName) as value', 'concat(FirstName," ",LastName) as label', '`user`.`id` as uid'])
    //->leftJoin('company', '`company`.`companyid` = `user`.`companyid`')
    //->where(['not in', '`user`.`companyid`', ['1', '0']])
    ->orderBy('FirstName')
    ->asArray()
    ->all();

$datacompany = Company::find()
    ->select(['companyname as value', 'companyname as label', 'companyid as cid'])
    ->where(['not in', 'companyid', ['1']])
    ->orderBy('companyname')
    ->asArray()
    ->all();
?>

<div class="creditnote-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'invoice_date')->textInput() ?>

    <?= $form->field($model, 'due_date')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group field-creditnote-sign">
    <label class="control-label" for="creditnote-sign">Sign</label>
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

    <?= $form->field($model, 'status')->dropDownList([ 'ON GOING' => 'ON GOING', 'FINISH' => 'FINISH', 'CANCEL' => 'CANCEL', ], ['prompt' => '']) ?>

    <div class="form-group field-creditnode-companyid2">
    <label class="control-label" for="creditnode-companyid2">To</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'companyid2',
        //'attribute' => 'fullname',
        'value' => $model->tocompany->companyname,
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datacompany,
            'autoFill'=>true,
            'minLength'=>'1',
             'select' => new JsExpression("function( event, ui ) {
                                        $('#creditnote-companyid').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'companyid')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
