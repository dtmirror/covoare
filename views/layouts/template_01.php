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
        <div id="menubar" class="row"></div>
        <div id="pageHeader" class="row">
            <div class="container">
                <?php
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        ['label' => 'Acasa', 'url' => ['/site/index']],
                        ['label' => 'Despre noi', 'url' => ['/site/despre-noi']],
                        ['label' => 'Despre spalare', 'url' => ['/site/despre-spalare']],
                        ['label' => 'Oferte speciale', 'url' => ['/site/oferte']],
                        ['label' => 'Clientii nostri', 'url' => ['/site/clienti']],
                        ['label' => 'Contact', 'url' => ['/site/contact']],
                        !Yii::$app->user->isGuest ?
                            ['label' => 'Admin',
                                'url' => ['/admin'],
                                'linkOptions' => ['data-method' => 'post']] : '',
                    ],
                ]);
                ?>
            </div>
            <div class="header_bg">
                <div class="container">
                    <div class="curcubeu">
                        <img src="/images/common/logo_curcubeu.png" alt="" />
                    </div>
                    <div class="header_main_text">
                        <p>Spalatorie de covoare cu ridicare de la domiciliu.</p>
                        <p>Livrare in 2 zile, indiferent de Vreme.</p>
                    </div>
                    <div class="header_text">
                        <div class="continut">
                            <h3>Comenzi telefonice:</h3>
                            <h3 class="telefon">0344.802.804</h3>
                            <h3 class="telefon">0733.802.804</h3>
                            <h4 class="orar">Luni-Vineri: 9-19; Sambata: 10-14</h4>
                            <h4>Ploiesti, Str Targovistei, nr 2</h4>
                        </div>
                    </div>
                    <div class="facebook">
                        <?= Html::a('<img src="/images/common/like-us-on-facebook-button.png" alt="" />', 'https://www.facebook.com/pages/Curcubeu-spalatorie-profesionala-de-covoare/500630123305500', ['target' => '_blank']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="headerBottom" class="row"></div>
        <div class="container container_main">
            <?= $content ?>
        </div>
    </div>
    <div class="footer">
        <?php $this->beginContent('@app/views/layouts/footer.php'); ?>
        <?php $this->endContent(); ?>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
