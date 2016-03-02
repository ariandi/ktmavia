<?php

namespace backend\modules\report\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\report\models\Invoicedetail;

use backend\modules\masterdata\models\Company;
/**
 * InvoicedetailSearch represents the model behind the search form about `backend\modules\report\models\Invoicedetail`.
 */
class InvoicedetailSearch extends Invoicedetail
{
    /**
     * @inheritdoc
     */
    public $from_date;
    public $to_date;
    public $company_name;
    public $kindofexport;

    public function rules()
    {
        return [
            [['invoicedet_id', 'insert_by', 'update_by', 'active'], 'integer'],
            [['costing', 'insert_date', 'update_date', 'invoice_id', 'due_date', 'from_date', 'to_date', 'company_name', 'kindofexport'], 'safe'],
            [['amount'], 'number'],
        ];
    }


    public $due_date;

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
        $query = Invoicedetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['invoice_id' => SORT_DESC, 'invoicedet_id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('invoiceinfo.kindexportinfo');

        $query->andFilterWhere([
            'invoicedet_id' => $this->invoicedet_id,
            //'invoice_id' => $this->invoice_id,
            'amount' => $this->amount,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
            'invoice_detail.active' => 1,
            'invoice.due_date' => $this->due_date,
        ]);

        $query->andFilterWhere(['like', 'costing', $this->costing])
        ->andFilterWhere(['>=', 'invoice.due_date', $this->from_date])
        ->andFilterWhere(['<=', 'invoice.due_date', $this->to_date])
        ->andFilterWhere(['like', 'company.companyname', $this->company_name])
        ->andFilterWhere(['like', 'kindexport.kindexport_name', $this->kindofexport])
        //->where(['not in', 'invoice.invoice_id', [null]])
        ->andFilterWhere(['like', 'invoice.invoice_no', $this->invoice_id]);

        $query->andWhere(['not', ['invoice.invoice_id' => null]]);

        return $dataProvider;
    }
}
