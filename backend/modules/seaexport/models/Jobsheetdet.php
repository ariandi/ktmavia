<?php

namespace backend\modules\seaexport\models;

use Yii;

/**
 * This is the model class for table "jobsheetdet".
 *
 * @property integer $jobsdet_id
 * @property integer $jobs_id
 * @property string $costing
 * @property string $bill_cost
 * @property string $bill_shipper
 * @property string $bil_agent
 * @property integer $active
 * @property integer $insert_by
 * @property string $insert_date
 * @property integer $update_by
 * @property string $update_date
 */
class Jobsheetdet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobsheetdet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobs_id', 'insert_by', 'insert_date'], 'required'],
            [['jobs_id', 'active', 'insert_by', 'update_by', 'inv', 'dbn', 'crn'], 'integer'],
            [['insert_date', 'update_date'], 'safe'],
            [['costing', 'bill_cost', 'bill_shipper', 'bil_agent', 'invoice_db_cr'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jobsdet_id' => 'Jobsdet ID',
            'jobs_id' => 'Jobs ID',
            'costing' => 'Costing',
            'bill_cost' => 'Bill Cost',
            'bill_shipper' => 'Bill Shipper',
            'bil_agent' => 'Bil Agent',
            'active' => 'Active',
            'insert_by' => 'Insert By',
            'insert_date' => 'Insert Date',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
            'invoice_db_cr' => 'Invoice Debit Kredit',
		'inv' => 'Invoice',
		'dbn' => 'Debit Note', 
		'crn' => 'Kredit Note',
        ];
    }
}
