<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Matapelajaran */

$this->title = $model->matapelajaran;
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matapelajaran-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->matapelajaran], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->matapelajaran], [
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
                'id_matapelajaran',
                'id_jurusan',
                'matapelajaran',
            ],
        ]) ?>
        </div>
    </div>
</div>
