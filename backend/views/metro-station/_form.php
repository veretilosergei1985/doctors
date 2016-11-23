<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MetroStation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="metro-station-form">
    <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'left')->widget(\kartik\widgets\TouchSpin::classname(), [
                'pluginOptions' => [
                    'min' => 0,
                    'max' => 1000,]
                ]); 
            ?>

            <?= $form->field($model, 'top')->widget(\kartik\widgets\TouchSpin::classname(), [
                'pluginOptions' => [
                    'min' => -1000,
                    'max' => 1000,]
                ]); 
            ?>

            <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'status')->checkbox(); 
            ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app/backend', 'Create') : Yii::t('app/backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>    
</div>
