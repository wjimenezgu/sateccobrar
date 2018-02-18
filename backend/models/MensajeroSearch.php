<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Mensajero;

/**
 * MensajeroSearch represents the model behind the search form about `backend\models\Mensajero`.
 */
class MensajeroSearch extends Mensajero
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombreCompleto', 'idCompania'], 'safe'],
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
        $query = Mensajero::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('idCompania0');

        $query->andFilterWhere([
            'id' => $this->id,
        //    'idCompania' => $this->idCompania,
        ]);

        $query->andFilterWhere(['like', 'nombreCompleto', $this->nombreCompleto])
        ->andFilterWhere(['like', 'Compania.nombre', $this->idCompania]);

        return $dataProvider;
    }
}
