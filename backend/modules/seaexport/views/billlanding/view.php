<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Billlanding */

$this->title = $model->bl_id;
$this->params['breadcrumbs'][] = ['label' => 'Billlandings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billlanding-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bl_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bl_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bl_id',
            'bl_number',
            'bl_place',
            'bl_date',
            'bl_type',
            'si_id',
            'quotationid',
            'shipper',
            'consignee',
            'notify_party',
            'ocean_vessel',
            'port_of_discharge',
            'place_of_receipt',
            'port_of_loading',
            'place_of_delivery',
            'delivery_agent',
            'freight_charges',
            'revenue_tons',
            'rate',
            'freight_term',
            'exchange_rate',
            'currency',
            'prepaid_at',
            'payable_at',
            'total_prepaid_national_currency',
            'number_of_original',
            'status',
        ],
    ]) ?>

</div>
