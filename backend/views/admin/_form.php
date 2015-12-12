<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

	<?php $form = ActiveForm::begin([
                    //'id' => 'search-form',
                    'method' => 'post',
                    'action' => $model->isNewRecord ? ['create'] : ['update','id'=>$model->nip],
                   
                ]); ?>
			    
            <div class="row">
        		<div class="col-sm-3">
			    <?php $form = ActiveForm::begin(); ?>

			    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

			    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
			    </div>
    		</div>
			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'INPUT' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>

			    <?php ActiveForm::end(); ?>

</div>
