<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MetroStationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="metro-station-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'city_id') ?>

    <?= $form->field($model, 'line_id') ?>

    <?= $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'left') ?>

    <?php // echo $form->field($model, 'top') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app/backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app/backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
