<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\report\models\Payment */

$this->title = 'Update Payment: ' . ' ' . $model->payment_id;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_id, 'url' => ['view', 'id' => $model->payment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modeldet' => $modeldet,
    ]) ?>

</div>
