<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Prioritas;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kriterias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kriteria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_kriteria',
            'prioritas',
            
             [
                'attribute'=> 'id_jurusan',
                'format' => 'raw',
                'value' => function($model){
                    return $model->idJurusan->jurusan;
                }
            ],
            
            [
                'attribute'=>'bobot',
                'header' => 'Kriteria Prioritas',
                'format' => 'raw',
                'value' => function($model){
                    return $model->bobot;
                }
            ],
            // 'prioritas_sub',
            [
                'attribute'=>'prioritas_sub',
                'header' => 'Nilai Bobot',
                'format' => 'raw',
                'value' => function($model){
                    return $model->prioritas_sub;
                }
            ],
            [
                'attribute'=>'prioritas',
                'header' => 'Bobot Prioritas',
                'format' => 'raw',
                'value' => function($model){
                    $model = Prioritas::findOne($model->prioritas);
                    return $model->bobot;
                }
            ],

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
