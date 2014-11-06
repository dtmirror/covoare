<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
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
                //'brandLabel' => '',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse frontend-bg',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Acasa', 'url' => ['/site/index']],
                    ['label' => 'Despre spalare', 'url' => ['/site/about']],
                    ['label' => 'Oferte speciale', 'url' => ['/site/oferte']],
                    ['label' => 'Clientii nostri', 'url' => ['/site/clienti']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    !Yii::$app->user->isGuest ?
                        ['label' => 'Admin',
                            'url' => ['/admin'],
                            'linkOptions' => ['data-method' => 'post']] : '',
                ],
            ]);
            NavBar::end();
        ?>
        <div class="row">
            <div class="col-lg-12 header"></div>
        </div>

        <div class="container">
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; www.covoare-curcubeu.ro <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
