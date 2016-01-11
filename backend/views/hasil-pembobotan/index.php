<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
                        'attribute'=>'penjurusan',
                        'format' => 'html',
                        'value' => function($model){
                            $ret = explode(',', $model['penjurusan']);
                            $res= "";
                            foreach ($ret as $key => $value) {
                                $res .= $value."<br>";
                            }
                            return $res;
                        }
            ], 
            [
                        'attribute'=>'nilai_bobot', 
                        'format' => 'html',
                        'value' => function($model){
                            $ret = explode(',', $model['nilai_bobot']);
                            $res= "";
                            foreach ($ret as $key => $value) {
                                $res .= $value."<br>";
                            }
                            return $res;
                        }
            ],
            [
                        'attribute'=>'nilai_bobot_minat', 
                        'format' => 'html',
                        'value' => function($model){
                            return $model['nilai_bobot_minat'];
                        }
            ], 
            [
                        'attribute'=>'nilai_bobot_psikotes', 
                        'format' => 'html',
                        'value' => function($model){
                            return $model['nilai_bobot_psikotes'];
                        }
            ],
            [
                        'attribute'=>'total',
                        'format' => 'html',
                        'value' => function($model){
                            $ret = explode(',', $model['total']);
                            $res= "";
                            foreach ($ret as $key => $value) {
                                $res .= $value."<br>";
                            }
                            return $res;
                        }
            ], 
                            
            [
                        'attribute'=>'keputusan',
                        'format' => 'html',
                        'value' => function($model){
                            $ret = explode(',', $model['keputusan']);
                            foreach ($ret as $key => $value) {
                                $xx = explode('=', $value);
                                $xs[$xx[1]] = $xx[0];

                            }                            
                            $r = max(explode(',', $model['total']));
                            $zz = is_array($xs) ? $xs[$r] : '-';
                            return $zz;
                        }
            ], 
        ],
    ]); ?>

</div>
