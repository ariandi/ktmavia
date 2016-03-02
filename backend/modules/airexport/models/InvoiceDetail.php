<?php

namespace backend\modules\airexport\models;

use Yii;

/**
 * This is the model class for table "invoice_detail".
 *
 * @property integer $invoicedet_id
 * @property integer $invoice_id
 * @property string $costing
 * @property string $amount
 * @property integer $insert_by
 * @property string $insert_date
 * @property integer $update_by
 * @property string $update_date
 * @property integer $active
 */
class InvoiceDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id', 'costing', 'amount', 'insert_by', 'insert_date'], 'required'],
            [['invoice_id', 'insert_by', 'update_by', 'active'], 'integer'],
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
            'invoicedet_id' => 'Invoicedet ID',
            'invoice_id' => 'Invoice ID',
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
