<?php

namespace backend\modules\airexport\models;

use Yii;
use backend\modules\masterdata\models\Company;
use backend\modules\masterdata\models\User;
use backend\modules\airexport\billanding;
/**
 * This is the model class for table "jobsheet".
 *
 * @property integer $jobs_id
 * @property string $jobs_name
 * @property string $date
 * @property string $jobs_no
 * @property integer $shipper
 * @property integer $consignee
 * @property string $commodity
 * @property string $po_sty
 * @property string $ctn_qty
 * @property string $dimensions
 * @property string $destination
 * @property string $freight
 * @property string $date_rcvd
 * @property integer $pic
 * @property string $telp_fax
 * @property string $gross_w
 * @property string $vol_w
 * @property string $measurement
 * @property string $overseas_agent
 * @property string $handling
 * @property string $mbl
 * @property string $hbl
 * @property string $fl
 * @property string $remarks
 * @property string $handling_by
 * @property string $remarks2
 * @property string $pickup
 * @property string $delivery
 * @property integer $bl_id
 * @property integer $active
 * @property string $status
 * @property integer $insert_by
 * @property string $insert_date
 * @property integer $update_by
 * @property string $update_date
 * @property string $prepain_by
 * @property string $approve_by
 * @property string $tot_expenses
 * @property string $tot_bill
 * @property string $tot_profit
 * @property string $tot_usd
 * @property string $tot_dn
 * @property string $tot_cn
 * @property integer $kindofexport
 */
class Jobsheet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobsheet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'date_rcvd', 'insert_date', 'update_date'], 'safe'],
            [['jobs_no', 'shipper', 'consignee', 'destination', 'mbl', 'hbl', 'bl_id', 'insert_by', 'insert_date'], 'required'],
            [['shipper', 'consignee', 'pic', 'bl_id', 'active', 'insert_by', 'update_by', 'kindofexport'], 'integer'],
            [['status'], 'string'],
            [['tot_expenses', 'tot_bill', 'tot_profit', 'tot_dn', 'tot_cn'], 'number'],
            [['jobs_name', 'jobs_no', 'commodity', 'po_sty', 'ctn_qty', 'dimensions', 'destination', 'freight', 'telp_fax', 'gross_w', 'vol_w', 'measurement', 'overseas_agent', 'handling', 'mbl', 'hbl', 'fl', 'remarks', 'handling_by', 'remarks2', 'pickup', 'delivery', 'prepain_by', 'approve_by', 'tot_usd'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jobs_id' => 'Jobs ID',
            'jobs_name' => 'Jobs Name',
            'date' => 'Date',
            'jobs_no' => 'Jobs No',
            'shipper' => 'Shipper',
            'consignee' => 'Consignee',
            'commodity' => 'Commodity',
            'po_sty' => 'Po Sty',
            'ctn_qty' => 'Ctn Qty',
            'dimensions' => 'Dimensions',
            'destination' => 'Destination',
            'freight' => 'Freight',
            'date_rcvd' => 'Date Rcvd',
            'pic' => 'Pic',
            'telp_fax' => 'Telp Fax',
            'gross_w' => 'Gross W',
            'vol_w' => 'Vol W',
            'measurement' => 'Measurement',
            'overseas_agent' => 'Overseas Agent',
            'handling' => 'Handling',
            'mbl' => 'Mbl',
            'hbl' => 'Hbl',
            'fl' => 'Fl',
            'remarks' => 'Remarks',
            'handling_by' => 'Handling By',
            'remarks2' => 'Remarks2',
            'pickup' => 'Pickup',
            'delivery' => 'Delivery',
            'bl_id' => 'Bl ID',
            'active' => 'Active',
            'status' => 'Status',
            'insert_by' => 'Insert By',
            'insert_date' => 'Insert Date',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
            'prepain_by' => 'Prepain By',
            'approve_by' => 'Approve By',
            'tot_expenses' => 'Tot Expenses',
            'tot_bill' => 'Tot Bill',
            'tot_profit' => 'Tot Profit',
            'tot_usd' => 'Tot Usd',
            'tot_dn' => 'Tot Dn',
            'tot_cn' => 'Tot Cn',
            'kindofexport' => 'Kindofexport',
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

    public function getPicuser()
    {
        return $this->hasOne(User::className(), ['id' => 'pic']);
    }

    public function getBilllanding()
    {
        return $this->hasOne(Billlanding::className(), ['bl_id' => 'bl_id']);
    }

	
}
