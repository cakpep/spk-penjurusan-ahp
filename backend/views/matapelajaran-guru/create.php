<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MatapelajaranGuru */

$this->title = 'Tambah Matapelajaran Guru';
$this->params['breadcrumbs'][] = ['label' => 'Matapelajaran Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matapelajaran-guru-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
