<?php

namespace backend\modules\report\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\report\models\Paymentdet;

/**
 * PaymentdetSearch represents the model behind the search form about `backend\modules\report\models\Paymentdet`.
 */
class PaymentdetSearch extends Paymentdet
{
    /**
     * @inheritdoc
     */
    public $invoice_amt;
    public $from_date;
    public $to_date;
    public $payment_date;
    public $company_name;
    public $kindofexport;

    public function rules()
    {
        return [
            [['paymentdet_id', 'payment_id', 'insert_by', 'update_by', 'active'], 'integer'],
            [['payment_name', 'insert_date', 'update_date', 'from_date', 'to_date', 'payment_date', 'company_name', 'kindofexport'], 'safe'],
            [['amount'], 'number'],
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
        $query = Paymentdet::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['payment_id'=>SORT_DESC, 'paymentdet_id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('paymentinfo.invoiceinfo.custinfo');
        $query->joinWith('paymentinfo.invoiceinfo.kindexportinfo');

        $query->andFilterWhere([
            'paymentdet_id' => $this->paymentdet_id,
            //'payment_id' => $this->payment_id,
            'amount' => $this->amount,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
            'paymentdet.active' => 1,
        ]);

        $query->andFilterWhere(['like', 'payment_name', $this->payment_name])
        ->andFilterWhere(['>=', 'payment.payment_date', $this->from_date])
        ->andFilterWhere(['<=', 'payment.payment_date', $this->to_date])
        ->andFilterWhere(['like', 'company.companyname', $this->company_name])
        ->andFilterWhere(['like', 'kindexport.kindexport_name', $this->kindofexport])
        ->andFilterWhere(['like', 'payment.payment_number', $this->payment_id]);

        $query->andWhere(['not', ['payment.payment_id' => null]]);

        return $dataProvider;
    }
}
