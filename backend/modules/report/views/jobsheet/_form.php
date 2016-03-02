<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\report\models\Jobsheet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobsheet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jobs_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'jobs_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipper')->textInput() ?>

    <?= $form->field($model, 'consignee')->textInput() ?>

    <?= $form->field($model, 'commodity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'po_sty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ctn_qty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dimensions')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'freight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_rcvd')->textInput() ?>

    <?= $form->field($model, 'pic')->textInput() ?>

    <?= $form->field($model, 'telp_fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gross_w')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vol_w')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'measurement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'overseas_agent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handling')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mbl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hbl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handling_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pickup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bl_id')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'PENDING' => 'PENDING', 'FAILED' => 'FAILED', 'SUCCESS' => 'SUCCESS', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'insert_by')->textInput() ?>

    <?= $form->field($model, 'insert_date')->textInput() ?>

    <?= $form->field($model, 'update_by')->textInput() ?>

    <?= $form->field($model, 'update_date')->textInput() ?>

    <?= $form->field($model, 'prepain_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approve_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_expenses')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_bill')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_profit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_usd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_dn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_cn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kindofexport')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
