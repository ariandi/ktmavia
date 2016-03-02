<?php

namespace backend\modules\seaexport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\seaexport\models\ShippingInstruction;

/**
 * ShippingInstructionSearch represents the model behind the search form about `backend\modules\seaexport\models\ShippingInstruction`.
 */
class ShippinginstructionSearch extends ShippingInstruction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['si_id', 'topic', 'frompic', 'attn', 'shipper', 'consignee', 'notify_party', 'insertby', 'updateby', 'active', 'quotationid'], 'integer'],
            [['no_ref', 'date', 'booking_number', 'depo', 'stucking', 'telp_fax', 'email', 'vessel', 'connecting_vessel', 'port_of_loading', 'etd_jkt', 'eta_pus', 'via_transit', 'etd_pus', 'quantity', 'freight_term', 'stuffing', 'gw_nw_cbm', 'description_good', 'cont_seal_no', 'shipping_mark', 'destination', 'rate', 'note', 'peb_no', 'tgl', 'kpbc', 'hs_code', 'bl_no', 'insertdate', 'updatedate'], 'safe'],
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
        $query = ShippingInstruction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['si_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $this->active = 1;

        $query->andFilterWhere([
            'si_id' => $this->si_id,
            'date' => $this->date,
            'topic' => $this->topic,
            'frompic' => $this->frompic,
            'attn' => $this->attn,
            'shipper' => $this->shipper,
            'consignee' => $this->consignee,
            'notify_party' => $this->notify_party,
            'etd_jkt' => $this->etd_jkt,
            'eta_pus' => $this->eta_pus,
            'stuffing' => $this->stuffing,
            'tgl' => $this->tgl,
            'insertby' => $this->insertby,
            'insertdate' => $this->insertdate,
            'updateby' => $this->updateby,
            'updatedate' => $this->updatedate,
            'shipping_instruction.active' => 1,
            'quotationid' => $this->quotationid,
            'shipping_instruction.kindofexport' => 1,
        ]);

        $query->andFilterWhere(['like', 'no_ref', $this->no_ref])
            ->andFilterWhere(['like', 'booking_number', $this->booking_number])
            ->andFilterWhere(['like', 'depo', $this->depo])
            ->andFilterWhere(['like', 'stucking', $this->stucking])
            ->andFilterWhere(['like', 'telp_fax', $this->telp_fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'vessel', $this->vessel])
            ->andFilterWhere(['like', 'connecting_vessel', $this->connecting_vessel])
            ->andFilterWhere(['like', 'port_of_loading', $this->port_of_loading])
            ->andFilterWhere(['like', 'via_transit', $this->via_transit])
            ->andFilterWhere(['like', 'etd_pus', $this->etd_pus])
            ->andFilterWhere(['like', 'quantity', $this->quantity])
            ->andFilterWhere(['like', 'freight_term', $this->freight_term])
            ->andFilterWhere(['like', 'gw_nw_cbm', $this->gw_nw_cbm])
            ->andFilterWhere(['like', 'description_good', $this->description_good])
            ->andFilterWhere(['like', 'cont_seal_no', $this->cont_seal_no])
            ->andFilterWhere(['like', 'shipping_mark', $this->shipping_mark])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'rate', $this->rate])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'peb_no', $this->peb_no])
            ->andFilterWhere(['like', 'kpbc', $this->kpbc])
            ->andFilterWhere(['like', 'hs_code', $this->hs_code])
            ->andFilterWhere(['like', 'bl_no', $this->bl_no]);

        return $dataProvider;
    }
}
