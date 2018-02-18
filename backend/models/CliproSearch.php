<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Clipro;

/**
 * CliproSearch represents the model behind the search form about `backend\models\Clipro`.
 */
class CliproSearch extends Clipro
{
	
	/* your calculated attribute */
	public $cliProNombre;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'idTipoSistema'], 'integer'],
        	[['idEntidad','cliProNombre'], 'safe'],
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
        $query = Clipro::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith('idEntidad0');

        $query->andFilterWhere([
            'id' => $this->id,
       //     'idEntidad' => $this->idEntidad,
            'idTipoSistema' => $this->idTipoSistema,
        ]);
        
        $query->andFilterWhere(['like', 'Entidad.nombre', $this->idEntidad]);
        
        

        return $dataProvider;
    }
}
