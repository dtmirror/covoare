<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;
use app\models\Util;

/* @var $this yii\web\View */
$this->title = 'Oferte speciale';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-clienti">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
    <?php foreach ($oferte as $oferta) { ?>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 oferte">
            <h3><?= $oferta->oferta_title ?>:</h3>
            <?= Html::img('/images/oferte/' . $oferta->oferta_poza) ?>
            <p><?= Html::decode($oferta->oferta_text) ?></p>
        </div>
    <?php } ?>
    </div>
</div>
