<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Companyinfo */

$this->title = 'Create Companyinfo';
$this->params['breadcrumbs'][] = ['label' => 'Companyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companyinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
