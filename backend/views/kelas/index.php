<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KelasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'KELAS SISWA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo $this->render('_form', ['model' => $model]); ?>

    <p>
        <!-- ?= Html::a('Create Kelas', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <div class="row">
        <div class="col-sm-6"> 
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_kelas',
                'kelas',
                'sub_kls',

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
