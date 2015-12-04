<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Matapelajaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matapelajaran-form">
	<?php $form = ActiveForm::begin([
    //'id' => 'search-form',
    'method' => 'post',
    'action' => ['create']
	]); ?>

	<div class="row">
        <div class="col-sm-2">
	    <?php //$form->field($model, 'id_jurusan')->textInput() ?>
	    <!-- ?= $form->field($model,'id_jurusan')->dropDownList(
                                                \app\models\Data::jurusan(), 
                                                ['prompt'=>'Pilih Jurusan...'])->label('Jurusan'); ?> -->
	    <?php 
            // Normal select with ActiveForm & model
            echo $form->field($model, 'id_jurusan')->widget(Select2::classname(), [
                'data' => \app\models\Data::jurusan(), 
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih Jurusan...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Jurusan'); ?>            
        </div>
        <div class="col-sm-2">
	    <?= $form->field($model, 'id_matapelajaran')->textInput() ?>
	    </div>
        <div class="col-sm-2">
	    <?= $form->field($model, 'matapelajaran')->textInput(['maxlength' => true]) ?>
		</div>
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'INPUT' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
