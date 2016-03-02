<?php

namespace backend\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "companyinfo".
 *
 * @property integer $informationid
 * @property string $informationname
 */
class Companyinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companyinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['informationname'], 'required'],
            [['informationname'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'informationid' => 'Informationid',
            'informationname' => 'Informationname',
        ];
    }
}
