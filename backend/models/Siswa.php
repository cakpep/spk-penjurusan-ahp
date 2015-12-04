<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property string $nis
 * @property string $nama
 * @property integer $id_kelas
 * @property string $password
 * @property string $email
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $no_telp
 * @property string $jns_kelamin
 * @property string $alamat
 * @property string $foto
 *
 * @property MinatPsikotes[] $minatPsikotes
 * @property Nilai[] $nilais
 * @property Kelas $idKelas
 */
class Siswa extends \yii\db\ActiveRecord
{
    public $tgl;
    public $bln;
    public $thn;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nis', 'nama', 'id_kelas', 'password', 'email', 'tempat_lahir', 'tgl_lahir', 'no_telp', 'jns_kelamin', 'alamat'], 'required'],
            [['id_kelas'], 'integer'],
            [['email'], 'email'],
            [['tgl_lahir'], 'safe'],
            [['jns_kelamin', 'alamat'], 'string'],
            [['nis'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 35],
            [['password', 'no_telp'], 'string', 'max' => 15],
            [['email', 'tempat_lahir'], 'string', 'max' => 20],
            [['foto'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nis' => 'NIS',
            'nama' => 'Nama',
            'id_kelas' => 'Kelas',
            'password' => 'Password',
            'email' => 'Email',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'no_telp' => 'No Telp',
            'jns_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMinatPsikotes()
    {
        return $this->hasMany(MinatPsikotes::className(), ['nis' => 'nis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilais()
    {
        return $this->hasMany(Nilai::className(), ['nis' => 'nis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKelas()
    {
        return $this->hasOne(Kelas::className(), ['id_kelas' => 'id_kelas']);
    }
}
