<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jurusan".
 *
 * @property integer $id_jurusan
 * @property string $jurusan
 * @property double $standard_bobot
 *
 * @property Kriteria[] $kriterias
 * @property Matapelajaran[] $matapelajarans
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jurusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jurusan', 'jurusan'], 'required'],
            [['id_jurusan'], 'integer'],
            // [['standard_bobot'], 'string'],
            [['jurusan'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jurusan' => 'Id Jurusan',
            'jurusan' => 'Jurusan',
            // 'standard_bobot' => 'Standard Bobot',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKriterias()
    {
        return $this->hasMany(Kriteria::className(), ['id_jurusan' => 'id_jurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatapelajarans()
    {
        return $this->hasMany(Matapelajaran::className(), ['id_jurusan' => 'id_jurusan']);
    }
}
