<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\airexport\models\Invoicedetail */

$this->title = 'Create Invoicedetail';
$this->params['breadcrumbs'][] = ['label' => 'Invoicedetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoicedetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
