<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\db\ActiveQuery;
use app\models\Oferta;
use app\models\Util;

class OfertaForm extends Model
{
    public $oferta_id;
    public $oferta_title;
    public $oferta_text;
    public $oferta_poza;
    public $oferta_data;
    public $oferta_status;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // oferta_text is required
            ['oferta_text', 'filter', 'filter' => 'trim'],
            [['oferta_text'], 'required'],
            [['oferta_title', 'oferta_poza', 'oferta_status'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function add()
    {
        if ($this->validate())
        {
            $form = new Oferta;
            $form->oferta_title = $this->oferta_title;
            $form->oferta_text = $this->oferta_text;
            $form->oferta_status = $this->oferta_status;
            $form->oferta_data = time();
            $form->oferta_poza = $form->oferta_data . "_". Util::formatFileName($this->oferta_poza->name);
            $form->save();
            return $form;
        }
    }

    /**
     * @return array
     */
    public function update($oferta)
    {
        if ($this->validate())
        {
            $oferta->oferta_data = time();
            if ($this->oferta_poza) {
                unlink("images/oferte/" . $oferta->oferta_poza);
                $oferta->oferta_poza = $oferta->oferta_data . "_" . Util::formatFileName($this->oferta_poza->name);
            }
            $oferta->oferta_title = $this->oferta_title;
            $oferta->oferta_text = $this->oferta_text;
            $oferta->oferta_status = $this->oferta_status;
            $oferta->update();
            return $oferta;
        }
        return false;
    }
}
