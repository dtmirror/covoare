<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use yii\db\ActiveRecord;

class Oferta extends ActiveRecord {

    public static function tableName()
    {
        return 'oferte';
    }
}
