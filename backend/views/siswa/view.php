<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Siswa */

$this->title = $model->nis;
$this->params['breadcrumbs'][] = ['label' => 'Siswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nis], [
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
            'nis',
            'nama',
            'id_kelas',
            'password',
            'email:email',
            'tempat_lahir',
            [
                'label'=>'tgl_lahir',
                'format' => 'raw',
                'value' => !empty($model->tgl_lahir) ? date('d-M-Y',strtotime($model->tgl_lahir)) : '-',
            ],
            'no_telp',
            [
                'label'=>'jns_kelamin',
                'format' => 'raw',
                'value' => !empty($model->jns_kelamin) ? ($model->jns_kelamin=='L') ? 'Laki-laki' : 'Perempuan':'',
            ],
            'alamat:ntext',
            [
                'label'=>'foto',
                'format' => 'html',
                'value' => !empty($model->foto) ? \yii\helpers\Url::to('@web').'/uploads/foto_siswa/'.$model->foto : 'images.png',
                'format' => ['image',['width'=>200,'height'=>200]],
            ],
        ],
    ]) ?>

</div>
