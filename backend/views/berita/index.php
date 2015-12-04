<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'BERITA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo $this->render('_form', ['model' => $model]); ?>

    <p>
        <!-- ?= Html::a('PROSES', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <div class="row">
        <div class="col-sm-8">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_berita',
                'judul',
                
                 [
                    'attribute'=>'isi_berita',
                    'format' => 'html',
                    'value' => function($model){
                        $berita = substr($model->isi_berita, 0,100);       
                        return $berita;
                    }
                        
                ],
                'nip',
                
                [
                    'attribute'=>'tgl_input',
                    'format' => 'raw',
                    'value' => function($model){
                        return !empty($model->tgl_input) ? date('d-M-Y H:i:s',strtotime($model->tgl_input)) : '-';    
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Actions',
                    'template' => '{view}{update} {delete}',
                ],
            ],
        ]); ?>
        </div>
    </div>
</div>
