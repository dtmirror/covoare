<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Despre;
use letyii\tinymce\Tinymce;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
$this->title = 'Adauga partener';
$this->params['breadcrumbs'][] = $this->title;

$model->partener_name = $partener->partener_name;
$model->partener_link = $partener->partener_link;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'add-partener-form',
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'partener_name')->textInput(array('placeholder' => \Yii::t('app', 'Nume partener')))->label('Nume partener') ?>
            <?= $form->field($model, 'partener_link')->textInput(array('placeholder' => \Yii::t('app', 'Link partener')))->label('Link partener (fara "http://" ex. www.google.com)') ?>
            <?= $form->field($model, 'partener_poza')->widget(FileInput::classname(), [
                'options' => [
                    'multiple' => false,
                    'accept' => 'image/*',
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                    'showRemove' => false,
                    'initialPreview'=>[
                        Html::img("/images/parteneri/" . $partener->partener_poza, ['class'=>'file-preview-image', 'alt'=>'', 'title'=>'']),
                    ],
                    'overwriteInitial'=> true
                ],
            ])->label("Poza partener");
            ?>
            <div class="form-group">
                <?= Html::a(\Yii::t('app', 'Anuleaza'),['/partener'],['class' => 'btn btn-primary', 'name' => 'cancel-despre-button']) ?>
                <?= Html::submitButton(\Yii::t('app', 'Salveaza'), ['class' => 'btn btn-primary align-right', 'name' => 'despre-button']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
