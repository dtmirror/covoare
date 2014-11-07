<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use yii\db\ActiveRecord;

class Oferta extends ActiveRecord {

    const STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return 'oferte';
    }
}
