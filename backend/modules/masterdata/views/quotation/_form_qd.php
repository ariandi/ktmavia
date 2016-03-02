<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\masterdata\models\Countries;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\Quotationdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$datacountry = Countries::find()
    ->select(['country as value', 'country as label'])
    ->orderBy('country')
    ->asArray()
    ->all();

?>

<div class="quotationdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-quotation-quotationtitle">
    <label class="control-label" for="quotation-quotationtitle">Country</label>
        <?php
        echo AutoComplete::widget([
        'model' => $model,
        'attribute' => 'cost',
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'source' => $datacountry,
            'autoFill'=>true,
            'minLength'=>'1',
            ],
        ]);
        ?>

    <div class="help-block"></div>
    </div>

    <?= $form->field($model, '20ft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '40ft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '40hc')->textInput(['maxlength' => true]) ?>
	
	<?php
	$arrloc = array(['status' => 'Destination'], ['status' => 'Local']);
	?>
	
	<?= $form->field($model, 'status')->dropDownList(
            ArrayHelper::map($arrloc,'status','status'),
            ['prompt'=>'Select Status']
        ) ?>

    <?= $form->field($model, 'local_cost')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
