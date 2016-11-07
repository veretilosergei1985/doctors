<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hospital */

$this->registerJsFile('/js/controllers/hospital/update.js', ['depends' => ['\backend\assets\AppAsset']]);

$this->title = Yii::t('app/backend', 'Update {modelClass}: ', [
    'modelClass' => 'Hospital',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Hospitals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/backend', 'Update');
?>
<div class="hospital-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
