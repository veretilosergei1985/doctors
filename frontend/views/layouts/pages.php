<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!-- Bootstrap core CSS -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400,300' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href="/css/bootstrap.css"  type="text/css" />
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="/css/bootstrap-theme.css" type="text/css" />

        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="/css/owl.carousel.css" type="text/css" />
        <link rel="stylesheet" href="/css/selectbox.css" type="text/css" />
        <link rel="stylesheet" href="/css/jquery-ui.css"/>
        <link rel="stylesheet" href="/css/melon.datepicker.css" type="text/css" />
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBj18F-2jyE6oToesZ6pZwVLDn66cUxAXU"></script>
        <link rel="stylesheet" href="/css/star-rating.css" media="all" type="text/css"/>
        <link rel="stylesheet" href="/css/font-awesome.min.css" media="all" type="text/css"/>
        <link rel="stylesheet" href="/css/orange.css" media="all" type="text/css"/>
        <link rel="stylesheet" href="/css/theme.css" type="text/css" />


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
<?php $this->head() ?>
    </head>
    <body role="document">
<?php $this->beginBody() ?>
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand media" href="index.html">
                        <span class="pull-left media">
                            <span class="fa fa-lg fa-plus"></span>
                        </span>
                        <span class="media-body">
                            <b class="site_title">Medical Care</b>
                        </span>
                    </a><!-- /.navbar-brand.media -->
                    <form action="#" class="navbar-form hidden-md hidden-xs hidden-lg visible-sm">
                        <div class="input-group header-search">
                            <div class="input-group-btn">
                                <button class="btn btn-info">
                                    <span class="fa fa-search medical_search"></span>
                                </button>
                            </div>
                                   <input type="search" value="Search on website" onfocus="if (this.value == 'Search on website') {
                                                            this.value = '';
                                                        }" onblur="if (this.value == '') {
                                                                    this.value = 'Search on website';
                                                                }" class="search-query" />
                            <div class="input-group-btn">
                                <button  type="reset" class="btn btn-info reset"></button>
                            </div>
                        </div><!-- /.header-search -->
                    </form><!-- /.navbar-form.visible-sm -->
                    <table class="header-info hidden-xs hidden-sm">
                        <tr>
                            <td class="description">
                                Medical HTML Theme
                            </td>
                            <td class="phone">
                                (555) 701 55 701
                            </td>
                        </tr>
                    </table><!-- /.header-info -->
                    <form action="#" class="navbar-form hidden-sm navbar-right">
                        <div class="input-group header-search">
                            <div class="input-group-btn">
                                <button class="btn btn-info">
                                    <span class="fa fa-search medical_search"></span>
                                </button>
                            </div>
                                   <input type="search" value="Search on website" onfocus="if (this.value == 'Search on website') {
                                                            this.value = '';
                                                        }" onblur="if (this.value == '') {
                                                                    this.value = 'Search on website';
                                                                }" class="search-query" />
                            <div class="input-group-btn">
                                <button  type="reset" class="btn btn-info reset"></button>
                            </div>
                        </div><!--.header-search-->
                    </form><!-- /.navbar-form hidden-sm -->
                </div> <!--.navbar-header-->
            </div><!--.container-->
            <nav class="nav main-menu">
                <div class="container">
                    <div class="navbar-form navbar-right" role="form">
                        <a href="javascript:void(0)" class="btn btn-lg btn-success">Sign in</a>
                        <a href="javascript:void(0)" class="btn btn-lg btn-default">Sign up</a>
                    </div>
                    <div class="navbar-collapse collapse top-menu">
                        <ul class="nav navbar-inner navbar-nav navbar-left">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li class="dropdown active">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuDivider1" data-toggle="dropdown">
                                    Our staff
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="our_staff-v1.html">Our staff-v1</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="our_staff-v2.html">Our staff-v2</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuDivider2" data-toggle="dropdown">
                                    Blog
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="blog-v1.html">Blog-v1</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="blog-v2.html">Blog-v2</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="blog-sidebar-v1.html">Blog with sidebar v1</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="blog-sidebar-v2.html">Blog with sidebar v2</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="blog-sidebar-v3.html">Blog with sidebar v3</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="blog-post.html">Blog post with comments</a></li>
                                </ul>
                            </li>
                            <li><a href="contact_us.html">Contact</a></li>
                            <li>
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuDivider3" data-toggle="dropdown">
                                    Misc
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="maintenance.html">Maintenance page</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--.container-->
            </nav><!--/.navbar-default-->
        </div><!--.navbar-->
        <div class="wrapper" role="main">
            <div class="header-bottom clearfix">
                <div class="breadcrumbs container">
                    <nav class="pull-left row">
                        <fieldset class="breadcrumb" style="">
                            <span class="crumbs">
                                <span class="crust homeCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                                    <a href="/" class="crumb text-muted"  itemprop="url"><span itemprop="title">Home</span></a>
                                    <span class="arrow"><span>/</span></span>
                                </span>
                                <span class="crust" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                                    <a href="about.html" class="crumb text-muted"><span>About</span></a>
                                </span>
                            </span>
                        </fieldset>
                        <div class="page-header"><h1>Our staff</h1></div>
                    </nav>
                    <div class="header social row hidden-xs">
                        <div class="custom-google-button">
                            <a class="google-button fa fa-lg fa-google-plus" href="https://plus.google.com/share?url=http://bestwebsoft.com/inprogress/bws/themeforest_medical_care_html/" target="_blank"><span class="badge pull-right"><b>48</b></span></a>
                        </div>
                        <div class="custom-facebook-button">
                            <a class="facebook-button fa fa-lg fa-facebook" href="https://www.facebook.com/sharer.php?app_id=12345678903&amp;u=http://www.bestwebsoft.com&amp;t=Next-gen+OpenGL+initiative+announced%2C+bridging+desktop+and+mobile+APIs"><span class="badge pull-right"><b>32</b></span> </a>
                        </div>
                        <div class="custom-tweet-button">
                            <a class="twitter-button fa fa-lg fa-twitter" href="https://twitter.com/share?url=https%3A%2F%2Fdev.twitter.com%2Fpages%2Ftweet-button" target="_blank"><span class="badge pull-right"><b>23</b></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <?= $content; ?>

            <div class="mastfoot">
                <div class="container">
                    <div class="footer row top">
                        <aside class="widget col-sm-6 col-xs-12 col-md-3">
                            <h4 class="widget-title">Menu</h4>
                            <ul>
                                <li class="page_item"><a href="index.html">Home</a></li>
                                <li class="page_item"><a href="about.html">About</a></li>
                                <li class="page_item"><a href="services.html">Services</a></li>
                            </ul>
                        </aside>
                        <aside class="widget col-sm-6 col-xs-12 col-md-4">
                            <h4 class="widget-title">About</h4>
                            <div class="textwidget">Medical Care Clinic. We will take care of you. <br>Monday - Saturday 09:00 am - 09:00 pm</div>
                        </aside>
                        <aside class="widget col-sm-6 col-xs-12 col-md-3">
                            <h4 class="widget-title">Recent tweets</h4>
                            <div class="recent_tweets footer-widget-single">
                                <a href="#" title="">@bestwebsoft</a> The wise man therefore always holds in these matters to this principle.
                                <div class="recent_tweets_time">15 minutes ago</div>
                            </div>
                        </aside>
                        <aside class="widget col-sm-6 col-xs-12 col-md-3">
                            <h4 class="widget-title">Location</h4>
                            <div class="textwidget">
                                <address>322 Broadway <br/>New York, NY 10038</address>
                                <a href="tel:5557771100">P.: (555) 777 - 11 - 00</a><br/>
                                <a href="mailto:sales@bestwebsoft.com">E.: sales@bestwebsoft.com</a>
                            </div>
                        </aside>
                    </div>
                    <div class="clear"></div>
                    <div class="footer row bottom">
                        <p class="footer-credits hidden-xs">Designed with love by <a href="http://bestwebsoft.com">BestWebSoft</a></p>
                        <div class="footer social">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/owl.carousel.js"></script>
        <script type="text/javascript" src="/js/jquery.ikSelect.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.js"></script>
        <script type="text/javascript" src="/js/star-rating.min.js"></script>
        <script type="text/javascript" src="/js/icheck.min.js" ></script>

        <script type="text/javascript" src="/js/script.js"></script>
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
