<?php

namespace backend\modules\seaimport\models;

use Yii;
use backend\modules\masterdata\models\Company;
use backend\modules\seaimport\models\Jobsheet;

/**
 * This is the model class for table "invoice".
 *
 * @property integer $invoice_id
 * @property string $invoice_no
 * @property string $invoice_date
 * @property integer $jobs_id
 * @property integer $bl_id
 * @property string $due_date
 * @property string $term
 * @property string $tot_amount
 * @property integer $companyid
 * @property integer $insert_by
 * @property string $insert_date
 * @property integer $update_by
 * @property string $update_date
 * @property integer $active
 * @property string $sign
 * @property string $status
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_no', 'jobs_id', 'bl_id', 'insert_by', 'insert_date'], 'required'],
            [['invoice_date', 'due_date', 'insert_date', 'update_date'], 'safe'],
            [['jobs_id', 'bl_id', 'companyid', 'insert_by', 'update_by', 'active'], 'integer'],
            [['tot_amount'], 'number'],
            [['status'], 'string'],
            [['invoice_no', 'term', 'sign'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'invoice_id' => 'Invoice ID',
            'invoice_no' => 'Invoice No',
            'invoice_date' => 'Invoice Date',
            'jobs_id' => 'Jobs ID',
            'bl_id' => 'Bl ID',
            'due_date' => 'Due Date',
            'term' => 'Term',
            'tot_amount' => 'Tot Amount',
            'companyid' => 'Companyid',
            'insert_by' => 'Insert By',
            'insert_date' => 'Insert Date',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
            'active' => 'Active',
            'sign' => 'Sign',
            'status' => 'Status',
        ];
    }

    public function getJobsheetinfo()
    {
        return $this->hasOne(Company::className(), ['companyid' => 'customer_id']);
                //->joinWith(['company', 'comments.fan']);
    }

    public function getJobsheetinfo2()
    {
        return $this->hasOne(Jobsheet::className(), ['jobs_id' => 'jobs_id']);
                //->joinWith(['company', 'comments.fan']);
    }
}
