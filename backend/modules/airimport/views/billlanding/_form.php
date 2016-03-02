<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use backend\modules\masterdata\models\Company;
use backend\modules\seaimport\models\Jobsheet;
use backend\modules\masterdata\models\Port;
/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Billlanding */
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

$comid4 = Company::findOne($model->notify_party);
if($comid4 !== null){
    $c4 = $comid4->companyname;
}
else{
    $c4 = '';
}

$comid5 = Company::findOne($model->delivery_agent);
if($comid5 !== null){
    $c5 = $comid5->companyname;
}
else{
    $c5 = '';
}

$dataport = Port::find()
    ->select(['port_name as value', 'port_name as label'])
    ->orderBy('port_name')
    ->asArray()
    ->all();

$job_s = Jobsheet::findAll(['bl_id' => $model->bl_id]);
?>

<div class="billlanding-form">

    <!--fORM FOR SUCCESS-->
    <?php if($model->status == 'SUCCESS' && $job_s == null){ ?>
        <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                <?= Html::HiddenInput('makejs', '1')?>
                <?= Html::submitButton('Make Job Sheet', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    <?php }?>
    <!--fORM FOR SUCCESS-->

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bl_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bl_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bl_date')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'bl_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-billlanding-shipper2">
    <label class="control-label" for="billlanding-shipper2">Shipper</label>
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
                                        $('#billlanding-shipper').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'shipper')?>

    <div class="form-group field-billlanding-consignee2">
    <label class="control-label" for="billlanding-consignee2">Consignee</label>
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
                                        $('#billlanding-consignee').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'consignee')?>

    <div class="form-group field-billlanding-notify_party2">
    <label class="control-label" for="billlanding-notify_party2">Notify Party</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'notify_party2',
        //'attribute' => 'fullname',
        'value' => $c4,
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datacompany,
            'autoFill'=>true,
            'minLength'=>'1',
             'select' => new JsExpression("function( event, ui ) {
                                        $('#billlanding-notify_party').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
    <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'notify_party')?>

    <?= $form->field($model, 'ocean_vessel')->textArea(['rows' => 5]) ?>

    <div class="form-group field-billlanding-port_of_discharge">
        <label class="control-label" for="billlanding-port_of_discharge">Airport of Destinaton</label>
        <?php
        echo AutoComplete::widget([
        'model' => $model,
        'attribute' => 'port_of_discharge',
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $dataport,
            'autoFill'=>true,
            'minLength'=>'1',
             
            ],
         ]);
        ?>
        <div class="help-block"></div>
    </div>

    <div class="form-group field-billlanding-port_of_loading">
        <label class="control-label" for="billlanding-port_of_loading">Airport of Departure</label>
        <?php
        echo AutoComplete::widget([
        'model' => $model,
        'attribute' => 'port_of_loading',
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $dataport,
            'autoFill'=>true,
            'minLength'=>'1',
             
            ],
         ]);
        ?>
        <div class="help-block"></div>
    </div>

    <div class="form-group field-billlanding-delivery_agent2">
    <label class="control-label" for="billlanding-delivery_agent2">Agent Name</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'delivery_agent2',
        //'attribute' => 'fullname',
        'value' => $c5,
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datacompany,
            'autoFill'=>true,
            'minLength'=>'1',
             'select' => new JsExpression("function( event, ui ) {
                                        $('#billlanding-delivery_agent').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'delivery_agent')?>

    <?= $form->field($model, 'agent_iata_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'by_first_carrier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to_carrier_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'by_carrier_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to_carrier_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'by_carrier_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requested_flight_date_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requested_flight_date_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wt_val_ppd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wt_val_coll')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_ppd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_coll')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'declared_val_carriege')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'declared_val_cust')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'holding_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weigth_charge_prepaid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weigth_charge_collect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valuation_charge_prepaid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valuation_charge_collect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_prepaid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_collect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_agent_prepaid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_agent_collect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_carrier_prepaid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_carrier_collect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_prepaid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_collect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oth_charger')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cartage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_stamp_fee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agent_certified')->textArea(['maxlength' => true, 'rows' => 5]) ?>

    <?= $form->field($model, 'collect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'freight_term')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_of_original')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'PENDING' => 'PENDING', 'FAILED' => 'FAILED', 'SUCCESS' => 'SUCCESS', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>