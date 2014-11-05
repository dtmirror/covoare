<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= \Yii::t('app', 'about') ?>
    </p>

    <code><?= __FILE__ ?></code>
</div>
