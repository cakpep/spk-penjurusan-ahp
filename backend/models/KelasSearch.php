<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kelas;

/**
 * KelasSearch represents the model behind the search form about `app\models\Kelas`.
 */
class KelasSearch extends Kelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelas'], 'integer'],
            [['kelas', 'sub_kls'], 'safe'],
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
        $query = Kelas::find();

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
            'id_kelas' => $this->id_kelas,
        ]);

        $query->andFilterWhere(['like', 'kelas', $this->kelas])
            ->andFilterWhere(['like', 'sub_kls', $this->sub_kls]);

        return $dataProvider;
    }
}
