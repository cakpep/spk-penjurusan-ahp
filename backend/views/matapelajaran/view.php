<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Matapelajaran */

$this->title = $model->id_matapelajaran;
$this->params['breadcrumbs'][] = ['label' => 'Matapelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matapelajaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_matapelajaran], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_matapelajaran], [
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
            'id_matapelajaran',
            'id_jurusan',
            'matapelajaran',
        ],
    ]) ?>

</div>
