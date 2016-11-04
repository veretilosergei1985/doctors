<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hospital */

$this->registerJsFile('/js/controllers/hospital/create.js', ['depends' => ['\backend\assets\AppAsset']]);

$this->title = Yii::t('app/backend', 'Create Hospital');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Hospitals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
