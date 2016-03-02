<?php

namespace backend\modules\seaimport\models;

use Yii;
use backend\modules\seaimport\models\Jobsheet;
use backend\modules\masterdata\models\Company;
/**
 * This is the model class for table "debitnote".
 *
 * @property integer $debitnote_id
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
 * @property integer $invoice_id
 */
class Debitnote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'debitnote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_no', 'jobs_id', 'bl_id', 'insert_by', 'insert_date', 'invoice_id'], 'required'],
            [['invoice_date', 'due_date', 'insert_date', 'update_date'], 'safe'],
            [['jobs_id', 'bl_id', 'companyid', 'insert_by', 'update_by', 'active', 'invoice_id'], 'integer'],
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
            'debitnote_id' => 'Debitnote ID',
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
            'invoice_id' => 'Invoice ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobsheetinfo()
    {
        return $this->hasOne(Jobsheet::className(), ['jobs_id' => 'jobs_id'])
                ->leftJoin('company', 'jobsheet.shipper = company.companyid');
                //->joinWith(['company', 'comments.fan']);
    }

    public function getTocompany()
    {
        return $this->hasOne(Company::className(), ['companyid' => 'companyid']);
    }
}
