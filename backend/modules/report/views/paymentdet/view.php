<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\report\models\Paymentdet */

$this->title = $model->paymentdet_id;
$this->params['breadcrumbs'][] = ['label' => 'Paymentdets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentdet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->paymentdet_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->paymentdet_id], [
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
            'paymentdet_id',
            'payment_id',
            'payment_name',
            'amount',
            'insert_by',
            'insert_date',
            'update_by',
            'update_date',
            'active',
        ],
    ]) ?>

</div>
