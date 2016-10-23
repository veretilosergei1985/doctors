<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form" doctor-id="<?= $model->primaryKey; ?>">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->widget(CKEditor::className(),[
                'editorOptions' => ['preset' => 'standard'],
            ]); ?>

            <?= $form->field($model, 'details')->widget(CKEditor::className(),[
                'editorOptions' => ['preset' => 'standard'],
            ]); ?>

            <?= $form->field($model->education, 'description')->widget(CKEditor::className(),[
                'editorOptions' => ['preset' => 'standard'],
                'options' => ['rows' => 3],
            ])->label('Education'); ?>
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

            <?php $options = [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'showRemove' => false,
                        'showUpload' => false,
                        'initialPreviewAsData' => true,
                        'initialCaption' => "",
                        'removeIcon' => '<i id="remove-doctor-image" class="glyphicon glyphicon-trash"></i> ',
                        'initialPreviewConfig' => [
                            ['caption' => 'image.jpg']
                        ],
                        'overwriteInitial'=>false,
                    ]
                ];
            
                if (!empty($model->image)) {
                    $options['pluginOptions']['initialPreview'] = [Yii::$app->params['frontendBaseUrl'] . '/uploads/doctors/' . $model->primaryKey . '/image.jpg'];
                }
            ?>
            
            <?= $form->field($model, 'file')->widget(FileInput::classname(), $options);
            ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
