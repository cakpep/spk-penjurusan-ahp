<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DATA GURU';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-index">

    <h2><?=Html::encode($this->title)?></h2>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo $this->render('_form', ['model' => $model]); ?>

    <p>
        <!-- ?= Html::a('INPUT', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <div class="row">
        <div class="col-sm-12">
        <?=GridView::widget([
	'dataProvider' => $dataProvider,
	//'tableOptions' => ['class' => 'table table-striped table-hover'],
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
		[
			'attribute' => 'wali_kelas',
			'format' => 'raw',
			'value' => function ($model) {
				return ($model->wali_kelas == 1) ? 'Wali Kelas' : 'Guru';
			},
		],
		'nip',
		'password',
		'nama',
		'alamat:ntext',
		'agama',
		'email:email',
		[
			'attribute' => 'jns_kelamin',
			'format' => 'raw',
			'value' => function ($model) {
				if ($model->jns_kelamin == 'L') {
					$jenkel = 'Laki-laki';
				} elseif ($model->jns_kelamin == 'P') {
					$jenkel = 'Perempuan';
				} else {
					$jenkel = '-';
				}

				return $jenkel;
			},
		],
		'tempat_lahir',
		[
			'attribute' => 'tgl_lahir',
			'format' => 'raw',
			'value' => function ($model) {
				return !empty($model->tgl_lahir) ? date('d-M-Y', strtotime($model->tgl_lahir)) : '-';
			},
		],
		'no_telp',
		[
			'attribute' => 'foto',
			'format' => 'html',
			'value' => function ($model) {
				$foto = !empty($model->foto) ? $model->foto : 'images.jpg';
				$img = \yii\helpers\Url::to('@web') . '/uploads/foto_guru/' . $foto;
				return "<img src='$img' width='100' height='150'>";

			},
		],

		[
			'class' => 'yii\grid\ActionColumn',
			'header' => 'Actions',
			'template' => '{update} {delete}',
		],
	],
]);?>
        </div>
    </div>
</div>
