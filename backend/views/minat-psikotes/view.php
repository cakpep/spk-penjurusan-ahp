<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MinatPsikotes */

$this->title = $model->nis;
$this->params['breadcrumbs'][] = ['label' => 'Minat & Psikotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minat-psikotes-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->nis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->nis], [
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
                //'id',
                'nis',
                'minat',
                'psikotes',
            ],
        ]) ?>
        </div>
    </div>
</div>
