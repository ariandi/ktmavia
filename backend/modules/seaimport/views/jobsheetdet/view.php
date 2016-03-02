<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Jobsheetdet */

$this->title = $model->jobsdet_id;
$this->params['breadcrumbs'][] = ['label' => 'Jobsheetdets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobsheetdet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jobsdet_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->jobsdet_id], [
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
            'jobsdet_id',
            'jobs_id',
            'costing',
            'bill_cost',
            'bill_shipper',
            'bil_agent',
            'active',
            'insert_by',
            'insert_date',
            'update_by',
            'update_date',
            'invoice_db_cr',
            'inv',
            'dbn',
            'crn',
        ],
    ]) ?>

</div>
