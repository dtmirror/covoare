<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Description of Testimoniale
 *
 * @author Armand Niculescu <armand@aim4solutions.com>
 */
class Testimonial extends ActiveRecord {

    public static function tableName()
    {
        return 'testimonial';
    }
}
