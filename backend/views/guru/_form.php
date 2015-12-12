<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Guru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-form">

    <?php $form = ActiveForm::begin([
                    //'id' => 'search-form',
                    'method' => 'post',
                    'action' => $model->isNewRecord ? ['create'] : ['update','id'=>$model->nip],
                    'options' =>['enctype'=>'multipart/form-data'] // important
                ]); ?>

    <div class="row">
        <div class="col-sm-3">
        <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        </div>
        <div class="col-sm-3">
        <?php //$form->field($model, 'jns_kelamin')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>
        <?= $form->field($model, 'jns_kelamin')->radioList(
                                                \app\models\Data::jns_kelamin() 
                                                )->label('Jenis Kelamin'); ?>
        <?php //$form->field($model, 'agama')->textInput(['maxlength' => true]) ?>
        <!-- ?= $form->field($model, 'agama')->dropDownList(
                                                \app\models\Data::agama(), 
                                                ['prompt'=>'Pilih...'])->label('Agama'); ?> -->
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        <?php 
            // Normal select with ActiveForm & model
            echo $form->field($model, 'agama')->widget(Select2::classname(), [
                'data' => \app\models\Data::agama(), 
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Agama'); ?>            
    
        </div>
        <div class="col-sm-3">
        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
        
        <?php //$form->field($model, 'tgl_lahir')->textInput() ?>
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
                    'allowClear' => true
                ],
            ])->label('Tanggal'); ?>       

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
                    'allowClear' => true
                ],
            ])->label('Bulan'); ?>       

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
                    'allowClear' => true
                ],
            ])->label('Tahun'); ?>       

        <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'foto')->fileInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'INPUT' : 'create', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
