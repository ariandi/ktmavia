<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\report\models\Paymentdet */

$this->title = 'Create Paymentdet';
$this->params['breadcrumbs'][] = ['label' => 'Paymentdets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentdet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
