<?php

namespace app\models;

use app\models\Nilai;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\web\NotFoundHttpException;

/**
 * NilaiSearch represents the model behind the search form about `app\models\Nilai`.
 */
class NilaiSearch extends Nilai {
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id_nilai', 'id_matapelajaran'], 'integer'],
			[['nis', 'tahun_ajaran'], 'safe'],
			[['nilai'], 'number'],
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

	public function sqlLaporanNilai() {
		$nip = null;
		if (Yii::$app->user->identity->level == 'guru') {
			$nip = Data::nip_guru();

		}
		if (empty($nip)) {
			throw new NotFoundHttpException('Maaf Anda Tidak Diizinkan untuk mengakses halaman ini.');
		}
		$query = "SELECT n.`id_nilai`,n.`nis`,s.`id_kelas` ,concat(`k`.`kelas`, `k`.`sub_kls`) AS `kelas`
                        ,s.`nama`,mp.`matapelajaran`,n.`nilai` FROM
                        nilai n JOIN matapelajaran_guru mg ON n.`id_matapelajaran`=mg.`id_matapelajaran_guru`
                        JOIN guru g ON mg.nip=g.`nip`
                        JOIN siswa s ON s.`nis`=n.`nis`
                        JOIN matapelajaran mp ON mp.`id_matapelajaran`=mg.`id_matapelajaran`
                        join kelas k on k.id_kelas=s.id_kelas
                        WHERE g.nip='$nip'";

		$count = Yii::$app->db->createCommand($query)->queryScalar();
		$dataProvider = new SqlDataProvider([
			'sql' => $query,
			'totalCount' => (int) $count,
			'pagination' => [
				'pagesize' => 100,
			],
		]);

		return $dataProvider;
	}

	public function sqlWaliKelas() {
		$nip = null;
		if (Yii::$app->user->identity->level == 'guru') {
			$nip = Data::nip_guru();
		}
		if (empty($nip)) {
			throw new NotFoundHttpException('Maaf Anda Tidak Diizinkan untuk mengakses halaman ini.');
		}
		$walikelas = Data::isWaliKelas();
		if (empty($walikelas)) {
			throw new NotFoundHttpException('Maaf Anda Tidak Diizinkan untuk mengakses halaman ini.');
		}
		if (empty($walikelas['id_kelas'])) {
			throw new NotFoundHttpException('Maaf Anda Tidak Diizinkan untuk mengakses halaman ini.');
		}
		$query = "SELECT n.`id_nilai`,n.`nis`,s.`id_kelas` ,concat(`k`.`kelas`, `k`.`sub_kls`) AS `kelas`
                        ,s.`nama`,mp.`matapelajaran`,n.`nilai` FROM
                        nilai n JOIN matapelajaran_guru mg ON n.`id_matapelajaran`=mg.`id_matapelajaran_guru`
                        JOIN guru g ON mg.nip=g.`nip`
                        JOIN siswa s ON s.`nis`=n.`nis`
                        JOIN matapelajaran mp ON mp.`id_matapelajaran`=mg.`id_matapelajaran`
                        join kelas k on k.id_kelas=s.id_kelas
                        WHERE k.id_kelas=" . $walikelas['id_kelas'];

		$count = Yii::$app->db->createCommand($query)->queryScalar();
		$dataProvider = new SqlDataProvider([
			'sql' => $query,
			'totalCount' => (int) $count,
			'pagination' => [
				'pagesize' => 100,
			],
		]);

		return $dataProvider;
	}

}
