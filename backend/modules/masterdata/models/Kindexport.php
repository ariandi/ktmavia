<?php

namespace backend\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "kindexport".
 *
 * @property integer $kindexport_id
 * @property string $kindexport_name
 */
class Kindexport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kindexport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kindexport_name'], 'required'],
            [['kindexport_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kindexport_id' => 'Kindexport ID',
            'kindexport_name' => 'Kindexport Name',
        ];
    }
}
