<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Debitnote */

$this->title = 'Update Debitnote: ' . ' ' . $model->debitnote_id;
$this->params['breadcrumbs'][] = ['label' => 'Debitnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->debitnote_id, 'url' => ['view', 'id' => $model->debitnote_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="debitnote-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
