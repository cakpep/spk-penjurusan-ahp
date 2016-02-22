<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Guru */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Update', ['Edit', 'id' => $model->nama], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['Hapus', 'id' => $model->nama], [
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
                'nip',
                'password',
                'nama',
                'alamat:ntext',
                'agama',
                'email:email',
                
                [
                    'label'=>'jns_kelamin',
                    'format' => 'raw',
                    'value' => !empty($model->jns_kelamin) ? ($model->jns_kelamin=='L') ? 'Laki-laki' : 'Perempuan':'',
                ],
                'tempat_lahir',
                [
                    'label'=>'tgl_lahir',
                    'format' => 'raw',
                    'value' => !empty($model->tgl_lahir) ? date('d-M-Y',strtotime($model->tgl_lahir)) : '-',
                ],
                'no_telp',
                [
                    'label'=>'foto',
                    'format' => 'html',
                    'value' => !empty($model->foto) ? \yii\helpers\Url::to('@web').'/uploads/foto_guru/'.$model->foto : 'images.png',
                    'format' => ['image',['width'=>200,'height'=>200]],
                ],
            ],
        ]) ?>
        </div>
    </div>
</div>
