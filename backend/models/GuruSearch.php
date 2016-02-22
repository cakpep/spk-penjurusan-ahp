<?php

namespace app\models;

use app\models\Guru;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * GuruSearch represents the model behind the search form about `app\models\Guru`.
 */
class GuruSearch extends Guru {
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['wali_kelas', 'nip', 'password', 'nama', 'alamat', 'agama', 'email', 'jns_kelamin', 'tempat_lahir', 'tgl_lahir', 'no_telp', 'foto'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios() {
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
	public function search($params) {
		$query = Guru::find();

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
			'tgl_lahir' => $this->tgl_lahir,
		]);
		$query->andFilterWhere([
			'wali_kelas' => $this->wali_kelas,
		]);

		$query->andFilterWhere(['like', 'nip', $this->nip])
			->andFilterWhere(['like', 'password', $this->password])
			->andFilterWhere(['like', 'nama', $this->nama])
			->andFilterWhere(['like', 'alamat', $this->alamat])
			->andFilterWhere(['like', 'agama', $this->agama])
			->andFilterWhere(['like', 'email', $this->email])
			->andFilterWhere(['like', 'jns_kelamin', $this->jns_kelamin])
			->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
			->andFilterWhere(['like', 'no_telp', $this->no_telp])
			->andFilterWhere(['like', 'foto', $this->foto]);

		return $dataProvider;
	}
}
