<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Doctor */

$this->title = Yii::t('app/backend', 'Create Doctor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Doctors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
