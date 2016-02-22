<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MinatPsikotes */

$this->title = 'Edit Minat Psikotes : ' . ' ' . $model->nis;
$this->params['breadcrumbs'][] = ['label' => 'Minat Psikotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nis, 'url' => ['view', 'id' => $model->nis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="minat-psikotes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
