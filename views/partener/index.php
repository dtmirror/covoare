<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = \Yii::t('app', 'Parteneri');
$this->params['breadcrumbs'][] = $this->title;

$gridConfig = [
    'id' => 'list-parteneri',
    'dataProvider' => $dataProvider,
    'panel' => [
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> ' . \Yii::t('app', 'Parteneri') . '</h3>',
        'type' => 'default',
        'before' =>
            Html::a('<i class="glyphicon glyphicon-plus"></i> ' . \Yii::t('app', 'Adauga partener'), ['add'], ['class' => 'btn btn-success']),
        'showFooter' => false,
    ],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
        ],
        [
            'label' => \Yii::t('app', 'Nume partener'),
            'attribute' => 'partener_name',
        ],
        [
            'label' => \Yii::t('app', 'Link partener'),
            'attribute' => 'partener_link',
        ],
    ]
];

// Actions
$gridConfig['columns'][] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{update} {delete}',
    'urlCreator' => function ($action, $model, $key, $index) {
        if ($action === 'update') {
            $url = ['partener/edit', 'id' => $model['partener_id']];
            return $url;
        }
        if ($action === 'delete') {
            $url = ['partener/delete', 'id' => $model['partener_id']];
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