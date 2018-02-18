<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Anulacion;

/**
 * AnulacionSearch represents the model behind the search form about `backend\models\Anulacion`.
 */
class AnulacionSearch extends Anulacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','idEstadoDocumento','idMoneda'], 'integer'],
            [['numero', 'fecha', 'observacion', 'fecIns', 'userIns', 'idCliProCia','idTipoDocumento','fecVence', 'fecMod', 'userMod'], 'safe'],
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
        $query = Anulacion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('idTipoDocumento0');
        $query->joinWith('idCliProCia0');        

        $query->andFilterWhere([
            'id' => $this->id,
       //     'idTipoDocumento' => $this->idTipoDocumento,
            'fecha' => $this->fecha,
            'monto' => $this->monto,
            'idEstadoDocumento' => $this->idEstadoDocumento,
            'fecIns' => $this->fecIns,
            'saldo' => $this->saldo,
       //     'idCliProCia' => $this->idCliProCia,
            'idMoneda' => $this->idMoneda,        	
        ]);

        $query->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'userIns', $this->userIns])
        	->andFilterWhere(['like', 'TipoDocumento.siglas', $this->idTipoDocumento])
            ->andFilterWhere(['like', 'CliProCia.nombre', $this->idCliProCia]);

        return $dataProvider;
    }
}
