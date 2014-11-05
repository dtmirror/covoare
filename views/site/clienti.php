<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Clientii nostri';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-clienti">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
    foreach ($testimoniale as $testimonial) {
        print_r($testimonial);
    }
    ?>
</div>
