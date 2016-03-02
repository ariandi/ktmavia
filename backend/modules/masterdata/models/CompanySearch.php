<?php

namespace backend\modules\masterdata\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\masterdata\models\Company;

/**
 * CompanySearch represents the model behind the search form about `backend\modules\masterdata\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companyid', 'active', 'informationid', 'createby', 'updateby'], 'integer'],
            [['companyname', 'phone', 'fax', 'email', 'deliveryaddress', 'invoiceaddress'], 'safe'],
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
        $query = Company::find();

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
            'companyid' => $this->companyid,
            'active' => $this->active,
            'informationid' => $this->informationid,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
        ]);

        $query->andFilterWhere(['like', 'companyname', $this->companyname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'deliveryaddress', $this->deliveryaddress])
            ->andFilterWhere(['like', 'invoiceaddress', $this->invoiceaddress]);

        return $dataProvider;
    }
}
