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
<body class="covoare_body">

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
            <div class="col-lg-12 header">
                <div class="header_text">
                    <div class="continut">
                        <h3>Comenzi telefonice:</h3>
                        <h3 class="telefon">0344.802.804</h3>
                        <h3 class="telefon">0733.802.804</h3>
                        <h4 class="orar">Luni-Vineri: 9-19; Sambata: 10-14</h4>
                        <h4>Ploiesti, Str Targovistei, nr 2</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container_main">
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container container_footer">
            <p class="pull-left">&copy; Context media SRL <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
