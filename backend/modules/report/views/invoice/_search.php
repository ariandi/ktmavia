<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\report\models\InvoiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-search">

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
        <div style="float:left">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary cari']) ?>
        </div>

        <div style="clear:both;">
            
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$this->registerJs(' 
    $(document).ready(function(){
        $(".cari").click(function(){
            var fd = $(".from_date").val();
             var td = $(".to_date").val();
             if(fd > td || !empty(td)){
                alert("From Date Must Smaller That To Date");
                $(".from_date").val("");
                $(".to_date").val("");

                return false;
             }
        });
         
});', \yii\web\View::POS_READY);

?>