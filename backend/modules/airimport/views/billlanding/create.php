<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\airimport\models\Billlanding */

$this->title = 'Create Billlanding';
$this->params['breadcrumbs'][] = ['label' => 'Billlandings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billlanding-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
