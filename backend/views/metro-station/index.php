<?php

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = Yii::t('app/backend', 'Metro stations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app/backend', 'Create Metro Station'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $colorPluginOptions =  [
            'showPalette' => true,
            'showPaletteOnly' => true,
            'showSelectionPalette' => true,
            'showAlpha' => false,
            'allowEmpty' => false,
            'preferredFormat' => 'name',
            'palette' => [
                [
                    "red", "blue", "green",
                ],
            ]
        ];
        $gridColumns = [
        [
            'class'=>'kartik\grid\SerialColumn',
            'contentOptions'=>['class'=>'kartik-sheet-style'],
            'width'=>'36px',
            'header'=>'',
            'headerOptions'=>['class'=>'kartik-sheet-style']
        ],
        [
            'class'=>'kartik\grid\RadioColumn',
            'width'=>'36px',
            'headerOptions'=>['class'=>'kartik-sheet-style'],
        ],
        [
            'class'=>'kartik\grid\ExpandRowColumn',
            'width'=>'50px',
            'value'=>function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail'=>function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand-row-details', ['model'=>$model]);
            },
            'headerOptions'=>['class'=>'kartik-sheet-style'],
            'expandOneOnly'=>true
        ],
        [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'title',
            //'pageSummary'=>'Total',
            'vAlign'=>'middle',
            'width'=>'210px',
//            'readonly'=>function($model, $key, $index, $widget) {
//                return (!$model->status); // do not allow editing of inactive records
//            },
            'editableOptions'=> function ($model, $key, $index) use ($colorPluginOptions) {
                return [
                    'header'=>'Name', 
                    'size'=>'md',
//                    'afterInput'=>function ($form, $widget) use ($model, $index, $colorPluginOptions) {
//                        return $form->field($model, "color")->widget(\kartik\widgets\ColorInput::classname(), [
//                            'showDefaultPalette'=>false,
//                            'options'=>['id'=>"color-{$index}"],
//                            'pluginOptions'=>$colorPluginOptions,
//                        ]);
//                    }
                ];
            }
        ],
        [
            'attribute' => 'color',
            'value' => function ($model, $key, $index, $widget) {
                return "<span class='badge' style='background-color: {$model->color}'> </span>  <code>" . $model->color . '</code>';
            },
            'width' => '8%',
            'filterType' => GridView::FILTER_COLOR,
            'filterWidgetOptions' => [
                'showDefaultPalette' => false,
                'pluginOptions' => $colorPluginOptions,
            ],
            'vAlign'=>'middle',
            'format'=>'raw',
            //'noWrap'=>$this->noWrapColor
        ],
        /*
        [
            'attribute'=>'city_id', 
            'vAlign'=>'middle',
            'width'=>'180px',
            'value'=>function ($model, $key, $index, $widget) { 
                return Html::a($model->city_id,  
                    '#', 
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>  \yii\helpers\ArrayHelper::map(\common\models\MetroStation::find()->orderBy('title')->asArray()->all(), 'id', 'name'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Any author'],
            'format'=>'raw'
        ],
        */      
        [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'left', 
//            'readonly'=>function($model, $key, $index, $widget) {
//                return (!$model->status); // do not allow editing of inactive records
//            },
            'editableOptions'=>[
                'header'=>'Buy Amount', 
                'inputType'=>\kartik\editable\Editable::INPUT_SPIN,
                'options'=>[
                    'pluginOptions'=>['min'=>0, 'max'=>5000]
                ]
            ],
            'hAlign'=>'right', 
            'vAlign'=>'middle',
            'width'=>'7%',
            'format'=>['decimal', 2],
            'pageSummary'=>true
        ],
        [
            'attribute'=>'top', 
            'vAlign'=>'middle',
            'hAlign'=>'right', 
            'width'=>'7%',
            'format'=>['decimal', 2],
            'pageSummary'=>true
        ],        
        [
            'class'=>'kartik\grid\BooleanColumn',
            'attribute'=>'status', 
            'vAlign'=>'middle'
        ], 
        [
            'class'=>'kartik\grid\ActionColumn',
            //'dropdown'=>$this->dropdown,
            'dropdownOptions'=>['class'=>'pull-right'],
            'urlCreator'=>function($action, $model, $key, $index) { 
                if ($action === 'update') {
                        $url ='/metro-station/update?id='.$model->primaryKey;
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
                Html::a('<i class="glyphicon glyphicon-plus"></i>', '/metro-station/create',
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