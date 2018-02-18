<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carreras;

/**
 * CarrerasSearch represents the model behind the search form about `app\models\Carreras`.
 */
class CarrerasSearch extends Carreras
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'idCarrera'], 'integer'],
            [['nombreCarrera','idInstitucion','idEscuela','idGrado'], 'safe'],
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
        $query = Carreras::find();

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
        $query->joinWith('idGrado0');
        
        $query->andFilterWhere([
         //   'idInstitucion' => $this->idInstitucion,
         //   'idEscuela' => $this->idEscuela,
            'idCarrera' => $this->idCarrera,
         //   'idGrado' => $this->idGrado,
        ]);

        $query->andFilterWhere(['like', 'nombreCarrera', $this->nombreCarrera])
              ->andFilterWhere(['like', 'Instituciones.nombreInstitucion', $this->idInstitucion])
              ->andFilterWhere(['like', 'GradosAcademicos.nombreGrado', $this->idGrado]);
        

        return $dataProvider;
    }
}
