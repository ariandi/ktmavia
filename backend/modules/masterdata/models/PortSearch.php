<?php

namespace backend\modules\masterdata\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\masterdata\models\Port;

/**
 * PortSearch represents the model behind the search form about `backend\modules\masterdata\models\Port`.
 */
class PortSearch extends Port
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['port_id'], 'integer'],
            [['port_name'], 'safe'],
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
        $query = Port::find();

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
            'port_id' => $this->port_id,
        ]);

        $query->andFilterWhere(['like', 'port_name', $this->port_name]);

        return $dataProvider;
    }
}
