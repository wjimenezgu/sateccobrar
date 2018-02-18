<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cliprotrampagcob;

/**
 * CliprotrampagcobSearch represents the model behind the search form about `backend\models\Cliprotrampagcob`.
 */
class CliprotrampagcobSearch extends Cliprotrampagcob
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idCliPro', 'idDia', 'idTramitePagCob'], 'integer'],
            [['horaInicia', 'horaFin'], 'safe'],
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
        $query = Cliprotrampagcob::find();

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
            'idCliPro' => $this->idCliPro,
            'idDia' => $this->idDia,
            'idTramitePagCob' => $this->idTramitePagCob,
            'horaInicia' => $this->horaInicia,
            'horaFin' => $this->horaFin,
        ]);

        return $dataProvider;
    }
}
