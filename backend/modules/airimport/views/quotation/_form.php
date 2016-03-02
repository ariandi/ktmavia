<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use backend\modules\masterdata\models\User;
use backend\modules\masterdata\models\Company;
use backend\modules\airimport\models\Billlanding;
use yii\db\Query;
/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//$connection = Yii::$app->db;
//$query = 'SELECT id, concat(FirstName," ",LastName) Fullname FROM `user` WHERE companyid not in (0,1)';
    
//$user = $connection->createCommand($query);
//$users = $user->queryAll();

$datauser = User::find()
    ->select(['concat(FirstName," ",LastName) as value', 'concat(FirstName," ",LastName) as label', '`user`.`companyid` as cid', 'companyname', '`user`.`id` as uid'])
    ->leftJoin('company', '`company`.`companyid` = `user`.`companyid`')
    ->where(['not in', '`user`.`companyid`', ['1', '0']])
    ->orderBy('FirstName')
    ->asArray()
    ->all();

$fullname = User::findOne($model->picto);
if($fullname !== null){
    $fn = $fullname->FirstName.' '.$fullname->LastName;
}
else{
    $fn = '';
}

$comid = Company::findOne($model->companyid);
if($comid !== null){
    $c = $comid->companyname;
}
else{
    $c = '';
}

//$si = Shippinginstruction::findAll(['quotationid' => $model->quotationid]);
//print_r($si);

    //print_r($datauser);
$si = Billlanding::findAll(['quotationid' => $model->quotationid]);	
?>
<div class="quotation-form">

    <?php if($model->status == 'Success' && $si == null){ ?>
        <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                <?= Html::HiddenInput('makesi', '1')?>
                <?= Html::submitButton('Make Bill of Landing', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    <?php }?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quotationtitle')->textInput(['maxlength' => true]) ?>

    
    <div class="form-group field-quotation-quotationtitle">
    <label class="control-label" for="quotation-quotationtitle">PIC Name</label>
        <?php
        echo AutoComplete::widget([
        //'model' => $model,
        'name' => 'Quotation[fullname]',
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
                                        $('#quotation-companyid').val(ui.item.cid);
                                        $('.quotation-picto2').val(ui.item.uid);
                                        $('#company-companyname').val(ui.item.companyname);
                            }")
            ],
         ]);
        ?>
     <div class="help-block"></div>
    </div>

    <?= Html::HiddenInput('picto2', $model->picto, ['class' => 'quotation-picto2'])?>
    <?= Html::activeHiddenInput($model, 'companyid')?>
            
    <div class="form-group field-company-companyname">
        <label class="control-label" for="company-companyname">Company Name</label>
        <input type="text" id="company-companyname" class="form-control" name="companyname" maxlength="255" disabled="disabled" value="<?=$c?>">

        <div class="help-block"></div>
    </div>
    
    <?= $form->field($model, 'quotationdate')->widget(DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class' => 'form-control']
]) ?>

    <?= $form->field($model, 'senderreerence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'portofloading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'freightageofpayment')->textInput() ?>

    <?= $form->field($model, 'commodity')->textInput() ?>

    <?= $form->field($model, 'termofshipment')->textInput() ?>

    <?= $form->field($model, 'termofpayment')->textInput() ?>

    <?= $form->field($model, 'validdate')->widget(DatePicker::classname(), [
        'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']
    ]) ?>
    

    <?php if(!$model->isNewRecord){?>
    
        <?= $form->field($model, 'active')->textInput() ?>

        <?php $stat = array(['stat' => 'Send'], ['stat' => 'Reject'], ['stat' => 'Success']);?>
        <?= $form->field($model, 'status')->dropDownList(
                ArrayHelper::map($stat,'stat','stat'),
                ['prompt'=>'Select Status']
            ) ?>
    
    <?php }?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
