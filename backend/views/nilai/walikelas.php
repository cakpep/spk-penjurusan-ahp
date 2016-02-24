<?php

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'NILAI SISWA';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
// You only need add this,
$this->registerJs('
		var gridview_id = ""; // specific gridview
		var columns = [2,3,4]; // index column that will grouping, start 1

		var column_data = [];
			column_start = [];
			rowspan = [];

		for (var i = 0; i < columns.length; i++) {
			column = columns[i];
			column_data[column] = "";
			column_start[column] = null;
			rowspan[column] = 1;
		}

		var row = 1;
		$(gridview_id+" table > tbody  > tr").each(function() {
			var col = 1;
			$(this).find("td").each(function(){
				for (var i = 0; i < columns.length; i++) {
					if(col==columns[i]){
						if(column_data[columns[i]] == $(this).html()){
							$(this).remove();
							rowspan[columns[i]]++;
							$(column_start[columns[i]]).attr("rowspan",rowspan[columns[i]]);
						}
						else{
							column_data[columns[i]] = $(this).html();
							rowspan[columns[i]] = 1;
							column_start[columns[i]] = $(this);
						}
					}
				}
				col++;
			})
			row++;
		});
	');
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
		'kelas',
		'nis',
		'nama',
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
