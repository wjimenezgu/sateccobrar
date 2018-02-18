<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gradosacademicos;

/**
 * GradosacademicosSearch represents the model behind the search form about `app\models\Gradosacademicos`.
 */
class GradosacademicosSearch extends Gradosacademicos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idGrado'], 'integer'],
            [['nombreGrado', 'siglasGrado','idInstitucion'], 'safe'],
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
        $query = Gradosacademicos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('idInstitucion0');
        
        $query->andFilterWhere([
            'idGrado' => $this->idGrado,
        ]);

        $query->andFilterWhere(['like', 'nombreGrado', $this->nombreGrado])
            ->andFilterWhere(['like', 'siglasGrado', $this->siglasGrado])
            ->andFilterWhere(['like', 'Instituciones.nombreInstitucion', $this->idInstitucion]);

        return $dataProvider;
    }
}
