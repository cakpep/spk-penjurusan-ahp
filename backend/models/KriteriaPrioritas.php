<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kriteria_prioritas".
 *
 * @property integer $id
 * @property string $kriteria
 * @property integer $nilai
 * @property integer $minat
 * @property integer $psikotes
 */
class KriteriaPrioritas extends \yii\db\ActiveRecord
{
    public $nilaiMinat;
    public $nilaiPsikotes;
    public $minatPsikotes;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kriteria_prioritas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kriteria'], 'required'],
            [['nilai', 'minat', 'psikotes'], 'integer'],
            [['kriteria'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kriteria' => 'Kriteria',
            'nilai' => 'Nilai',
            'minat' => 'Minat',
            'psikotes' => 'Psikotes',
        ];
    }
}
