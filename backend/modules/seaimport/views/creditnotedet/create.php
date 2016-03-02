<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Creditnotedet */

$this->title = 'Create Creditnotedet';
$this->params['breadcrumbs'][] = ['label' => 'Creditnotedets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditnotedet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
