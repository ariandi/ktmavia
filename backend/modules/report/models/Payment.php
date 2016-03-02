<?php

namespace backend\modules\report\models;

use Yii;
use backend\modules\report\models\Invoice;
use backend\modules\report\models\Paymentdet;
/**
 * This is the model class for table "payment".
 *
 * @property integer $payment_id
 * @property string $payment_number
 * @property string $payment_date
 * @property integer $invoice_id
 * @property string $total_amount
 * @property string $note
 * @property integer $active
 * @property integer $insert_by
 * @property string $insert_date
 * @property integer $update_by
 * @property string $update_date
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_number', 'payment_date', 'invoice_id', 'insert_by', 'insert_date'], 'required'],
            [['payment_date', 'insert_date', 'update_date'], 'safe'],
            [['invoice_id', 'active', 'insert_by', 'update_by'], 'integer'],
            [['total_amount'], 'number'],
            [['note'], 'string'],
            [['payment_number'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'payment_number' => 'Payment Number',
            'payment_date' => 'Payment Date',
            'invoice_id' => 'Invoice ID',
            'total_amount' => 'Total Amount',
            'note' => 'Note',
            'active' => 'Active',
            'insert_by' => 'Insert By',
            'insert_date' => 'Insert Date',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
        ];
    }

    public function getInvoiceinfo()
    {
        return $this->hasOne(Invoice::className(), ['invoice_id' => 'invoice_id']);
    }

    public function getPaymentdetinfo()
    {
        return $this->hasMany(Paymentdet::className(), ['payment_id' => 'payment_id']);
    }
}
