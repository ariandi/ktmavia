<?php

namespace backend\modules\seaimport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\seaimport\models\Billlanding;

/**
 * BilllandingSearch represents the model behind the search form about `backend\modules\seaimport\models\Billlanding`.
 */
class BilllandingSearch extends Billlanding
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bl_id', 'si_id', 'quotationid', 'shipper', 'consignee', 'notify_party', 'delivery_agent', 'active', 'update_by', 'insert_by'], 'integer'],
            [['bl_number', 'bl_place', 'bl_date', 'bl_type', 'ocean_vessel', 'port_of_discharge', 'place_of_receipt', 'port_of_loading', 'place_of_delivery', 'rate', 'freight_term', 'currency', 'prepaid_at', 'payable_at', 'number_of_original', 'status', 'initial_carriage', 'update_date', 'insert_date', 'collect'], 'safe'],
            [['freight_charges', 'revenue_tons', 'exchange_rate', 'total_prepaid_national_currency'], 'number'],
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
        $query = Billlanding::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['bl_id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'bl_id' => $this->bl_id,
            'bl_date' => $this->bl_date,
            'si_id' => $this->si_id,
            'quotationid' => $this->quotationid,
            'shipper' => $this->shipper,
            'consignee' => $this->consignee,
            'notify_party' => $this->notify_party,
            'delivery_agent' => $this->delivery_agent,
            'freight_charges' => $this->freight_charges,
            'revenue_tons' => $this->revenue_tons,
            'exchange_rate' => $this->exchange_rate,
            'total_prepaid_national_currency' => $this->total_prepaid_national_currency,
            'active' => 1,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'kindofexport' => 2,
        ]);

        $query->andFilterWhere(['like', 'bl_number', $this->bl_number])
            ->andFilterWhere(['like', 'bl_place', $this->bl_place])
            ->andFilterWhere(['like', 'bl_type', $this->bl_type])
            ->andFilterWhere(['like', 'ocean_vessel', $this->ocean_vessel])
            ->andFilterWhere(['like', 'port_of_discharge', $this->port_of_discharge])
            ->andFilterWhere(['like', 'place_of_receipt', $this->place_of_receipt])
            ->andFilterWhere(['like', 'port_of_loading', $this->port_of_loading])
            ->andFilterWhere(['like', 'place_of_delivery', $this->place_of_delivery])
            ->andFilterWhere(['like', 'rate', $this->rate])
            ->andFilterWhere(['like', 'freight_term', $this->freight_term])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'prepaid_at', $this->prepaid_at])
            ->andFilterWhere(['like', 'payable_at', $this->payable_at])
            ->andFilterWhere(['like', 'number_of_original', $this->number_of_original])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'initial_carriage', $this->initial_carriage])
            ->andFilterWhere(['like', 'collect', $this->collect]);

        return $dataProvider;
    }
}
