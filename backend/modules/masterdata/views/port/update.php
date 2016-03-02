<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\Port */

$this->title = 'Update Port: ' . ' ' . $model->port_id;
$this->params['breadcrumbs'][] = ['label' => 'Ports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->port_id, 'url' => ['view', 'id' => $model->port_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="port-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
