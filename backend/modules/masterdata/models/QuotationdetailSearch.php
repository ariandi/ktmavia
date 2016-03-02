<?php

namespace backend\modules\masterdata\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\masterdata\models\Quotationdetail;

/**
 * QuotationdetailSearch represents the model behind the search form about `backend\modules\masterdata\models\Quotationdetail`.
 */
class QuotationdetailSearch extends Quotationdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotationdetid', 'quotationid'], 'integer'],
            [['cost', 'status'], 'safe'],
            [['20ft', '40ft', '40hc', 'local_cost'], 'number'],
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
        $query = Quotationdetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             //$query->where('1='.$id);
            return $dataProvider;
        }

        $query->andFilterWhere([
            'quotationdetid' => $this->quotationdetid,
            'quotationid' => $this->quotationid,
            //'20ft' => $this->20ft,
            //'40ft' => $this->40ft,
            //'40hc' => $this->40hc,
            'local_cost' => $this->local_cost,
        ]);

        $query->andFilterWhere(['like', 'cost', $this->cost])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
