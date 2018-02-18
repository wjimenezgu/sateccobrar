<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Instituciones;

/**
 * InstitucionesSearch represents the model behind the search form about `app\models\Instituciones`.
 */
class InstitucionesSearch extends Instituciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombreInstitucion','idTipoInstitucion'], 'safe'],
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
        $query = Instituciones::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('idTipoInstitucion0');
        
        $query->andFilterWhere([
            'id' => $this->id,
            //'idTipoInstitucion' => $this->idTipoInstitucion,
        ]);

        $query->andFilterWhere(['like', 'nombreInstitucion', $this->nombreInstitucion])
        	  ->andFilterWhere(['like', 'TipoInstitucion.descripcion', $this->idTipoInstitucion]);

        return $dataProvider;
    }
}
