<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property string $nip
 * @property string $password
 * @property string $nama
 * @property string $alamat
 * @property string $agama
 * @property string $email
 * @property string $jns_kelamin
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $no_telp
 * @property string $foto
 *
 * @property Berita[] $beritas
 * @property Berita $nip0
 * @property MatapelajaranGuru[] $matapelajaranGurus
 */
class Guru extends \yii\db\ActiveRecord {
	public $tgl;
	public $bln;
	public $thn;
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'guru';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['nip', 'password', 'nama', 'alamat', 'agama', 'email', 'jns_kelamin', 'tempat_lahir', 'tgl_lahir', 'no_telp'], 'required'],
			[['alamat', 'jns_kelamin'], 'string'],
			[['wali_kelas', 'tgl_lahir'], 'safe'],
			[['email'], 'email'],
			[['nip', 'tempat_lahir'], 'string', 'max' => 20],
			[['password', 'agama'], 'string', 'max' => 10],
			[['nama'], 'string', 'max' => 35],
			[['email'], 'string', 'max' => 30],
			[['no_telp'], 'string', 'max' => 15],
			[['foto'], 'string', 'max' => 50],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'nip' => 'NIP',
			'password' => 'Password',
			'nama' => 'Nama',
			'wali_kelas' => 'Wali Kelas',
			'alamat' => 'Alamat',
			'agama' => 'Agama',
			'email' => 'Email',
			'jns_kelamin' => 'Jns Kelamin',
			'tempat_lahir' => 'Tempat Lahir',
			'tgl_lahir' => 'Tgl Lahir',
			'no_telp' => 'No Telp',
			'foto' => 'Foto',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getBeritas() {
		return $this->hasMany(Berita::className(), ['nip' => 'nip']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getNip0() {
		return $this->hasOne(Berita::className(), ['nip' => 'nip']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getMatapelajaranGurus() {
		return $this->hasMany(MatapelajaranGuru::className(), ['nip' => 'nip']);
	}
}
