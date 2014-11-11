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
        <div id="main_pic">
            <div class="row">
                <div class="col-lg-7">
                    <img style="position: relative; top: 0; opacity: 0; border: solid #000 1px; left: 0;" id="Image-Maps_2201303140603336" src="../images/layout/bg.prices.png" usemap="#Image-Maps_2201303140603336" border="0" width="1080" height="740" alt="">
                    <map id="_Image-Maps_2201303140603336" name="Image-Maps_2201303140603336">
                        <map id="imgmap2013314122214" name="imgmap2013314122214">
                            <area shape="poly" alt="" title="" coords="144,396,141,429,352,446,352,446" href="site/index" id="home" target="">
                            <area shape="poly" alt="" title="" coords="155,351,149,381,354,438" href="/site/despre-noi" target="" id="about">
                            <area shape="poly" alt="" title="" coords="174,308,161,330,354,425,344,419" href="/site/clienti" target="" id="partners">
                            <area shape="poly" alt="" title="" coords="202,266,184,283,351,406,351,406,350,400" href="/site/oferte" target="" id="prices">
                            <area shape="poly" alt="" title="" coords="237,230,214,247,319,348" href="/site/contact" target="" id="contact">
                            <area shape="poly" alt="" title="" coords="254,215,273,198,331,316,327,329" href="http://www.facebook.com/pages/Curcubeu-spalatorie-profesionala-de-covoare/500630123305500" target="_blank" id="fb">
                        </map>
                    </map>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4 homepage">
                    <div class="contact">
                    <h3>Comenzi telefonice:</h3>
                        <ul>
                            <li>0344.802.804</li>
                            <li>0733.802.804</li>
                        </ul>
                    </div>
                    <ul>
                        <li>Venim si ridicam covoarele de la adresa dumneavoastra. <b>Transport gratuit in Ploiesti</b></li>
                        <li>Spalam si uscam covoarele cu utilaje profesionale, in conditii controlate</li>
                        <li>Va returnam covoarele curate in 48 de ore</li>
                    </ul>
                    <h3 style="margin-top: 40px;">Calculator pret (9 RON / mp)</h3>
                    <div class="calculator" id="calculator">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-4">Lungime (cm)</div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-4">Latime (cm)</div>
                        </div>
                        <div class="row odd">
                            <div class="col-lg-3">Covor 1</div>
                            <div class="col-lg-4"><input type="text" value="100" id="covor_1_lung" onfocus="this.value='';"></div>
                            <div class="col-lg-1 multiply"><span class="glyphicon glyphicon-remove"></span></div>
                            <div class="col-lg-4"><input type="text" value="100" id="covor_1_lat" onfocus="this.value='';"></div>
                        </div>
                        <div class="row even">
                            <div class="col-lg-3">Covor 2</div>
                            <div class="col-lg-4"><input type="text" value="0" id="covor_2_lung" onfocus="this.value='';"></div>
                            <div class="col-lg-1 multiply"><span class="glyphicon glyphicon-remove"></span></div>
                            <div class="col-lg-4"><input type="text" value="0" id="covor_2_lat" onfocus="this.value='';"></div>
                        </div>
                        <div class="row odd">
                            <div class="col-lg-3">Covor 3</div>
                            <div class="col-lg-4"><input type="text" value="0" id="covor_3_lung" onfocus="this.value='';"></div>
                            <div class="col-lg-1 multiply"><span class="glyphicon glyphicon-remove"></span></div>
                            <div class="col-lg-4"><input type="text" value="0" id="covor_3_lat" onfocus="this.value='';"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"><b>Transport</b></div>
                            <div class="col-lg-8" id="transport"></div>
                            <div class="col-lg-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"><b>Pret total:</b></div>
                            <div class="col-lg-8" id="rezultat"></div>
                            <div class="col-lg-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?= Html::submitButton(\    Yii::t('app', 'Calculeaza'), ['class' => 'btn btn-calculator align-right', 'name' => 'calculeaza-button', 'onclick' => 'calculeaza();']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?= Html::a('Vezi termeni si conditii', ['/site/despre-spalare']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
