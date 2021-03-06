<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JurusanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PILIHAN JURUSAN';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurusan-index">

        <h2><?= Html::encode($this->title) ?></h2>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php echo $this->render('_form', ['model' => $model,'$action'=>1]); ?>

        <p>
            <!-- ?= Html::a('INPUT', ['create'], ['class' => 'btn btn-success']) ?> -->
        </p>
        
        <div class="row">
            <div class="col-sm-6"> 
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-striped table-hover'],
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'jurusan',
                    //'id_jurusan',
                    // 'standard_bobot',

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
