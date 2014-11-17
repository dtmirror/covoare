<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Curcubeu | Spalatoria de covoare Ploiesti';
?>
<div class="site-index">
    <div class="row">
        <div class="col-lg-6 homepage justify">
            <h1>Cine suntem?</h1>
            <p>Spalatoria de covoare Curcubeu a aparut din dorinta de a avea la indemana un serviciu care sa respecte nevoia de igiena a oricarei familii.</p>
            <h4>Stiai ca...</h4>
            <p>...in covor se gasesc de 4000 de ori mai multe bacterii decat pe toaleta? Aspiratorul nu indeparteaza decat partial aceste bacterii. Pentru o curatare adecvata, este recomandata spalarea covorului cel putin o data pe an.</p>
            <h4 style="margin: 30px 0 20px 0;">La spalatoria de covoare Curcubeu, urmam trei reguli importante in curatarea covorului:</h4>
            <ul>
                <li>La spalare folosim detergent PROFESIONAL biodegradabil, conceput exclusiv pentru spalarea covoarelor</li>
                <li>Clatim covorul pentru a elimina COMPLET murdaria, scamele si urmele de detergent din tesatura</li>
                <li>Uscam covorul in mediu controlat, RAPID, pentru a preveni aparitia bacterilor, mucegaiului sau a mirosurilor neplacute</li>
            </ul>
            <p style="margin-top: 30px;">Pentru a elimina riscul deteriorarii covorului in timpul curatarii, am ales sa folosim doar utilaje de spalare profesionale, specifice curatarii covoarelor.</p>
        </div>
        <div class="col-lg-1">&nbsp;</div>
        <div class="col-lg-5 homepage justify">
            <h1>Ce facem?</h1>
            <ul>
                <li>Venim si ridicam covoarele de la adresa dumneavoastra. <b>Transport gratuit in Ploiesti</b></li>
                <li>Spalam si uscam covoarele cu utilaje profesionale, in conditii controlate</li>
                <li>Va returnam covoarele curate in 48 de ore</li>
            </ul>
            <div class="wrapCalculator effect7" id="calculator">
                <h1>Calculator</h1>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-4">Lungime (cm)</div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4">Latime (cm)</div>
                </div>
                <div class="row odd">
                    <div class="col-lg-3">Covor 1</div>
                    <div class="col-lg-4"><input type="text" value="200" id="covor_1_lung" onfocus="this.value='';"></div>
                    <div class="col-lg-1 multiply"><span class="glyphicon glyphicon-remove"></span></div>
                    <div class="col-lg-4"><input type="text" value="300" id="covor_1_lat" onfocus="this.value='';"></div>
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
    <?php if(count($parteneri)) { ?>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-6">
            <div id="parteneri_content">
                <ul id="parteneri_ul">
                    <?php foreach ($parteneri as $partener) { ?>
                    <li><?= Html::a(Html::img('/images/parteneri/' . $partener->partener_poza), 'http://' . $partener->partener_link, ['target' => '_blank', 'title' => $partener->partener_name]) ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
