<?php

namespace backend\modules\airexport\models;

use Yii;

/**
 * This is the model class for table "bill_landing_detail".
 *
 * @property integer $bl_det_id
 * @property integer $bl_id
 * @property string $container_seal_no
 * @property string $kind_of_package_desc_goods
 * @property string $weight
 * @property string $measurement
 * @property string $total_container
 * @property integer $active
 * @property integer $insert_by
 * @property string $insert_date
 * @property integer $update_by
 * @property string $update_date
 */
class Billlandingdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill_landing_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bl_id'], 'required'],
            [['bl_id', 'active', 'insert_by', 'update_by'], 'integer'],
            [['kind_of_package_desc_goods'], 'string'],
            [['insert_date', 'update_date'], 'safe'],
            [['container_seal_no', 'weight', 'measurement', 'total_container'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bl_det_id' => 'Bl Det ID',
            'bl_id' => 'Bl ID',
            'container_seal_no' => 'Container Seal No',
            'kind_of_package_desc_goods' => 'Kind Of Package Desc Goods',
            'weight' => 'Weight',
            'measurement' => 'Measurement',
            'total_container' => 'Total Container',
            'active' => 'Active',
            'insert_by' => 'Insert By',
            'insert_date' => 'Insert Date',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
        ];
    }
}
