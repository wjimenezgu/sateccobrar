<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Debicredi;

/**
 * DebicrediSearch represents the model behind the search form about `backend\models\Debicredi`.
 */
class DebicrediSearch extends Debicredi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'factor'], 'integer'],
            [['descripcion', 'simbolo'], 'safe'],
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
        $query = Debicredi::find();

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
            'id' => $this->id,
            'factor' => $this->factor,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'simbolo', $this->simbolo]);

        return $dataProvider;
    }
}
