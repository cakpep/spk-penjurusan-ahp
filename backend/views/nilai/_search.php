<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NilaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_nilai') ?>

    <?= $form->field($model, 'nis') ?>

    <?= $form->field($model, 'id_matapelajaran') ?>

    <?= $form->field($model, 'nilai') ?>

    <?= $form->field($model, 'tahun_ajaran') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
