<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cliprocuenta;

/**
 * CliprocuentaSearch represents the model behind the search form about `backend\models\Cliprocuenta`.
 */
class CliprocuentaSearch extends Cliprocuenta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idBanco', 'idMoneda', 'idCliPro'], 'integer'],
            [['cuentaCliente', 'cuenta'], 'safe'],
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
        $query = Cliprocuenta::find();

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
            'idBanco' => $this->idBanco,
            'idMoneda' => $this->idMoneda,
            'idCliPro' => $this->idCliPro,
        ]);

        $query->andFilterWhere(['like', 'cuentaCliente', $this->cuentaCliente])
            ->andFilterWhere(['like', 'cuenta', $this->cuenta]);

        return $dataProvider;
    }
}
