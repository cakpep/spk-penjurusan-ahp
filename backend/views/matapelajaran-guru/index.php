<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatapelajaranGuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PENGAMPU MATA PELAJARAN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matapelajaran-guru-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo $this->render('_form', ['model' => $model]); ?>

    <p>
        <!-- ?= Html::a('Create Matapelajaran Guru', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <div class="row">
        <div class="col-sm-8"> 
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id_matapelajaran_guru',
                'nip',
                [
                    'attribute'=>'Nama',
                    'header' => 'Pengampu',
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->nipGuru->nama;
                    }
                ],
                // 'id_matapelajaran',
                [
                    'attribute'=>'id_matapelajaran',
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->maPel->matapelajaran;
                    }
                ],
                [
                    'attribute'=>'id_kelas',
                    'format' => 'raw',
                    'value' => function($model){
                        // $kelas = $model->idKelas->kelas.' - '.$model->idKelas->sub_kls;
                        return 'X';
                    }
                ],        

                [
                    'attribute'=>'subkls',
                    'format' => 'raw',
                    'value' => function($model){
                        $subkls = '';
                        $subkls .= !empty($model->sub_kls1) ? "[$model->sub_kls1] " : '';
                        $subkls .= !empty($model->sub_kls2) ? "[$model->sub_kls2] " : '';
                        $subkls .= !empty($model->sub_kls3) ? "[$model->sub_kls3] " : '';
                        $subkls .= !empty($model->sub_kls4) ? "[$model->sub_kls4] " : '';
                        $subkls .= !empty($model->sub_kls5) ? "[$model->sub_kls5] " : '';
                        $subkls .= !empty($model->sub_kls6) ? "[$model->sub_kls6] " : '';                        
                        return '<b>'.$subkls.'</b>';
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
