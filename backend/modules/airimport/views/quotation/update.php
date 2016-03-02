<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Quotation */

$this->title = 'Update Quotation: ' . ' ' . $model->quotationid;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->quotationid, 'url' => ['view', 'id' => $model->quotationid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quotation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
