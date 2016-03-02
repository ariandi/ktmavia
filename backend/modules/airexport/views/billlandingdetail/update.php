<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Billlandingdetail */

$this->title = 'Update Air Way detail: ' . ' ' . $model->bl_det_id;
$this->params['breadcrumbs'][] = ['label' => 'Billlandingdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bl_det_id, 'url' => ['view', 'id' => $model->bl_det_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="billlandingdetail-update">

    <h1 style="margin-top:0px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
