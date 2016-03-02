<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use backend\modules\masterdata\models\Company;
use backend\modules\masterdata\models\User;
use backend\modules\masterdata\models\Port;
use backend\modules\seaexport\models\Billlanding;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\ShippingInstruction */
/* @var $form yii\widgets\ActiveForm */
//print_r($model->consigneecompany['companyname']);
$datauser = User::find()
    ->select(['concat(FirstName," ",LastName) as value', 'concat(FirstName," ",LastName) as label', 'id as uid'])
    ->orderBy('FirstName')
    ->asArray()
    ->all();

$fullname = User::findOne($model->attn);
if($fullname !== null){
    $fn = $fullname->FirstName.' '.$fullname->LastName;
}
else{
    $fn = '';
}

$fullname2 = User::findOne($model->topic);
if($fullname !== null){
    $fn2 = $fullname2->FirstName.' '.$fullname2->LastName;
}
else{
    $fn2 = '';
}

$datacompany = Company::find()
    ->select(['companyname as value', 'companyname as label', 'companyid as cid'])
    //->where(['not in', 'companyid', ['1']])
    ->orderBy('companyname')
    ->asArray()
    ->all();

$comid = Company::findOne($model->notify_party);
if($comid !== null){
    $c = $comid->companyname;
}
else{
    $c = '';
}

$comid2 = Company::findOne($model->consignee);
if($comid2 !== null){
    $c2 = $comid2->companyname;
}
else{
    $c2 = '';
}

$comid3 = Company::findOne($model->shipper);
if($comid3 !== null){
    $c3 = $comid3->companyname;
}
else{
    $c3 = '';
}


$dataport = Port::find()
    ->select(['port_name as value', 'port_name as label'])
    ->orderBy('port_name')
    ->asArray()
    ->all();

$bl = Billlanding::findAll(['si_id' => $model->si_id]);

?>

<div class="shipping-instruction-form">
    
    <!--fORM FOR SUCCESS-->
    <?php if($model->status == 'SUCCESS' && $bl == null){ ?>
        <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                <?= Html::HiddenInput('makebl', '1')?>
                <?= Html::submitButton('Make Bill of Landing', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    <?php }elseif($model->status == 'SUCCESS' && $bl !== null){
            $form = ActiveForm::begin();
                echo Html::HiddenInput('makebl', '1');
                echo Html::HiddenInput('fsi', '1');
                echo Html::HiddenInput('bl_id', $bl[0]['bl_id']);
                echo Html::submitButton('Update Bill of Landing', ['class' => 'btn btn-success']);
            ActiveForm::end();
        }?>
    <!--fORM FOR SUCCESS-->

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_ref')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        //'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'booking_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'depo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stucking')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-shippinginstruction-topic2">
        <label class="control-label" for="shippinginstruction-topic2">PIC</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'topic2',
        //'attribute' => 'fullname',
        'value' => $fn2,
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datauser,
            'autoFill'=>true,
            'minLength'=>'1',
             'select' => new JsExpression("function( event, ui ) {
                                        $('#shippinginstruction-topic').val(ui.item.uid);
                            }")
            ],
         ]);
        ?>
        <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'topic')?>

    <?= $form->field($model, 'telp_fax')->textInput(['maxlength' => true]) ?>

    
    <div class="form-group field-shippinginstruction-attnuser">
        <label class="control-label" for="shippinginstruction-attnuser">Attn</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'shippinginstruction[attnuser]',
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
                                        $('#shippinginstruction-attn').val(ui.item.uid);
                            }")
            ],
         ]);
        ?>
        <div class="help-block"></div>
    </div>
    <?= Html::activeHiddenInput($model, 'attn')?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-shippinginstruction-shipper2">
        <label class="control-label" for="shippinginstruction-shipper2">Shipper</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'shippinginstruction[shipper2]',
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
                                        $('#shippinginstruction-shipper').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
        <div class="help-block"></div>
    </div>
    
    <?= Html::activeHiddenInput($model, 'shipper')?>
	
	<div class="form-group field-shippinginstruction-consignee2">
        <label class="control-label" for="shippinginstruction-consignee2">Consignee</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'shippinginstruction[consignee2]',
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
                                        $('#shippinginstruction-consignee').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
        <div class="help-block"></div>
    </div>
	
	<?= Html::activeHiddenInput($model, 'consignee')?>

    <div class="form-group field-shippinginstruction-notparty">
        <label class="control-label" for="shippinginstruction-notparty">Notify Party</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'shippinginstruction[notparty]',
        //'attribute' => 'fullname',
        'value' => $c,
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datacompany,
            'autoFill'=>true,
            'minLength'=>'1',
             'select' => new JsExpression("function( event, ui ) {
                                        $('#shippinginstruction-notify_party').val(ui.item.cid);
                            }")
            ],
         ]);
        ?>
        <div class="help-block"></div>
    </div>

    <?= Html::activeHiddenInput($model, 'notify_party')?>

    <?= $form->field($model, 'vessel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'connecting_vessel')->textInput(['maxlength' => true]) ?>

    

<div class="form-group field-shippinginstruction-port_of_loading">
        <label class="control-label" for="shippinginstruction-port_of_loading">Port of Loading</label>
        <?php
        echo AutoComplete::widget([
        'model' => $model,
        //'name' => 'shippinginstruction[notparty]',
        'attribute' => 'port_of_loading',
        //'value' => $c,
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



	
	
    <?= $form->field($model, 'etd_jkt')->widget(DatePicker::classname(), [
        //'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'eta_pus')->widget(DatePicker::classname(), [
        //'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'via_transit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'etd_pus')->widget(DatePicker::classname(), [
        //'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'eta_pod')->widget(DatePicker::classname(), [
        //'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'freight_term')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stuffing')->widget(DatePicker::classname(), [
        //'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'gw_nw_cbm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_good')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cont_seal_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipping_mark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'peb_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl')->widget(DatePicker::classname(), [
        //'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'kpbc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hs_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bl_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'PENDING' => 'PENDING', 'FAILED' => 'FAILED', 'SUCCESS' => 'SUCCESS', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
