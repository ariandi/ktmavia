<?php

namespace backend\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "port".
 *
 * @property integer $port_id
 * @property string $port_name
 */
class Port extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['port_name'], 'required'],
            [['port_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'port_id' => 'Port ID',
            'port_name' => 'Port Name',
        ];
    }
}
