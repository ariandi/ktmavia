<?php

namespace backend\modules\seaexport\models;

use Yii;
use backend\modules\masterdata\models\User;
use backend\modules\masterdata\models\Company;

/**
 * This is the model class for table "quotation".
 *
 * @property integer $quotationid
 * @property string $quotationtitle
 * @property integer $picto
 * @property integer $picfrom
 * @property integer $companyid
 * @property string $quotationdate
 * @property string $senderreerence
 * @property integer $createby
 * @property string $createdate
 * @property integer $updateby
 * @property string $updatedate
 * @property integer $active
 * @property string $status
 * @property string $portofloading
 * @property string $freightageofpayment
 * @property string $commodity
 * @property string $termofshipment
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation';
    }

    public $fullname;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['picto', 'picfrom', 'companyid', 'createby', 'updateby', 'active'], 'integer'],
            [['companyid', 'quotationdate', 'senderreerence', 'createby', 'createdate', 'updateby', 'updatedate', 'status', 'portofloading','validdate','termofpayment','fullname'], 'required'],
            [['quotationdate', 'createdate', 'updatedate'], 'safe'],
            [['quotationtitle', 'portofloading', 'freightageofpayment', 'commodity', 'termofshipment'], 'string', 'max' => 255],
            [['senderreerence', 'status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quotationid' => 'Quotation ID',
            'quotationtitle' => 'Quotation Title',
            'picto' => 'Pic To',
            'picfrom' => 'Picfrom',
            'companyid' => 'Companyid',
            'quotationdate' => 'Quotation Date',
            'senderreerence' => 'Sender Reference',
            'createby' => 'Createby',
            'createdate' => 'Createdate',
            'updateby' => 'Updateby',
            'updatedate' => 'Updatedate',
            'active' => 'Active',
            'status' => 'Status',
            'portofloading' => 'Port of Loading',
            'freightageofpayment' => 'Freightage of Payment',
            'commodity' => 'Commodity',
            'termofshipment' => 'Term of Shipment',
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['companyid' => 'companyid']);
    }
    
    public function getTopic()
    {
        return $this->hasOne(User::className(), ['id' => 'picto']);
    }
    
    public function getfrompic()
    {
        return $this->hasOne(User::className(), ['id' => 'picfrom']);
    }
}
