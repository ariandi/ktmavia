<?php

namespace backend\modules\airimport\models;

use Yii;
use backend\modules\masterdata\models\Company;
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
 * @property string $agent_iata_code
 * @property string $account_no
 * @property string $to_code
 * @property string $by_first_carrier
 * @property string $to_carrier_1
 * @property string $by_carrier_1
 * @property string $to_carrier_2
 * @property string $by_carrier_2
 * @property string $requested_flight_date_1
 * @property string $requested_flight_date_2
 * @property string $wt_val_ppd
 * @property string $wt_val_coll
 * @property string $other_ppd
 * @property string $other_coll
 * @property string $declared_val_carriege
 * @property string $declared_val_cust
 * @property string $holding_info
 * @property string $weigth_charge_prepaid
 * @property string $weigth_charge_collect
 * @property string $valuation_charge_prepaid
 * @property string $valuation_charge_collect
 * @property string $tax_prepaid
 * @property string $tax_collect
 * @property string $tot_agent_prepaid
 * @property string $tot_agent_collect
 * @property string $tot_carrier_prepaid
 * @property string $tot_carrier_collect
 * @property string $tot_prepaid
 * @property string $tot_collect
 * @property string $oth_charger
 * @property string $cartage
 * @property string $doc_stamp_fee
 * @property string $agent_certified
 */
class BillLanding extends \yii\db\ActiveRecord
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
            [['ocean_vessel', 'port_of_discharge', 'place_of_receipt', 'port_of_loading', 'place_of_delivery', 'rate', 'freight_term', 'prepaid_at', 'payable_at', 'initial_carriage', 'collect', 'agent_iata_code', 'account_no', 'to_code', 'by_first_carrier', 'to_carrier_1', 'by_carrier_1', 'to_carrier_2', 'by_carrier_2', 'requested_flight_date_1', 'requested_flight_date_2', 'wt_val_ppd', 'wt_val_coll', 'other_ppd', 'other_coll', 'declared_val_carriege', 'declared_val_cust', 'holding_info', 'weigth_charge_prepaid', 'weigth_charge_collect', 'valuation_charge_prepaid', 'valuation_charge_collect', 'tax_prepaid', 'tax_collect', 'tot_agent_prepaid', 'tot_agent_collect', 'tot_carrier_prepaid', 'tot_carrier_collect', 'tot_prepaid', 'tot_collect', 'oth_charger', 'cartage', 'doc_stamp_fee', 'agent_certified'], 'string', 'max' => 255]
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
            'ocean_vessel' => 'Ocean Vessel',
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
            'active' => 'Active',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
            'insert_by' => 'Insert By',
            'insert_date' => 'Insert Date',
            'collect' => 'Collect',
            'kindofexport' => 'Kindofexport',
            'agent_iata_code' => 'Agent Iata Code',
            'account_no' => 'Account No',
            'to_code' => 'To Code',
            'by_first_carrier' => 'By First Carrier',
            'to_carrier_1' => 'To Carrier 1',
            'by_carrier_1' => 'By Carrier 1',
            'to_carrier_2' => 'To Carrier 2',
            'by_carrier_2' => 'By Carrier 2',
            'requested_flight_date_1' => 'Requested Flight Date 1',
            'requested_flight_date_2' => 'Requested Flight Date 2',
            'wt_val_ppd' => 'Wt Val Ppd',
            'wt_val_coll' => 'Wt Val Coll',
            'other_ppd' => 'Other Ppd',
            'other_coll' => 'Other Coll',
            'declared_val_carriege' => 'Declared Val Carriege',
            'declared_val_cust' => 'Declared Val Cust',
            'holding_info' => 'Holding Info',
            'weigth_charge_prepaid' => 'Weigth Charge Prepaid',
            'weigth_charge_collect' => 'Weigth Charge Collect',
            'valuation_charge_prepaid' => 'Valuation Charge Prepaid',
            'valuation_charge_collect' => 'Valuation Charge Collect',
            'tax_prepaid' => 'Tax Prepaid',
            'tax_collect' => 'Tax Collect',
            'tot_agent_prepaid' => 'Tot Agent Prepaid',
            'tot_agent_collect' => 'Tot Agent Collect',
            'tot_carrier_prepaid' => 'Tot Carrier Prepaid',
            'tot_carrier_collect' => 'Tot Carrier Collect',
            'tot_prepaid' => 'Tot Prepaid',
            'tot_collect' => 'Tot Collect',
            'oth_charger' => 'Oth Charger',
            'cartage' => 'Cartage',
            'doc_stamp_fee' => 'Doc Stamp Fee',
            'agent_certified' => 'Agent Certified',
        ];
    }
}
