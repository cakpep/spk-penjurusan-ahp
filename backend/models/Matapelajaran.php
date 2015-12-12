<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matapelajaran".
 *
 * @property integer $id_matapelajaran
 * @property integer $id_jurusan
 * @property string $matapelajaran
 *
 * @property Jurusan $idJurusan
 * @property MatapelajaranGuru[] $matapelajaranGurus
 */
class Matapelajaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matapelajaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_matapelajaran', 'id_jurusan', 'matapelajaran'], 'required'],
            [['id_matapelajaran', 'id_jurusan'], 'integer'],
            [['matapelajaran'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_matapelajaran' => 'Id Matapelajaran',
            'id_jurusan' => 'Jurusan',
            'matapelajaran' => 'Mata Pelajaran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJurus()
    {
        return $this->hasOne(Jurus::className(), ['id_jurusan' => 'id_jurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatapelajaranGurus()
    {
        return $this->hasMany(MatapelajaranGuru::className(), ['id_matapelajaran' => 'id_matapelajaran']);
    }
}
