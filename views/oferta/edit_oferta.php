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
$this->title = 'Adauga oferta speciala';
$this->params['breadcrumbs'][] = $this->title;

$model->oferta_title = $oferta->oferta_title;
$model->oferta_text = $oferta->oferta_text;
$model->oferta_status = $oferta->oferta_status;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'add-oferta-form',
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'oferta_title')->textInput(array('placeholder' => \Yii::t('app', 'Titlu oferta')))->label('Titlu oferta') ?>
            <?= $form->field($model, 'oferta_poza')->widget(FileInput::classname(), [
                'options' => [
                    'multiple' => false,
                    'accept' => 'image/*',
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                    'showRemove' => false,
                    'initialPreview'=>[
                        Html::img("/images/oferte/$oferta->oferta_poza", ['class'=>'file-preview-image', 'alt'=>'', 'title'=>'']),
                    ],
                    'overwriteInitial'=> true
                ],
            ])->label("Poza oferta");
            ?>
            <?= $form->field($model, 'oferta_text')->widget(Tinymce::className(), [
               'options' => [
                    'id' => 'oferta_text',
                    'rows' => 10,
                ],
                'configs' => [ // Read more: http://www.tinymce.com/wiki.php/Configuration
                    'plugins' =>
                        'advlist autolink link image lists charmap print preview
                        searchreplace visualblocks code fullscreen
                        insertdatetime media table contextmenu paste',
                    'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
                ],
            ])->label('Text oferta');
            ?>
            <?= $form->field($model, 'oferta_status')->checkbox(['label' => \Yii::t('app', 'Vizibila pe site')]); ?>
            <div class="form-group">
                <?= Html::a(\Yii::t('app', 'Anuleaza'),['/oferta'],['class' => 'btn btn-primary', 'name' => 'cancel-despre-button']) ?>
                <?= Html::submitButton(\Yii::t('app', 'Salveaza'), ['class' => 'btn btn-primary align-right', 'name' => 'despre-button']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
