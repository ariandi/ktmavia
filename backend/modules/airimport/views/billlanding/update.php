<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Billlanding */

$this->title = 'Update Billlanding: ' . ' ' . $model->bl_id;
$this->params['breadcrumbs'][] = ['label' => 'Billlandings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bl_id, 'url' => ['view', 'id' => $model->bl_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="billlanding-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
