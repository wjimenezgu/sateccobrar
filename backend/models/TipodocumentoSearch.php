<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tipodocumento;

/**
 * TipodocumentoSearch represents the model behind the search form about `backend\models\Tipodocumento`.
 */
class TipodocumentoSearch extends Tipodocumento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['descripcion', 'siglas', 'idDebiCredi'], 'safe'],
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
        $query = Tipodocumento::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('idDebiCredi0');

        $query->andFilterWhere([
            'id' => $this->id,
        //    'idDebiCredi' => $this->idDebiCredi,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'siglas', $this->siglas])
        	->andFilterWhere(['like', 'DebiCredi.descripcion', $this->idDebiCredi]);

        return $dataProvider;
    }
}
