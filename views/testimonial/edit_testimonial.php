<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Despre;

/* @var $this yii\web\View */
$this->title = 'Clientii nostri';
$this->params['breadcrumbs'][] = $this->title;

$model->testimonial_client = $testimonial->testimonial_client;
$model->testimonial_text = $testimonial->testimonial_text;
$model->testimonial_status = $testimonial->testimonial_status;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'despre-form',
    ]); ?>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'testimonial_client')->textInput(array('placeholder' => \Yii::t('app', 'Nume client'))) ?>
            <?= $form->field($model, 'testimonial_text')->textarea(['rows' => '6']) ?>
            <?= $form->field($model, 'testimonial_status')->checkbox(['label' => \Yii::t('app', 'Vizibil pe site')]); ?>
            <div class="form-group">
                <?= Html::a(\Yii::t('app', 'Anuleaza'),['admin/about'],['class' => 'btn btn-primary', 'name' => 'cancel-despre-button']) ?>
                <?= Html::submitButton(\Yii::t('app', 'Salveaza'), ['class' => 'btn btn-primary align-right', 'name' => 'despre-button']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
