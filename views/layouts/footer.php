<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;

?>
<div class="container container_footer">
    <p class="pull-left">&copy; Context media SRL <?= date('Y') ?></p>
    <ul class="menu_buttons">
        <li><i class="glyphicon glyphicon-home"><?= Html::a('', ['site/index'], ['title' => 'Acasa']) ?></i></li>
        <li><i class="glyphicon glyphicon-user"><?= Html::a('', ['site/despre-noi'], ['title' => 'Despre Noi']) ?></i></li>
        <li><i class="glyphicon glyphicon-exclamation-sign"><?= Html::a('', ['site/despre-spalare'], ['title' => 'Despre Spalare']) ?></i></li>
        <li><i class="glyphicon glyphicon-fire"><?= Html::a('', ['site/oferte'], ['title' => 'Oferte speciale']) ?></i></li>
        <li><i class="glyphicon glyphicon-briefcase"><?= Html::a('', ['site/clienti'], ['title' => 'Clientii nostri']) ?></i></li>
        <li><i class="glyphicon glyphicon-envelope"><?= Html::a('', ['site/contact'], ['title' => 'Contact']) ?></i></li>
    </ul>
</div>

