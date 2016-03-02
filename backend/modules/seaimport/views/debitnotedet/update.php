<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Debitnotedet */

$this->title = 'Update Debitnotedet: ' . ' ' . $model->debitnotedet_id;
$this->params['breadcrumbs'][] = ['label' => 'Debitnotedets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->debitnotedet_id, 'url' => ['view', 'id' => $model->debitnotedet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="debitnotedet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
