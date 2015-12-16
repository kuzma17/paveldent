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
        'brandLabel' => 'Paveldent Admin panel',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if(Yii::$app->user->identity) {
        $menuItems = [
            ['label' => 'Главная', 'url' => ['/']],
           //['label' => 'Pages', 'url' => ['/page']],
            ['label' => 'Статьи', 'url' => ['/text']],
            ['label' => 'Услуги', 'url' => ['/service']],
            ['label' => 'Акции', 'url' => ['/stock']],
            //['label' => 'Sertificate', 'url' => ['/sertificate']],
            ['label' => 'Блог', 'items' => [
                ['label' => 'Category', 'url' => ['/category']],
                ['label' => 'Posts', 'url' => ['/post']],
                ['label' => 'Comments', 'url' => ['/comment']],
            ]
            ],
            //['label' => 'Users', 'url' => ['/user']],
            //['label' => 'Home', 'url' => ['/site/index']],
        ];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    $menuItems[] = ['label' => 'Go to site', 'url' => ['/..']];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Copyright <?= date('Y') ?> &copy; paveldent.com.ua &nbsp;&nbsp;Designed by <a href='mailto:v.kuzma@mail.ru' title='написать письмо вебмастеру'>Kuzma</a></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
