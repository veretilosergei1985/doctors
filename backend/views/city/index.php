<?php

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = Yii::t('app/backend', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <p><?= Html::a(Yii::t('app/backend', 'Create City'), ['create'], ['class' => 'btn btn-success']) ?></p>

    <?php
    $gridColumns = [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '36px',
            'header' => '',
            'headerOptions' => ['class' => 'kartik-sheet-style']
        ],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
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
            'attribute' => 'title',
            'vAlign' => 'middle',
            'width' => '210px',
            'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header' => 'Name',
                    'size' => 'md',
                ];
            }
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'code',
            'editableOptions' => [
                'header' => 'Code',
                //'inputType' => \kartik\editable\Editable::INPUT_SPIN,
            ],
            'hAlign' => 'right',
            'vAlign' => 'middle',
            'width' => '7%',
        ],
        [
            'class'=>'kartik\grid\ActionColumn',
            //'dropdown'=>$this->dropdown,
            'dropdownOptions'=>['class'=>'pull-right'],
            'urlCreator'=>function($action, $model, $key, $index) {
                if ($action === 'update') {
                    $url ='/city/update?id='.$model->primaryKey;
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
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'columns'=>$gridColumns,
        //'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax'=>true,
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', '/city/create',
                    [
                        'type'=>'button',
                        'title'=>'Add Book',
                        'class'=>'btn btn-success',
                        //'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
                    ]
                )
                . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>',
                    ['grid-demo'],
                    ['data-pjax'=>0,
                        'class'=>'btn btn-default',
                        'title'=>'Reset Grid']
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