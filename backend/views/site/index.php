<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            $return = "
                    <div class='row'>
                        <div class='col-md-12'>
                            <h3><b>".Html::a(Html::encode($model->judul), ['baca', 'id' => $model->id_berita])."</b></h3>
                        </div>                        
                        <div class='col-md-12'>
                            ". date('d-M-Y | H:i:s',strtotime($model->tgl_input))."
                            
                        </div>
                        <div class='col-md-12'>
                            Post by : ".$model->nipGuru->nama."
                        </div>
                        <div class='col-md-12'>
                            ".substr($model->isi_berita, 0,100)."
                        </div>
                    </div><hr>
            
            ";

            return $return;
        },
    ]) ?>

</div>