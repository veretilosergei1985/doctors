<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HospitalAttributes */

$this->title = Yii::t('app/backend', 'Update {modelClass}: ', [
    'modelClass' => 'Hospital Attributes',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Hospital Attributes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/backend', 'Update');
?>
<div class="hospital-attributes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
