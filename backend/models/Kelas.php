<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property integer $id_kelas
 * @property string $kelas
 * @property string $sub_kls
 *
 * @property Siswa[] $siswas
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_kls'], 'unique'],
            [['kelas', 'sub_kls'], 'required'],
            [['kelas'], 'string', 'max' => 2],
            [['sub_kls'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Id Kelas',
            'kelas' => 'Kelas',
            'sub_kls' => 'Sub Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(Siswa::className(), ['id_kelas' => 'id_kelas']);
    }
}
