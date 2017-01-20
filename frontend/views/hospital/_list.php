<div class="post profile row">
    <div class="col-md-3 col-sm-4 col-xs-12 profile_thumb">
        <a class="hospital_name" href="" target="_blank">
            <?php if ($model->logo) { ?>
                <img alt="medical_care_image" src="uploads/hospitals/<?php echo $model->primaryKey . '/' . $model->logo; ?>" class="img-responsive"/>
            <?php } ?>    
        </a>
        <?php if(count($model->schedules)) { ?>
                <ul class="hospital-schedule">
        <?php      foreach ($model->schedules as $item) { ?> 
                     <li>
                         <span class="left">
                            <?php echo $item->day; ?>
                         </span>
                         <span class="right">
                            <?php echo $item->time; ?>
                         </span>
                     </li>
        <?php       } ?> 
                </ul>     
        <?php } ?>     
    </div>
    <div class="col-md-7 col-sm-8">
        <a class="hospital_name" href="/hospital/view/<?php echo $model->primaryKey; ?>">
            <b class="hospital_name inline-block"><?php echo $model->title; ?></b>
        </a>
        <input disabled="disabled" value="5" type="number" class="input-21e rating hidden-xs form-control" min="0" max="5" step="1" data-size="xs"/><br/>
            <?php if (count($model->childHospitals) == 0 && count($model->specializations)) { ?>
            <small class="hospital_spec">
                <?php echo implode(', ', \yii\helpers\ArrayHelper::map($model->specializations, 'title', 'title')); ?>
            </small><br/><br/>
        <?php } ?>
        <p class="hospital_description">
            <?php echo $model->description; ?>
        </p>
        <?php if (count($model->childHospitals) == 0) { ?> 
            <a href="doctor_profile.html#book" class="btn btn-primary">Book Online</a>
        <?php } ?> 
    </div>
    <div class="col-md-2 hidden-xs stars_display hidden-sm left">
        <div class="profile social text-justify hidden-xs hidden-sm">
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
        </div><br/>
        <div class="hospital_location left">
            <!--
            <span class="left fa fa-lg fa-map-marker"></span>
            <address class="left"><?php echo $model->address; ?><br/>
                Харьков</address>
            -->
        </div>
    </div>
</div>

<?php if (count($model->childHospitals)) { ?>   
    <div class="child-hospital-divider">
        <span>Филиалы</span>
    </div>
    <?php foreach ($model->childHospitals as $hospital) { ?> 
        <div class="post profile row child-hospital">
            <div class="col-md-3 col-sm-4 col-xs-12 profile_thumb">
                <a class="hospital_name" href="" target="_blank">
                    <?php if ($hospital->logo) { ?>
                        <img alt="medical_care_image" src="uploads/hospitals/<?php echo $hospital->primaryKey . '/' . $hospital->logo; ?>" class="img-responsive"/>
                    <?php } ?>    
                </a>
                <?php if (count($hospital->schedules)) { ?>
                    <ul class="hospital-schedule">
                        <?php foreach ($hospital->schedules as $item) { ?>
                            <li>
                                <span class="left">
                                    <?php echo $item->day; ?>
                                </span>
                                <span class="right">
                                    <?php echo $item->time; ?>
                                </span>
                            </li>
                        <?php } ?> 
                    </ul>     
                <?php } ?>     
            </div>
            <div class="col-md-7 col-sm-8">
                <a class="hospital_name" href="/hospital/view/<?php echo $hospital->primaryKey; ?>">
                    <b class="hospital_name inline-block"><?php echo $hospital->title; ?></b>
                </a>
                <input disabled="disabled" value="5" type="number" class="input-21e rating hidden-xs form-control" min="0" max="5" step="1" data-size="xs"/><br/>
                <?php if (count($hospital->specializations)) { ?>
                    <small class="hospital_spec">
                        <?php echo implode(', ', \yii\helpers\ArrayHelper::map($hospital->specializations, 'title', 'title')); ?>
                    </small><br/><br/>
                <?php } ?>
                <p class="hospital_description">
                    <?php echo $hospital->description; ?>
                </p>
                <a href="doctor_profile.html#book" class="btn btn-primary">Book Online</a>
            </div>
            <div class="col-md-2 hidden-xs stars_display hidden-sm left">
                <div class="profile social text-justify hidden-xs hidden-sm">
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
                </div><br/>
                <div class="hospital_location left">
                    <span class="left fa fa-lg fa-map-marker"></span>
                    <address class="left"><?php echo $hospital->address; ?><br/>
                        Харьков</address>
                </div>
            </div>
        </div>
    <?php } ?>                     
<?php } ?> 

<div class="clear"></div>
<div class="divider"></div>