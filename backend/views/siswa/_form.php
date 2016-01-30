<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Siswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-form">

    <?php $form = ActiveForm::begin([
            //'id' => 'search-form',
            'method' => 'post',
            'action' => $model->isNewRecord ? ['create'] : ['update','id'=>$model->nis],
            //'action' => ['create'],
            'options' =>['enctype'=>'multipart/form-data'] // important
        ]); ?>


    <div class="row">
        <div class="col-sm-3">
        <?= $form->field($model, 'nis')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'id_kelas')->textInput(['maxlength' => true]) ?>
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

        <?php 
                if($model->isNewRecord){
                    // Normal select with ActiveForm & model
                    echo $form->field($nilai, 'tahun_ajaran')->widget(Select2::classname(), [
                        'data' => \app\models\Data::tahun_ajaran(), 
                        'language' => 'en',
                        'options' => ['placeholder' => 'Pilih...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('Tahun Ajaran'); 
                }
            ?>            

        </div>
    <div class="row">
        <div class="col-sm-3">
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
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
                    'allowClear' => true
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
                    'allowClear' => true
                ],
            ])->label('Bulan'); ?>      
        </div>
        <div class="col-sm-1">
        <!-- ?= $form->field($model, 'thn')->dropDownList(
                                                \app\models\Data::thn(1996,10), 
                                                ['prompt'=>'Tahun...'])->label('Tahun'); ?> -->
        <?php 
            // Normal select with ActiveForm & model
            echo $form->field($model, 'thn')->widget(Select2::classname(), [
                'data' => \app\models\Data::thn(1995,10), 
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih Tahun...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Tahun'); ?>     
        
        </div>
    
        <div class="col-sm-3">
        <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>

        <!-- ?php //$form->field($model, 'jns_kelamin')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?> -->
        <?= $form->field($model, 'jns_kelamin')->radioList(
                                                \app\models\Data::jns_kelamin() 
                                                )->label('Jenis Kelamin'); ?>
        </div>
    
    <div class="row">
        <div class="col-sm-3">
        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'foto')->fileInput() ?>

        <!-- ?= $form->field($nilai, 'tahun_ajaran')->dropDownList(
                                                \app\models\Data::tahun_ajaran(), 
                                                ['prompt'=>'Pilih...'])->label('Tahun Ajaran'); ?> -->
        

        </div>
    </div>
    </div>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'PROSES' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
