<?php

namespace backend\modules\airexport\models;

use Yii;
use backend\modules\masterdata\models\User;
use backend\modules\masterdata\models\Company;
/**
 * This is the model class for table "shipping_instruction".
 *
 * @property integer $si_id
 * @property string $no_ref
 * @property string $date
 * @property string $booking_number
 * @property string $depo
 * @property string $stucking
 * @property integer $topic
 * @property integer $frompic
 * @property string $telp_fax
 * @property integer $attn
 * @property string $email
 * @property integer $shipper
 * @property integer $consignee
 * @property integer $notify_party
 * @property string $vessel
 * @property string $connecting_vessel
 * @property string $port_of_loading
 * @property string $etd_jkt
 * @property string $eta_pus
 * @property string $via_transit
 * @property string $etd_pus
 * @property string $quantity
 * @property string $freight_term
 * @property string $stuffing
 * @property string $gw_nw_cbm
 * @property string $description_good
 * @property string $cont_seal_no
 * @property string $shipping_mark
 * @property string $destination
 * @property string $rate
 * @property string $note
 * @property string $peb_no
 * @property string $tgl
 * @property string $kpbc
 * @property string $hs_code
 * @property string $bl_no
 * @property integer $insertby
 * @property string $insertdate
 * @property integer $updateby
 * @property string $updatedate
 * @property integer $active
 * @property integer $quotationid
 * @property string $status
 * @property string $eta_pod
 * @property integer $kindofexport
 */
class Shippinginstruction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipping_instruction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_ref', 'topic', 'frompic', 'telp_fax', 'email', 'shipper', 'consignee', 'notify_party', 'freight_term', 'quotationid', 'status'], 'required'],
            [['date', 'etd_jkt', 'eta_pus', 'stuffing', 'tgl', 'insertdate', 'updatedate', 'eta_pod'], 'safe'],
            [['topic', 'frompic', 'attn', 'shipper', 'consignee', 'notify_party', 'insertby', 'updateby', 'active', 'quotationid', 'kindofexport'], 'integer'],
            [['description_good', 'note', 'status'], 'string'],
            [['no_ref'], 'string', 'max' => 30],
            [['booking_number', 'telp_fax', 'bl_no'], 'string', 'max' => 50],
            [['depo', 'stucking', 'email', 'vessel', 'connecting_vessel', 'port_of_loading', 'via_transit', 'etd_pus', 'quantity', 'freight_term', 'gw_nw_cbm', 'cont_seal_no', 'shipping_mark', 'destination', 'rate', 'peb_no', 'kpbc', 'hs_code'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'si_id' => 'Si ID',
            'no_ref' => 'No Ref',
            'date' => 'Date',
            'booking_number' => 'Booking Number',
            'depo' => 'Ware House Airport',
            'stucking' => 'Flight No',
            'topic' => 'Topic',
            'frompic' => 'Frompic',
            'telp_fax' => 'Telp Fax',
            'attn' => 'Attn',
            'email' => 'Email',
            'shipper' => 'Shipper',
            'consignee' => 'Consignee',
            'notify_party' => 'Notify Party',
            'vessel' => 'Air Lines',
            'connecting_vessel' => 'Connecting Flight',
            'port_of_loading' => 'Airport Loading',
            'etd_jkt' => 'Etd POL',
            'eta_pus' => 'Eta Transhipment',
            'via_transit' => 'Via Transit',
            'etd_pus' => 'Etd Transhipment',
            'quantity' => 'Quantity',
            'freight_term' => 'Freight Term',
            'stuffing' => 'Stuffing',
            'gw_nw_cbm' => 'Sea Weight',
            'description_good' => 'Description Good',
            'cont_seal_no' => 'Cont Seal No',
            'shipping_mark' => 'Shipping Mark',
            'destination' => 'Destination',
            'rate' => 'Rate',
            'note' => 'Note',
            'peb_no' => 'Peb No',
            'tgl' => 'Tgl',
            'kpbc' => 'Kpbc',
            'hs_code' => 'Hs Code',
            'bl_no' => 'Bl No',
            'insertby' => 'Insertby',
            'insertdate' => 'Insertdate',
            'updateby' => 'Updateby',
            'updatedate' => 'Updatedate',
            'active' => 'Active',
            'quotationid' => 'Quotationid',
            'status' => 'Status',
            'eta_pod' => 'Eta Pod',
            'kindofexport' => 'Kindofexport',
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
    
    public function getTopicuser()
    {
        return $this->hasOne(User::className(), ['id' => 'topic']);
    }
    
    public function getfrompicuser()
    {
        return $this->hasOne(User::className(), ['id' => 'frompic']);
    }

    public function getattnuser()
    {
        return $this->hasOne(User::className(), ['id' => 'attn']);
    }
}
