<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\MatapelajaranGuru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matapelajaran-guru-form">

    <?php $form = ActiveForm::begin([
	//'id' => 'search-form',
	'method' => 'post',
	'action' => $model->isNewRecord ? ['create'] : ['update', 'id' => $model->matapelajaran_guru],
	//'action' => ['create']
]);?>

    <div class="row">
        <div class="col-sm-3">
        <!-- ?= $form->field($model,'nip')->dropDownList(
                                                \app\models\Data::guru(),
                                                ['prompt'=>'Pilih Guru...'])->label('Guru'); ?> -->

        <?php
// Normal select with ActiveForm & model
echo $form->field($model, 'nip')->widget(Select2::classname(), [
	'data' => \app\models\Data::guru(),
	'language' => 'en',
	'options' => ['placeholder' => 'Pilih Guru...'],
	'pluginOptions' => [
		'allowClear' => true,
	],
])->label('Guru Pengampu'); ?>
        <?php //$form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'id_matapelajaran')->textInput() ?>
        <!-- ?= $form->field($model,'id_matapelajaran')->dropDownList(
                                                \app\models\Data::matapelajaran(),
                                                ['prompt'=>'Pilih Mata Pelajaran...'])->label('Mata Pelajaran'); ?>  -->
        <?php
// Normal select with ActiveForm & model
echo $form->field($model, 'id_matapelajaran')->widget(Select2::classname(), [
	'data' => \app\models\Data::matapelajaran(),
	'language' => 'en',
	'options' => ['placeholder' => 'Pilih Mata Pelajaran...'],
	'pluginOptions' => [
		'allowClear' => true,
	],
])->label('Mata Pelajaran'); ?>
        </div>
        <div class="col-sm-3">
        <!-- ?= $form->field($model,'id_kelas')->dropDownList(
                                                \app\models\Data::kelas_pilih(),
                                                ['prompt'=>'Pilih Kelas...'])->label('Kelas'); ?> -->

        <?php
// Normal select with ActiveForm & model
echo $form->field($model, 'id_kelas')->widget(Select2::classname(), [
	'data' => \app\models\Data::kelas_pilih(),
	'language' => 'en',
	'options' => ['placeholder' => 'Pilih Kelas...'],
	'pluginOptions' => [
		'allowClear' => true,
	],
])->label('Kelas'); ?>
        <?php //$form->field($model, 'sub_kls1')->textInput(['maxlength' => true]) ?>
        <?=$form->field($model, 'subkls')->checkboxList(
	\app\models\Data::sub_kls1()
)->label('Sub Kelas');?>
        <?php //$form->field($model, 'sub_kls2')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
        <?php //$form->field($model, 'sub_kls3')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'sub_kls4')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'sub_kls5')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'sub_kls6')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?=Html::submitButton($model->isNewRecord ? 'INPUT' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
