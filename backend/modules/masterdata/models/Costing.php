<?php

namespace backend\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "costing".
 *
 * @property integer $costing_id
 * @property string $costing_name
 * @property integer $active
 */
class Costing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'costing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['costing_name'], 'required'],
            [['active'], 'integer'],
            [['costing_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'costing_id' => 'Costing ID',
            'costing_name' => 'Costing Name',
            'active' => 'Active',
        ];
    }
}
