<?php

use yii\widgets\ListView;
?>

<div class="container staff">
    <div class="tablenav top row">
        <div class="count left">
            <b><?= $listDataProvider->getTotalCount() < $doctorsPerPage ? $listDataProvider->getTotalCount() : $doctorsPerPage ?></b><span> doctors from </span><b><?= $listDataProvider->getTotalCount(); ?></b><span> total</span>
        </div>
        <div class="sort right hidden-sm hidden-xs">
            <label>Sort BY:</label>
            <button type="button" class="buttonWithCaret">
                <span class="btn-name">Rating</span><span class="caret"></span>
            </button>
            <button type="button" class="buttonWithCaret">
                <span class="btn-name">Popular</span><span class="caret"></span>
            </button>
        </div>
    </div>
    <div class="clear"></div>
    <div class="profiles-loop row">
        <div class="bg-ajax-loader">
            <img alt="loader image" src="img/ajax-loader.gif"/>
        </div>
        
        <?php
            echo ListView::widget([
                'dataProvider' => $listDataProvider,
                'itemView' => '_list',
                'summary' => '',
                'layout' => "{items}",                
                'itemOptions' => ['tag' => 'li', 'class' => 'doctor-item'],
                'options' => [
                    'tag' => 'div',
                    'class' => '',
                ]
            ]);
            
        ?>
        
        
        
<!--        <div class="post profile row">
            <div class="col-md-3 col-sm-4 col-xs-12 profile_thumb">
                <a class="doc_name" href="doctor_profile.html" target="_blank">
                    <img alt="medical_care_image" src="http://placehold.it/190x190" class="img-responsive"/>
                </a>
                <div class="profile social text-justify hidden-xs">
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-facebook" title="Share on Facebook" rel="me" href="https://www.facebook.com/sharer.php?app_id=12345678903&amp;u=http://www.bestwebsoft.com&amp;t=Next-gen+OpenGL+initiative+announced%2C+bridging+desktop+and+mobile+APIs"></a>
                    </div>
                    <div class="custom-linkedin-button">
                        <a class="linkedin-button fa fa-lg fa-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=YourURL&amp;title=TheTitleOfYourWebPageGoesHere&amp;summary=TheSummaryOfYourWebPageGoesHere&amp;source=TheNameOfYourSiteGoesHere" rel="nofollow" onclick="NewWindow(this.href, 'template_window', '32', '32', 'yes', 'center');
                                                        return false" target="_blank" onfocus="this.blur()"></a>
                    </div>
                    <div class="custom-tweet-button">
                        <a class="twitter-button fa fa-lg fa-twitter" href="https://twitter.com/share?url=https%3A%2F%2Fdev.twitter.com%2Fpages%2Ftweet-button" target="_blank"></a>
                    </div>
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-envelope-o" title="Send-message" rel="me" href="#"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-8">
                <a class="doc_name" href="doctor_profile.html" target="_blank">
                    <b class="doc_name">Dr. Barliman Butterbur</b>
                </a><br/>
                <small class="doc_spec">Surgeon</small><br/><br/>
                <p>
                    Dr. Butterbur is a board certified surgeon who is dedicated to providing unparalleled quality to
                    every patient. He has been practicing in the New York for more than 10 years.
                </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 hidden-xs stars_display left">
                <input disabled="disabled" value="5" type="number" class="input-21e rating form-control" min="0" max="5" step="1" data-size="xs"/>
                <a href="doctor_profile.html#reviews">Read reviews</a>
                <div class="doc_location left">
                    <span class="left fa fa-lg fa-map-marker"></span>
                    <address class="right">112 East 32th Street<br/>
                        New York, NY 10016</address>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                <a href="doctor_profile.html#book" class="btn btn-primary">Book Online</a>
                <a href="doctor_profile.html" class="btn btn-default">View Profile</a>
            </div>
        </div>-->
        <!-- .post -->
