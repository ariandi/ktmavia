<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Jobsheet */

$this->title = 'Create Jobsheet';
$this->params['breadcrumbs'][] = ['label' => 'Jobsheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobsheet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
