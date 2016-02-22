<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Matapelajaran */

$this->title = 'Tambah Data Matapelajaran';
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matapelajaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
