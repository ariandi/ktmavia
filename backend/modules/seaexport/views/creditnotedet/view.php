<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Creditnotedet */

$this->title = $model->creditnotedet_id;
$this->params['breadcrumbs'][] = ['label' => 'Creditnotedets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditnotedet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->creditnotedet_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->creditnotedet_id], [
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
            'creditnotedet_id',
            'creditnote_id',
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
