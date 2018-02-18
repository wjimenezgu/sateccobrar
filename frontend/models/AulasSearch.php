<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aulas;

/**
 * AulasSearch represents the model behind the search form about `app\models\Aulas`.
 */
class AulasSearch extends Aulas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'idAula', 'capacidad'], 'integer'],
            [['descripcion', 'localizacion','idInstitucion', 'idSede', 'idTipoAula'], 'safe'],
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
        $query = Aulas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('idInstitucion0');
        $query->joinWith('idSede0');
        
        $query->andFilterWhere([
       //     'idInstitucion' => $this->idInstitucion,
       //     'idSede' => $this->idSede,
            'idAula' => $this->idAula,
            'capacidad' => $this->capacidad,
       //     'idTipoAula' => $this->idTipoAula,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
              ->andFilterWhere(['like', 'localizacion', $this->localizacion])
              ->andFilterWhere(['like', 'Instituciones.nombreInstitucion', $this->idInstitucion])
              ->andFilterWhere(['like', 'Sedes.nombreSede', $this->idSede]);

        return $dataProvider;
    }
}
