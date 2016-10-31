<?php
$this->registerJsFile('/js/plugins/pwstabs/jquery.pwstabs.js', ['depends' => ['\frontend\assets\AppAsset']]);;
$this->registerCssFile('/js/plugins/pwstabs/jquery.pwstabs.css');
$this->registerCssFile('/js/plugins/pwstabs/font-awesome/css/font-awesome.min.css');
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
                <div class="hello_world">
                    <div data-pws-tab="anynameyouwant1" data-pws-tab-name="Tab Title 1">Our first tab</div>
                    <div data-pws-tab="anynameyouwant2" data-pws-tab-name="Tab Title 2">Our second tab</div>
                    <div data-pws-tab="anynameyouwant3" data-pws-tab-name="Tab Title 3">Our third tab</div>
                 </div>
            </div>
        </div>
    </div>

</section>