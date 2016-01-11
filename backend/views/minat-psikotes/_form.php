<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\MinatPsikotes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minat-psikotes-form">

    <?php $form = ActiveForm::begin([
     //'id' => 'search-form',
       'method' => 'post',
       'action' => $model->isNewRecord ? ['create'] : ['update','id'=>$model->id],
       //'action' => ['create'],
     ]); ?>

     <div class="row">
        <div class="col-sm-3">
	    <?php //$form->field($model, 'nis')->textInput(['maxlength' => true]) ?>
         <!-- ?= $form->field($model,'nis')->dropDownList(
                                                \app\models\Data::nis(), 
                                                ['prompt'=>'Pilih...'])->label('NIS'); ?> 
 -->
            <?php 
            // Normal select with ActiveForm & model
            echo $form->field($model, 'nis')->widget(Select2::classname(), [
                'data' => \app\models\Data::nis(), 
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('NIS'); ?>                                                

        </div>
        <div class="col-sm-3">
	    <?php //$form->field($model, 'minat')->textInput(['maxlength' => true]) ?>
	    <?= $form->field($model, 'minat')->radioList(
	                                                \app\models\Data::minat() 
	                                                )->label('Minat Siswa'); ?>
        </div>
        <div class="col-sm-3">
	    <?php //$form->field($model, 'psikotes')->textInput(['maxlength' => true]) ?>
	    <?= $form->field($model, 'psikotes')->radioList(
	                                                \app\models\Data::psikotes() 
	                                                )->label('Hasil Psikotes'); ?>
		</div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'INPUT' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
