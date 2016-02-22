<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */

$this->title = $model->kelas.' '.$model->kelas;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_kelas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_kelas], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin akan menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-sm-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_kelas',
                'kelas',
                'sub_kls',
            ],
        ]) ?>
        </div>
    </div>
</div>
