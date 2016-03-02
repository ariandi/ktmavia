<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Quotation */

$this->title = $model->quotationid;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->quotationid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->quotationid], [
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
            'quotationid',
            'quotationtitle',
            'picto',
            'picfrom',
            'companyid',
            'quotationdate',
            'senderreerence',
            'createby',
            'createdate',
            'updateby',
            'updatedate',
            'active',
            'status',
            'portofloading',
            'freightageofpayment',
            'commodity',
            'termofshipment',
            'validdate',
            'termofpayment',
        ],
    ]) ?>

</div>
