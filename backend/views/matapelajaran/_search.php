<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatapelajaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matapelajaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- ?= $form->field($model, 'id_matapelajaran') ?> -->
    <div class="row">
        <div class="col-sm-2">
        <?= $form->field($model, 'id_jurusan') ?>
        </div>
        <div class="col-sm-2">
        <?= $form->field($model, 'id_matapelajaran') ?>
        </div>
        <div class="col-sm-2">
        <?= $form->field($model, 'matapelajaran') ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
