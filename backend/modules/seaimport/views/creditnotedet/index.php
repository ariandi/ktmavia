<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seaimport\models\CreditnotedetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Creditnotedets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditnotedet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Creditnotedet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'creditnotedet_id',
            'creditnote_id',
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
