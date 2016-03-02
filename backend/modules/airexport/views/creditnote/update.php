<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Creditnote */

$this->title = 'Update Creditnote: ' . ' ' . $model->criditnote_id;
$this->params['breadcrumbs'][] = ['label' => 'Creditnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->criditnote_id, 'url' => ['view', 'id' => $model->criditnote_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="creditnote-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