<!--        <div class="clear"></div>
        <div class="divider"></div>
        <div class="post profile row">
            <div class="col-md-3 col-sm-4 col-xs-12 profile_thumb">
                <a class="doc_name" href="doctor_profile.html" target="_blank">
                    <img alt="medical_care_image" src="http://placehold.it/190x190" class="img-responsive"/>
                </a>
                <div class="profile social text-justify hidden-xs">
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-facebook" title="Share on Facebook" rel="me" href="https://www.facebook.com/sharer.php?app_id=12345678903&amp;u=http://www.bestwebsoft.com&amp;t=Next-gen+OpenGL+initiative+announced%2C+bridging+desktop+and+mobile+APIs"></a>
                    </div>
                    <div class="custom-linkedin-button">
                        <a class="linkedin-button fa fa-lg fa-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=YourURL&amp;title=TheTitleOfYourWebPageGoesHere&amp;summary=TheSummaryOfYourWebPageGoesHere&amp;source=TheNameOfYourSiteGoesHere" rel="nofollow" onclick="NewWindow(this.href, 'template_window', '32', '32', 'yes', 'center');
                                                        return false" target="_blank" onfocus="this.blur()"></a>
                    </div>
                    <div class="custom-tweet-button">
                        <a class="twitter-button fa fa-lg fa-twitter" href="https://twitter.com/share?url=https%3A%2F%2Fdev.twitter.com%2Fpages%2Ftweet-button" target="_blank"></a>
                    </div>
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-envelope-o" title="Send-message" rel="me" href="#"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-8">
                <a class="doc_name" href="doctor_profile.html" target="_blank">
                    <b class="doc_name">Dr. Meriadoc Brandybuck</b>
                </a><br/>
                <small class="doc_spec">Surgeon</small><br/><br/>
                <p>
                    Dr. Brandybuck is a board certified surgeon who has been in practicing at the University of
                    Alaska for five years. Dr. Brandybuck is dedicated to providing the latest techniques and
                    technology to every patient.
                </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 hidden-xs stars_display left">
                <input disabled="disabled" value="5" type="number" class="input-21e rating form-control" min="0" max="5" step="1" data-size="xs"/>
                <a href="doctor_profile.html#reviews">Read reviews</a>
                <div class="doc_location left">
                    <span class="left fa fa-lg fa-map-marker"></span>
                    <address class="right">112 East 32th Street<br/>
                        New York, NY 10016</address>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                <a href="doctor_profile.html#book" class="btn btn-primary">Book Online</a>
                <a href="doctor_profile.html" class="btn btn-default">View Profile</a>
            </div>
        </div>-->
        <!-- .post -->
<!--        <div class="clear"></div>
        <div class="divider"></div>
        <div class="post profile row">
            <div class="col-md-3 col-sm-4 col-xs-12 profile_thumb">
                <a class="doc_name" href="doctor_profile.html" target="_blank">
                    <img alt="medical_care_image" src="http://placehold.it/190x190" class="img-responsive"/>
                </a>
                <div class="profile social text-justify hidden-xs">
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-facebook" title="Share on Facebook" rel="me" href="https://www.facebook.com/sharer.php?app_id=12345678903&amp;u=http://www.bestwebsoft.com&amp;t=Next-gen+OpenGL+initiative+announced%2C+bridging+desktop+and+mobile+APIs"></a>
                    </div>
                    <div class="custom-linkedin-button">
                        <a class="linkedin-button fa fa-lg fa-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=YourURL&amp;title=TheTitleOfYourWebPageGoesHere&amp;summary=TheSummaryOfYourWebPageGoesHere&amp;source=TheNameOfYourSiteGoesHere" rel="nofollow" onclick="NewWindow(this.href, 'template_window', '32', '32', 'yes', 'center');
                                                        return false" target="_blank" onfocus="this.blur()"></a>
                    </div>
                    <div class="custom-tweet-button">
                        <a class="twitter-button fa fa-lg fa-twitter" href="https://twitter.com/share?url=https%3A%2F%2Fdev.twitter.com%2Fpages%2Ftweet-button" target="_blank"></a>
                    </div>
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-envelope-o" title="Send-message" rel="me" href="#"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-8">
                <a class="doc_name" href="doctor_profile.html" target="_blank">
                    <b class="doc_name">Dr. Bilbo Baggins</b>
                </a><br/>
                <small class="doc_spec">Dermatologist</small><br/><br/>
                <p>
                    Dr. Bilbo Baggins has a variety of areas of specialization and interests within reconstructive
                    and vascular surgery. His areas of focus include breast reconstruction, eyelid surgery, abdominoplasty,
                    breast augmentation and reduction, laser treatments of skin disorders and hand surgery.
                </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 hidden-xs stars_display left">
                <input disabled="disabled" value="5" type="number" class="input-21e rating form-control" min="0" max="5" step="1" data-size="xs"/>
                <a href="doctor_profile.html#reviews">Read reviews</a>
                <div class="doc_location left">
                    <span class="left fa fa-lg fa-map-marker"></span>
                    <address class="right">112 East 32th Street<br/>
                        New York, NY 10016</address>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                <a href="doctor_profile.html#book" class="btn btn-primary">Book Online</a>
                <a href="doctor_profile.html" class="btn btn-default">View Profile</a>
            </div>
        </div>-->
        <!-- .post -->
