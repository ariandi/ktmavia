<?php

namespace backend\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property string $ccode
 * @property string $country
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ccode'], 'required'],
            [['ccode'], 'string', 'max' => 2],
            [['country'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ccode' => 'Ccode',
            'country' => 'Country',
        ];
    }
}
