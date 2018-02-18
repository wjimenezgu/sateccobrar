<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Documento;

/**
 * DocumentoSearch represents the model behind the search form about `backend\models\Documento`.
 */
class FacturaSearch extends Documento
{	/** your calculated attribute */
	public $antiguedad;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'idEstadoDocumento',  'idMoneda'], 'integer'],
            [['numero', 'fecha', 'observacion', 'fecIns', 'userIns','idCliProCia','idTipoDocumento','fecVence'], 'safe'],
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
        $query = Documento::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        
        $dataProvider->setSort([
        		'attributes'=>[
        				'numero',
        				'idTipoDocumento',
        				'fecVence',
        				'fecha',
        				'monto',
        				'saldo',
        				'idCliProCia',
        				'antiguedad'=>[
                'asc'=>['fecVence'=>SORT_ASC],
                'desc'=>['fecVence'=>SORT_DESC],
                'label'=>'Antgüedad',
                'default'=>SORT_ASC
            ],
        						]
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
            'idTipoDocumento' => 1, // solo facturas
       //     'fecha' => $this->fecha,
            'monto' => $this->monto,
            'idEstadoDocumento' => $this->idEstadoDocumento,
            'fecIns' => $this->fecIns,
            'saldo' => $this->saldo,
        	'antiguedad' => $this->antiguedad,
       //     'idCliProCia' => $this->idCliProCia,
            'idMoneda' => $this->idMoneda,  
        	'antiguedad' => $this->antiguedad,     	
        ]);

        
        $query->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'DATE_FORMAT(fecha, "%d/%m/%Y")',$this->fecha])
            ->andFilterWhere(['like', 'DATE_FORMAT(fecVence, "%d/%m/%Y")',$this->fecVence])
            ->andFilterWhere(['like', 'userIns', $this->userIns])
    //    	->andFilterWhere(['like', 'TipoDocumento.siglas', $this->idTipoDocumento])
            ->andFilterWhere(['like', 'CliProCia.nombre', $this->idCliProCia]);

        return $dataProvider;
    }
}
