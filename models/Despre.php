<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Description of Despre
 *
 * @author Armand Niculescu <armand@aim4solutions.com>
 */
class Despre extends ActiveRecord {

    public static function tableName()
    {
        return 'despre';
    }
}
