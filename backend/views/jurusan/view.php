<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jurusan */

$this->title = $model->jurusan;
$this->params['breadcrumbs'][] = ['label' => 'Jurusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurusan-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jurusan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jurusan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
