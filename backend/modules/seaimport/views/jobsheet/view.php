<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\seaimport\models\Jobsheet */

$this->title = $model->jobs_id;
$this->params['breadcrumbs'][] = ['label' => 'Jobsheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobsheet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jobs_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->jobs_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jobs_id',
            'jobs_name',
            'date',
            'jobs_no',
            'shipper',
            'consignee',
            'commodity',
            'po_sty',
            'ctn_qty',
            'dimensions',
            'destination',
            'freight',
            'date_rcvd',
            'pic',
            'telp_fax',
            'gross_w',
            'vol_w',
            'measurement',
            'overseas_agent',
            'handling',
            'mbl',
            'hbl',
            'fl',
            'remarks',
            'handling_by',
            'remarks2',
            'pickup',
            'delivery',
            'bl_id',
            'active',
            'status',
            'insert_by',
            'insert_date',
            'update_by',
            'update_date',
            'prepain_by',
            'approve_by',
            'tot_expenses',
            'tot_bill',
            'tot_profit',
            'tot_usd',
            'tot_dn',
            'tot_cn',
        ],
    ]) ?>

</div>
