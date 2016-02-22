<?php

namespace app\models;

use app\models\NilaiPembobotanKriteria;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;

/**
 * NilaiPembobotanKriteriaSearch represents the model behind the search form about `app\models\Nilai`.
 */
class NilaiPembobotanKriteriaSearch extends NilaiPembobotanKriteria {
	/**
	 * @inheritdoc
	 */
	public function rules() {
		// return [
		//     [['id_nilai', 'id_matapelajaran'], 'integer'],
		//     [['nis', 'tahun_ajaran'], 'safe'],
		//     [['nilai'], 'number'],
		// ];
		return [
			[['nis', 'nama', 'penjurusan', 'minat', 'psikotes'], 'safe'],
			[['nilai', 'bobot_nilai', 'bobot_minat', 'bobot_psikotes'], 'number'],
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
		$query = NilaiPembobotanKriteria::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// $query->andFilterWhere([
		//     'id_nilai' => $this->id_nilai,
		//     'id_matapelajaran' => $this->id_matapelajaran,
		//     'nilai' => $this->nilai,
		// ]);

		// $query->andFilterWhere(['like', 'nis', $this->nis])
		//     ->andFilterWhere(['like', 'tahun_ajaran', $this->tahun_ajaran]);

		return $dataProvider;
	}

	public static function laporan() {
		$connection = \Yii::$app->db;
		$query = "    SELECT
                    ti.`id`,
                    ti.`transaksi_id`,
                    left(t.tanggal,7) as bulan,
                    p.`nama`,
                    ti.`diskon`,
                    ((ti.`diskon`/100)* ti.`subtotal`) as pot_diskon,
                    sum(ti.`jumlah`) as jumlah,
                    sum(ti.`jumlah`*(ti.`subtotal`-COALESCE(((ti.`diskon`/100)* ti.`subtotal`),0))) as subtotal
                    FROM
                    transaksi_item ti left JOIN produk p ON ti.`produk_id`=p.`id`
                    JOIN transaksi t on t.id=ti.transaksi_id
                    GROUP by left(t.tanggal,7) # ti.transaksi_id
                    order by ti.transaksi_id";
		$model = $connection->createCommand($query);
		$data = $model->queryAll();

		return $data;

	}

	public function sqlLaporan() {
		$username = Yii::$app->user->identity->username;
		$connection = \Yii::$app->db;
		$query = "SELECT  *  FROM siswa where email='$username';";
		$model = $connection->createCommand($query);
		$data = $model->queryAll();

		$query = "SELECT
                nis,nama,kelas,minat,psikotes,
                -- group_concat(penjurusan) as penjurusan,
                group_concat(penjurusan) as penjurusan,
                 group_concat(bobot_nilai) as nilai_bobot,
                 concat(minat,'<br>',bobot_minat) as nilai_bobot_minat,
                 concat(minat,'<br>',bobot_psikotes) as nilai_bobot_psikotes,
                 group_concat((bobot_nilai+bobot_minat+bobot_psikotes)) AS total,
                 group_concat(penjurusan,'=',(bobot_nilai+bobot_minat+bobot_psikotes)) AS keputusan
             FROM nilai_pembobotan_kriteria where id_kelas=" . $data[0]['id_kelas'] . " group by nis ORDER BY penjurusan  DESC";

		$dataProvider = new SqlDataProvider([
			'sql' => $query,
			// 'params' => [':tanggal' => $tanggal],
		]);
		return $dataProvider;
	}

	public function cariNilaiMax($nis) {
		$connection = \Yii::$app->db;
		$query = "SELECT
                      -- `n`.`nis`       AS `nis`,
                      -- `s`.`nama`      AS `nama`,
                      -- CONCAT(`k`.`kelas`,`k`.`sub_kls`) AS `kelas`,
                      ROUND(SUM(n.nilai)/COUNT(n.nilai),2) nilai,
                      `j`.`jurusan`   AS `penjurusan`
                      -- `mp`.`minat`    AS `minat`,
                      -- `mp`.`psikotes` AS `psikotes`

                    FROM ((((((`nilai` `n`
                            JOIN `matapelajaran_guru` `mg`
                              ON ((`n`.`id_matapelajaran` = `mg`.`id_matapelajaran_guru`)))
                           JOIN `matapelajaran` `m`
                             ON ((`m`.`id_matapelajaran` = `mg`.`id_matapelajaran`)))
                          JOIN `jurusan` `j`
                            ON ((`j`.`id_jurusan` = `m`.`id_jurusan`)))
                         JOIN `siswa` `s`
                           ON ((`s`.`nis` = `n`.`nis`)))
                        JOIN `kelas` `k`
                          ON ((`k`.`id_kelas` = `s`.`id_kelas`)))
                       JOIN `minat_psikotes` `mp`
                         ON ((`mp`.`nis` = `n`.`nis`)))
                    where n.nis='$nis'
                    GROUP BY j.`id_jurusan`,n.`nis`
                    ORDER BY n.`nis`";

		$model = $connection->createCommand($query);
		$data = $model->queryAll();
		return $data;
	}

	public function cariNilaiMax_backup($nis) {
		$connection = \Yii::$app->db;
		$query = "SELECT
                      `n`.`nis`       AS `nis`,
                      `s`.`nama`      AS `nama`,
                      CONCAT(`k`.`kelas`,`k`.`sub_kls`) AS `kelas`,
                      `j`.`jurusan`   AS `penjurusan`,
                      ROUND(SUM(n.nilai)/COUNT(n.nilai),2) nilai,
                      `mp`.`minat`    AS `minat`,
                      `mp`.`psikotes` AS `psikotes`

                    FROM ((((((`nilai` `n`
                            JOIN `matapelajaran_guru` `mg`
                              ON ((`n`.`id_matapelajaran` = `mg`.`id_matapelajaran_guru`)))
                           JOIN `matapelajaran` `m`
                             ON ((`m`.`id_matapelajaran` = `mg`.`id_matapelajaran`)))
                          JOIN `jurusan` `j`
                            ON ((`j`.`id_jurusan` = `m`.`id_jurusan`)))
                         JOIN `siswa` `s`
                           ON ((`s`.`nis` = `n`.`nis`)))
                        JOIN `kelas` `k`
                          ON ((`k`.`id_kelas` = `s`.`id_kelas`)))
                       JOIN `minat_psikotes` `mp`
                         ON ((`mp`.`nis` = `n`.`nis`)))
                    GROUP BY j.`id_jurusan`,n.`nis`
                    ORDER BY n.`nis`";

		$model = $connection->createCommand($query);
		$data = $model->queryAll();
		return $data;
	}

	public function prioritas() {
		$connection = \Yii::$app->db;
		$query = "SELECT  jurusan  FROM jurusan";
		$model = $connection->createCommand($query);
		$data = $model->queryAll();
		return $data;
	}

	public function kriteria($kr, $jr) {
		$connection = \Yii::$app->db;
		$query = "SELECT
                        k.prioritas,j.jurusan ,k.bobot,k.prioritas_sub as bn,
                        (SELECT  round(p.bobot,2)  FROM prioritas p where p.kode=k.prioritas)as bp
                        FROM
                        kriteria k join jurusan j on k.id_jurusan=j.id_jurusan
                        where k.prioritas='$kr' and j.jurusan='$jr'
                    order by k.prioritas,k.id_jurusan ";
		$model = $connection->createCommand($query);
		$data = $model->queryAll();

		return $data;
	}

}
