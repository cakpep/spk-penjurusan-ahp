<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\SiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'nis') ?>

            <!-- ?= $form->field($model, 'password') ?> -->

            <?= $form->field($model, 'nama') ?>
            <?php //$form->field($model, 'id_kelas') ?>
            <!-- ?= $form->field($model, 'id_kelas')->dropDownList(
                                                \app\models\Data::Kelas(), 
                                                ['prompt'=>'Pilih Kelas...'])->label('Kelas'); ?> -->

            <?php 
            // Normal select with ActiveForm & model
            echo $form->field($model, 'id_kelas')->widget(Select2::classname(), [
                'data' => \app\models\Data::Kelas(), 
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih Kelas...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Kelas'); ?>       
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'tempat_lahir') ?>

            <?php //$form->field($model, 'tgl_lahir') ?>
            <!-- ?= $form->field($model, 'tgl')->dropDownList(
                                                \app\models\Data::tgl(), 
                                                ['prompt'=>'Tanggal...'])->label('Tanggal'); ?>
            ?= $form->field($model, 'bln')->dropDownList(
                                                \app\models\Data::bln(), 
                                                ['prompt'=>'Bulan...'])->label('Bulan'); ?>
            ?= $form->field($model, 'thn')->dropDownList(
                                                \app\models\Data::thn(1996,10), 
                                                ['prompt'=>'Tahun...'])->label('Tahun'); ?> -->        
        </div>
        <div class="col-sm-4">
            <!-- ?php  echo $form->field($model, 'no_telp') ?> -->

           <!-- ?= $form->field($model, 'jns_kelamin')->radioList(
                                                \app\models\Data::jns_kelamin() 
                                                )->label('Jenis Kelamin'); ?> -->

            <?php  //echo $form->field($model, 'alamat') ?>

            <?php //echo $form->field($model, 'foto') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
