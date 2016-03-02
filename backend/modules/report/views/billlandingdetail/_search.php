<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\report\models\BilllandingdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="billlandingdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'post',
    ]); ?>

    <div class="form-group field-invoicesearch-invoice_date">
        <label class="control-label" style="width:75px;">From Date</label>
        <?php
        echo DatePicker::widget([
            'name'  => 'from_date',
            'value'  => $from_date,
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                ],
            'options' => ['class' => 'from_date']
        ]);
        ?>

        <div class="help-block"></div>
    </div>

    <div class="form-group field-invoicesearch-invoice_date">
        <label class="control-label" style="width:75px;">To Date</label>
        <?php
        echo DatePicker::widget([
            'name'  => 'to_date',
            'value'  => $to_date,
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                ],
            'options' => ['class' => 'to_date']
        ]);
        ?>

        <div class="help-block"></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
