<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->widget(CKEditor::className(),[
                'editorOptions' => ['preset' => 'standard'],
                'options' => ['rows' => 3, 'height' => 200],
            ]); ?>

            <?= $form->field($model->education, 'description')->widget(CKEditor::className(),[
                'editorOptions' => ['preset' => 'standard'],
                'options' => ['rows' => 3],
            ]); ?>
        </div>

        <div class="col-md-5 col-sm-5 col-xs-5">

            <?= $form->field($model, 'specialities')->widget(\kartik\widgets\Select2::classname(), [
                'data' => ArrayHelper::map(\common\models\Speciality::find()->all(),'id','title'),
                'options' => [
                    'placeholder' => 'Select speciality ...',
                    'multiple' => true
                ],
                'pluginOptions' => [
                'allowClear' => true
            ],
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>