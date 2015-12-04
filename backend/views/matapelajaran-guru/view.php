<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MatapelajaranGuru */

$this->title = $model->id_matapelajaran_guru;
$this->params['breadcrumbs'][] = ['label' => 'Matapelajaran Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matapelajaran-guru-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_matapelajaran_guru], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_matapelajaran_guru], [
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
            'id_matapelajaran_guru',
            'nip',
            'id_matapelajaran',
            'id_kelas',
            'sub_kls1',
            'sub_kls2',
            'sub_kls3',
            'sub_kls4',
            'sub_kls5',
            'sub_kls6',
        ],
    ]) ?>

</div>
