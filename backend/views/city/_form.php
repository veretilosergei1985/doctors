<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="metro-station-form">
    <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

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

            if (!empty($model->metro_map)) {
                $options['pluginOptions']['initialPreview'] = [Yii::$app->params['frontendBaseUrl'] . '/uploads/city/' . $model->primaryKey . '/map.jpg'];
            }
            ?>

            <?= $form->field($model, 'file')->widget(\kartik\widgets\FileInput::classname(), $options); ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app/backend', 'Create') : Yii::t('app/backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>


        </div>

        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php if(isset($model->metro_map)) { ?>
                <div class="metro-map metro-map_<?= $model->code; ?>" style="background: #fff url('<?= Yii::$app->params['frontendBaseUrl'] . '/uploads/city/' . $model->primaryKey . '/map.jpg'; ?>') 115px 0 no-repeat; position: relative;">
                    <?php foreach($model->stations as $station) { ?>

                        <label class="metro-block cross-icon color-<?= $station->color; ?>" data-value="" style="left:<?= $station->left; ?>px;top:<?= $station->top; ?>px; position: absolute; font-size: 12px;">
                            <input type="checkbox">
                                <span>
                                    <span>
                                        <?= $station->title; ?>
                                    </span>
                                </span>
                        </label>

                    <?php } ?>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
