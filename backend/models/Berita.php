<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property integer $id_berita
 * @property string $judul
 * @property string $isi_berita
 * @property string $nip
 * @property string $tgl_input
 *
 * @property Guru $nip0
 * @property Guru $guru
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'isi_berita', 'nip', 'tgl_input'], 'required'],
            [['isi_berita'], 'string'],
            [['tgl_input'], 'safe'],
            [['judul'], 'string', 'max' => 50],
            [['nip'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_berita' => 'Id Berita',
            'judul' => 'Judul',
            'isi_berita' => 'Isi Berita',
            'nip' => 'NIP',
            'tgl_input' => 'Tgl Input',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipGuru()
    {
        return $this->hasOne(Guru::className(), ['nip' => 'nip']);
    }
}
