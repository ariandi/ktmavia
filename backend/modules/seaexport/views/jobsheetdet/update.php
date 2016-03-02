<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Jobsheetdet */

$this->title = 'Update Jobsheetdet: ' . ' ' . $model->jobsdet_id;
$this->params['breadcrumbs'][] = ['label' => 'Jobsheetdets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jobsdet_id, 'url' => ['view', 'id' => $model->jobsdet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jobsheetdet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
