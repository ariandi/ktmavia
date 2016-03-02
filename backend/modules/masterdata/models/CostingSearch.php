<?php

namespace backend\modules\masterdata\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\masterdata\models\Costing;

/**
 * CostingSearch represents the model behind the search form about `backend\modules\masterdata\models\Costing`.
 */
class CostingSearch extends Costing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['costing_id', 'active'], 'integer'],
            [['costing_name'], 'safe'],
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
        $query = Costing::find();

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
            'costing_id' => $this->costing_id,
            'active' => 1,
        ]);

        $query->andFilterWhere(['like', 'costing_name', $this->costing_name]);

        return $dataProvider;
    }
}
