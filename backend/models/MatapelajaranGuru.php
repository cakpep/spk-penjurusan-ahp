<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matapelajaran_guru".
 *
 * @property integer $id_matapelajaran_guru
 * @property string $nip
 * @property integer $id_matapelajaran
 * @property integer $id_kelas
 * @property string $sub_kls1
 * @property string $sub_kls2
 * @property string $sub_kls3
 * @property string $sub_kls4
 * @property string $sub_kls5
 * @property string $sub_kls6
 *
 * @property Matapelajaran $idMatapelajaran
 * @property Kelas $idKelas
 * @property Guru $nip0
 * @property Nilai[] $nilais
 */
class MatapelajaranGuru extends \yii\db\ActiveRecord
{   
    public $kelas_pilih;
    public $subkls;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matapelajaran_guru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'id_matapelajaran', 'id_kelas'], 'required'],
            [['id_matapelajaran', 'id_kelas'], 'integer'],
            [['nip'], 'string', 'max' => 20],
            [['sub_kls1', 'sub_kls2', 'sub_kls3', 'sub_kls4', 'sub_kls5', 'sub_kls6'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_matapelajaran_guru' => 'Id Matapelajaran Guru',
            'nip' => 'Nip',
            'id_matapelajaran' => 'Id Matapelajaran',
            'id_kelas' => 'Id Kelas',
            'sub_kls1' => 'Sub Kls1',
            'sub_kls2' => 'Sub Kls2',
            'sub_kls3' => 'Sub Kls3',
            'sub_kls4' => 'Sub Kls4',
            'sub_kls5' => 'Sub Kls5',
            'sub_kls6' => 'Sub Kls6',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaPel()
    {
        return $this->hasOne(Matapelajaran::className(), ['id_matapelajaran' => 'id_matapelajaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipGuru()
    {
        return $this->hasOne(Guru::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKelas()
    {
        return $this->hasOne(Kelas::className(), ['id_kelas' => 'id_kelas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilais()
    {
        return $this->hasMany(Nilai::className(), ['id_matapelajaran' => 'id_matapelajaran_guru']);
    }
}
