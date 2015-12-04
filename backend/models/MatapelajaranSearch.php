<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Matapelajaran;

/**
 * MatapelajaranSearch represents the model behind the search form about `app\models\Matapelajaran`.
 */
class MatapelajaranSearch extends Matapelajaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_matapelajaran', 'id_jurusan'], 'integer'],
            [['matapelajaran'], 'safe'],
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
        $query = Matapelajaran::find();

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
            'id_matapelajaran' => $this->id_matapelajaran,
            'id_jurusan' => $this->id_jurusan,
        ]);

        $query->andFilterWhere(['like', 'matapelajaran', $this->matapelajaran]);

        return $dataProvider;
    }
}
