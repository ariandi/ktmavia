<?php

namespace backend\modules\seaexport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\seaexport\models\InvoiceDetail;

/**
 * InvoicedetailSearch represents the model behind the search form about `backend\modules\seaexport\models\Invoicedetail`.
 */
class InvoicedetailSearch extends Invoicedetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoicedet_id', 'invoice_id', 'insert_by', 'update_by', 'active'], 'integer'],
            [['costing', 'insert_date', 'update_date'], 'safe'],
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
        $query = Invoicedetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['invoicedet_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'invoicedet_id' => $this->invoicedet_id,
            'invoice_id' => $this->invoice_id,
            'amount' => $this->amount,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'costing', $this->costing]);

        return $dataProvider;
    }
}
