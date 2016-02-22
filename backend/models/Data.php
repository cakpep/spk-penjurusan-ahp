<?php

namespace app\models;

use Yii;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;

class Data {
	public static function nip_guru() {
		$connection = \Yii::$app->db;
		$id = Yii::$app->user->identity->id;
		$query = "SELECT nip FROM guru g WHERE  g.`email` IN (SELECT email FROM user WHERE id=$id AND LEVEL='guru')";
		$model = $connection->createCommand($query);
		$array = $model->queryAll();

		if (!empty($array[0]['nip'])) {
			return $array[0]['nip'];
		}
	}

	public static function isWaliKelas() {
		$connection = \Yii::$app->db;
		$id = Yii::$app->user->identity->id;
		$query = "SELECT * FROM guru g WHERE  g.`wali_kelas`=1 and g.`email` IN (SELECT email FROM user WHERE id=$id AND LEVEL='guru')";
		$model = $connection->createCommand($query);
		$array = $model->queryAll();

		if (!empty($array[0])) {
			return $array[0];
		} else {
			return false;
		}
	}

	public static function nis_siswa() {
		$connection = \Yii::$app->db;
		$id = Yii::$app->user->identity->id;
		$query = "SELECT nis FROM siswa g WHERE  g.`email` IN (SELECT email FROM user WHERE id=$id AND LEVEL='siswa')";
		$model = $connection->createCommand($query);
		$array = $model->queryAll();

		if (!empty($array[0]['nis'])) {
			return $array[0]['nis'];
		}
	}

	public static function kelas() {
		$connection = \Yii::$app->db;
		$query = "SELECT id_kelas, CONCAT(kelas,'-',sub_kls) as kelas FROM kelas";
		$model = $connection->createCommand($query);
		$array = $model->queryAll();

		/*
			        $listData = ArrayHelper::map(Kelas::find()->all(),'id_kelas','kelas');
			        return $listData;
		*/

		$data = ArrayHelper::map($array, 'id_kelas', 'kelas');
		return $data;

	}

	public static function kelas_pilih() {
		$listData = array(
			1 => 'X',
		);
		return $listData;
	}

	public static function guru() {
		$listData = ArrayHelper::map(Guru::find()->all(), 'nip', 'nama');
		return $listData;
	}
	public static function matapelajaran() {
		$listData = ArrayHelper::map(Matapelajaran::find()->all(), 'id_matapelajaran', 'matapelajaran');
		return $listData;
	}

	public static function matapelajaranGuru() {
		$connection = \Yii::$app->db;
		$nip = self::nip_guru();
		if (strtolower(Yii::$app->user->identity->level) == 'admin') {
			$query = "SELECT mg.`id_matapelajaran_guru` AS id ,m.`matapelajaran` AS mapel
				FROM
				matapelajaran_guru mg JOIN matapelajaran m ON mg.`id_matapelajaran`=m.`id_matapelajaran`";
		} else {
			$query = "SELECT mg.`id_matapelajaran_guru` AS id ,m.`matapelajaran` AS mapel
				FROM
				matapelajaran_guru mg JOIN matapelajaran m ON mg.`id_matapelajaran`=m.`id_matapelajaran`
				WHERE mg.`nip`='$nip'";
		}

		$model = $connection->createCommand($query);
		$array = $model->queryAll();
		$data = ArrayHelper::map($array, 'id', 'mapel');
		return $data;
	}

	public static function jurusan() {
		$listData = ArrayHelper::map(Jurusan::find()->all(), 'id_jurusan', 'jurusan');
		return $listData;
	}

	public static function jns_kelamin() {
		$listData = array(
			'L' => 'Laki-Laki',
			'P' => 'Perempuan',
		);
		return $listData;
	}

	public static function wali_kelas() {
		$listData = array(
			1 => 'Wali Kelas',
			0 => 'Guru',
		);
		return $listData;
	}

