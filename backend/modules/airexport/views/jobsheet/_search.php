<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\JobsheetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobsheet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jobs_id') ?>

    <?= $form->field($model, 'jobs_name') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'jobs_no') ?>

    <?= $form->field($model, 'shipper') ?>

    <?php // echo $form->field($model, 'consignee') ?>

    <?php // echo $form->field($model, 'commodity') ?>

    <?php // echo $form->field($model, 'po_sty') ?>

    <?php // echo $form->field($model, 'ctn_qty') ?>

    <?php // echo $form->field($model, 'dimensions') ?>

    <?php // echo $form->field($model, 'destination') ?>

    <?php // echo $form->field($model, 'freight') ?>

    <?php // echo $form->field($model, 'date_rcvd') ?>

    <?php // echo $form->field($model, 'pic') ?>

    <?php // echo $form->field($model, 'telp_fax') ?>

    <?php // echo $form->field($model, 'gross_w') ?>

    <?php // echo $form->field($model, 'vol_w') ?>

    <?php // echo $form->field($model, 'measurement') ?>

    <?php // echo $form->field($model, 'overseas_agent') ?>

    <?php // echo $form->field($model, 'handling') ?>

    <?php // echo $form->field($model, 'mbl') ?>

    <?php // echo $form->field($model, 'hbl') ?>

    <?php // echo $form->field($model, 'fl') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'handling_by') ?>

    <?php // echo $form->field($model, 'remarks2') ?>

    <?php // echo $form->field($model, 'pickup') ?>

    <?php // echo $form->field($model, 'delivery') ?>

    <?php // echo $form->field($model, 'bl_id') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'insert_by') ?>

    <?php // echo $form->field($model, 'insert_date') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'prepain_by') ?>

    <?php // echo $form->field($model, 'approve_by') ?>

    <?php // echo $form->field($model, 'tot_expenses') ?>

    <?php // echo $form->field($model, 'tot_bill') ?>

    <?php // echo $form->field($model, 'tot_profit') ?>

    <?php // echo $form->field($model, 'tot_usd') ?>

    <?php // echo $form->field($model, 'tot_dn') ?>

    <?php // echo $form->field($model, 'tot_cn') ?>

    <?php // echo $form->field($model, 'kindofexport') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
