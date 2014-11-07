<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\db\ActiveQuery;
use app\models\Partener;
use app\models\Util;

class PartenerForm extends Model
{
    public $partener_id;
    public $partener_name;
    public $partener_link;
    public $partener_poza;
    public $partener_data;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // partener_name is required
            ['partener_name', 'filter', 'filter' => 'trim'],
            [['partener_name', 'partener_poza'], 'required'],
            [['partener_link'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function add()
    {
        if ($this->validate())
        {
            $form = new Partener;
            $form->partener_name = $this->partener_name;
            $form->partener_link = $this->partener_link;
            $form->partener_data = time();
            $form->partener_poza = $form->partener_data . "_". Util::formatFileName($this->partener_poza->name);
            $form->save();
            return $form;
        }
    }

    /**
     * @return array
     */
    public function update($partener)
    {
        if ($this->validate())
        {
            $partener->partener_data = time();
            if ($this->partener_poza) {
                unlink("images/parteneri/" . $partener->partener_poza);
                $partener->partener_poza = $partener->partener_data . "_" . Util::formatFileName($this->partener_poza->name);
            }
            $partener->partener_name = $this->partener_name;
            $partener->partener_link = $this->partener_link;
            $partener->update();
            return $partener;
        }
        return false;
    }
}
