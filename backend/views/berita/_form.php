<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Berita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-form">

    <?php $form = ActiveForm::begin([
    //'id' => 'search-form',
    'method' => 'post',
    'action' => ['create']
    ]); ?>

    <div class="row">
        <div class="col-sm-6">
        <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'isi_berita')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full' //basic, standard, full
            ]) ?>
        </div>
        <div class="col-sm-4">
        <?php //$form->field($model, 'id_berita')->textInput() ?>
        
        <?php //$form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'tgl_input')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'PROSES' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
