<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Description of Testimoniale
 *
 * @author Armand Niculescu <armand@aim4solutions.com>
 */
class Testimonial extends ActiveRecord {

    CONST STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return 'testimonial';
    }
}
