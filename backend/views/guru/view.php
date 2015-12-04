<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Guru */

$this->title = $model->nip;
$this->params['breadcrumbs'][] = ['label' => 'Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nip], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nip], [
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
