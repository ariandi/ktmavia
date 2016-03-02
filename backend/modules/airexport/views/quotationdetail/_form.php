<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\masterdata\models\Countries;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Quotationdetail */
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

    <?php $form = ActiveForm::begin(['id' => 'project-form']); ?>

    <?= $form->field($model, 'quotationid')->textInput(['readonly' => true]) ?>

    <div class="form-group field-quotation-quotationtitle">
    <label class="control-label" for="quotation-quotationtitle">Country / Local Charge Jakarta</label>
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
            'appendTo'=>'#project-form',
            ],
        ]);
        ?>

    <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'twentyft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fourtyft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fourtyhc')->textInput(['maxlength' => true]) ?>

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
