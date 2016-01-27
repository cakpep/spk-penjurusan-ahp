<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Nilai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-form">

    <?php 
    if(isset($action)){
            $form = ActiveForm::begin([
        //'id' => 'search-form',
        'method' => 'post',
        'action' => ['create']
        ]); 
    }else{
        $form = ActiveForm::begin(); 
 
    }
    ?>

    <div class="row">
        <div class="col-sm-3">
        <?php //$form->field($model, 'id_nilai')->textInput() ?>

        <?php //$form->field($model, 'nis')->textInput(['maxlength' => true]) ?>
         <!-- ?= $form->field($model,'nis')->dropDownList(
                                                \app\models\Data::nis(), 
                                                ['prompt'=>'Pilih...'])->label('NIS'); ?>  -->

        <?php 
            // Normal select with ActiveForm & model
            echo $form->field($model, 'nis')->widget(Select2::classname(), [
                'data' => \app\models\Data::nis(), 
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('NIS'); ?>            

        <?php //$form->field($model, 'id_matapelajaran')->textInput() ?>
        <!-- ?= $form->field($model,'id_matapelajaran')->dropDownList(
                                                \app\models\Data::matapelajaranGuru(), 
                                                ['prompt'=>'Pilih Mata Pelajaran...'])->label('Mata Pelajaran'); ?>  -->
        <?php 
            // Normal select with ActiveForm & model
            echo $form->field($model, 'id_matapelajaran')->widget(Select2::classname(), [
                'data' => \app\models\Data::matapelajaranGuru(), 
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih Mata Pelajaran...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Mata Pelajaran'); ?>            

        </div>
        <div class="col-sm-3">

        <?= $form->field($model, 'nilai')->textInput() ?>

        <?php //$form->field($model, 'tahun_ajaran')->textInput(['maxlength' => true]) ?>
        <!-- ?= $form->field($model, 'tahun_ajaran')->dropDownList(
                                                \app\models\Data::tahun_ajaran(), 
                                                ['prompt'=>'Pilih...'])->label('Tahun Ajaran'); ?> -->
        <?php 
            // Normal select with ActiveForm & model
            echo $form->field($model, 'tahun_ajaran')->widget(Select2::classname(), [
                'data' => \app\models\Data::tahun_ajaran(), 
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Tahun Ajaran'); ?>            

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'PROSES' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
