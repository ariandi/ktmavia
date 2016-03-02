<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'pjax' => true,
		'export' => false,
		'rowOptions' => ['class' => 'success'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'companyid',
			[
				'class' => 'kartik\grid\EditableColumn',
				'header' => 'Company Name',
				'attribute' => 'companyname',
				//'model' => $searchModel,
				//Editable::FORMAT_BUTTON,
				//'value' => function($model){
				//	return 'the company name is '.$model->companyname;
				//}
			],
            //'companyname',
            'phone',
            'fax',
            'active',
            // 'informationid',
            // 'email:email',
            // 'createby',
            // 'updateby',
            // 'deliveryaddress:ntext',
            // 'invoiceaddress:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
