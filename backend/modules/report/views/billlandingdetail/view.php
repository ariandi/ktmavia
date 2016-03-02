<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\report\models\Billlandingdetail */

$this->title = $model->bl_det_id;
$this->params['breadcrumbs'][] = ['label' => 'Billlandingdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billlandingdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bl_det_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bl_det_id], [
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
            'bl_det_id',
            'bl_id',
            'container_seal_no',
            'kind_of_package_desc_goods:ntext',
            'weight',
            'measurement',
            'total_container',
            'active',
            'insert_by',
            'insert_date',
            'update_by',
            'update_date',
        ],
    ]) ?>

</div>
