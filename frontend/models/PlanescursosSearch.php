<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Planescursos;

/**
 * PlanescursosSearch represents the model behind the search form about `app\models\Planescursos`.
 */
class PlanescursosSearch extends Planescursos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInstitucion', 'idEscuela', 'idCarrera', 'idPlanEstudio', 'idCurso', 'nivel', 'posOrden'], 'integer'],
            [['codigoCursoPlan', 'nombreCursoPlan'], 'safe'],
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
        $query = Planescursos::find();

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
            'idInstitucion' => $this->idInstitucion,
            'idEscuela' => $this->idEscuela,
            'idCarrera' => $this->idCarrera,
            'idPlanEstudio' => $this->idPlanEstudio,
            'idCurso' => $this->idCurso,
            'nivel' => $this->nivel,
            'posOrden' => $this->posOrden,
        ]);

        $query->andFilterWhere(['like', 'codigoCursoPlan', $this->codigoCursoPlan])
            ->andFilterWhere(['like', 'nombreCursoPlan', $this->nombreCursoPlan]);

        return $dataProvider;
    }
}
