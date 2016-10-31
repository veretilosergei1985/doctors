<?php
$this->registerJsFile('/js/plugins/pwstabs/jquery.pwstabs.js', ['depends' => ['\frontend\assets\AppAsset']]);;
$this->registerCssFile('/js/plugins/pwstabs/jquery.pwstabs.css');
$this->registerCssFile('/js/plugins/pwstabs/font-awesome/css/font-awesome.min.css');
?>
        
<section id="doctor" class="home-section bg-gray paddingbot-60">
    <div class="container marginbot-50">
        <div class="row">
            <!--
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                        <h2 class="h-bold">Врачи Харькова</h2>
                    </div>
                </div>
                <div class="divider-short"></div>
            </div>
            -->
        </div>
    </div>

    <div class="container doctor-view">
        <div class="row">
            <div class="col-lg-12">
                <ul class="doctors-list row clearfix"></ul>
                    <li class="doctor-item">
                        <div class="link-wrap clearfix">
                            <div class="doctor_item_left-side">
                                <img src="/uploads/doctors/<?php echo $model->primaryKey . '/' . $model->image; ?>" alt="<?php echo 'Врач ' . $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name . ' ' . implode(', ', \yii\helpers\ArrayHelper::map($model->specialities, 'title', 'title')); ?>">
                            </div>
                            <div class="doctor_item_right-side">
                                <h3><a href="/doctor/view/<?php echo $model->primaryKey; ?>" title="<?php echo $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name ?>"><?php echo $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name ?></a></h3>
                                <div class="specialities"><?php echo implode(', ', \yii\helpers\ArrayHelper::map($model->specialities, 'title', 'title')); ?></div>
                                <div class="title"><?php echo $model->title; ?></div>
                                <div class="experience"><?= Yii::t('app/frontend', '{n,plural,=0{нет} =1{один год} =2{2 года} =3{3 года} other{# лет}} опыта', ['n' => $model->experience]); ?></div>
                                <div><?php echo $model->description; ?></div>
                            </div>
                        </div>

                        <div class="doctor-view-map">
                            <div id="map"></div>
                        </div>

                        <style>
                            #map {
                                height: 400px;
                                width: 100%;
                            }
                        </style>


                        <script>
                            function initMap() {
                                var uluru = {lat: -25.363, lng: 131.044};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 4,
                                    center: uluru
                                });
                                var marker = new google.maps.Marker({
                                    position: uluru,
                                    map: map
                                });
                            }
                        </script>

                        <script>
                            function initMap() {
                                var uluru = {lat: -25.363, lng: 131.044};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 4,
                                    center: uluru
                                });
                                var marker = new google.maps.Marker({
                                    position: uluru,
                                    map: map
                                });
                            }
                        </script>

                        <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyDM_yPrIq30kCIxSUiv--sU-mmAuXVLU1s&callback=initMap" async defer></script>


                        <div class="hello_world">
                            <div data-pws-tab="tab1" data-pws-tab-name="<?= Yii::t('app/frontend', 'About doctor') ?>">

                                <div>
                                    <p></p>
                                    <?= $model->details; ?>
                                    <hr class="dotted">
                                </div>

                                <div>
                                    <p><strong><?= Yii::t('app/frontend', 'Educaton') ?></strong></p>
                                    <?= $model->education; ?>
                                    <hr class="dotted">
                                </div>

                                <div>
                                    <p><strong><?= Yii::t('app/frontend', 'Participation in associations'); ?></strong></p>
                                    <?= $model->education; ?>
                                    <hr class="dotted">
                                </div>

                                <div>
                                    <p><strong><?= Yii::t('app/frontend', 'Procedures'); ?></strong></p>
                                        <ul>
                                        <?php foreach($model->procedures as $procedure) { ?>
                                            <li><?= $procedure->title; ?></li>
                                        <?php } ?>
                                     </ul>
                                    <hr class="dotted">
                                </div>

                                <div>
                                    <p><strong><?= Yii::t('app/frontend', 'Diseases'); ?></strong></p>
                                    <ul>
                                        <?php foreach($model->diseases as $disease) { ?>
                                            <li><?= $disease->title; ?></li>
                                        <?php } ?>
                                    </ul>
                                    <hr class="dotted">
                                </div>

                            </div>
                            <div data-pws-tab="tab2" data-pws-tab-name="<?= Yii::t('app/frontend', 'Reviews'); ?>">Our second tab</div>
                         </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</section>