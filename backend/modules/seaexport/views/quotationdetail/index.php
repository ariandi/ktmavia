<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\masterdata\models\QuotationdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotation Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotationdetail-index">

    <h1 style="margin-top:0px"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Quotationdetail', ['value'=>Url::to('index.php?r=seaexport/quotationdetail/create&id='.$quotationid), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <?php
    
        Modal::begin([
                'header' => '<h4>Quotation Detail</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);

        echo "<div id='modalContent'></div>";

        Modal::end();
    
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'quotationdetid',
            //'quotationid',
            [
             'attribute'=>'quotationid',
             'contentOptions'=>['style'=>'width: 50px;']
            ],
            'cost',
            'twentyft',
            'fourtyft',
            'fourtyhc',
            'status',
            'local_cost',

            [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions'=>['style'=>'width: 70px;'],
			'template' => '{view} {update} {delete}',
			'buttons' => [
				'delete' => function ($url,$data) {
                    $url = '/seaexport/quotationdetail/delete/';
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',[$url, 'id' => $data->quotationdetid, 'quotationid' => $data->quotationid], ['data' => ['confirm' => 'Are you sure you want to delete the campaign?',
			'method' => 'post',]]);
					},
			],
            ],
        ],
    ]); ?>

</div>
