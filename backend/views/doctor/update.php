<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */


$this->registerJsFile('/js/controllers/doctor/update.js', ['depends' => ['\backend\assets\AppAsset']]);

$this->title = Yii::t('app/backend', 'Doctor') . ': ' . $model->getFullName();
$this->params['breadcrumbs'][] = ['label' =>  Yii::t('app/backend', 'Doctors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getFullName(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] =  Yii::t('app/backend', 'Update');
?>
<div class="doctor-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
