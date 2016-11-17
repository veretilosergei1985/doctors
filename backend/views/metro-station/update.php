<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MetroStation */

$this->title = Yii::t('app/backend', 'Update {modelClass}: ', [
    'modelClass' => 'Metro Station',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Metro Stations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/backend', 'Update');
?>
<div class="metro-station-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
