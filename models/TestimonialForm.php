<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\db\ActiveQuery;
use app\models\Testimonial;

class TestimonialForm extends Model
{
    public $testimonial_id;
    public $testimonial_client;
    public $testimonial_text;
    public $testimonial_status;
    public $testimonial_data;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // testimonial_client, testimonial_text is required
            [['testimonial_client', 'testimonial_text'], 'filter', 'filter' => 'trim'],
            [['testimonial_client', 'testimonial_text'], 'required'],
            ['testimonial_status', 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function add()
    {
        if ($this->validate())
        {
            $form = new Testimonial;
            $form->testimonial_client = $this->testimonial_client;
            $form->testimonial_text = $this->testimonial_text;
            $form->testimonial_status = $this->testimonial_status;
            $form->testimonial_data = time();
            $form->save();
            return $form;
        }
    }

    /**
     * @return array
     */
    public function update($testimonial)
    {
        if ($this->validate())
        {
            $testimonial->testimonial_client = $this->testimonial_client;
            $testimonial->testimonial_text = $this->testimonial_text;
            $testimonial->testimonial_status = $this->testimonial_status;
            $testimonial->testimonial_data = time();
            $testimonial->update();
            return $testimonial;
        }
        return false;
    }
}
