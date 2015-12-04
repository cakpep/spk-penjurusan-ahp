<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "minat_psikotes".
 *
 * @property integer $id
 * @property string $nis
 * @property string $minat
 * @property string $psikotes
 *
 * @property Siswa $nis0
 */
class MinatPsikotes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'minat_psikotes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nis', 'minat', 'psikotes'], 'required'],
            [['nis'], 'string', 'max' => 10],
            [['minat', 'psikotes'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nis' => 'NIS',
            'minat' => 'Minat',
            'psikotes' => 'Psikotes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNis0()
    {
        return $this->hasOne(Siswa::className(), ['nis' => 'nis']);
    }
}
