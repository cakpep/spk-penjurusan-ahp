<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Guru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-form">

    <?php $form = ActiveForm::begin([
	//'id' => 'search-form',
	'method' => 'post',
	'action' => $model->isNewRecord ? ['create'] : ['update', 'id' => $model->nip],
	'options' => ['enctype' => 'multipart/form-data'], // important
]);?>

    <div class="row">
        <div class="col-sm-3">
        <?=$form->field($model, 'nip')->textInput(['maxlength' => true])?>

        <?=$form->field($model, 'nama')->textInput(['maxlength' => true])?>
        <?=$form->field($model, 'password')->passwordInput(['maxlength' => true])?>
        <?=$form->field($model, 'email')->textInput(['maxlength' => true])?>
        </div>

        <div class="col-sm-3">
        <?php
echo $form->field($model, 'wali_kelas')->widget(Select2::classname(), [
	'data' => \app\models\Data::wali_kelas(),
	'language' => 'id',
	'options' => ['placeholder' => 'Pilih...'],
	'pluginOptions' => [
		'allowClear' => true,
	],
	'pluginEvents' => [
		"select2:select" => "function() {
            console.log($(this).val());
            if($(this).val()==1){
                $('#id_kelas').show();
            }else{
                $('#id_kelas').hide();
            }
        }",
	],
])->label('Wali Kelas');

if ($model->wali_kelas) {
	echo '<div id="id_kelas">';
} else {
	echo '<div id="id_kelas" style="display:none">';
}
?>
        <?php
echo $form->field($model, 'id_kelas')->widget(Select2::classname(), [
	'data' => \app\models\Data::kelas(),
	'language' => 'id',
	'options' => ['placeholder' => 'Pilih...'],
	'pluginOptions' => [
		'allowClear' => true,
	],
])->label('Pilih Kelas'); ?>
</div>
        <?php
// Normal select with ActiveForm & model
echo $form->field($model, 'agama')->widget(Select2::classname(), [
	'data' => \app\models\Data::agama(),
	'language' => 'id',
	'options' => ['placeholder' => 'Pilih...'],
	'pluginOptions' => [
		'allowClear' => true,
	],
])->label('Agama'); ?>
        <!-- ?php //$form->field($model, 'jns_kelamin')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?> -->
        <?=$form->field($model, 'jns_kelamin')->radioList(
	\app\models\Data::jns_kelamin()
)->label('Jenis Kelamin');?>
        <!-- ?php //$form->field($model, 'agama')->textInput(['maxlength' => true]) ?> -->
        <!-- ?= $form->field($model, 'agama')->dropDownList(
                                                \app\models\Data::agama(),
                                                ['prompt'=>'Pilih...'])->label('Agama'); ?> -->

        <?=$form->field($model, 'tempat_lahir')->textInput(['maxlength' => true])?>
        </div>

    <div class="row">
        <div class="col-sm-1">
        <!-- ?php //$form->field($model, 'tgl_lahir')->textInput() ?> -->
        <!-- ?= $form->field($model, 'tgl')->dropDownList(
                                                \app\models\Data::tgl(),
                                                ['prompt'=>'Tanggal...'])->label('Tanggal'); ?> -->

        <?php
// Normal select with ActiveForm & model
echo $form->field($model, 'tgl')->widget(Select2::classname(), [
	'data' => \app\models\Data::tgl(),
	'language' => 'en',
	'options' => ['placeholder' => 'Pilih Tanggal...'],
	'pluginOptions' => [
		'allowClear' => true,
	],
])->label('Tanggal'); ?>
        </div>

        <div class="col-sm-1">
        <!-- ?= $form->field($model, 'bln')->dropDownList(
                                                \app\models\Data::bln(),
                                                ['prompt'=>'Bulan...'])->label('Bulan'); ?> -->


        <?php
// Normal select with ActiveForm & model
echo $form->field($model, 'bln')->widget(Select2::classname(), [
	'data' => \app\models\Data::bln(),
	'language' => 'en',
	'options' => ['placeholder' => 'Pilih Bulan...'],
	'pluginOptions' => [
		'allowClear' => true,
	],
])->label('Bulan'); ?>
        </div>
        <div class="col-sm-1">
        <!-- ?= $form->field($model, 'thn')->dropDownList(
                                                \app\models\Data::thn(1956,35),
                                                ['prompt'=>'Tahun...'])->label('Tahun'); ?> -->
        <?php
// Normal select with ActiveForm & model
echo $form->field($model, 'thn')->widget(Select2::classname(), [
	'data' => \app\models\Data::thn(),
	'language' => 'en',
	'options' => ['placeholder' => 'Pilih Tahun...'],
	'pluginOptions' => [
		'allowClear' => true,
	],
])->label('Tahun'); ?>
        </div>
            <div class="col-sm-3">
                <?=$form->field($model, 'no_telp')->textInput(['maxlength' => true])?>
                <?=$form->field($model, 'foto')->fileInput()?>
            </div>

        <div class="col-sm-3">
            <?=$form->field($model, 'alamat')->textarea(['rows' => 6])?>

        </div>
    </div>
    </div>

    <div class="form-group">
        <?=Html::submitButton($model->isNewRecord ? 'INPUT' : 'create', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
