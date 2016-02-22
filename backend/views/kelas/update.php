<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */

$this->title = 'Edit Kelas ' . ' ' . $model->kelas.' '.$model->sub_kls;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kelas, 'url' => ['view', 'id' => $model->kelas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kelas-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
