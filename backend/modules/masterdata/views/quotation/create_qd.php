<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\masterdata\models\Quotationdetail */

$this->title = 'Create Quotationdetail';
$this->params['breadcrumbs'][] = ['label' => 'Quotationdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotationdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_qd', [
        'model' => $model,
    ]) ?>

</div>
