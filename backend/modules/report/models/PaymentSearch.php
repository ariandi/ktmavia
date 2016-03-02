<?php

namespace backend\modules\report\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\report\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about `backend\modules\report\models\Payment`.
 */
class PaymentSearch extends Payment
{
    /**
     * @inheritdoc
     */
    public $invoice_amt;
    public $from_date;
    public $to_date;
    public $kindofexport;
    public $company_name;

    public function rules()
    {
        return [
            [['payment_id', 'active', 'insert_by', 'update_by'], 'integer'],
            [['payment_number', 'payment_date', 'note', 'insert_date', 'update_date', 'invoice_id', 'from_date', 'to_date', 'kindofexport', 'company_name'], 'safe'],
            [['total_amount', 'invoice_amt'], 'number'],
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
        $query = Payment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['payment_id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('invoiceinfo.kindexportinfo');
        $query->joinWith('invoiceinfo.companyinfo');

        $query->andFilterWhere([
            'payment_id' => $this->payment_id,
            //'payment_date' => $this->payment_date,
            //'invoice_id' => $this->invoice_id,
            'total_amount' => $this->total_amount,
            'invoice.tot_amount' => $this->invoice_amt,
            'payment.active' => 1,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'payment_number', $this->payment_number])
            ->andFilterWhere(['like', 'invoice.invoice_no', $this->invoice_id])
            ->andFilterWhere(['like', 'kindexport.kindexport_name', $this->kindofexport])
            ->andFilterWhere(['like', 'company.companyname', $this->company_name])
            ->andFilterWhere(['>=', 'payment_date', $this->from_date])
            ->andFilterWhere(['<=', 'payment_date', $this->to_date])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
