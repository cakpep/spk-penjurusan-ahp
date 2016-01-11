<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nilai_pembobotan_kriteria".
 *
 * @property string $nis
 * @property string $nama
 * @property string $kelas
 * @property string $penjurusan
 * @property double $nilai
 * @property string $minat
 * @property string $psikotes
 * @property double $bobot_nilai
 * @property double $bobot_minat
 * @property double $bobot_psikotes
 */
class NilaiPembobotanKriteria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nilai_pembobotan_kriteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nis', 'nama', 'penjurusan', 'minat', 'psikotes'], 'required'],
            [['nilai', 'bobot_nilai', 'bobot_minat', 'bobot_psikotes'], 'number'],
            [['nis'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 35],
            [['kelas', 'penjurusan', 'minat', 'psikotes'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nis' => 'Nis',
            'nama' => 'Nama',
            'kelas' => 'Kelas',
            'penjurusan' => 'Penjurusan',
            'nilai' => 'Nilai',
            'minat' => 'Minat',
            'psikotes' => 'Psikotes',
            'bobot_nilai' => 'Bobot Nilai',
            'bobot_minat' => 'Bobot Minat',
            'bobot_psikotes' => 'Bobot Psikotes',
        ];
    }
}
