<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php echo $this->render('_form', ['model' => $model]); ?>

        <p>
            <!-- ?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?> -->
        </p>

        <div class="row">
            <div class="col-sm-12">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'username',
                    'password',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
        ]); ?>
        </div>
    </div>
</div>
