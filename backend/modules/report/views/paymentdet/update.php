<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\report\models\Paymentdet */

$this->title = 'Update Paymentdet: ' . ' ' . $model->paymentdet_id;
$this->params['breadcrumbs'][] = ['label' => 'Paymentdets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->paymentdet_id, 'url' => ['view', 'id' => $model->paymentdet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paymentdet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
