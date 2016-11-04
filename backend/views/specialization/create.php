<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Specialization */

$this->title = Yii::t('app/backend', 'Create Specialization');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Specializations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialization-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
