<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\ShippingInstruction */

$this->title = 'Update Shipping Instruction: ' . ' ' . $model->si_id;
$this->params['breadcrumbs'][] = ['label' => 'Shipping Instructions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->si_id, 'url' => ['view', 'id' => $model->si_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shipping-instruction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
