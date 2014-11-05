<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Description of Oferta
 *
 * @author Armand Niculescu <armand@aim4solutions.com>
 */
class Oferta extends ActiveRecord {

    public static function tableName()
    {
        return 'oferte';
    }
}
