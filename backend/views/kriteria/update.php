<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */

$this->title = 'Update Kriteria : ' . ' ' . $model->prioritas;
$this->params['breadcrumbs'][] = ['label' => 'Kriteria', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prioritas, 'url' => ['view', 'id' => $model->prioritas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kriteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
