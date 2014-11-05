<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\Html;

class Imagine extends ActiveRecord {

    public static function tableName()
    {
        return 'galerie_poze';
    }

    public function getImage() {
        return Html::img('/images/galerie_poze/' . $this->poza_name);
    }
}
