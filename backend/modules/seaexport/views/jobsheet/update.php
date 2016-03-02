<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Jobsheet */

$this->title = 'Update Jobsheet: ' . ' ' . $model->jobs_id;
$this->params['breadcrumbs'][] = ['label' => 'Jobsheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jobs_id, 'url' => ['view', 'id' => $model->jobs_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jobsheet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
