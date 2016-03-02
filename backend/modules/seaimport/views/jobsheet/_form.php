<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use backend\modules\masterdata\models\Company;
use backend\modules\masterdata\models\User;
use backend\modules\seaexport\models\Invoice;
/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Jobsheet */
/* @var $form yii\widgets\ActiveForm */

$datacompany = Company::find()
    ->select(['companyname as value', 'companyname as label', 'companyid as cid'])
    ->where(['not in', 'companyid', ['1']])
    ->orderBy('companyname')
    ->asArray()
    ->all();

$comid2 = Company::findOne($model->shipper);
if($comid2 !== null){
    $c2 = $comid2->companyname;
}
else{
    $c2 = '';
}

$comid3 = Company::findOne($model->consignee);
if($comid3 !== null){
    $c3 = $comid3->companyname;
}
else{
    $c3 = '';
}


$datauser = User::find()
    ->select(['concat(FirstName," ",LastName) as value', 'concat(FirstName," ",LastName) as label', '`user`.`id` as uid'])
    //->leftJoin('company', '`company`.`companyid` = `user`.`companyid`')
    //->where(['not in', '`user`.`companyid`', ['1', '0']])
    ->orderBy('FirstName')
    ->asArray()
    ->all();

$fullname = User::findOne($model->pic);
if($fullname !== null){
    $fn = $fullname->FirstName.' '.$fullname->LastName;
}
else{
    $fn = '';
}

$invoice = Invoice::findAll(['jobs_id' => $model->jobs_id]);

?>

<div class="jobsheet-form">


    <!--fORM FOR SUCCESS-->
    <?php if($model->status == 'SUCCESS' && $invoice == null){ ?>
        <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                <?= Html::HiddenInput('makeinvo', '1')?>
                <?= Html::submitButton('Make Invoice', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    <?php }?>
    <!--fORM FOR SUCCESS-->


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jobs_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'jobs_no')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-jobsheet-shipper2">
    <label class="control-label" for="jobsheet-shipper2">Shipper</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'shipper2',
        //'attribute' => 'fullname',
        'value' => $c2,
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datacompany,
            'autoFill'=>true,
            'minLength'=>'1',
             'select' => new JsExpression("function( event, ui ) {
                                        $('#jobsheet-shipper').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'shipper')?>

    <div class="form-group field-jobsheet-consignee2">
    <label class="control-label" for="jobsheet-consignee2">Consignee</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'consignee2',
        //'attribute' => 'fullname',
        'value' => $c3,
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datacompany,
            'autoFill'=>true,
            'minLength'=>'1',
             'select' => new JsExpression("function( event, ui ) {
                                        $('#jobsheet-consignee').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'consignee')?>

    <?= $form->field($model, 'commodity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'po_sty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ctn_qty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dimensions')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'freight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_rcvd')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>


    <div class="form-group field-jobsheet-pic">
    <label class="control-label" for="jobsheet-pic">PIC Name</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'pic2',
        //'attribute' => 'fullname',
        'value' => $fn,
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datauser,
            'autoFill'=>true,
            'minLength'=>'1',
             'select' => new JsExpression("function( event, ui ) {
                                        $('#jobsheet-pic').val(ui.item.uid);
                            }")
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'pic')?>

    <?= $form->field($model, 'telp_fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gross_w')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vol_w')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'measurement')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-jobsheet-overseas_agent">
    <label class="control-label" for="jobsheet-overseas_agent">Overseas Agent</label>
        <?php
        echo AutoComplete::widget([
        'model' => $model,
        'attribute' => 'overseas_agent',
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datacompany,
            'autoFill'=>true,
            'minLength'=>'1',
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'handling')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mbl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hbl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handling_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pickup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_usd')->textInput(['maxlength' => true]) ?>

    <?php if(!$model->isNewRecord){
        echo $form->field($model, 'active')->textInput(); 
    }
    ?>

    <?= $form->field($model, 'status')->dropDownList([ 'PENDING' => 'PENDING', 'FAILED' => 'FAILED', 'SUCCESS' => 'SUCCESS', ], ['prompt' => '']) ?>

    <div class="form-group field-jobsheet-prepain_by">
    <label class="control-label" for="jobsheet-prepain_by">Prepaired By</label>
        <?php
        echo AutoComplete::widget([
        'model' => $model,
        //'name' => 'pic2',
        'attribute' => 'prepain_by',
        //'value' => $fn,
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

    <div class="form-group field-jobsheet-approve_by">
    <label class="control-label" for="jobsheet-approve_by">Approve By</label>
        <?php
        echo AutoComplete::widget([
        'model' => $model,
        //'name' => 'pic2',
        'attribute' => 'approve_by',
        //'value' => $fn,
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
