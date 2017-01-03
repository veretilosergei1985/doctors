<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HospitalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app/backend', 'Hospitals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app/backend', 'Create Hospital'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $gridColumns = [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '7%',
            'header' => '',
            'headerOptions' => ['class' => 'kartik-sheet-style']
        ],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '7%',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand-row-details', ['model'=>$model]);
            },
            'headerOptions' => ['class'=>'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'parent_id',
            //'vAlign' => 'middle',
            'width' => '10%',
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header' => 'Parent',
                    'size' => 'md',
                ];
            },
            'value' => function ($model, $key, $index, $column) {
                return !is_null($model->parent_id) ? \common\models\Hospital::findOne($model->parent_id)->title : '';
            },
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'title',
            'width' => '2000px',
            'editableOptions' => [
                'header' => 'Title',
                //'inputType' => \kartik\editable\Editable::INPUT_SPIN,
            ],
            'hAlign' => 'right',
            'vAlign' => 'middle',
            'width' => '20%',
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'address',
            'editableOptions' => [
                'header' => 'Address',
                //'inputType' => \kartik\editable\Editable::INPUT_SPIN,
            ],
            'hAlign' => 'right',
            'vAlign' => 'middle',
            'width' => '20%',
        ],
        [
            'attribute' => 'email',
            'hAlign' => 'right',
            'vAlign' => 'middle',
            'width' => '10%',
        ],
        [
            'attribute' => 'phone',
            'hAlign' => 'right',
            'vAlign' => 'middle',
            'width' => '10%',
        ],
        [
            'class'=>'kartik\grid\ActionColumn',
            //'dropdown'=>$this->dropdown,
            'dropdownOptions'=>['class'=>'pull-right'],
            'urlCreator'=>function($action, $model, $key, $index) {
                if ($action === 'update') {
                    $url ='/hospital/update?id='.$model->primaryKey;
                    return $url;
                }
            },
            'headerOptions'=>['class'=>'kartik-sheet-style'],
        ],
        [
            'class'=>'kartik\grid\CheckboxColumn',
            'headerOptions'=>['class'=>'kartik-sheet-style'],
        ],
    ];
    ?>

    <?=
    GridView::widget([
        'id' => 'kv-grid-demo',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        //'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax'=>true,
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', '/hospital/create',
                    [
                        'type' => 'button',
                        'title' => 'Add Book',
                        'class' => 'btn btn-success',
                    ]
                )
                . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>',
                    ['grid-demo'],
                    ['data-pjax' => 0,
                        'class' => 'btn btn-default',
                        'title' => 'Reset Grid']
                )
            ],
            '{export}',
            '{toggleData}',
        ],
        'export'=>[
            'fontAwesome'=>true
        ],
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        //'showPageSummary'=>true,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading' => '<i class="glyphicon glyphicon-book"></i>',
        ],
        'persistResize'=>false,
        //'exportConfig'=>$exportConfig,
    ]);
    ?>
</div>
