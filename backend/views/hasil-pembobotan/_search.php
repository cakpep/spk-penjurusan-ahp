<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NilaiPembobotanKriteriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nis') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'kelas') ?>

    <?= $form->field($model, 'penjurusan') ?>
    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
