<?php
use kartik\grid\GridView;

$this->title = Yii::t('app/backend', 'Doctors list');
?>
<div class="admin-add-new-item">
    <?= \yii\helpers\Html::a(Yii::t('app/backend', 'Add new doctor'), ['/doctor/create'], ['class'=>'btn btn-success btn-lg']) ?>
</div>
<div class="panel panel-primary">
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            [
                'attribute' => 'id',
                'label' => '',
                'filter' => false,
            ],
            ['class' => 'kartik\grid\CheckboxColumn'],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                //'expandAllTitle' => 'Expand all',
                //'collapseTitle' => 'Collapse all',
                'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detailUrl' => \yii\helpers\Url::to(['doctor/info/1']),
                'detailRowCssClass' => GridView::TYPE_DEFAULT,
                'pageSummary' => false,
            ],
            'last_name',
            'first_name',
            'middle_name',
            'title',
            [
                'attribute' => 'experience',
                'value' => function ($data) {
                    return $data->experience . ' years';
                }
            ],
            [
                'attribute' => 'specialities',
                'label' => yii::t('app/backend', 'Specialities'),
                'value' => function ($data) {
                    return \common\helpers\GridHtmlHelper::displayRowAsList($data->specialities, 'title');//implode(', ', \yii\helpers\ArrayHelper::map($data->specialities, 'title', 'title'));
                },
                'format' => 'html'
            ],
            [
                'class' => \kartik\grid\ActionColumn::className(),
                // you may configure additional properties here
            ],
        ],
        'responsive' => true,
        'hover' => true
    ]);
    ?>
</div>
