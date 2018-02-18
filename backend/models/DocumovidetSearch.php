<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Documovidet;

/**
 * DocumovidetSearch represents the model behind the search form about `backend\models\Documovidet`.
 */
class DocumovidetSearch extends Documovidet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'idDocAplica','idDocMaestro'], 'integer'],
            [['monto'], 'number'],
            [['fecIns', 'userIns','numDocMaestro','numDocAplica'], 'safe'],
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
        $query = Documovidet::find();
        
     //   $query->joinWith(['idDocMaestro0','idDocAplica0']);docuAplica
        
   //     $query->joinWith(['idDocMaestro0'])->joinWith(['idDocAplica0' => function($query) { $query->from(['docuAplica' => 'Documento']);}]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $this->load($params);
        
 //       $dataProvider->sort->attributes['numDocMaestro'] = [
        		// The tables are the ones our relation are configured to
        		// in my case they are prefixed with "tbl_"
 //       		'asc' => ['Documento.numero' => SORT_ASC],
 //       		'desc' => ['Documento.numero' => SORT_DESC],
 //       ];
        // Lets do the same with country now
  //      $dataProvider->sort->attributes['numDocAplica'] = [
  //      		'asc' => ['Documento.numero' => SORT_ASC],
  //      		'desc' => ['Documento.numero' => SORT_DESC],
  //      ];
        

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
       //     'id' => $this->id,
            'monto' => $this->monto,
            'fecIns' => $this->fecIns,
            'idDocMaestro' => $this->idDocMaestro,
        //    'idDocAplica' => $this->numDocAplica,
        ]);

        $query->andFilterWhere(['like', 'userIns', $this->userIns])
    //    	->andFilterWhere(['like', 'Documento.numero', $this->numDocMaestro])
    //		->andFilterWhere(['like', 'docuAplica.numero', $this->numDocAplica])
    ;

        return $dataProvider;
    }
}
