<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\District */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(\common\models\City::find()->all(),'id','title'), array('prompt' => Yii::t('app/backend', 'Select city')))->label(Yii::t('app/backend', 'City')); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app/backend', 'Create') : Yii::t('app/backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
