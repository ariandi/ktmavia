<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\Countries */

$this->title = 'Update Countries: ' . ' ' . $model->ccode;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ccode, 'url' => ['view', 'id' => $model->ccode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="countries-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
