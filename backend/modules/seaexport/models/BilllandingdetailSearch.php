<?php

namespace backend\modules\seaexport\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\seaexport\models\Billlandingdetail;

/**
 * BilllandingdetailSearch represents the model behind the search form about `backend\modules\seaexport\models\Billlandingdetail`.
 */
class BilllandingdetailSearch extends Billlandingdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bl_det_id', 'bl_id'], 'integer'],
            [['container_seal_no', 'kind_of_package_desc_goods', 'weight', 'measurement', 'total_container'], 'safe'],
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
    public function search($params, $bl_id = null)
    {
        $query = Billlandingdetail::find();

        if($bl_id !== null) {
            $this->bl_id = $bl_id;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['bl_det_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'bl_det_id' => $this->bl_det_id,
            'bl_id' => $this->bl_id,
        ]);

        $query->andFilterWhere(['like', 'container_seal_no', $this->container_seal_no])
            ->andFilterWhere(['like', 'kind_of_package_desc_goods', $this->kind_of_package_desc_goods])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'measurement', $this->measurement])
            ->andFilterWhere(['like', 'total_container', $this->total_container]);

        return $dataProvider;
    }
}
