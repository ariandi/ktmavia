<?php

namespace backend\modules\airexport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\airexport\models\Creditnotedet;

/**
 * CreditnotedetSearch represents the model behind the search form about `backend\modules\airexport\models\Creditnotedet`.
 */
class CreditnotedetSearch extends Creditnotedet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['creditnotedet_id', 'creditnote_id', 'insert_by', 'update_by', 'active'], 'integer'],
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
        $query = Creditnotedet::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['creditnotedet_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'creditnotedet_id' => $this->creditnotedet_id,
            'creditnote_id' => $this->creditnote_id,
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
