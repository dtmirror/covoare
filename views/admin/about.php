<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Despre;
use app\models\Imagine;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
$this->title = 'Despre spalare';
$this->params['breadcrumbs'][] = $this->title;

$despre = Despre::find()->one();

if ($despre) {
    $model->despre_text = $despre->despre_text;
}

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'despre-form',
    ]); ?>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'despre_text')->textarea(['rows' => '10'])->label(\Yii::t('app', 'Despre text')) ?>
            <div class="form-group">
                <?= Html::a(\Yii::t('app', 'Anuleaza'),['admin/about'],['class' => 'btn btn-primary', 'name' => 'cancel-despre-button']) ?>
                <?= Html::submitButton(\Yii::t('app', 'Salveaza'), ['class' => 'btn btn-primary align-right', 'name' => 'despre-button']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <?php $form = ActiveForm::begin([
        'id' => 'galerie-form',
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-lg-4">
            <h1>Adauga poza:</h1>
            <?= $form->field($galerie_poze, 'poza_title')->textInput(array('placeholder' => \Yii::t('app', 'Titlu poza')))->label(false) ?>
            <?= $form->field($galerie_poze, 'poza_text')->textarea(
                    [
                        'placeholder' => \Yii::t('app', 'Text poza'),
                        'rows' => 6
                    ]
                )->label(false) ?>
            <?= $form->field($galerie_poze, 'poza_name')->widget(FileInput::classname(), [
                'options' => [
                    'multiple' => false,
                    'accept' => 'image/*',
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                    'showRemove' => false,
                ],
            ])->label(false);
            ?>
            <div class="form-group">
                <?= Html::a(\Yii::t('app', 'Anuleaza'),['admin/about'],['class' => 'btn btn-primary', 'name' => 'cancel-galerie-button']) ?>
                <?= Html::submitButton(\Yii::t('app', 'Salveaza'), ['class' => 'btn btn-primary align-right', 'name' => 'galerie-button']) ?>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-7">
            <h1>Galerie poze:</h1>
            <div class="row">
                <?php if (count($poze)) {
                    foreach ($poze as $poza) {
                ?>
                    <div class="col-lg-4 galerie_poze">
                        <?= Html::a('<span class="glyphicon glyphicon-remove"></span> Sterge', ['/admin/delete-img', 'id' => $poza->poza_id], ['class' => 'sterge']) ?>
                        <?= $poza->getImage(); ?>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
