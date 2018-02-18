<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Planesestudio;

/**
 * PlanesestudioSearch represents the model behind the search form about `app\models\Planesestudio`.
 */
class PlanesestudioSearch extends Planesestudio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPlanEstudio', 'idModalidad'], 'integer'],
            [['nombrePlanEstudio', 'idInstitucionPlan', 'observaciones', 'fechaAprobacion', 'numSesionAprobacion','idInstitucion', 'idEscuela', 'idCarrera'], 'safe'],
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
        $query = Planesestudio::find();

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
        $query->joinWith('idCarrera0');

        $query->andFilterWhere([
          //  'idInstitucion' => $this->idInstitucion,
          //  'idEscuela' => $this->idEscuela,
          //  'idCarrera' => $this->idCarrera,
            'idPlanEstudio' => $this->idPlanEstudio,
            'idModalidad' => $this->idModalidad,
            'fechaAprobacion' => $this->fechaAprobacion,
        ]);

        $query->andFilterWhere(['like', 'nombrePlanEstudio', $this->nombrePlanEstudio])
            ->andFilterWhere(['like', 'idInstitucionPlan', $this->idInstitucionPlan])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'numSesionAprobacion', $this->numSesionAprobacion])
            ->andFilterWhere(['like', 'Instituciones.nombreInstitucion', $this->idInstitucion])
            ->andFilterWhere(['like', 'Escuelas.nombreEscuela', $this->idEscuela])
            ->andFilterWhere(['like', 'Carreras.nombreCarrera', $this->idCarrera])
        ;

        return $dataProvider;
    }
}
