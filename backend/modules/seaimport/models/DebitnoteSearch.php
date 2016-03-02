<?php

namespace backend\modules\seaimport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\seaimport\models\Debitnote;

/**
 * DebitnoteSearch represents the model behind the search form about `backend\modules\seaimport\models\Debitnote`.
 */
class DebitnoteSearch extends Debitnote
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['debitnote_id', 'bl_id', 'companyid', 'insert_by', 'update_by', 'active', 'invoice_id', 'kindofexport'], 'integer'],
            [['invoice_no', 'invoice_date', 'due_date', 'term', 'insert_date', 'update_date', 'sign', 'status', 'jobs_id'], 'safe'],
            [['tot_amount'], 'number'],
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
        $query = Debitnote::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['debitnote_id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->joinWith('jobsheetinfo');


        $query->andFilterWhere([
            'debitnote_id' => $this->debitnote_id,
            'invoice_date' => $this->invoice_date,
            //'jobs_id' => $this->jobs_id,
            'bl_id' => $this->bl_id,
            'due_date' => $this->due_date,
            'tot_amount' => $this->tot_amount,
            'companyid' => $this->companyid,
            'insert_by' => $this->insert_by,
            'insert_date' => $this->insert_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
            'debitnote.active' => 1,
            'invoice_id' => $this->invoice_id,
            'debitnote.kindofexport' => 2,
        ]);

        $query->andFilterWhere(['like', 'invoice_no', $this->invoice_no])
            ->andFilterWhere(['like', 'term', $this->term])
            ->andFilterWhere(['like', 'sign', $this->sign])
            ->andFilterWhere(['like', 'company.companyname', $this->jobs_id])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
