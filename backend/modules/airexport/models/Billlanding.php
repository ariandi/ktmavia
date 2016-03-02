<?php

namespace backend\modules\airexport\models;

use Yii;
use backend\modules\masterdata\models\Company;
use backend\modules\airexport\models\ShippingInstruction;
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
 * @property integer $delivery_agent
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
 * @property integer $active
 * @property integer $update_by
 * @property string $update_date
 * @property integer $insert_by
 * @property string $insert_date
 * @property string $collect
 * @property integer $kindofexport
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
            [['bl_date', 'update_date', 'insert_date'], 'safe'],
            [['si_id', 'quotationid', 'shipper', 'consignee', 'notify_party', 'delivery_agent', 'active', 'update_by', 'insert_by', 'kindofexport'], 'integer'],
            [['freight_charges', 'revenue_tons', 'exchange_rate', 'total_prepaid_national_currency'], 'number'],
            [['status'], 'string'],
            [['bl_number', 'bl_place', 'currency'], 'string', 'max' => 50],
            [['bl_type', 'number_of_original'], 'string', 'max' => 20],
            [['ocean_vessel', 'port_of_discharge', 'place_of_receipt', 'port_of_loading', 'place_of_delivery', 'rate', 'freight_term', 'prepaid_at', 'payable_at', 'initial_carriage', 'collect', 'agent_iata_code', 
                'account_no', 'to_code', 'by_first_carrier', 'to_carrier_1', 'by_carrier_1', 'to_carrier_2', 'by_carrier_2', 
                'requested_flight_date_1', 'requested_flight_date_2', 'wt_val_ppd', 'wt_val_coll', 'other_ppd', 'other_coll',
                'declared_val_carriege', 'declared_val_cust', 'holding_info', 'weigth_charge_prepaid', 'weigth_charge_collect', 
                'valuation_charge_prepaid', 'valuation_charge_collect', 'tax_prepaid', 'tax_collect', 'tot_agent_prepaid', 
                'tot_agent_collect', 'tot_carrier_prepaid', 'tot_carrier_collect', 'tot_prepaid', 'tot_collect', 
                'oth_charger', 'cartage', 'doc_stamp_fee', 'agent_certified'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bl_id' => 'Bl ID',
            'bl_number' => 'AWB Number',
            'bl_place' => 'AWB Place',
            'bl_date' => 'AWB Date',
            'bl_type' => 'AWB Type',
            'si_id' => 'Si ID',
            'quotationid' => 'Quotationid',
            'shipper' => 'Shipper',
            'consignee' => 'Consignee',
            'notify_party' => 'Notify Party',
            'ocean_vessel' => 'Issued',
            'port_of_discharge' => 'Airport of Destinaton',
            'place_of_receipt' => 'Place Of Receipt',
            'port_of_loading' => 'Airport of Departure',
            'place_of_delivery' => 'Place Of Delivery',
            'delivery_agent' => 'Agent Name',
            'freight_charges' => 'Freight Charges',
            'revenue_tons' => 'Revenue Tons',
            'rate' => 'Rate',
            'freight_term' => 'Prepaid',
            'exchange_rate' => 'Exchange Rate',
            'currency' => 'Currency',
            'prepaid_at' => 'Prepaid At',
            'payable_at' => 'Payable At',
            'total_prepaid_national_currency' => 'Total Prepaid National Currency',
            'number_of_original' => 'Number Of Original',
            'status' => 'Status',
            'initial_carriage' => 'Initial Carriage',
            'active' => 'Active',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
            'insert_by' => 'Insert By',
            'insert_date' => 'Insert Date',
            'collect' => 'Collect',
            'kindofexport' => 'Kindofexport',
            'agent_iata_code' => 'Agent Iata Code', 
            'account_no' => 'Account No',
            'to_code' => 'To', 
            'by_first_carrier' => 'By First Carrier', 
            'to_carrier_1' => 'To Carrier 1', 
            'by_carrier_1' => 'By Carrier 1', 
            'to_carrier_2' => 'To Carrier 2', 
            'by_carrier_2' => 'By Carrier 2', 
            'requested_flight_date_1' => 'Req Flight Date 1', 
            'requested_flight_date_2' => 'Req Flight Date 2', 
            'wt_val_ppd' => 'Wt Val Ppd', 
            'wt_val_coll' => 'Wt Cal Coll', 
            'other_ppd' => 'Other Ppd', 
            'other_coll' => 'Other Coll',
            'declared_val_carriege' => 'Declared Val Carriege', 
            'declared_val_cust' => 'Declared Val Cust', 
            'holding_info' => 'Handling Info', 
            'weigth_charge_prepaid' => 'Weigth Charge Prepaid', 
            'weigth_charge_collect' => 'Weigth Charge Collect', 
            'valuation_charge_prepaid' => 'Valuation Charge Prepaid', 
            'valuation_charge_collect' => 'Valuation Charge Collect', 
            'tax_prepaid' => 'Tax Prepaid', 
            'tax_collect' => 'Tax Collect', 
            'tot_agent_prepaid' => 'Total Agent Prepaid', 
            'tot_agent_collect' => 'Total Agent Collect', 
            'tot_carrier_prepaid' => 'Total Carrier Prepaid',
            'tot_carrier_collect' => 'Total Carrier Collect', 
            'tot_prepaid' => 'Total Prepaid', 
            'tot_collect' => 'Total Collect', 
            'oth_charger' => 'Other Charger', 
            'cartage' => 'Cartage', 
            'doc_stamp_fee' => 'Doc Stamp Fee', 
            'agent_certified' => 'Agent Certified',
        ];
    }

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
