<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Invoicedetail */

$this->title = $model->invoicedet_id;
$this->params['breadcrumbs'][] = ['label' => 'Invoicedetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoicedetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->invoicedet_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->invoicedet_id], [
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
            'invoicedet_id',
            'invoice_id',
            'costing',
            'amount',
            'insert_by',
            'insert_date',
            'update_by',
            'update_date',
            'active',
        ],
    ]) ?>

</div>
