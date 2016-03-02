<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Creditnote */

$this->title = 'Create Creditnote';
$this->params['breadcrumbs'][] = ['label' => 'Creditnotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditnote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
