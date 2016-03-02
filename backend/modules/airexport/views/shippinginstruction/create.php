<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Shippinginstruction */

$this->title = 'Create Shippinginstruction';
$this->params['breadcrumbs'][] = ['label' => 'Shippinginstructions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shippinginstruction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
