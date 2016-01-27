<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prioritas".
 *
 * @property string $kode
 * @property double $bobot
 */
class Prioritas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prioritas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'required'],
            [['bobot'], 'number'],
            [['kode'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'bobot' => 'Bobot',
        ];
    }
}
