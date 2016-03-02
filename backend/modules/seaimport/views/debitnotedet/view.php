<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Debitnotedet */

$this->title = $model->debitnotedet_id;
$this->params['breadcrumbs'][] = ['label' => 'Debitnotedets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debitnotedet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->debitnotedet_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->debitnotedet_id], [
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
            'debitnotedet_id',
            'debitnote_id',
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
