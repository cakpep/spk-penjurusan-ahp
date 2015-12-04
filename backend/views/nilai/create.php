<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nilai */

$this->title = 'Input Nilai Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
