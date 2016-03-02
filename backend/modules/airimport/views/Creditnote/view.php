<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Creditnote */

$this->title = $model->criditnote_id;
$this->params['breadcrumbs'][] = ['label' => 'Creditnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditnote-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->criditnote_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->criditnote_id], [
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
            'criditnote_id',
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
