<?php

namespace backend\modules\masterdata\models;

use Yii;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['picto', 'picfrom', 'companyid', 'createby', 'updateby', 'active'], 'integer'],
            [['companyid', 'quotationdate', 'senderreerence', 'createby', 'createdate', 'updateby', 'updatedate', 'status'], 'required'],
            [['quotationdate', 'createdate', 'updatedate'], 'safe'],
            [['quotationtitle'], 'string', 'max' => 255],
            [['senderreerence', 'status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quotationid' => 'Quotationid',
            'quotationtitle' => 'Quotationtitle',
            'picto' => 'Picto',
            'picfrom' => 'Picfrom',
            'companyid' => 'Companyid',
            'quotationdate' => 'Quotationdate',
            'senderreerence' => 'Senderreerence',
            'createby' => 'Createby',
            'createdate' => 'Createdate',
            'updateby' => 'Updateby',
            'updatedate' => 'Updatedate',
            'active' => 'Active',
            'status' => 'Status',
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
