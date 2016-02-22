<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MatapelajaranGuru */

$this->title = 'Tambah Mata Pelajaran Guru';
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matapelajaran-guru-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
