<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guru */

$this->title = 'Edit Guru : ' . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->nama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
