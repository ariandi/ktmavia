<?php

namespace backend\modules\report\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\report\models\Billlandingdetail;

/**
 * BilllandingdetailSearch represents the model behind the search form about `backend\modules\report\models\Billlandingdetail`.
 */
class BilllandingdetailSearch extends Billlandingdetail
{
    /**
     * @inheritdoc
     */
	 
	 public $kindofexport;
	 public $companyname;
     public $companyname2;
	 public $bl_date;
	 public $bl_number;
     public $from_date;
     public $to_date;
	 
    public function rules()
    {
        return [
            [['bl_det_id', 'bl_id', 'active', 'insert_by', 'update_by'], 'integer'],
            [['companyname', 'companyname2', 'bl_date', 'kindofexport', 'container_seal_no', 'kind_of_package_desc_goods', 'weight', 'measurement', 'total_container', 'insert_date', 'update_date', 'bl_number', 'from_date', 'to_date'], 'safe'],
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
        $query = Billlandingdetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['bl_id'=>SORT_DESC, 'bl_det_id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		$query->joinWith('billinfo');
        $query->joinWith([
                    'billinfo.consigneecompany' => function ($query) {
                        $query->from('company com');
                    },
                ]);
				
        $query->andFilterWhere([
            'bl_det_id' => $this->bl_det_id,
            'bl_id' => $this->bl_id,
            'active' => $this->active,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
			//'bl_date' => $this->bl_date,
        ]);

        $query->andFilterWhere(['like', 'container_seal_no', $this->container_seal_no])
            ->andFilterWhere(['not like', 'container_seal_no', 'attachment'])
            ->andFilterWhere(['like', 'kind_of_package_desc_goods', $this->kind_of_package_desc_goods])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'measurement', $this->measurement])
			->andFilterWhere(['like', 'company.companyname', $this->companyname])
            ->andFilterWhere(['like', 'com.companyname', $this->companyname2])
			->andFilterWhere(['like', 'kindexport.kindexport_name', $this->kindofexport])
            ->andFilterWhere(['not', 'bill_landing.bl_number', null])
            ->andFilterWhere(['like', 'bill_landing.bl_number', $this->bl_number])
            ->andFilterWhere(['>=', 'bill_landing.bl_date', $this->from_date])
            ->andFilterWhere(['<=', 'bill_landing.bl_date', $this->to_date])
            ->andFilterWhere(['like', 'total_container', $this->total_container]);
			
        return $dataProvider;
    }
}
