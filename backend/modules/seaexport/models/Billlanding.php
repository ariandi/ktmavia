<?php

namespace backend\modules\seaexport\models;

use Yii;
use backend\modules\masterdata\models\Company;
use backend\modules\seaexport\models\ShippingInstruction;

/**
 * This is the model class for table "bill_landing".
 *
 * @property integer $bl_id
 * @property string $bl_number
 * @property string $bl_place
 * @property string $bl_date
 * @property string $bl_type
 * @property integer $si_id
 * @property integer $quotationid
 * @property integer $shipper
 * @property integer $consignee
 * @property integer $notify_party
 * @property string $ocean_vessel
 * @property string $port_of_discharge
 * @property string $place_of_receipt
 * @property string $port_of_loading
 * @property string $place_of_delivery
 * @property string $delivery_agent
 * @property string $freight_charges
 * @property string $revenue_tons
 * @property string $rate
 * @property string $freight_term
 * @property string $exchange_rate
 * @property string $currency
 * @property string $prepaid_at
 * @property string $payable_at
 * @property string $total_prepaid_national_currency
 * @property string $number_of_original
 * @property string $status
 * @property string $initial_carriage
 */
class Billlanding extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill_landing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bl_number', 'bl_type', 'si_id', 'quotationid', 'shipper', 'port_of_discharge', 'place_of_receipt', 'port_of_loading', 'place_of_delivery', 'freight_term', 'prepaid_at', 'payable_at'], 'required'],
            [['bl_date', 'insert_date', 'update_date'], 'safe'],
            [['si_id', 'quotationid', 'shipper', 'consignee', 'notify_party', 'delivery_agent', 'active', 'insert_by', 'update_by', 'active'], 'integer'],
            [['freight_charges', 'revenue_tons', 'exchange_rate', 'total_prepaid_national_currency'], 'number'],
            [['status'], 'string'],
            [['bl_number', 'bl_place', 'currency'], 'string', 'max' => 50],
            [['bl_type'], 'string', 'max' => 20],
            [['collect', 'ocean_vessel', 'port_of_discharge', 'place_of_receipt', 'port_of_loading', 'place_of_delivery', 'rate', 'freight_term', 'prepaid_at', 'payable_at', 'initial_carriage'], 'string', 'max' => 255],
            [['number_of_original'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bl_id' => 'Bl ID',
            'bl_number' => 'Bl Number',
            'bl_place' => 'Bl Place',
            'bl_date' => 'Bl Date',
            'bl_type' => 'Bl Type',
            'si_id' => 'Si ID',
            'quotationid' => 'Quotationid',
            'shipper' => 'Shipper',
            'consignee' => 'Consignee',
            'notify_party' => 'Notify Party',
            'ocean_vessel' => 'Ocean Vessel / voy. No',
            'port_of_discharge' => 'Port Of Discharge',
            'place_of_receipt' => 'Place Of Receipt',
            'port_of_loading' => 'Port Of Loading',
            'place_of_delivery' => 'Place Of Delivery',
            'delivery_agent' => 'Delivery Agent',
            'freight_charges' => 'Freight Charges',
            'revenue_tons' => 'Revenue Tons',
            'rate' => 'Rate',
            'freight_term' => 'Freight Term',
            'exchange_rate' => 'Exchange Rate',
            'currency' => 'Currency',
            'prepaid_at' => 'Prepaid At',
            'payable_at' => 'Payable At',
            'total_prepaid_national_currency' => 'Total Prepaid National Currency',
            'number_of_original' => 'Number Of Original',
            'status' => 'Status',
            'initial_carriage' => 'Initial Carriage',
            'collect' => 'Collect',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippercompany()
    {
        return $this->hasOne(Company::className(), ['companyid' => 'shipper']);
    }

    public function getConsigneecompany()
    {
        return $this->hasOne(Company::className(), ['companyid' => 'consignee']);
    }

    public function getNotifypartycompany()
    {
        return $this->hasOne(Company::className(), ['companyid' => 'notify_party']);
    }

    public function getDeliveryagentcompany()
    {
        return $this->hasOne(Company::className(), ['companyid' => 'delivery_agent']);
    }

    public function getshipping()
    {
        return $this->hasOne(ShippingInstruction::className(), ['si_id' => 'si_id']);
    }
}
