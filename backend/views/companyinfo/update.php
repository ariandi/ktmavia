<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Companyinfo */

$this->title = 'Update Companyinfo: ' . ' ' . $model->informationid;
$this->params['breadcrumbs'][] = ['label' => 'Companyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->informationid, 'url' => ['view', 'id' => $model->informationid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="companyinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
