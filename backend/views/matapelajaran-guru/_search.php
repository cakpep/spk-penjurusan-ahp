<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatapelajaranGuruSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matapelajaran-guru-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_matapelajaran_guru') ?>

    <?= $form->field($model, 'nip') ?>

    <?= $form->field($model, 'id_matapelajaran') ?>

    <?= $form->field($model, 'id_kelas') ?>

    <?= $form->field($model, 'sub_kls1') ?>

    <?php // echo $form->field($model, 'sub_kls2') ?>

    <?php // echo $form->field($model, 'sub_kls3') ?>

    <?php // echo $form->field($model, 'sub_kls4') ?>

    <?php // echo $form->field($model, 'sub_kls5') ?>

    <?php // echo $form->field($model, 'sub_kls6') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
