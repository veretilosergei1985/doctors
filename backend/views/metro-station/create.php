<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MetroStation */

$this->title = Yii::t('app/backend', 'Create Metro Station');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/backend', 'Metro Stations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metro-station-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
