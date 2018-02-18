<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Estadocuenta;

/**
 * EstadocuentaSearch represents the model behind the search form about `backend\models\Estadocuenta`.
 */
class EstadocuentaSearch extends Estadocuenta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idCliPro', 'idCompania', 'plazoPagCob'], 'integer'],
            [['nombre', 'obsEstadoCliPro', 'fecModEstadoCliPro', 'idTipoCliPro', 'idEstadoCliPro'], 'safe'],
            [['limitePagCob'], 'number'],
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
        $query = Estadocuenta::find();

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
       //     'idCliPro' => $this->idCliPro,
            'idCompania' => $this->idCompania,
            'plazoPagCob' => $this->plazoPagCob,
            'limitePagCob' => $this->limitePagCob,
       //     'idTipoCliPro' => $this->idTipoCliPro,
       //     'idEstadoCliPro' => $this->idEstadoCliPro,
            'fecModEstadoCliPro' => $this->fecModEstadoCliPro,
        ]);
        $query->joinWith('idTipoCliPro0');
        $query->joinWith('idEstadoCliPro0');
        $query->joinWith('idCliPro0');
        
        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'obsEstadoCliPro', $this->obsEstadoCliPro])
         	->andFilterWhere(['like', 'TipoCliPro.descripcion', $this->idTipoCliPro])
         	->andFilterWhere(['like', 'CliPro.idEntidad', $this->idCliPro])
            ->andFilterWhere(['like', 'EstadoCliPro.descripcion', $this->idEstadoCliPro]);

        return $dataProvider;
    }
}
