<?php

namespace backend\modules\airimport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\airimport\models\Jobsheet;

/**
 * JobsheetSearch represents the model behind the search form about `backend\modules\airimport\models\Jobsheet`.
 */
class JobsheetSearch extends Jobsheet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobs_id', 'pic', 'bl_id', 'active', 'insert_by', 'update_by', 'kindofexport'], 'integer'],
            [['jobs_name', 'date', 'jobs_no', 'commodity', 'po_sty', 'ctn_qty', 'dimensions', 'destination', 'freight', 'date_rcvd', 'telp_fax', 'gross_w', 'vol_w', 'measurement', 'overseas_agent', 'handling', 'mbl', 'hbl', 'fl', 'remarks', 'handling_by', 'remarks2', 'pickup', 'delivery', 'status', 'insert_date', 'update_date', 'prepain_by', 'approve_by', 'tot_usd', 'shipper', 'consignee'], 'safe'],
            [['tot_expenses', 'tot_bill', 'tot_profit', 'tot_dn', 'tot_cn'], 'number'],
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
        $query = Jobsheet::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['jobs_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		 $query->joinWith('shippercompany');
        $query->joinWith([
                            'consigneecompany' => function ($query) {
                                $query->from('company cc');
                            },
                        ]);


        $query->andFilterWhere([
            'jobs_id' => $this->jobs_id,
            'date' => $this->date,
            //'shipper' => $this->shipper,
            //'consignee' => $this->consignee,
            'date_rcvd' => $this->date_rcvd,
            'pic' => $this->pic,
            'bl_id' => $this->bl_id,
            'jobsheet.active' => 1,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
            'tot_expenses' => $this->tot_expenses,
            'tot_bill' => $this->tot_bill,
            'tot_profit' => $this->tot_profit,
            'tot_dn' => $this->tot_dn,
            'tot_cn' => $this->tot_cn,
            'kindofexport' => 4,
        ]);

        $query->andFilterWhere(['like', 'jobs_name', $this->jobs_name])
            ->andFilterWhere(['like', 'jobs_no', $this->jobs_no])
            ->andFilterWhere(['like', 'commodity', $this->commodity])
            ->andFilterWhere(['like', 'po_sty', $this->po_sty])
            ->andFilterWhere(['like', 'ctn_qty', $this->ctn_qty])
            ->andFilterWhere(['like', 'dimensions', $this->dimensions])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'freight', $this->freight])
            ->andFilterWhere(['like', 'telp_fax', $this->telp_fax])
            ->andFilterWhere(['like', 'gross_w', $this->gross_w])
            ->andFilterWhere(['like', 'vol_w', $this->vol_w])
            ->andFilterWhere(['like', 'measurement', $this->measurement])
            ->andFilterWhere(['like', 'overseas_agent', $this->overseas_agent])
            ->andFilterWhere(['like', 'handling', $this->handling])
            ->andFilterWhere(['like', 'mbl', $this->mbl])
            ->andFilterWhere(['like', 'hbl', $this->hbl])
            ->andFilterWhere(['like', 'fl', $this->fl])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'handling_by', $this->handling_by])
            ->andFilterWhere(['like', 'remarks2', $this->remarks2])
            ->andFilterWhere(['like', 'pickup', $this->pickup])
            ->andFilterWhere(['like', 'delivery', $this->delivery])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'prepain_by', $this->prepain_by])
            ->andFilterWhere(['like', 'approve_by', $this->approve_by])
            ->andFilterWhere(['like', 'company.companyname', $this->shipper])
            ->andFilterWhere(['like', 'cc.companyname', $this->consignee])
            ->andFilterWhere(['like', 'tot_usd', $this->tot_usd]);
			

        return $dataProvider;
    }
}
