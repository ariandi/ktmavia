<?php

namespace backend\modules\seaexport\models;

use Yii;

/**
 * This is the model class for table "quotationdetail".
 *
 * @property integer $quotationdetid
 * @property integer $quotationid
 * @property string $cost
 * @property string $20ft
 * @property string $40ft
 * @property string $40hc
 * @property string $status
 * @property string $local_cost
 */
class Quotationdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotationdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotationid', 'cost', 'status'], 'required'],
            [['quotationid'], 'integer'],
            [['twentyft', 'fourtyft', 'fourtyhc', 'local_cost'], 'number'],
            [['cost'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quotationdetid' => 'Quotationdetid',
            'quotationid' => 'Quotationid',
            'cost' => 'Cost',
            'twentyft' => '20ft',
            'fourtyft' => '40ft',
            'fourtyhc' => '40hc',
            'status' => 'Status',
            'local_cost' => 'Local Cost',
        ];
    }
}
