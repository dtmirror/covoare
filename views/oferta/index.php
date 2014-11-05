<?php

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = \Yii::t('app', 'Oferte speciale');
$this->params['breadcrumbs'][] = $this->title;

$gridConfig = [
    'id' => 'list-oferte',
    'dataProvider' => $dataProvider,
    'panel' => [
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> ' . \Yii::t('app', 'Oferte speciale') . '</h3>',
        'type' => 'default',
        'before' =>
            Html::a('<i class="glyphicon glyphicon-plus"></i> ' . \Yii::t('app', 'Adauga oferta'), ['add'], ['class' => 'btn btn-success']),
        'showFooter' => false,
    ],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
        ],
        [
            'label' => \Yii::t('app', 'Activa'),
            'attribute' => 'oferta_status',
            'class' => 'kartik\grid\BooleanColumn',
        ],
        [
            'label' => \Yii::t('app', 'Titlu oferta'),
            'attribute' => 'oferta_title',
        ],
    ]
];

// Actions
$gridConfig['columns'][] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{update} {delete}',
    'urlCreator' => function ($action, $model, $key, $index) {
        if ($action === 'update') {
            $url = ['oferta/edit', 'id' => $model['oferta_id']];
            return $url;
        }
        if ($action === 'delete') {
            $url = ['oferta/delete', 'id' => $model['oferta_id']];
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