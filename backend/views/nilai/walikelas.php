<?php

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'NILAI SISWA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-index">

    <h2>Daftar Nilai Siswa Kelas</h2>
    <?php
echo GridView::widget([
	'id' => 'laporan-nilai-stock-grid',
	'tableOptions' => ['class' => 'table table-striped table-condensed table-hover'],
	'dataProvider' => $dataProvider,
	'showFooter' => false,
	'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline;'],
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
		'nis',
		'nama',
		'kelas',
		'matapelajaran',
		'nilai',
		// [
		// 	'class' => 'yii\grid\ActionColumn',
		// 	'header' => 'Actions',
		// 	'template' => '{update} {delete}',
		// 	'buttons' => [
		// 		'update' => function ($url, $model) {
		// 			return Html::a('<i class="glyphicon glyphicon-edit"></i>', ['update', 'id' => $model['id_nilai']], [
		// 				'class' => 'btn btn-primary btn-flat btn-xs']);
		// 		},
		// 		'delete' => function ($url, $model) {
		// 			return Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model['id_nilai']], [
		// 				'class' => 'btn btn-danger btn-flat btn-xs',
		// 			]);
		// 		},
		// 	],
		// ],
	],
]);

?>
        </div>
    </div>
</div>
