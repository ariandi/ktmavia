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

    <h1 style="margin-top:0px;"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Quotation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'quotationid',
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
            'attribute' => 'companyid',
            'value' => 'company.companyname',
            ],
             'quotationdate',
            // 'senderreerence',
            // 'createby',
            // 'createdate',
            // 'updateby',
            // 'updatedate',
            // 'active',
            'status',
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {link}',
                'buttons' => [
                    'link' => function ($url,$data,$key) {
                            $url = '/airimport/quotationdetail/detailq';
                            return Html::a('<span class="glyphicon glyphicon-th-list"></span>', [$url, 'id'=>$data->quotationid]);
                    },
                    'view' => function ($url,$data){
                            $url = '/airimport/quotation/quotationview/';
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', [$url, 'id'=>$data->quotationid]);
                    },
                ],
            ],
        ],
    ]); ?>
    </div>
</div>
