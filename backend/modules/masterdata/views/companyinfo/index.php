<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\masterdata\models\CompanyinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companyinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companyinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Companyinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'informationid',
            'informationname',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
