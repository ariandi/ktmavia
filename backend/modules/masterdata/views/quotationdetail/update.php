<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\Quotationdetail */

$this->title = 'Update Quotationdetail: ' . ' ' . $model->quotationdetid;
$this->params['breadcrumbs'][] = ['label' => 'Quotationdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->quotationdetid, 'url' => ['view', 'id' => $model->quotationdetid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quotationdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
