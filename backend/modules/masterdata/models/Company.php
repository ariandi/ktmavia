<?php

namespace backend\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $companyid
 * @property string $companyname
 * @property string $phone
 * @property string $fax
 * @property integer $active
 * @property integer $informationid
 * @property string $email
 * @property integer $createby
 * @property integer $updateby
 * @property string $deliveryaddress
 * @property string $invoiceaddress
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'informationid', 'createby', 'updateby'], 'integer'],
            [['createby', 'informationid'], 'required'],
            [['deliveryaddress', 'invoiceaddress'], 'string'],
            [['companyname'], 'string', 'max' => 255],
            [['phone', 'fax'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'companyid' => 'Companyid',
            'companyname' => 'Companyname',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'active' => 'Active',
            'informationid' => 'Information',
            'email' => 'Email',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'deliveryaddress' => 'Deliveryaddress',
            'invoiceaddress' => 'Invoiceaddress',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyinfo()
    {
        return $this->hasMany(Companyinfo::className(), ['informationid' => 'companyid']);
    }
}
