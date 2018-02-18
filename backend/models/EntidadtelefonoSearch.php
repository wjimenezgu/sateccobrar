<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Entidadtelefono;

/**
 * EntidadtelefonoSearch represents the model behind the search form about `backend\models\Entidadtelefono`.
 */
class EntidadtelefonoSearch extends Entidadtelefono
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idEntidad', 'idTipoTelefono'], 'integer'],
            [['numero', 'observacion'], 'safe'],
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
        $query = Entidadtelefono::find();

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
            'idEntidad' => $this->idEntidad,
            'idTipoTelefono' => $this->idTipoTelefono,
        ]);

        $query->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
