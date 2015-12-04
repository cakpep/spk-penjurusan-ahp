<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    NavBar::begin([
        'brandLabel' => 'My Schools',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse',// navbar-fixed-top',
        ],
        'innerContainerOptions'=>[
             'class'=>'container-fluid',
        ]
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems =[ 
                ['label' => 'SISWA', 'url' => ['/siswa']],
                ['label' => 'NILAI', 'url' => ['/nilai']],
                ['label' => 'MINAT PSIKOTES', 'url' => ['/minat-psikotes']],
                ['label' => 'MATAPELAJARAN GURU', 'url' => ['/matapelajaran-guru']],
                ['label' => 'MATAPELAJARAN', 'url' => ['/matapelajaran']],
                ['label' => 'KRITERIA', 'url' => ['/kriteria']],
                ['label' => 'JURUSAN', 'url' => ['/jurusan']],
                ['label' => 'GURU', 'url' => ['/guru']],
                ['label' => 'BERITA', 'url' => ['/berita']],
                ['label' => 'ADMIN', 'url' => ['/admin']],
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ]];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    
    ?>

        <div class="container-fluid">
            <div id="layout-menu" class='col-md-2'>
              <?= $this->render('menu_adgusi') ?>
            </div>            
            <div class='col-md-10'>
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
            </div>
        </div>    
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
