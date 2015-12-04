<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nilai".
 *
 * @property integer $id_nilai
 * @property string $nis
 * @property integer $id_matapelajaran
 * @property double $nilai
 * @property string $tahun_ajaran
 *
 * @property Siswa $nis0
 * @property MatapelajaranGuru $idMatapelajaran
 */
class Nilai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nilai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nis', 'id_matapelajaran'], 'required'],
            [['id_matapelajaran'], 'integer'],
            [['nilai'], 'number'],
            [['nis'], 'string', 'max' => 10],
            [['tahun_ajaran'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nilai' => 'Id Nilai',
            'nis' => 'Nis',
            'id_matapelajaran' => 'Id Matapelajaran',
            'nilai' => 'Nilai',
            'tahun_ajaran' => 'Tahun Ajaran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNisSiswa()
    {
        return $this->hasOne(Siswa::className(), ['nis' => 'nis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMataPelajaran()
    {
        return $this->hasOne(MatapelajaranGuru::className(), ['id_matapelajaran_guru' => 'id_matapelajaran']);
    }
}
