<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MatapelajaranGuru */

$this->title = 'Update Matapelajaran Guru: ' . ' ' . $model->id_matapelajaran_guru;
$this->params['breadcrumbs'][] = ['label' => 'Matapelajaran Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_matapelajaran_guru, 'url' => ['view', 'id' => $model->id_matapelajaran_guru]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matapelajaran-guru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
