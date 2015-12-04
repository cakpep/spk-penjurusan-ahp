<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Berita */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-view">

    <h1><?= Html::encode($this->title) ?></h1>
           
        <div class='row'>
            <div class='col-md-12'>
                <?= Html::a(Html::encode($model->judul), ['baca', 'id' => $model->id_berita])    ?>
            </div>                        
            <div class='col-md-12'>
                <?= date('d-M-Y | H:i:s',strtotime($model->tgl_input)) ?>
                
            </div>
            <div class='col-md-12'>
                Post by : <?= $model->nipGuru->nama ?>
            </div>
            <div class='col-md-12'>
                <?= $model->isi_berita ?>
            </div>
        </div>

</div>
