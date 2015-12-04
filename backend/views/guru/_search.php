<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GuruSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'nip') ?>

            <?= $form->field($model, 'password') ?>

            <?= $form->field($model, 'nama') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'alamat') ?>

            <?= $form->field($model, 'agama') ?>

            <?php // echo $form->field($model, 'email') ?>

            <?php //echo $form->field($model, 'jns_kelamin') ?>

            <?php //echo $form->field($model, 'tempat_lahir') ?>
        </div>
        <div class="col-sm-4">
            <?php // echo $form->field($model, 'tgl_lahir') ?>

            <?php // echo $form->field($model, 'no_telp') ?>

            <?php // echo $form->field($model, 'foto') ?>
         </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
