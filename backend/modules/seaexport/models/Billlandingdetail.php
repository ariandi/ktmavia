<?php

namespace backend\modules\seaexport\models;

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
 */
class BillLandingDetail extends \yii\db\ActiveRecord
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
            [['insert_date', 'update_date'], 'safe'],
            [['bl_det_id', 'bl_id', 'active', 'insert_by', 'update_by'], 'integer'],
            [['kind_of_package_desc_goods'], 'string'],
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
        ];
    }
}
