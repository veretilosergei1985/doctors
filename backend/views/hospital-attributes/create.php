<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HospitalAttributes */

$this->title = Yii::t('app/backend', 'Create Hospital Attributes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Hospital Attributes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-attributes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
