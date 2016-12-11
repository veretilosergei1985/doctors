<div class="post profile row">
    <div class="col-md-3 col-sm-4 col-xs-12 profile_thumb">
        <a class="doc_name" href="doctor_profile.html" target="_blank">
            <img alt="medical_care_image" src="uploads/doctors/<?php echo $model->primaryKey . '/' . $model->image; ?>" class="img-responsive"/>
        </a>
    </div>
    <div class="col-md-7 col-sm-8">
        <a class="doc_name" href="/doctor/view/<?php echo $model->primaryKey; ?>">
            <b class="doc_name inline-block"><?php echo $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name ?></b>
        </a>
        <input disabled="disabled" value="5" type="number" class="input-21e rating hidden-xs form-control" min="0" max="5" step="1" data-size="xs"/><br/>
        <small class="doc_spec"><?php echo implode(', ', \yii\helpers\ArrayHelper::map($model->specialities, 'title', 'title')); ?></small><br/><br/>
        <p class="doc_description">
            <?php echo $model->description; ?>
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
        <div class="doc_location left">
            <span class="left fa fa-lg fa-map-marker"></span>
            <address class="left">112 East 32th Street<br/>
                New York, NY 10016</address>
        </div>
    </div>
</div><!-- .post -->
<div class="clear"></div>
<div class="divider"></div>