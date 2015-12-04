<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Guru */

$this->title = 'Tambah Data Guru';
$this->params['breadcrumbs'][] = ['label' => 'Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
