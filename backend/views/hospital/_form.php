<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Hospital */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-form" hospital-id="<?= $model->primaryKey; ?>">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-5">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'parent_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => ArrayHelper::map(\common\models\Hospital::find()->where(['parent_id' => 0])->all(),'id','title'),
                'options' => [
                    'placeholder' => 'Select parent hospital ...',
                    'multiple' => true
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(Yii::t('app/backend', 'Parent hospital')); ?>

            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <?= Yii::t('app/backend', 'Description') ?>
                            </a>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block">
                            <?= $form->field($model, 'description')->widget(CKEditor::className(),[
                                'editorOptions' => ['preset' => 'standard'],
                            ])->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '999-999-9999',
            ]) ?>
            
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= Html::input('text', 'hospital-address_tmp', null, ['id' => 'hospital-address_tmp']) ?>

            <div id="map" class="map thumbnail"><!-- Google map area --></div>

            <div class="col-md-5 col-sm-5 col-xs-5">
                <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
            </div>

        </div>

        <div class="col-md-5 col-sm-5 col-xs-5">
            
            <?php $options = [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'showRemove' => false,
                        'showUpload' => false,
                        'initialPreviewAsData' => true,
                        'initialCaption' => "",
                        'removeIcon' => '<i id="remove-hospital-logo" class="glyphicon glyphicon-trash"></i> ',
                        'initialPreviewConfig' => [
                            ['caption' => 'image.jpg']
                        ],
                        'overwriteInitial'=>false,
                    ]
                ];
            
                if (!empty($model->logo)) {
                    $options['pluginOptions']['initialPreview'] = [Yii::$app->params['frontendBaseUrl'] . '/uploads/hospitals/' . $model->primaryKey . '/logo.jpg'];
                }
            ?>
            
            <?= $form->field($model, 'file')->widget(FileInput::classname(), $options); ?>
            
            <?php $options = [
                    'options' => [
                        'accept' => 'image/*',
                        'multiple'=>true
                    ],
                    'pluginOptions' => [
                        'showRemove' => false,
                        'showUpload' => false,
                        'initialPreviewAsData' => true,
                        'initialCaption' => "",
                        'removeIcon' => '<i id="remove-doctor-image" class="glyphicon glyphicon-trash"></i> ',
                        'overwriteInitial'=>false,

                        'initialPreviewConfig' => [
                        [
                            "caption" => 'desert.jpg',
                            "width" => '120px',
                            "key" => 100,
                        ],
                        [
                            "caption" => 'desert.jpg',
                            "width" => '120px',
                            "key" => 101,
                        ]
                    ]
                    ]
                ];

                if (!empty($model->gallery)) {
                    $initialPreview = [];
                    foreach($model->gallery as $image) {
                        $initialPreview[] = Yii::$app->params['frontendBaseUrl'] . '/uploads/hospitals/' . $model->primaryKey . '/gallery/' . $image->image;
                        $options['pluginOptions']['initialPreviewConfig'][] = ['caption' => 'image.jpg'];
                    }
                    $options['pluginOptions']['initialPreview'] = $initialPreview;
                }
            ?>
          
            <?= $form->field($model, 'galleryFiles[]')->widget(FileInput::classname(), $options); ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
