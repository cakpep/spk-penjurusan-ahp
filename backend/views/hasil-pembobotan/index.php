<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\NilaiPembobotanKriteriaSearch;
use app\models\Prioritas;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NilaiPembobotanKriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hasil Penjurusan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //cho $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Nilai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'nis',
            'nama', 
            'kelas',
            // 'penjurusan', 
            'minat', 
            'psikotes',
            
            [
                        'attribute'=>'nilai_bobot', 
                        'format' => 'html',
                        'value' => function($model){
                            $searchModel = new NilaiPembobotanKriteriaSearch();
                            $ret = $searchModel->cariNilaiMax($model['nis']);
                            $maxarray = max($ret);
                            $kr = $searchModel->kriteria('nilai',$maxarray['penjurusan']);                            
                            return number_format(($kr[0]['bn']*$kr[0]['bp']),2);
                        }
            ],
            [
                        'attribute'=>'nilai_bobot_minat', 
                        'format' => 'html',
                        'value' => function($model){
                            $searchModel = new NilaiPembobotanKriteriaSearch();
                            $hasil = $searchModel->kriteria('minat',$model['minat']);                             
                            return number_format(($hasil[0]['bn']*$hasil[0]['bp']),2);
                        }
            ], 
            [
                        'attribute'=>'nilai_bobot_psikotes', 
                        'format' => 'html',
                        'value' => function($model){
                            $searchModel = new NilaiPembobotanKriteriaSearch();
                            $hasil = $searchModel->kriteria('psikotes',$model['psikotes']);
                            return number_format(($hasil[0]['bn']*$hasil[0]['bp']),2);
                        }
            ],
            [
                        'attribute'=>'total',
                        'format' => 'html',
                        'value' => function($model){
                            $searchModel = new NilaiPembobotanKriteriaSearch();
                            $ret = $searchModel->cariNilaiMax($model['nis']);
                            $maxarray = max($ret);
                            $bobot_nilai = $searchModel->kriteria('nilai',$maxarray['penjurusan']);                            
                            $total_bobot_nilai = number_format(($bobot_nilai[0]['bn']*$bobot_nilai[0]['bp']),2);

                            $bobot_minat = $searchModel->kriteria('minat',$model['minat']);                             
                            $total_bobot_minat =  number_format(($bobot_minat[0]['bn']*$bobot_minat[0]['bp']),2);

                            $bobot_psikotes = $searchModel->kriteria('psikotes',$model['psikotes']);
                            $total_bobot_psikotes =  number_format(($bobot_psikotes[0]['bn']*$bobot_psikotes[0]['bp']),2);   

                            return round($total_bobot_nilai + $total_bobot_minat + $total_bobot_psikotes,2);
                        }
            ], 
                            
            [
                        'attribute'=>'keputusan',
                        'format' => 'html',
                        'value' => function($model){
                            $searchModel = new NilaiPembobotanKriteriaSearch();
                            $patokan = $searchModel->prioritas();
                            
                            $ret = $searchModel->cariNilaiMax($model['nis']);
                            $maxarray = max($ret);
                            $bobot_nilai = $searchModel->kriteria('nilai',$maxarray['penjurusan']);                            
                            $total_bobot_nilai = number_format(($bobot_nilai[0]['bn']*$bobot_nilai[0]['bp']),2);

                            $bobot_minat = $searchModel->kriteria('minat',$model['minat']);                             
                            $total_bobot_minat =  number_format(($bobot_minat[0]['bn']*$bobot_minat[0]['bp']),2);

                            $bobot_psikotes = $searchModel->kriteria('psikotes',$model['psikotes']);
                            $total_bobot_psikotes =  number_format(($bobot_psikotes[0]['bn']*$bobot_psikotes[0]['bp']),2);   

                            $total_hitung = round($total_bobot_nilai + $total_bobot_minat + $total_bobot_psikotes,2);
                            $hasil_penjurusan = "";
                            if($total_hitung>=0.8){
                                $hasil_penjurusan = "IPA";
                            }
                            if($total_hitung>=0.65 && $total_hitung<0.8){
                                $hasil_penjurusan = "IPS";
                            }
                            if($total_hitung<0.65){
                                $hasil_penjurusan = "BAHASA";
                            }

                            return $hasil_penjurusan;
                        }
            ], 
        ],
    ]); ?>

</div>
