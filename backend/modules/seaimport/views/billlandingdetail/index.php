<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seaexport\models\BilllandingdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Billlandingdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billlandingdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Billlandingdetail', ['value'=>Url::to('index.php?r=seaexport/billlandingdetail/create&id='.$bl_id), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
                'header' => '<h4>Bill of Landing Detail</h4>',
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

            //'bl_det_id',
            'bl_id',
            'container_seal_no',
            'kind_of_package_desc_goods:ntext',
            'weight',
            'total_container',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
