<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jurusan */

$this->title = $model->jurusan;
$this->params['breadcrumbs'][] = ['label' => 'Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurusan-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_jurusan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_jurusan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin akan menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-sm-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id_jurusan',
                'jurusan',
                'standard_bobot',
            ],
        ]) ?>
        </div>
    </div>
</div>
