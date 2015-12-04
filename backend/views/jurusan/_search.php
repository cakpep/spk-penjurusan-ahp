<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JurusanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurusan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
            <div class="col-sm-2">
                <?= $form->field($model, 'id_jurusan') ?>
            </div>
            <div class="col-sm-2">
                <?= $form->field($model, 'jurusan') ?>
            </div>
        </div>
       
    <?php ActiveForm::end(); ?>

</div>
