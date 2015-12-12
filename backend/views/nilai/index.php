<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'NILAI SISWA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo $this->render('_form', ['model' => $model]); ?>

    <p>
        <!-- ?= Html::a('Create Nilai', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <div class="row">
        <div class="col-sm-8">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_nilai',
                'nis',
                [
                    'attribute'=>'nama',
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->nisSiswa->nama;
                    }
                ],
                
                [
                    'attribute'=>'id_matapelajaran',
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->mataPelajaran->maPel->matapelajaran;
                    }
                ],
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute'=> 'nilai',
                    //'readonly'=>function($model, $key, $index, $widget) {
                    //    return (!$model->nilai); // do not allow editing of inactive records
                    //},
                    'editableOptions' => [
                        'header' => 'Isikan Nilai',
                        'inputType' => \kartik\editable\Editable::INPUT_SPIN,
                        //'formOptions' => ['action' => 'update-column'],
                        'options' => [
                            'pluginOptions' => ['min'=>0, 'max'=>100]
                        ]
                    ],
                    'hAlign'=>'right', 
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    //'format'=>['decimal', 2],
                    'pageSummary' => true
                ],
                'tahun_ajaran',

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
