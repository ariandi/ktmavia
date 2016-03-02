<?php

namespace backend\modules\masterdata\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\masterdata\models\Companyinfo;

/**
 * CompanyinfoSearch represents the model behind the search form about `backend\modules\masterdata\models\Companyinfo`.
 */
class CompanyinfoSearch extends Companyinfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['informationid'], 'integer'],
            [['informationname'], 'safe'],
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
        $query = Companyinfo::find();

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
            'informationid' => $this->informationid,
        ]);

        $query->andFilterWhere(['like', 'informationname', $this->informationname]);

        return $dataProvider;
    }
}
