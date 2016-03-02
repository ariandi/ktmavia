<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\airimport\models\BilllandingdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Air Way Bill Detail';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billlandingdetail-index">

    <h1 style="margin-top:0px"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Air Way Bill Detail', ['value'=>Url::to('index.php?r=airimport/billlandingdetail/create&id='.$bl_id), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
                'header' => '<h4>Air Way Bill Detail (Import) </h4>',
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

            'bl_id',
            'kind_of_package_desc_goods:ntext',
            'weight',
            // 'measurement',
            'total_container',
            // 'active',
            // 'insert_by',
            // 'insert_date',
            // 'update_by',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
