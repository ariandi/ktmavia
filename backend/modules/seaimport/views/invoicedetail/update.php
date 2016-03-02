<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Invoicedetail */

$this->title = 'Update Invoicedetail: ' . ' ' . $model->invoicedet_id;
$this->params['breadcrumbs'][] = ['label' => 'Invoicedetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->invoicedet_id, 'url' => ['view', 'id' => $model->invoicedet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="invoicedetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
