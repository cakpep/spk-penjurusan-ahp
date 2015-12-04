<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-form">

    <?php $form = ActiveForm::begin([
    //'id' => 'search-form',
    'method' => 'post',
    'action' => ['create']
    ]); ?>

	<div class="row">
        <div class="col-sm-3">
	    <?= $form->field($model, 'kelas')->textInput(['maxlength' => true]) ?>
	    </div>
        <div class="col-sm-3">
	    <?= $form->field($model, 'sub_kls')->textInput(['maxlength' => true]) ?>
	     </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'INPUT' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
