<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MatapelajaranGuru;

/**
 * MatapelajaranGuruSearch represents the model behind the search form about `app\models\MatapelajaranGuru`.
 */
class MatapelajaranGuruSearch extends MatapelajaranGuru
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_matapelajaran_guru', 'id_matapelajaran', 'id_kelas'], 'integer'],
            [['nip', 'sub_kls1', 'sub_kls2', 'sub_kls3', 'sub_kls4', 'sub_kls5', 'sub_kls6'], 'safe'],
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
        $query = MatapelajaranGuru::find();

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
            'id_matapelajaran_guru' => $this->id_matapelajaran_guru,
            'id_matapelajaran' => $this->id_matapelajaran,
            'id_kelas' => $this->id_kelas,
        ]);

        $query->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'sub_kls1', $this->sub_kls1])
            ->andFilterWhere(['like', 'sub_kls2', $this->sub_kls2])
            ->andFilterWhere(['like', 'sub_kls3', $this->sub_kls3])
            ->andFilterWhere(['like', 'sub_kls4', $this->sub_kls4])
            ->andFilterWhere(['like', 'sub_kls5', $this->sub_kls5])
            ->andFilterWhere(['like', 'sub_kls6', $this->sub_kls6]);

        return $dataProvider;
    }
}
