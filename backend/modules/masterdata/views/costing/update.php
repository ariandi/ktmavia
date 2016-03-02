<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\Costing */

$this->title = 'Update Costing: ' . ' ' . $model->costing_id;
$this->params['breadcrumbs'][] = ['label' => 'Costings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->costing_id, 'url' => ['view', 'id' => $model->costing_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="costing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
