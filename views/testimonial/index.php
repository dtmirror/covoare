<?php

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = \Yii::t('app', 'Testimoniale');
$this->params['breadcrumbs'][] = $this->title;

$gridConfig = [
    'id' => 'list-testimoniale',
    'dataProvider' => $dataProvider,
    'panel' => [
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> ' . \Yii::t('app', 'Testimoniale') . '</h3>',
        'type' => 'default',
        'before' =>
            Html::a('<i class="glyphicon glyphicon-plus"></i> ' . \Yii::t('app', 'Adauga testimonial'), ['add'], ['class' => 'btn btn-success']),
        'showFooter' => false,
    ],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
        ],
        [
            'label' => \Yii::t('app', 'Activa'),
            'attribute' => 'testimonial_status',
            'class' => 'kartik\grid\BooleanColumn',
        ],
        [
            'label' => \Yii::t('app', 'Nume client'),
            'attribute' => 'testimonial_client',
        ],
    ]
];

// Actions
$gridConfig['columns'][] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{update}',
    'urlCreator' => function ($action, $model, $key, $index) {
        if ($action === 'update') {
            $url = ['testimonial/edit', 'id' => $model['testimonial_id']];
            return $url;
        }
    }
];

?>

<div class="site-signup">
    <div class="row">
        <div class="col-lg-12">
            <?= GridView::widget($gridConfig); ?>
        </div>
    </div>
</div>