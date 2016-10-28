<?php
use yii\widgets\ListView;

?>

<section id="doctor" class="home-section bg-gray paddingbot-60">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                        <h2 class="h-bold">Врачи Харькова</h2>
                    </div>
                </div>
                <div class="divider-short"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
<!--                <div id="grid-container">-->
<!--                    <ul>-->
<!--                        <li class="cbp-item psychiatrist">-->
<!--                            <a href="doctors/member1.html" class="cbp-caption cbp-singlePage">-->
<!--                                <div class="cbp-caption-defaultWrap">-->
<!--                                    <img src="img/team/1.jpg" alt="" width="100%">-->
<!--                                </div>-->
<!--                                <div class="cbp-caption-activeWrap">-->
<!--                                    <div class="cbp-l-caption-alignCenter">-->
<!--                                        <div class="cbp-l-caption-body">-->
<!--                                            <div class="cbp-l-caption-text">VIEW PROFILE</div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <a href="doctors/member1.html" class="cbp-singlePage cbp-l-grid-team-name">Alice Grue</a>-->
<!--                            <div class="cbp-l-grid-team-position">Psychiatrist</div>-->
<!--                        </li>-->

                        <?php
                        echo ListView::widget([
                            'dataProvider' => $listDataProvider,
                            'itemView' => '_list',
                            'summary' => '',
                            'itemOptions' => ['tag'=>'li', 'class'=>'doctor-item'],
                            'options' => [
                                'tag'=>'ul',
                                'class'=>'doctors-list row clearfix'
                            ]

                        ]);
                        ?>

<!--                    </ul>-->
<!--                </div>-->
            </div>
        </div>
    </div>

</section>