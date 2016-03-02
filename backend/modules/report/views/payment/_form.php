<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

use backend\modules\report\models\Invoice;

/* @var $this yii\web\View */
/* @var $modelCustomer app\modules\yii2extensions\models\Customer */
/* @var $modelsAddress app\modules\yii2extensions\models\Address */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Payment : " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Payment : " + (index + 1))
    });
});
';

$this->registerJs($js);


$datainvoice = Invoice::find()
    ->select(['`invoice`.`invoice_no` as value', '`invoice`.`invoice_no` as label', '`invoice`.`invoice_id` as cid'])
    ->leftJoin('payment', '`payment`.`invoice_id` = `invoice`.`invoice_id`')
    ->where(['not in', '`invoice`.`active`', ['0']])
    ->andWhere(['`payment`.`invoice_id`' => null])
    ->orderBy('`invoice`.`invoice_no`')
    ->asArray()
    ->all();

$comid2 = Invoice::findOne($model->invoice_id);
if($comid2 !== null){
    $c2 = $comid2->invoice_no;
}
else{
    $c2 = '';
}
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'payment_date')->widget(DatePicker::classname(), [
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control']
            ]) ?>
        </div>
        <div class="col-sm-6">
            <div class="form-group field-payment-invoice_id2">
                <label class="control-label" for="payment-invoice_id2">Invoice Number</label>
                    <?php
                    echo AutoComplete::widget([
                    //'model' => $model,
                    'name' => 'invoice_id2',
                    //'attribute' => 'fullname',
                    'value' => $c2,
                    'options' => [
                        'class' => 'form-control',
                    ],
                    'clientOptions' => [
                        'source' => $datainvoice,
                        'autoFill'=>true,
                        'minLength'=>'1',
                         'select' => new JsExpression("function( event, ui ) {
                                                    $('#payment-invoice_id').val(ui.item.cid);
                                        }")
                        ],
                     ]);
                    ?>
                 <div class="help-block"></div>
                </div>

                <?= Html::activeHiddenInput($model, 'invoice_id')?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modeldet[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'paymentdet_id',
            'payment_name',
            'amount',
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Payment Detail
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add payment</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modeldet as $index => $modelAddress): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Payment: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$index}]paymentdet_id");
                            }
                        ?>
                        <?= $form->field($modelAddress, "[{$index}]payment_name")->textInput(['maxlength' => true]) ?>

                        <?= $form->field($modelAddress, "[{$index}]amount")->textInput(['maxlength' => true]) ?>

                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($modelAddress->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>