<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MinatPsikotes */

$this->title = 'MINAT & PSIKOTES SISWA';
$this->params['breadcrumbs'][] = ['label' => 'Minat & Psikotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minat-psikotes-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
