<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seaimport\models\DebitnotedetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Debitnotedets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debitnotedet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Debitnotedet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'debitnotedet_id',
            'debitnote_id',
            'costing',
            'amount',
            'insert_by',
            // 'insert_date',
            // 'update_by',
            // 'update_date',
            // 'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
