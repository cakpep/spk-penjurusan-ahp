<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kriteria".
 *
 * @property string $id_kriteria
 * @property string $prioritas
 * @property integer $id_jurusan
 * @property integer $bobot
 *
 * @property Jurusan $idJurusan
 */
class Kriteria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kriteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prioritas', 'id_jurusan', 'bobot'], 'required'],
            [['id_jurusan'], 'integer'],
            [['id_kriteria'], 'string', 'max' => 3],
            [['prioritas'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kriteria' => 'Kriteria',
            'prioritas' => 'Prioritas',
            'id_jurusan' => 'Jurusan',
            'bobot' => 'Bobot',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJurusan()
    {
        return $this->hasOne(Jurusan::className(), ['id_jurusan' => 'id_jurusan']);
    }
}
