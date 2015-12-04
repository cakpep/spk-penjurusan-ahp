<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nilai;

/**
 * NilaiSearch represents the model behind the search form about `app\models\Nilai`.
 */
class NilaiSearch extends Nilai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nilai', 'id_matapelajaran'], 'integer'],
            [['nis', 'tahun_ajaran'], 'safe'],
            [['nilai'], 'number'],
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
        $query = Nilai::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // if(Yii::$app->user->identity->level=='guru'){
        //     $nip = app\model\Data::nip_guru();

        // }
        $query->andFilterWhere([
            'id_nilai' => $this->id_nilai,
            'id_matapelajaran' => $this->id_matapelajaran,
            'nilai' => $this->nilai,
        ]);

        $query->andFilterWhere(['like', 'nis', $this->nis])
            ->andFilterWhere(['like', 'tahun_ajaran', $this->tahun_ajaran]);

        return $dataProvider;
    }
}
