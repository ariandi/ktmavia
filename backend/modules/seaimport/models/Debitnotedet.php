<?php

namespace backend\modules\seaimport\models;

use Yii;

/**
 * This is the model class for table "debitnotedet".
 *
 * @property integer $debitnotedet_id
 * @property integer $debitnote_id
 * @property string $costing
 * @property string $amount
 * @property integer $insert_by
 * @property string $insert_date
 * @property integer $update_by
 * @property string $update_date
 * @property integer $active
 */
class Debitnotedet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'debitnotedet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['debitnote_id', 'costing', 'amount', 'insert_by', 'insert_date'], 'required'],
            [['debitnote_id', 'insert_by', 'update_by', 'active'], 'integer'],
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
            'debitnotedet_id' => 'Debitnotedet ID',
            'debitnote_id' => 'Debitnote ID',
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