<!--        <div class="clear"></div>
        <div class="divider"></div>
        <div class="post profile row">
            <div class="col-md-3 col-sm-4 col-xs-12 profile_thumb">
                <a class="doc_name" href="doctor_profile.html" target="_blank">
                    <img alt="medical_care_image" src="http://placehold.it/190x190" class="img-responsive"/>
                </a>
                <div class="profile social text-justify hidden-xs">
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-facebook" title="Share on Facebook" rel="me" href="https://www.facebook.com/sharer.php?app_id=12345678903&amp;u=http://www.bestwebsoft.com&amp;t=Next-gen+OpenGL+initiative+announced%2C+bridging+desktop+and+mobile+APIs"></a>
                    </div>
                    <div class="custom-linkedin-button">
                        <a class="linkedin-button fa fa-lg fa-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=YourURL&amp;title=TheTitleOfYourWebPageGoesHere&amp;summary=TheSummaryOfYourWebPageGoesHere&amp;source=TheNameOfYourSiteGoesHere" rel="nofollow" onclick="NewWindow(this.href, 'template_window', '32', '32', 'yes', 'center');
                                                        return false" target="_blank" onfocus="this.blur()"></a>
                    </div>
                    <div class="custom-tweet-button">
                        <a class="twitter-button fa fa-lg fa-twitter" href="https://twitter.com/share?url=https%3A%2F%2Fdev.twitter.com%2Fpages%2Ftweet-button" target="_blank"></a>
                    </div>
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-envelope-o" title="Send-message" rel="me" href="#"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-8">
                <a class="doc_name" href="doctor_profile.html" target="_blank">
                    <b class="doc_name">Dr. Peregrin Took</b>
                </a><br/>
                <small class="doc_spec">Dermatologist</small><br/><br/>
                <p>
                    Dr. Took is a certified reconstructive and vascular surgeon who has cooperated with some of
                    the most well-known surgeons in the US. He is one of a few number of surgeons in the Green Bay
                    to be double board certified by the American Board of Surgery as well as the American Board of Plastic Surgery.
                </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 hidden-xs stars_display left">
                <input disabled="disabled" value="5" type="number" class="input-21e rating form-control" min="0" max="5" step="1" data-size="xs"/>
                <a href="doctor_profile.html#reviews">Read reviews</a>
                <div class="doc_location left">
                    <span class="left fa fa-lg fa-map-marker"></span>
                    <address class="right">112 East 32th Street<br/>
                        New York, NY 10016</address>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                <a href="doctor_profile.html#book" class="btn btn-primary">Book Online</a>
                <a href="doctor_profile.html" class="btn btn-default">View Profile</a>
            </div>
        </div>-->
        <!-- .post -->
        <div class="clear"></div>
    </div>
    <nav class="row">
        <?php echo \yii\widgets\LinkPager::widget([
            'pagination' => $listDataProvider->pagination,
            'options' => ['class' => 'pagination pagination-lg hidden-xs'],
            'maxButtonCount' => 3,
        ]); ?>
        
<!--        <ul class="pagination pagination-lg hidden-xs">
            <li><a href="#">Previous</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="more"><a href="#">...</a></li>
            <li class="active"><a href="#">12</a></li>
            <li><a href="#">13</a></li>
            <li><a href="#">14</a></li>
            <li><a href="#">Next</a></li>
        </ul>-->
    </nav>
</div>