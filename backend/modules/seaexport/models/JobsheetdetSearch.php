<?php

namespace backend\modules\seaexport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\seaexport\models\Jobsheetdet;

/**
 * JobsheetdetSearch represents the model behind the search form about `backend\modules\seaexport\models\Jobsheetdet`.
 */
class JobsheetdetSearch extends Jobsheetdet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobsdet_id', 'jobs_id', 'active', 'insert_by', 'update_by'], 'integer'],
            [['costing', 'bill_cost', 'bill_shipper', 'bil_agent', 'insert_date', 'update_date'], 'safe'],
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
    public function search($params, $jobs_id = null)
    {
        $query = Jobsheetdet::find();

        if($jobs_id !== null) {
            $this->jobs_id = $jobs_id;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['jobsdet_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'jobsdet_id' => $this->jobsdet_id,
            'jobs_id' => $this->jobs_id,
            'active' => $this->active,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'costing', $this->costing])
            ->andFilterWhere(['like', 'bill_cost', $this->bill_cost])
            ->andFilterWhere(['like', 'bill_shipper', $this->bill_shipper])
            ->andFilterWhere(['like', 'bil_agent', $this->bil_agent]);

        return $dataProvider;
    }
}
