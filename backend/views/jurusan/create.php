<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jurusan */

$this->title = 'Tambah Jurusan';
$this->params['breadcrumbs'][] = ['label' => 'Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurusan-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
