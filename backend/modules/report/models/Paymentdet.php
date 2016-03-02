<?php

namespace backend\modules\report\models;

use Yii;
use backend\modules\report\models\Payment;
use backend\modules\report\models\Invoice;
use backend\modules\masterdata\models\Company;

/**
 * This is the model class for table "paymentdet".
 *
 * @property integer $paymentdet_id
 * @property integer $payment_id
 * @property string $payment_name
 * @property string $amount
 * @property integer $insert_by
 * @property string $insert_date
 * @property integer $update_by
 * @property string $update_date
 * @property integer $active
 */
class Paymentdet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paymentdet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'payment_name', 'amount', 'insert_by', 'insert_date'], 'required'],
            [['payment_id', 'insert_by', 'update_by', 'active'], 'integer'],
            [['amount'], 'number'],
            [['insert_date', 'update_date'], 'safe'],
            [['payment_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'paymentdet_id' => 'Paymentdet ID',
            'payment_id' => 'Payment ID',
            'payment_name' => 'Payment Name',
            'amount' => 'Amount',
            'insert_by' => 'Insert By',
            'insert_date' => 'Insert Date',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
            'active' => 'Active',
        ];
    }

    public function getPaymentinfo()
    {
        return $this->hasOne(Payment::className(), ['payment_id' => 'payment_id']);
    }
}
