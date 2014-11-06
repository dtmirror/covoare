<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Despre spalare';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-4">
            <?= $despre_text->despre_text ?>
        </div>
        <div class="col-lg-8">
            <div id="galerie_content">
                <ul id="galerie_ul">
                    <?php foreach ($galerie_poze as $poza) { ?>
                    <li><?= Html::img('/images/galerie_poze/' . $poza->poza_name) ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
