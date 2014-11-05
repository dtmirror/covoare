<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\db\ActiveQuery;
use app\models\Despre;

class DespreForm extends Model
{
    public $despre_text;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // despre_text is required
            ['despre_text', 'filter', 'filter' => 'trim'],
            [['despre_text'], 'required'],
        ];
    }

    /**
     * @return array
     */
    public function add()
    {
        if ($this->validate())
        {
            $form = Despre::find()->one();
            if (!$form) {
                $form = new Despre;
            }

            $form->despre_text = $this->despre_text;
            $form->save();
            return $form;
        }
    }
}
