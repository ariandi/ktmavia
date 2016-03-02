<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\seaexport\models\Debitnotedet */

$this->title = 'Create Debitnotedet';
$this->params['breadcrumbs'][] = ['label' => 'Debitnotedets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debitnotedet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
