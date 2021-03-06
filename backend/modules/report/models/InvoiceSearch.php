<?php

namespace backend\modules\report\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\report\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form about `backend\modules\report\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id', 'bl_id', 'companyid', 'insert_by', 'update_by', 'active'], 'integer'],
            [['from_date', 'to_date', 'invoice_no', 'invoice_date', 'due_date', 'term', 'insert_date', 'update_date', 'sign', 'status', 'jobs_id', 'kindofexport'], 'safe'],
            [['tot_amount'], 'number'],
        ];
    }

    public $from_date;
    public $to_date;

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
            'sort'=> ['defaultOrder' => ['invoice_date'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //$query->joinWith('jobsheetinfo');
        $query->joinWith('kindexportinfo');
        $query->joinWith('companyinfo');

        $query->andFilterWhere([
            'invoice_id' => $this->invoice_id,
            //'invoice_date' => $this->invoice_date,
            //'jobs_id' => $this->jobs_id,
            'bl_id' => $this->bl_id,
            'due_date' => $this->due_date,
            'tot_amount' => $this->tot_amount,
            'companyid' => $this->companyid,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
            'invoice.active' => 1,
            //'kindofexport' => $this->kindofexport,
        ]);

        $query->andFilterWhere(['like', 'invoice_no', $this->invoice_no])
            ->andFilterWhere(['like', 'term', $this->term])
            ->andFilterWhere(['like', 'sign', $this->sign])
            ->andFilterWhere(['like', 'company.companyname', $this->jobs_id])
            ->andFilterWhere(['>=', 'invoice_date', $this->from_date])
            ->andFilterWhere(['<=', 'invoice_date', $this->to_date])
            ->andFilterWhere(['like', 'kindexport.kindexport_name', $this->kindofexport])
            ->andFilterWhere(['like', 'status', $this->status]);

        //$query->andFilterWhere
            

        return $dataProvider;
    }
}
