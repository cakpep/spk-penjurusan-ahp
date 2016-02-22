<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DATA SISWA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::a('TAMBAH DATA SISWA', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<!-- [
    'aa'=>1
]
array(
    'aa'=>1
); -->
    <div class="row">
        <div class="col-sm-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'tableOptions' => ['class','table table-striped table-hover'],
            // 'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nis',
                'nama',
                 // 'id_kelas',
                [
                        'attribute'=>'id_kelas',
                        'format' => 'raw',
                        'value' => function($model){
                            return ($model->idKelas) ? $model->idKelas->kelas.'-'.$model->idKelas->sub_kls : "-";
                        }
                    ],
                'password',
                'email:email',
                'tempat_lahir',
                
                [
                        'attribute'=>'tgl_lahir',
                        'format' => 'raw',
                        'value' => function($model){
                            return !empty($model->tgl_lahir) ? date('d-M-Y',strtotime($model->tgl_lahir)) : '-';    
                        }
                    ],
                'no_telp',
                [
                        'attribute'=>'jns_kelamin',
                        'format' => 'raw',
                        'value' => function($model){
                            if($model->jns_kelamin=='L'){
                                $jenkel = 'Laki-laki';
                            }elseif ($model->jns_kelamin=='P') {
                                $jenkel = 'Perempuan';
                            }else{
                                $jenkel = '-';
                            }
                                
                            return $jenkel;
                        }
                    ],
                'alamat:ntext',
                 [
                        'attribute'=>'foto',
                        'format' => 'html',
                        'value' => function($model){
                            $foto = !empty($model->foto) ? $model->foto : 'images.jpg';
                            $img = \yii\helpers\Url::to('@web').'/uploads/foto_siswa/'.$foto;
                            return "<img src='$img' width='100' height='150'>";

                        }
                    ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Actions',
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
        </div>
    </div>
</div>
