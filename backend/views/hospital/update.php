<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hospital */

$this->registerJsFile('/js/controllers/hospital/update.js', ['depends' => ['\backend\assets\AppAsset']]);

$this->title = Yii::t('app/backend', 'Update Hospital', [
    'modelClass' => 'Hospital',
]) . ' : ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Hospitals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/backend', 'Update Hospital');
?>
<div class="hospital-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
