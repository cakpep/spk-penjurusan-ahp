<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MinatPsikotesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minat-psikotes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-4">
        <?php //$form->field($model, 'id') ?>

        <?= $form->field($model, 'nis') ?>

        <?php //$form->field($model, 'minat') ?>
        <?= $form->field($model, 'minat')->radioList(
                                                    \app\models\Data::minat() 
                                                    )->label('Minat Siswa'); ?>

        <?php //$form->field($model, 'psikotes') ?>
        <?= $form->field($model, 'psikotes')->radioList(
                                                    \app\models\Data::psikotes() 
                                                    )->label('Hasil Psikotes'); ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
