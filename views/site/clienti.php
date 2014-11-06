<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;
use app\models\Util;

/* @var $this yii\web\View */
$this->title = 'Ce spun clientii nostri?';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-clienti">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
    <?php foreach ($testimoniale as $testimonial) { ?>
        <div class="col-lg-12 testimonial">
            <h3><?= $testimonial->testimonial_client ?>:</h3>
            <blockquote>
                <?= Html::decode(nl2br($testimonial->testimonial_text)) ?>
            </blockquote>
        </div>
    <?php } ?>
    </div>
</div>
