<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Jobsheetdet */

$this->title = 'Create Jobsheetdet';
$this->params['breadcrumbs'][] = ['label' => 'Jobsheetdets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobsheetdet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>