	public static function tgl() {
		$listData = array(
			'1' => '01',
			'2' => '02',
			'3' => '03',
			'4' => '04',
			'5' => '05',
			'6' => '06',
			'7' => '07',
			'8' => '08',
			'9' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
			'25' => '25',
			'26' => '26',
			'27' => '27',
			'28' => '28',
			'29' => '29',
			'30' => '30',
			'31' => '31',
		);
		return $listData;
	}
	public static function bln() {
		$listData = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		);
		return $listData;
	}
	public static function thn($thmulai = 1955, $thakhir = 40) {
		for ($i = 1; $i <= $thakhir; $i++) {
			$mulai = $thmulai + $i;
			$listData[$mulai] = $mulai;
		}

		return $listData;
	}
	public static function tahun_ajaran() {
		$listData = array(
			'2015/2016' => '2015 / 2016',
			'2016/2017' => '2016 / 2017',
			'2017/2018' => '2017 / 2018',
		);
		return $listData;
	}
	public static function sub_kls1() {
		$listData = array(
			'A' => 'A',
			'B' => 'B',
			'C' => 'C',
			'D' => 'D',
			'E' => 'E',
			//'F' => 'F'
		);
		return $listData;
	}
	public static function agama() {
		$listData = array(
			'islam' => 'Islam',
			'kristen' => 'Kristen',
			'khatolik' => 'Khatolik',
			'hindu' => 'Hindu',
			'budha' => 'Budha',
		);
		return $listData;
	}
	public static function minat() {
		$listData = array(
			'IPA' => 'IPA',
			'IPS' => 'IPS',
			'BAHASA' => 'BAHASA',
		);
		return $listData;
	}
	public static function psikotes() {
		$listData = array(
			'IPA' => 'IPA',
			'IPS' => 'IPS',
			'BAHASA' => 'BAHASA',
		);
		return $listData;
	}
	public static function nis() {

		$connection = \Yii::$app->db;
		$nip = self::nip_guru();
		// if (strtolower(Yii::$app->user->identity->level) == 'admin') {
		// 	$query = "SELECT mg.`id_matapelajaran_guru` AS id ,m.`matapelajaran` AS mapel
		// 		FROM
		// 		matapelajaran_guru mg JOIN matapelajaran m ON mg.`id_matapelajaran`=m.`id_matapelajaran`";
		// } else {
		$query = "SELECT * FROM
					siswa s left join kelas k on s.id_kelas=k.id_kelas
					left join matapelajaran_guru mg on k.id_kelas=mg.id_kelas
					where mg.nip='$nip'";
		// }

		$model = $connection->createCommand($query);
		$array = $model->queryAll();
		$data = ArrayHelper::map($array, 'nis', 'nama');
		return $data;

		// $listData = ArrayHelper::map(Siswa::find()->all(), 'nis', 'nama');
		// return $listData;
	}

	public function sqlLaporanNilaiStock($params) {
		$start = null;
		$end = null;

		if (!empty($params['DataLaporan'])) {
			$param = $params['DataLaporan'];
			$query = "	SELECT
							  b.`kode_barang`,
							  b.`barcode`,
							  b.`nama`,
							  g.`nama` AS golongan,
							  gs.`nama` AS sub_golongan,
							  bt.`nama` AS type_barang,
							  b.`jumlah` AS jumlah_stok,
							  bs.`nama`AS satuan,
							  b.`harga_beli`,
							(b.`jumlah` * b.harga_beli) AS total
							FROM barang b
							LEFT JOIN golongan g ON b.`golongan_id`=g.`id`
							LEFT JOIN golongan_sub gs ON b.`golongan_sub_id`=gs.`id`
							LEFT JOIN barang_type bt ON b.`barang_type`=bt.`id`
							LEFT JOIN barang_satuan bs ON b.`satuan_id`=bs.`id`
							where
							b.`kode_barang`='" . $param['kode_barang'] . "' or
							b.`barcode`='" . $param['barcode'] . "' or
							b.`golongan_id`='" . $param['golongan_id'] . "' or
							b.`golongan_sub_id`='" . $param['golongan_sub_id'] . "' or
							b.`barang_type`='" . $param['barang_type'] . "' or
							b.`satuan_id`='" . $param['satuan_id'] . "'";
			if (!empty($param['nama'])) {
				$query .= "or b.`nama` like '%" . $param['nama'] . "%'";
			}
			$query .= "GROUP BY b.`kode_barang`";
		} else {
			$query = "	SELECT
							  b.`kode_barang`,
							  b.`barcode`,
							  b.`nama`,
							  g.`nama` AS golongan,
							  gs.`nama` AS sub_golongan,
							  bt.`nama` AS type_barang,
							  b.`jumlah` AS jumlah_stok,
							  bs.`nama`AS satuan,
							  b.`harga_beli`,
							(b.`jumlah` * b.harga_beli) AS total
							FROM barang b
							LEFT JOIN golongan g ON b.`golongan_id`=g.`id`
							LEFT JOIN golongan_sub gs ON b.`golongan_sub_id`=gs.`id`
							LEFT JOIN barang_type bt ON b.`barang_type`=bt.`id`
							LEFT JOIN barang_satuan bs ON b.`satuan_id`=bs.`id`
							GROUP BY b.`kode_barang`";
		}

		$count = Yii::$app->db->createCommand("SELECT COUNT(kode_barang) FROM barang")->queryScalar();
		$pg = empty($_GET['p']) ? 40 : 10000;
		$dataProvider = new SqlDataProvider([
			'sql' => $query,
			'totalCount' => (int) $count,
			'params' => [':start' => $start, ':end' => $end],
			'pagination' => [
				'pagesize' => $pg,
			],
		]);

		return $dataProvider;
	}

}