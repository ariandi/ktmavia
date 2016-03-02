<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Billlandingdetail */

$this->title = 'Create Billlandingdetail';
$this->params['breadcrumbs'][] = ['label' => 'Billlandingdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billlandingdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
