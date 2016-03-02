<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\masterdata\models\CostingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Costings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Costing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'costing_id',
            'costing_name',
            'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
