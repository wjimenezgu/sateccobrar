<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Modalidad;

/**
 * ModalidadSearch represents the model behind the search form about `app\models\Modalidad`.
 */
class ModalidadSearch extends Modalidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idModalidad', 'cantMeses', 'anioInicioPeriodo', 'ultAnioGenPeriodo'], 'integer'],
            [['descModalidad', 'descBloquePlan','idInstitucion'], 'safe'],
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
        $query = Modalidad::find();

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
        

        $query->andFilterWhere([
            'idModalidad' => $this->idModalidad,
            'cantMeses' => $this->cantMeses,
            'anioInicioPeriodo' => $this->anioInicioPeriodo,
            'ultAnioGenPeriodo' => $this->ultAnioGenPeriodo,
        ]);

        $query->andFilterWhere(['like', 'descModalidad', $this->descModalidad])
            ->andFilterWhere(['like', 'descBloquePlan', $this->descBloquePlan])
        	->andFilterWhere(['like', 'Instituciones.nombreInstitucion', $this->idInstitucion]);

        return $dataProvider;
    }
}
