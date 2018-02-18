<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Docu;

/**
 * DocuSearch represents the model behind the search form about `backend\models\Docu`.
 */
class DocuSearch extends Docu
{
	public $montoAplica;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idTipoDocumento', 'idEstadoDocumento', 'idCliProCia', 'idMoneda'], 'integer'],
            [['numero', 'fecha', 'observacion', 'fecIns', 'userIns', 'fecVence', 'fecMod', 'userMod'], 'safe'],
            [['monto', 'saldo'], 'number'],
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
        $query = Docu::find();

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
            'idTipoDocumento' => $this->idTipoDocumento,
            'fecha' => $this->fecha,
            'monto' => $this->monto,
            'idEstadoDocumento' => $this->idEstadoDocumento,
            'fecIns' => $this->fecIns,
            'saldo' => $this->saldo,
            'idCliProCia' => $this->idCliProCia,
            'idMoneda' => $this->idMoneda,
            'fecVence' => $this->fecVence,
            'fecMod' => $this->fecMod,
        	
        ]);

        $query->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'userIns', $this->userIns])
            ->andFilterWhere(['like', 'userMod', $this->userMod]);

        return $dataProvider;
    }
}
