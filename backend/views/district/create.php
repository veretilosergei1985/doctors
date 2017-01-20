<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\District */

$this->title = Yii::t('app/backend', 'Create District');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-district">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>