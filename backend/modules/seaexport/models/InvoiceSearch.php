<?php

namespace backend\modules\seaexport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\seaexport\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form about `backend\modules\seaexport\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * @inheritdoc
     */
    public $jobs_no;
    public function rules()
    {
        return [
            [['invoice_id', 'bl_id', 'companyid', 'insert_by', 'update_by', 'active'], 'integer'],
            [['invoice_no', 'invoice_date', 'due_date', 'term', 'insert_date', 'update_date', 'sign', 'status', 'jobs_id', 'jobs_no'], 'safe'],
            [['tot_amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Invoice::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['invoice_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('jobsheetinfo');
        $query->joinWith('jobsheetinfo2');
        //$query->joinWith('companycuk');

        $query->andFilterWhere([
            'invoice_id' => $this->invoice_id,
            'invoice_date' => $this->invoice_date,
            //'invoice.jobs_id' => $this->jobs_id,
            'bl_id' => $this->bl_id,
            'due_date' => $this->due_date,
            'tot_amount' => $this->tot_amount,
            'companyid' => $this->companyid,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
            'invoice.active' => 1,
            'invoice.kindofexport' => 1,
        ]);

        $query->andFilterWhere(['like', 'invoice_no', $this->invoice_no])
            ->andFilterWhere(['like', 'term', $this->term])
            ->andFilterWhere(['=', 'status', $this->status])
            ->andFilterWhere(['like', 'company.companyname', $this->jobs_id])
            ->andFilterWhere(['like', 'jobsheet.jobs_no', $this->jobs_no])
            ->andFilterWhere(['like', 'sign', $this->sign]);

        return $dataProvider;
    }
}
