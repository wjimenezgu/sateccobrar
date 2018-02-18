<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cliprocia;

/**
 * CliprociaSearch represents the model behind the search form about `backend\models\Cliprocia`.
 */
class CliprociaSearch extends Cliprocia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre', 'idCompania', 'idCliPro'], 'safe'],
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
        $query = Cliprocia::find();

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
            'idCliPro' => $this->idCliPro,
         //   'idCompania' => $this->idCompania,
        ]);

        $query->andFilterWhere(['like', 'CliProCia.nombre', $this->nombre])
            ->andFilterWhere(['like', 'Compania.nombre', $this->idCompania]);

        return $dataProvider;
    }
}
