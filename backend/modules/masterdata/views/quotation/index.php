<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\masterdata\models\QuotationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Quotation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'quotationtitle',
			[
            'header' => 'To Pic',
            'attribute' => 'picto',
			'value' => function ($data) {
				return $data->topic->FirstName.' '.$data->topic->LastName;
			}
			],
			[
            'header' => 'From Pic',
            'attribute' => 'picfrom',
			'value' => function ($data) {
				return $data->frompic->FirstName.' '.$data->frompic->LastName;
			}
			],
			[
            'header' => 'Company Name',
            'attribute' => 'company.companyname',
			],
             'quotationdate',
            // 'senderreerence',
            // 'createby',
            // 'createdate',
            // 'updateby',
            // 'updatedate',
            // 'active',
            // 'status',
            [
			'class' => 'yii\grid\ActionColumn',
			'template' => '{view} {update} {delete} {link}',
				'buttons' => [
					'link' => function ($url,$data,$key) {
							$url = '/wedew/wedew';
							return Html::a('Detail', ['/masterdata/quotation/detailq', 'id'=>$data->quotationid]);
					},
				],
			],
        ],
    ]); ?>

</div>
