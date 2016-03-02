<?php

namespace backend\modules\masterdata\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\masterdata\models\Quotation;

/**
 * QuotationSearch represents the model behind the search form about `backend\modules\masterdata\models\Quotation`.
 */
class QuotationSearch extends Quotation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotationid', 'picto', 'picfrom', 'companyid', 'createby', 'updateby', 'active'], 'integer'],
            [['quotationtitle', 'quotationdate', 'senderreerence', 'createdate', 'updatedate', 'status'], 'safe'],
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
        $query = Quotation::find();

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
            'quotationid' => $this->quotationid,
            'picto' => $this->picto,
            'picfrom' => $this->picfrom,
            'companyid' => $this->companyid,
            'quotationdate' => $this->quotationdate,
            'createby' => $this->createby,
            'createdate' => $this->createdate,
            'updateby' => $this->updateby,
            'updatedate' => $this->updatedate,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'quotationtitle', $this->quotationtitle])
            ->andFilterWhere(['like', 'senderreerence', $this->senderreerence])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
