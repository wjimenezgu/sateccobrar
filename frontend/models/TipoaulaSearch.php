<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tipoaula;

/**
 * TipoaulaSearch represents the model behind the search form about `app\models\Tipoaula`.
 */
class TipoaulaSearch extends Tipoaula
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoAula'], 'integer'],
            [['descTipoAula', 'idInstitucion'], 'safe'],
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
        $query = Tipoaula::find();

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
            'idTipoAula' => $this->idTipoAula,
          //  'idInstitucion' => $this->idInstitucion,
        ]);

        $query->andFilterWhere(['like', 'descTipoAula', $this->descTipoAula])
              ->andFilterWhere(['like', 'Instituciones.nombreInstitucion', $this->idInstitucion]);
        return $dataProvider;
    }
}
