<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kriteria;

/**
 * KriteriaSearch represents the model behind the search form about `app\models\Kriteria`.
 */
class KriteriaSearch extends Kriteria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kriteria', 'prioritas'], 'safe'],
            [['id_jurusan', 'bobot'], 'integer'],
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
        $query = Kriteria::find();

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
            'id_jurusan' => $this->id_jurusan,
            'bobot' => $this->bobot,
        ]);

        $query->andFilterWhere(['like', 'id_kriteria', $this->id_kriteria])
            ->andFilterWhere(['like', 'prioritas', $this->prioritas]);

        return $dataProvider;
    }
}
