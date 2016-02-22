<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Matapelajaran */

$this->title = 'Edit Mata Pelajaran ' . ' ' . $model->matapelajaran;
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->matapelajaran, 'url' => ['view', 'id' => $model->matapelajaran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matapelajaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
