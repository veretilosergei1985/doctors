<div class="link-wrap clearfix">
    <div class="doctor_item_left-side">
        <img src="uploads/doctors/<?php echo $model->primaryKey . '/' . $model->image; ?>" alt="<?php echo 'Врач ' . $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name . ' ' . implode(', ', \yii\helpers\ArrayHelper::map($model->specialities, 'title', 'title')); ?>">
    </div>
    <div class="doctor_item_right-side">
        <h3><a href="" title="<?php echo $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name ?>"><?php echo $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name ?></a></h3>
        <div class="specialities"><?php echo implode(', ', \yii\helpers\ArrayHelper::map($model->specialities, 'title', 'title')); ?></div>
        <div class="title"><?php echo $model->title; ?></div>
        <div class="experience"><?php echo \Yii::t('app', '{n,plural,=0{нет} =1{один год} =2{2 года} =3{3 года} other{# лет}} опыта', ['n' => $model->experience]); ?></div>
        <div><?php echo $model->description; ?></div>
    </div>
</div>
