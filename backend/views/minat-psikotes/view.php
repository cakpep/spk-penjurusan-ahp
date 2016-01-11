<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MinatPsikotes */

$this->title = $model->nis;
$this->params['breadcrumbs'][] = ['label' => 'Minat & Psikotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minat-psikotes-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-sm-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'nis',
                'minat',
                'psikotes',
            ],
        ]) ?>
        </div>
    </div>
</div>
