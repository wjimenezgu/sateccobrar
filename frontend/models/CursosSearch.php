<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cursos;

/**
 * CursosSearch represents the model behind the search form about `app\models\Cursos`.
 */
class CursosSearch extends Cursos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'idCurso', 'creditos'], 'integer'],
            [['codigoCurso', 'nombreCurso','idInstitucion', 'idEscuela'], 'safe'],
            [['horas'], 'number'],
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
        $query = Cursos::find();

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
        $query->joinWith('idEscuela0');

        $query->andFilterWhere([
          //  'idInstitucion' => $this->idInstitucion,
          //  'idEscuela' => $this->idEscuela,
            'idCurso' => $this->idCurso,
            'creditos' => $this->creditos,
            'horas' => $this->horas,
        ]);

        $query->andFilterWhere(['like', 'codigoCurso', $this->codigoCurso])
              ->andFilterWhere(['like', 'nombreCurso', $this->nombreCurso])
        	  ->andFilterWhere(['like', 'Instituciones.nombreInstitucion', $this->idInstitucion])
              ->andFilterWhere(['like', 'Escuelas.nombreEscuela', $this->idEscuela]);

        return $dataProvider;
    }
}
