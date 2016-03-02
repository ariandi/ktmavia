<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\masterdata\models\QuotationdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotationdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotationdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Quotationdetail', ['/masterdata/quotationdetail/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'quotationdetid',
            'quotationid',
            'cost',
            '20ft',
            '40ft',
            // '40hc',
            // 'status',
            // 'local_cost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
