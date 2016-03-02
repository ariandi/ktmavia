<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\airexport\models\InvoicedetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Credit Note Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoicedetail-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'invoicedet_id',
            //'invoice_id',
            'costing',
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