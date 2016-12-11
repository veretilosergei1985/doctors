<?php
//$this->registerJsFile('/js/plugins/pwstabs/jquery.pwstabs.js', ['depends' => ['\frontend\assets\AppAsset']]);;
//$this->registerCssFile('/js/plugins/pwstabs/jquery.pwstabs.css');
//$this->registerCssFile('/js/plugins/pwstabs/font-awesome/css/font-awesome.min.css');

$this->registerJsFile('/js/controllers/doctor/view.js', ['depends' => ['\frontend\assets\AppAsset']]);;
?>
       

<div class="container doctor_profile">
    <div class="profile row ">
        <div class="bg-ajax-loader">
            <img alt="loader image" src="img/ajax-loader.gif"/>
        </div>
        <div class="col-md-4 col-sm-3 col-xs-6 profile_thumb">
            <a class="doc_name" href="doctor_profile.html" target="_blank">
                <img style="width: 130px;" alt="medical_care_image" src="/uploads/doctors/<?php echo $model->primaryKey . '/' . $model->image; ?>" class="img-responsive"/>
            </a>
        </div>
        <div class="col-md-8">
            <div class="col-md-6 doc_name" >
                <h3 class="doc_name inline-block"><?php echo $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name ?></h3>
                <div class="experience"><?= Yii::t('app/frontend', '{n,plural,=0{нет} =1{один год} =2{2 года} =3{3 года} other{# лет}} опыта', ['n' => $model->experience]); ?></div>
                <input disabled="disabled" value="4" type="number" class="input-21e rating form-control" min="0" max="5" step="1" data-size="xs"/><br/>
            </div>
            <div class="col-md-6 hidden-sm hidden-xs soc_display pull-right ">
                <div class="profile social text-justify pull-right">
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-envelope-o" title="Send-message" rel="me" href="#"></a>
                    </div>
                    <div class="custom-tweet-button">
                        <a class="twitter-button fa fa-lg fa-twitter" href="https://twitter.com/share?url=https%3A%2F%2Fdev.twitter.com%2Fpages%2Ftweet-button" target="_blank"></a>
                    </div>
                    <div class="custom-linkedin-button">
                        <a class="linkedin-button fa fa-lg fa-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=YourURL&amp;title=TheTitleOfYourWebPageGoesHere&amp;summary=TheSummaryOfYourWebPageGoesHere&amp;source=TheNameOfYourSiteGoesHere" rel="nofollow" onclick="NewWindow(this.href,'template_window','32','32','yes','center');return false" target="_blank" onfocus="this.blur()"></a>
                    </div>
                    <div class="custom-facebook-button">
                        <a class="facebook-button fa fa-lg fa-facebook" title="Share on Facebook" rel="me" href="https://www.facebook.com/sharer.php?app_id=12345678903&amp;u=http://www.bestwebsoft.com&amp;t=Next-gen+OpenGL+initiative+announced%2C+bridging+desktop+and+mobile+APIs"></a>
                    </div>
                </div><br/>
            </div>
            <div class="col-md-12 paragraph">
                <!--<h4>
                    Professional Statement
                </h4>-->
                <p class="vertical_interval_two">
                    <?php echo $model->description; ?>
                </p>
            </div>
        </div>
        <div class="col-md-7 paragraph ">
            <?php if(!empty($model->details)) { ?>
                <h4>
                    <?= Yii::t('app/frontend', 'Professional Statement'); ?>
                </h4>
                <p class="vertical_interval_two">
                    <?= $model->details; ?>
                </p>
            <?php } ?>
                
            <?php if(!empty($model->education)) { ?>
                <h4>
                    <?= Yii::t('app/frontend', 'Education'); ?>
                </h4>
                <p class="vertical_interval_two">
                    <?= $model->education; ?>
                </p>
            <?php } ?>
                
            <?php if(!empty($model->course)) { ?>
                <h4>
                    <?= Yii::t('app/frontend', 'Courser'); ?>
                </h4>
                <p class="vertical_interval_two">
                    <?= $model->course; ?>
                </p>
            <?php } ?>
                
            <?php if(!empty($model->diseases)) { ?>
                <h4>
                    <?= Yii::t('app/frontend', 'Diseases'); ?>
                </h4>
                <div class="row">
                    <ul class="col-md-8 practice_list">
                        <?php foreach($model->diseases as $disease) { ?>
                            <li><i class="fa  fa-check"></i><span><?= $disease->title; ?></span></li>
                        <?php } ?>
                    </ul>
<!--                    <ul class="col-md-5 practice_list">
                        <li><i class="fa  fa-check"></i><span>Vascular Surgery</span></li>
                    </ul>-->
                </div>
            <?php } ?>
                
                
            
        </div>
        <div class="col-md-5 hidden-sm clearfix">
            <div id="map_canvas" class="hidden-xs"></div><br />
            <div class="doc_location left">
                <span class="left fa fa-lg fa-map-marker"></span>
                <address class="left">112 East 32th Street
                    New York, NY 10016</address>
            </div>
            <div class="pull-right book_or_add">
                <a href="javascript:void(0)" id="book_trigger" class="btn btn-primary">Book Online</a>
                <a href="javascript:void(0)" id="add_review" class="btn btn-default btn-inline" >Add Review</a>
            </div>
        </div>
        <div id="add_review_wrapper" class="col-lg-12 paragraph">
            <h4 class="login_form_header">Leave a review</h4>
            <div class="jumbotron">
                <form action="doctor_profile.html#reviews">
                    <div>
                        <label>Name<br/><input class="client_name" type="text"/></label><br/>
                        <div>Rating<br/>
                            <div class="rating-stars" >
                                <input  type="number" class="input-21e rating form-control" min="0" max="5" step="1" data-size="sm"/>
                            </div>
                        </div><br/>
                        <label>Comment<br/>
                            <textarea cols="10" rows="5" placeholder="..."></textarea>
                        </label><br/><br/>
                        <button type="submit" class="btn pull-right btn-default submit_review">Submit</button>
                    </div>
                    <div class="clear"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container doctor_controls">
    <div class="row">
        <nav>
            <ul class="nav nav-tabs">
                <li><a href="#reviews" data-toggle="tab">Reviews</a></li>
                <li class="active"><a href="#book" data-toggle="tab">Book an apointment</a></li>
            </ul>
        </nav>
        <div class="tab-content horizontal">
            <div class="tab-pane media fade in reviews" id="reviews">
                <a class="pull-left" href="#">
                    <img alt="medical_care_image" src="http://placehold.it/124x124"/>
                </a>
                <div class="media-body">
                    <div class="row">
                        <b class="doc_name col-md-2">Banny Wolf</b>
                        <div class="rating-stars col-md-3">
                            <input disabled="disabled" value="5" type="number" class="input-21e rating form-control" min="0" max="5" step="1" data-size="xs" style="display: none;"/>
                        </div>
                    </div>
                    <p>
                        Dr. Frank Miller is absolutely fantastic - incredibly honest and friendly during my
                        consultation. Wonderful, excellent in making further recommendations.  He is the
                        best doctor I have ever seen! Highly recommended!
                    </p>
                    <p>posted <a href="#">4 days ago</a> in <a href="doctor_profile.html#reviews">Reviews</a></p>
                </div>
                <div class="clear"></div>
                <div class="divider"></div>
                <a class="pull-left" href="#">
                    <img alt="medical_care_image" src="http://placehold.it/124x124"/>
                </a>
                <div class="media-body">
                    <div class="row">
                        <b class="doc_name col-md-2">Banny Wolf</b>
                        <div class="rating-stars col-md-3">
                            <input disabled="disabled" value="5" type="number" class="input-21e rating form-control" min="0" max="5" step="1" data-size="xs" style="display: none;"/>
                        </div>
                    </div>
                    <p>
                        Dr. Frank Miller is absolutely fantastic - incredibly honest and friendly during my
                        consultation. Wonderful, excellent in making further recommendations.  He is the
                        best doctor I have ever seen! Highly recommended!
                    </p>
                    <p>posted <a href="#">4 days ago</a> in <a href="doctor_profile.html#reviews">Reviews</a></p>
                </div>
                <div class="clear"></div>
                <div class="divider"></div>
                <a class="pull-left" href="#">
                    <img alt="medical_care_image" src="http://placehold.it/124x124"/>
                </a>
                <div class="media-body">
                    <div class="row">
                        <b class="doc_name col-md-2">Banny Wolf</b>
                        <div class="rating-stars col-md-3">
                            <input disabled="disabled" value="5" type="number" class="input-21e rating form-control" min="0" max="5" step="1" data-size="xs" style="display: none;"/>
                        </div>
                    </div>
                    <p>
                        Dr. Frank Miller is absolutely fantastic - incredibly honest and friendly during my
                        consultation. Wonderful, excellent in making further recommendations.  He is the
                        best doctor I have ever seen! Highly recommended!
                    </p>
                    <p>posted <a href="#">4 days ago</a> in <a href="doctor_profile.html#reviews">Reviews</a></p>
                </div>
            </div>
            <form class="tab-pane active fade in book" action="#" id="book">
                <div class="bg-ajax-loader">
                    <img alt="loader image" src="img/ajax-loader.gif"/>
                </div>
                <div class="row book_section" id="first_book">
                    <div class="col-md-7 col-sm-12">
                        <div class="row">
                            <label class="col-md-6 col-sm-6 col-xs-6">Your Name<br/>
                                <input class="client_name" type="text" placeholder="Your Name"/>
                            </label>
                            <label class="col-md-6 col-sm-6 col-xs-6 pull-right">Your Email<br/>
                                <input class="client_email" type="text" placeholder="Your Email"/>
                            </label>
                        </div>
                        <ul class="select_appointment">
                            <li>Did you come to this doctor before?</li>
                            <li>
                                <label><input checked="checked" type="radio" name="select_appointment" value="0"/>I will come to the doctor for the first time</label>
                            </li>
                            <li>
                                <label><input type="radio"  name="select_appointment" value="1"/>I have already had a meeting with doctor</label>
                            </li>
                        </ul>
                        <label class="for_selectbox">Insurance<br/>
                            <select data-autowidth="false" class="custom selectBox">
                                <option disabled="disabled"  selected="selected">Chose Insurance</option>
                                <option>Vancouver</option>
                                <option>Ottawa</option>
                                <option>Ontario</option>
                            </select>
                        </label>
                        <label class="for_selectbox">Reason for your visit<br/>
                            <select data-autowidth="false" class="custom selectBox">
                                <option disabled="disabled"  selected="selected">Dermatology consultation</option>
                                <option>Vancouver</option>
                                <option>Ottawa</option>
                                <option>Ontario</option>
                            </select>
                        </label>
                        <div class="time-radioboxes">Apointment time<br/><br/>
                            <div id="pick_an_appointment_time" class="btn-toolbar" role="toolbar">
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <label class="btn btn-pick-time">
                                            <input type="radio" name="options" id="option1"/> 10:00 <span class=" hidden-xs"> am</span>
                                        </label>
                                        <label class="btn btn-pick-time">
                                            <input type="radio" name="options" id="option2"/> 11:00 <span class=" hidden-xs"> am</span>
                                        </label>
                                        <label class="btn btn-pick-time active">
                                            <input type="radio" name="options" id="option3"/> 12:30 <span class=" hidden-xs"> pm</span>
                                        </label>
                                        <label class="btn btn-pick-time">
                                            <input type="radio" name="options" id="option4"/> 13:30 <span class=" hidden-xs"> pm</span>
                                        </label>
                                        <label class="btn btn-pick-time">
                                            <input type="radio" name="options" id="option5"/> 14:00 <span class="hidden-xs"> pm</span>
                                        </label><br/>
                                        <label class="btn btn-pick-time">
                                            <input type="radio" name="options" id="option6"/> 15:30 <span class="hidden-xs"> pm</span>
                                        </label>
                                        <label class="btn btn-pick-time">
                                            <input type="radio" name="options" id="option7"/> 16:30 <span class="hidden-xs"> pm</span>
                                        </label>
                                        <label class="btn btn-pick-time">
                                            <input type="radio" name="options" id="option8"/> 17:30 <span class="hidden-xs"> pm</span>
                                        </label>
                                        <label class="btn btn-pick-time">
                                            <input type="radio" name="options" id="option9"/> 18:00 <span class="hidden-xs"> pm</span>
                                        </label>
                                        <label class="btn btn-pick-time">
                                            <input type="radio" name="options" id="option10"/> 18:30 <span class="hidden-xs"> pm</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div id="book_datepicker" class="ll-skin-melon pull-right"></div>
                        <div class="clear">
                            <p class="hidden-sm hidden-xs"><i class="fa fa-calendar"></i>Click the day on the calendar for your visit</p>
                            <button id="book_first_section_trigger" type="submit" class="btn pull-right btn-primary">Book</button>
                        </div>
                    </div>
                </div>
                <div class="hidden book_section" id="second_book">
                    <h4>Book Your Appointment</h4>
                    <div class="btn-group hidden-xs btn-breadcrumb">
                        <div class="btn btn-crumb active"><span>General Info</span></div>
                        <div class="btn btn-crumb"><span>Patient Info</span></div>
                        <div class="btn btn-crumb"><span>Specification</span></div>
                        <div class="btn btn-crumb"><span>Finish</span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="select_appointment">
                                <li>Did you come to this doctor before?</li>
                                <li>
                                    <label><input checked="checked" type="radio" name="select_appointment" value="0"/>I will come to the doctor for the first time</label>
                                </li>
                                <li>
                                    <label><input type="radio"  name="select_appointment" value="1"/>I have already had a meeting with doctor</label>
                                </li>
                            </ul>
                            <label class="for_selectbox">Will you use insurance?<br/>
                                <select data-autowidth="false" class="custom selectBox">
                                    <option selected="selected">I will pay for myself</option>
                                    <option>No I will not</option>
                                </select>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <ul class="select_appointment">
                                <li>Appointment Time</li>
                                <li>
                                    <label><i class="fa fa-calendar"></i><span>Tuesday, February 5 at 10 : 30 am</span></label>
                                </li>
                            </ul>
                            <label class="the_reason for_selectbox">Reason for your visit<br/>
                                <select data-autowidth="false" class="custom selectBox" style="display: none;">
                                    <option disabled="disabled"  selected="selected">Dermatology consultation</option>
                                    <option>Vancouver</option>
                                    <option>Ottawa</option>
                                    <option>Ontario</option>
                                </select>
                            </label>
                            <button type="submit" class="btn btn-primary pull-right" id="book_second_section_trigger">Continue</button>
                            <button type="reset" class="btn btn-default pull-right">Back</button>
                        </div>
                    </div>
                </div>
                <div class="hidden book_section" id="third_book">
                    <h4>Book Your Appointment</h4>
                    <div class="btn-group hidden-xs btn-breadcrumb">
                        <div class="btn btn-crumb active"><span>General Info</span></div>
                        <div class="btn btn-crumb active"><span>Patient Info</span></div>
                        <div class="btn btn-crumb"><span>Specification</span></div>
                        <div class="btn btn-crumb"><span>Finish</span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="select_appointment">
                                <li>Have you used Medical Care before?</li>
                                <li>
                                    <label><input checked="checked" type="radio" name="select_appointment" value="0"/>I have used Medical Care before</label>
                                </li>
                                <li>
                                    <label><input type="radio"  name="select_appointment" value="1"/>I did not use Medical Care at all</label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="login_form_header">Welcome to Medical Care!</h4>
                            <b><small>Please sign in and continue</small></b>
                            <div class="jumbotron">
                                <label>Your Email<br/>
                                    <input class="client_name" type="text" placeholder="Your Email"/>
                                </label>
                                <label>Your Password<br/>
                                    <input class="client_name" type="password" placeholder="*******"/>
                                </label>
                                <a href="javasctipt:void(0)" class="text-muted forgot_password_trigger">Forgot Password?</a><br/><br/>

                                <div class="pull-right">
                                    <button type="reset" class="btn btn-default">Back</button>
                                    <button type="submit" class="btn btn-default">Sign In</button>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden book_section" id="fourth_book">
                    <h4>Book Your Appointment</h4>
                    <div class="btn-group hidden-xs btn-breadcrumb">
                        <div class="btn btn-crumb active"><span>General Info</span></div>
                        <div class="btn btn-crumb active"><span>Patient Info</span></div>
                        <div class="btn btn-crumb"><span>Specification</span></div>
                        <div class="btn btn-crumb"><span>Finish</span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="select_appointment">
                                <li>Have you used Medical Care before?</li>
                                <li>
                                    <label><input checked="checked" type="radio" name="select_appointment" value="0"/>I have used Medical Care before</label>
                                </li>
                                <li>
                                    <label><input type="radio"  name="select_appointment" value="1"/>I did not use Medical Care at all</label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 forgotten_password">
                            <h4 class="login_form_header">Forgot your password?</h4>
                            <b><small>Enter email and we'll send you instructions on how to change your password</small></b>
                            <div class="jumbotron">
                                <label>Your Email<br/>
                                    <input class="client_name" type="text" placeholder="Your Email"/>
                                </label>
                                <a href="#" id="book_section_back_link" class="text-muted">Return to Sign in</a><br/><br/>
                                <button type="submit"  class="btn btn-default pull-right">Send</button>
                                <button type="reset"  class="btn btn-default pull-right">Back</button>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden book_section" id="fifth_book">
                    <h4>Book Your Appointment</h4>
                    <div class="btn-group hidden-xs btn-breadcrumb">
                        <div class="btn btn-crumb active"><span>General Info</span></div>
                        <div class="btn btn-crumb active"><span>Patient Info</span></div>
                        <div class="btn btn-crumb"><span>Specification</span></div>
                        <div class="btn btn-crumb"><span>Finish</span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="select_appointment">
                                <li>Have you used Medical Care before?</li>
                                <li>
                                    <label><input  type="radio" name="select_appointment" value="0"/>I have used Medical Care before</label>
                                </li>
                                <li>
                                    <label><input checked="checked" type="radio"  name="select_appointment" value="1"/>I did not use Medical Care at all</label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="login_form_header">Welcome to Medical Care!</h4>
                            <b><small>Please sign in and continue</small></b>
                            <div class="jumbotron">
                                <label>Your Email<br/>
                                    <input class="client_name" type="text" placeholder="Your Email"/>
                                </label>
                                <label>Password<br/>
                                    <input class="client_name" type="password" placeholder="*******"/>
                                </label>
                                <label>Repeat Password<br/>
                                    <input class="client_name" type="password" placeholder="*******"/>
                                </label>
                                <label><input class="client_name" type="checkbox"/> I accept the user agreement</label><br/><br/>
                                <button type="submit" class="btn btn-default pull-right">Sign Up</button>
                                <button type="reset" class="btn btn-default pull-right">Back</button>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden book_section" id="sixth_book">
                    <h4>Book Your Appointment</h4>
                    <div class="btn-group hidden-xs btn-breadcrumb">
                        <div class="btn btn-crumb active"><span>General Info</span></div>
                        <div class="btn btn-crumb active"><span>Patient Info</span></div>
                        <div class="btn btn-crumb active"><span>Specification</span></div>
                        <div class="btn btn-crumb"><span>Finish</span></div>
                    </div>
                    <h4>Verify my phone number</h4>
                    <small><b>We`ll send a code for your verification</b></small><br/>
                    <div class="col-lg-12 jumbotron">
                        <label class="col-lg-10 enter_the_phone_number">Your phone number<br/>
                            <input class="client_name" type="text" placeholder="+1 - 877 - 911 - 555 - 333"/>
                        </label>
                        <button id="submit_phone_number" class="btn col-lg-2 btn-primary clearfix" type="button">Submit</button>
                        <div class="clear"></div>
                        <span class="text-muted">* For non-US phone numbers, please enter the international code in this format: +1 - (country code) - (number)</span>
                        <br/><br/>
                        <div class="col-md-5">
                            <div>Code Numbers<br/>
                                <input class="client_name" type="password" placeholder="*******"/>
                                <button type="button" class="code_numbers btn btn-success disabled"><i class="fa fa-check"></i></button>
                                <span class="text-info">   code is correct</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <span class="text-muted">* Please enter the 8-digit code that you received. If you didn`t get a code<a href="#"> please try again</a></span>
                        <br/><br/><br/>
                        <button type="reset" class="btn btn-default">Back</button>
                        <button id="verify_phone_number" type="submit" class="btn col-lg-2 btn-primary clearfix">Verify</button>

                    </div>
                </div>
                <div class="hidden book_section" id="seventh_book">
                    <h4>Book Your Appointment</h4>
                    <div class="btn-group hidden-xs btn-breadcrumb">
                        <div class="btn btn-crumb active"><span>General Info</span></div>
                        <div class="btn btn-crumb active"><span>Patient Info</span></div>
                        <div class="btn btn-crumb active"><span>Specification</span></div>
                        <div class="btn btn-crumb active"><span>Finish</span></div>
                    </div>
                    <h4>Your verification is successful!</h4>
                    <p>Appointments taken for processing. In a short time we will contact you to confirm your request. Thank you for contacting us!</p>
                </div>
            </form>
        </div>
    </div>
</div>