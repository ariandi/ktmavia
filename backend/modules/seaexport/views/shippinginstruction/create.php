<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\ShippingInstruction */

$this->title = 'Create Shipping Instruction';
$this->params['breadcrumbs'][] = ['label' => 'Shipping Instructions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipping-instruction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
