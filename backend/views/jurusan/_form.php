<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jurusan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurusan-form">

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
        
        <div class="col-sm-2">
	    <?= $form->field($model, 'jurusan')->textInput(['maxlength' => true]) ?>
	    </div>
        <div class="col-sm-2">
        <!-- ?= $form->field($model, 'id_jurusan')->textInput() ?> -->
        </div>
        <div class="col-sm-2">
        <!-- ?= $form->field($model, 'standard_bobot')->textInput(['maxlength' => true]) ?> -->
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'INPUT' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
