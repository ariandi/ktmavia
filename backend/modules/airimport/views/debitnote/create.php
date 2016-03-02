<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Debitnote */

$this->title = 'Create Debitnote';
$this->params['breadcrumbs'][] = ['label' => 'Debitnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debitnote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
