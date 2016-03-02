<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seaexport\models\InvoicedetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="paymentdet-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'invoicedet_id',
            //'invoice_id',
            'payment_name',
            'amount',
            //'insert_by',
            // 'insert_date',
            // 'update_by',
            // 'update_date',
            // 'active',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
