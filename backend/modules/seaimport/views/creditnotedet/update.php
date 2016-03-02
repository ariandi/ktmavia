<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Creditnotedet */

$this->title = 'Update Creditnotedet: ' . ' ' . $model->creditnotedet_id;
$this->params['breadcrumbs'][] = ['label' => 'Creditnotedets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->creditnotedet_id, 'url' => ['view', 'id' => $model->creditnotedet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="creditnotedet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
