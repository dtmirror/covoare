<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\db\ActiveQuery;
use app\models\Imagine;
use app\models\Util;

class ImagineForm extends Model
{
    public $poza_id;
    public $poza_title;
    public $poza_text;
    public $poza_data;
    public $poza_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // poza_name is required
            [['poza_title', 'poza_text'], 'filter', 'filter' => 'trim'],
            [['poza_title', 'poza_text'], 'safe'],
            [['poza_name'], 'required'],
        ];
    }

    /**
     * @return array
     */
    public function add()
    {
        if ($this->validate())
        {
            $form = new Imagine;
            $form->poza_title = $this->poza_title;
            $form->poza_text = $this->poza_text;
            $form->poza_data = time();
            $form->poza_name = $form->poza_data . "_". Util::formatFileName($this->poza_name->name);
            $form->save();
            return $form;
        }
    }
}
