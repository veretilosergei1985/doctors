<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */

$this->title = Yii::t('app/backend', 'Doctor') . ': ' . $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Doctors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'bootstrap' => true,
        'attributes' => [
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => Html::img(Yii::$app->params['frontendBaseUrl'] . '/uploads/doctors/' . $model->primaryKey . '/' . $model->image, ['width' => 150, 'height' => 200])
            ],
            'first_name',
            'middle_name',
            'last_name',
            'title',
            'experience',
            [
                'attribute' => 'description',
                'format' => 'raw',
            ],
            [
                'attribute' => 'details',
                'format' => 'raw',
            ],
            [
                'attribute' => 'course',
                'format' => 'raw',
            ],
            [
                'attribute' => 'association',
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
