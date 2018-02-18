<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Detalle;

/**
 * DetalleSearch represents the model behind the search form about `backend\models\Detalle`.
 */
class DetalleSearch extends Detalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDetalle', 'idMaestro', 'idAplica'], 'integer'],
            [['monto'], 'number'],
            [['fecAplica', 'observacion'], 'safe'],
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
        $query = Detalle::find();

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
            'idDetalle' => $this->idDetalle,
            'idMaestro' => $this->idMaestro,
            'idAplica' => $this->idAplica,
            'monto' => $this->monto,
            'fecAplica' => $this->fecAplica,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
