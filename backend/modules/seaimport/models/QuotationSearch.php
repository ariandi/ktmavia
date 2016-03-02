<?php

namespace backend\modules\seaimport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\seaimport\models\Quotation;

/**
 * QuotationSearch represents the model behind the search form about `backend\modules\seaimport\models\Quotation`.
 */
class QuotationSearch extends Quotation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotationid', 'createby', 'updateby', 'active', 'kindofexport'], 'integer'],
            [['quotationtitle', 'quotationdate', 'senderreerence', 'createdate', 'updatedate', 'status', 'portofloading', 'freightageofpayment', 'commodity', 'termofshipment', 'validdate', 'termofpayment', 'picto', 'picfrom', 'companyid'], 'safe'],
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
			'sort'=> ['defaultOrder' => ['quotationid'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('company');
        $query->joinWith('topic');
        $query->joinWith([
                            'frompic' => function ($query) {
                                $query->from('user us');
                            },
                        ]);

        $query->andFilterWhere([
            'quotationid' => $this->quotationid,
            //'picto' => $this->picto,
            //'picfrom' => $this->picfrom,
            //'companyid' => $this->companyid,
            'quotationdate' => $this->quotationdate,
            'createby' => $this->createby,
            'createdate' => $this->createdate,
            'updateby' => $this->updateby,
            'updatedate' => $this->updatedate,
            'quotation.active' => 1,
            'validdate' => $this->validdate,
            'quotation.kindofexport' => 2,
        ]);

        $query->andFilterWhere(['like', 'quotationtitle', $this->quotationtitle])
            ->andFilterWhere(['like', 'senderreerence', $this->senderreerence])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'portofloading', $this->portofloading])
            ->andFilterWhere(['like', 'freightageofpayment', $this->freightageofpayment])
            ->andFilterWhere(['like', 'commodity', $this->commodity])
            ->andFilterWhere(['like', 'termofshipment', $this->termofshipment])
            ->andFilterWhere(['like', 'concat(user.FirstName," ", user.LastName)', $this->picto])
            ->andFilterWhere(['like', 'concat(us.FirstName," ", us.LastName)', $this->picfrom])
            ->andFilterWhere(['like', 'company.companyname', $this->companyid])
            ->andFilterWhere(['like', 'termofpayment', $this->termofpayment]);

        return $dataProvider;
    }
}
