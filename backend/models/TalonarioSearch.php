<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Talonario;

/**
 * TalonarioSearch represents the model behind the search form about `backend\models\Talonario`.
 */
class TalonarioSearch extends Talonario
{
	public $mensajero;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'numeroInicial',  'idMensajero', 'idEstadoTalonario'], 'integer'],
            [['descripcion', 'idCompania','numeroFinal','mensajero'], 'safe'],
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
        $query = Talonario::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['mensajero'] = [
        		// The tables are the ones our relation are configured to
        		// in my case they are prefixed with "tbl_"
        		'asc' => ['Mensajero.nombreCompleto' => SORT_ASC],
        		'desc' => ['Mensajero.nombreCompleto' => SORT_DESC],
        ];
        

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith(['idCompania0','idMensajero0']);

        
        $query->andFilterWhere([
            'id' => $this->id,
            'numeroInicial' => $this->numeroInicial,
       //     'idCompania' => $this->idCompania,
       //     'idMensajero' => $this->idMensajero,
            'idEstadoTalonario' => $this->idEstadoTalonario,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'numeroFinal', $this->numeroFinal])
        	->andFilterWhere(['like', 'Compania.nombre', $this->idCompania])
        	->andFilterWhere(['like', 'Mensajero.nombreCompleto', $this->mensajero])
        ;

        return $dataProvider;
    }
}
