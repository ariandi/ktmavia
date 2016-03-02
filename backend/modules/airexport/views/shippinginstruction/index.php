<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\airexport\models\ShippinginstructionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shippinginstructions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shippinginstruction-index">

    <h1 style="margin-top:0px;"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'quotationid',
            'no_ref',
            'date',
            'booking_number',
            //'depo',
            // 'stucking',
            [
            'header' => 'To',
            'attribute' => 'topic',
            'value' => function ($data) {
                return $data->topicuser->FirstName.' '.$data->topicuser->LastName;
            }
            ],
            //'topic',
            // 'frompic',
            // 'telp_fax',
            //'attn',
            // 'email:email',
            //'shipper',
            [
                'attribute' => 'consignee',
                'value' => 'consigneecompany.companyname',
            ], 
            // 'notify_party',
            // 'vessel',
            // 'connecting_vessel',
            // 'port_of_loading',
            // 'etd_jkt',
            // 'eta_pus',
            // 'via_transit',
            // 'etd_pus',
            // 'quantity',
            // 'freight_term',
            // 'stuffing',
            // 'gw_nw_cbm',
            // 'description_good:ntext',
            // 'cont_seal_no',
            // 'shipping_mark',
            'destination',
            // 'rate',
            // 'note:ntext',
            // 'peb_no',
            // 'tgl',
            // 'kpbc',
            // 'hs_code',
            // 'b/l_no',
            // 'insertby',
            // 'insertdate',
            // 'updateby',
            // 'updatedate',
            // 'active',
            // 'quotationid',
            'status',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url,$data){
                            $url = 'sipdfview';
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', [$url, 'id'=>$data->si_id]);
                    },
                ],
            ],   
        ],
    ]); ?>
    </div>
    
</div>
