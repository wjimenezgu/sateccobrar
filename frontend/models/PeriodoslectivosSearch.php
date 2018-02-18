<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Periodoslectivos;

/**
 * PeriodoslectivosSearch represents the model behind the search form about `app\models\Periodoslectivos`.
 */
class PeriodoslectivosSearch extends Periodoslectivos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        //    [['idModalidad'], 'integer'],
            [['idPeriodoLectivo', 'fecIniPeriodoNatu', 'fecFinPeriodoNatu', 'fechaInicioPeriodo', 'fechaFinPeriodo','idModalidad'], 'safe'],
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
        $query = Periodoslectivos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith('idModalidad0');

        $query->andFilterWhere([
           // 'idModalidad' => $this->idModalidad,
            'fecIniPeriodoNatu' => $this->fecIniPeriodoNatu,
            'fecFinPeriodoNatu' => $this->fecFinPeriodoNatu,
            'fechaInicioPeriodo' => $this->fechaInicioPeriodo,
            'fechaFinPeriodo' => $this->fechaFinPeriodo,
        ]);

        $query->andFilterWhere(['like', 'idPeriodoLectivo', $this->idPeriodoLectivo])
              ->andFilterWhere(['like', 'Modalidad.descModalidad', $this->idModalidad]);;

        return $dataProvider;
    }
}
