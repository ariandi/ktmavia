<?php

namespace backend\modules\airimport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\airimport\models\BillLanding;

/**
 * BillLandingSearch represents the model behind the search form about `backend\modules\airimport\models\BillLanding`.
 */
class BillLandingSearch extends BillLanding
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bl_id', 'si_id', 'quotationid', 'shipper', 'consignee', 'notify_party', 'delivery_agent', 'active', 'update_by', 'insert_by', 'kindofexport'], 'integer'],
            [['bl_number', 'bl_place', 'bl_date', 'bl_type', 'ocean_vessel', 'port_of_discharge', 'place_of_receipt', 'port_of_loading', 'place_of_delivery', 'rate', 'freight_term', 'currency', 'prepaid_at', 'payable_at', 'number_of_original', 'status', 'initial_carriage', 'update_date', 'insert_date', 'collect', 'agent_iata_code', 'account_no', 'to_code', 'by_first_carrier', 'to_carrier_1', 'by_carrier_1', 'to_carrier_2', 'by_carrier_2', 'requested_flight_date_1', 'requested_flight_date_2', 'wt_val_ppd', 'wt_val_coll', 'other_ppd', 'other_coll', 'declared_val_carriege', 'declared_val_cust', 'holding_info', 'weigth_charge_prepaid', 'weigth_charge_collect', 'valuation_charge_prepaid', 'valuation_charge_collect', 'tax_prepaid', 'tax_collect', 'tot_agent_prepaid', 'tot_agent_collect', 'tot_carrier_prepaid', 'tot_carrier_collect', 'tot_prepaid', 'tot_collect', 'oth_charger', 'cartage', 'doc_stamp_fee', 'agent_certified'], 'safe'],
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
        $query = BillLanding::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'active' => $this->active,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'kindofexport' => $this->kindofexport,
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
            ->andFilterWhere(['like', 'collect', $this->collect])
            ->andFilterWhere(['like', 'agent_iata_code', $this->agent_iata_code])
            ->andFilterWhere(['like', 'account_no', $this->account_no])
            ->andFilterWhere(['like', 'to_code', $this->to_code])
            ->andFilterWhere(['like', 'by_first_carrier', $this->by_first_carrier])
            ->andFilterWhere(['like', 'to_carrier_1', $this->to_carrier_1])
            ->andFilterWhere(['like', 'by_carrier_1', $this->by_carrier_1])
            ->andFilterWhere(['like', 'to_carrier_2', $this->to_carrier_2])
            ->andFilterWhere(['like', 'by_carrier_2', $this->by_carrier_2])
            ->andFilterWhere(['like', 'requested_flight_date_1', $this->requested_flight_date_1])
            ->andFilterWhere(['like', 'requested_flight_date_2', $this->requested_flight_date_2])
            ->andFilterWhere(['like', 'wt_val_ppd', $this->wt_val_ppd])
            ->andFilterWhere(['like', 'wt_val_coll', $this->wt_val_coll])
            ->andFilterWhere(['like', 'other_ppd', $this->other_ppd])
            ->andFilterWhere(['like', 'other_coll', $this->other_coll])
            ->andFilterWhere(['like', 'declared_val_carriege', $this->declared_val_carriege])
            ->andFilterWhere(['like', 'declared_val_cust', $this->declared_val_cust])
            ->andFilterWhere(['like', 'holding_info', $this->holding_info])
            ->andFilterWhere(['like', 'weigth_charge_prepaid', $this->weigth_charge_prepaid])
            ->andFilterWhere(['like', 'weigth_charge_collect', $this->weigth_charge_collect])
            ->andFilterWhere(['like', 'valuation_charge_prepaid', $this->valuation_charge_prepaid])
            ->andFilterWhere(['like', 'valuation_charge_collect', $this->valuation_charge_collect])
            ->andFilterWhere(['like', 'tax_prepaid', $this->tax_prepaid])
            ->andFilterWhere(['like', 'tax_collect', $this->tax_collect])
            ->andFilterWhere(['like', 'tot_agent_prepaid', $this->tot_agent_prepaid])
            ->andFilterWhere(['like', 'tot_agent_collect', $this->tot_agent_collect])
            ->andFilterWhere(['like', 'tot_carrier_prepaid', $this->tot_carrier_prepaid])
            ->andFilterWhere(['like', 'tot_carrier_collect', $this->tot_carrier_collect])
            ->andFilterWhere(['like', 'tot_prepaid', $this->tot_prepaid])
            ->andFilterWhere(['like', 'tot_collect', $this->tot_collect])
            ->andFilterWhere(['like', 'oth_charger', $this->oth_charger])
            ->andFilterWhere(['like', 'cartage', $this->cartage])
            ->andFilterWhere(['like', 'doc_stamp_fee', $this->doc_stamp_fee])
            ->andFilterWhere(['like', 'agent_certified', $this->agent_certified]);

        return $dataProvider;
    }
}
