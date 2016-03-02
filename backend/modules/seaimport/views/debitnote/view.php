<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Debitnote */

$this->title = $model->debitnote_id;
$this->params['breadcrumbs'][] = ['label' => 'Debitnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debitnote-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->debitnote_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->debitnote_id], [
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
            'debitnote_id',
            'invoice_no',
            'invoice_date',
            'jobs_id',
            'bl_id',
            'due_date',
            'term',
            'tot_amount',
            'companyid',
            'insert_by',
            'insert_date',
            'update_by',
            'update_date',
            'active',
            'sign',
            'status',
            'invoice_id',
            'kindofexport',
        ],
    ]) ?>

</div>
