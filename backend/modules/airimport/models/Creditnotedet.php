<?php

namespace backend\modules\airimport\models;

use Yii;

/**
 * This is the model class for table "creditnotedet".
 *
 * @property integer $creditnotedet_id
 * @property integer $creditnote_id
 * @property string $costing
 * @property string $amount
 * @property integer $insert_by
 * @property string $insert_date
 * @property integer $update_by
 * @property string $update_date
 * @property integer $active
 */
class Creditnotedet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'creditnotedet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['creditnote_id', 'costing', 'amount', 'insert_by', 'insert_date'], 'required'],
            [['creditnote_id', 'insert_by', 'update_by', 'active'], 'integer'],
            [['amount'], 'number'],
            [['insert_date', 'update_date'], 'safe'],
            [['costing'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'creditnotedet_id' => 'Creditnotedet ID',
            'creditnote_id' => 'Creditnote ID',
            'costing' => 'Costing',
            'amount' => 'Amount',
            'insert_by' => 'Insert By',
            'insert_date' => 'Insert Date',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
            'active' => 'Active',
        ];
    }
}
