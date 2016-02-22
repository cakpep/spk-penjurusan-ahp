<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */

$this->title = $model->prioritas;
$this->params['breadcrumbs'][] = ['label' => 'Kriteria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->prioritas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->prioritas], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kriteria',
            'prioritas',
            'id_jurusan',
            'bobot',
        ],
    ]) ?>

</div>
