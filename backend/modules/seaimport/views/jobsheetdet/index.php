<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\seaexport\models\JobsheetdetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobsheetdets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobsheetdet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Job sheet Detail', ['value'=>Url::to('index.php?r=seaimport/jobsheetdet/create&id='.$jobs_id), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
                'header' => '<h4>Job Sheet Detail</h4>',
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

            //'jobsdet_id',
            'jobs_id',
            'costing',
            'bill_cost',
            'bill_shipper',
            'bil_agent',
            // 'active',
            // 'insert_by',
            // 'insert_date',
            // 'update_by',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
