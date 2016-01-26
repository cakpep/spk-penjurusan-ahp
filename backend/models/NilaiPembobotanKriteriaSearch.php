<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NilaiPembobotanKriteria;
use yii\data\SqlDataProvider;

/**
 * NilaiPembobotanKriteriaSearch represents the model behind the search form about `app\models\Nilai`.
 */
class NilaiPembobotanKriteriaSearch extends NilaiPembobotanKriteria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        // return [
        //     [['id_nilai', 'id_matapelajaran'], 'integer'],
        //     [['nis', 'tahun_ajaran'], 'safe'],
        //     [['nilai'], 'number'],
        // ];
        return [
            [['nis', 'nama', 'penjurusan', 'minat', 'psikotes'], 'safe'],
            [['nilai', 'bobot_nilai', 'bobot_minat', 'bobot_psikotes'], 'number'],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = NilaiPembobotanKriteria::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // $query->andFilterWhere([
        //     'id_nilai' => $this->id_nilai,
        //     'id_matapelajaran' => $this->id_matapelajaran,
        //     'nilai' => $this->nilai,
        // ]);

        // $query->andFilterWhere(['like', 'nis', $this->nis])
        //     ->andFilterWhere(['like', 'tahun_ajaran', $this->tahun_ajaran]);

        return $dataProvider;
    }


    public static function laporan(){
        $connection = \Yii::$app->db;
        $query="    SELECT 
                    ti.`id`,
                    ti.`transaksi_id`,
                    left(t.tanggal,7) as bulan,
                    p.`nama`,
                    ti.`diskon`,
                    ((ti.`diskon`/100)* ti.`subtotal`) as pot_diskon,
                    sum(ti.`jumlah`) as jumlah,
                    sum(ti.`jumlah`*(ti.`subtotal`-COALESCE(((ti.`diskon`/100)* ti.`subtotal`),0))) as subtotal
                    FROM 
                    transaksi_item ti left JOIN produk p ON ti.`produk_id`=p.`id`
                    JOIN transaksi t on t.id=ti.transaksi_id
                    GROUP by left(t.tanggal,7) # ti.transaksi_id
                    order by ti.transaksi_id";
        $model = $connection->createCommand($query);
        $data = $model->queryAll();

        return $data;
            
    
    }


    public function sqlLaporan()
    {               
            $query = "SELECT 
                nis,nama,kelas,minat,psikotes,
                -- group_concat(penjurusan) as penjurusan,
                group_concat(penjurusan) as penjurusan,
                 group_concat(bobot_nilai) as nilai_bobot,
                 concat(minat,'<br>',bobot_minat) as nilai_bobot_minat,
                 concat(minat,'<br>',bobot_psikotes) as nilai_bobot_psikotes,
                 group_concat((bobot_nilai+bobot_minat+bobot_psikotes)) AS total,
                 group_concat(penjurusan,'=',(bobot_nilai+bobot_minat+bobot_psikotes)) AS keputusan
             FROM nilai_pembobotan_kriteria group by nis ORDER BY penjurusan  DESC";
        
            $dataProvider = new SqlDataProvider([
                                        'sql' => $query,
                                        // 'params' => [':tanggal' => $tanggal],
                                    ]);
            return $dataProvider;
    }

}
