<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Quotationdetail */

$this->title = $model->quotationdetid;
$this->params['breadcrumbs'][] = ['label' => 'Quotationdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotationdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->quotationdetid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->quotationdetid], [
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
            'quotationdetid',
            'quotationid',
            'cost',
            'twentyft',
            'fourtyft',
            'fourtyhc',
            'status',
            'local_cost',
        ],
    ]) ?>

</div>
