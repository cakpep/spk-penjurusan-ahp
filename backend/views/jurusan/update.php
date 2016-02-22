<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jurusan */

$this->title = 'Update Jurusan : ' . ' ' . $model->jurusan;
$this->params['breadcrumbs'][] = ['label' => 'Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jurusan, 'url' => ['view', 'id' => $model->jurusan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jurusan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
