<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" />
<?php } ?>
<title>
<?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="description" content="Engraft Solutions is an IT outsourcing company located in Pune in India offering excellent Web Development, Mobile Application, Cloud Computing, QA &amp; Testing, UX / UI Design &amp; Internet Marketing." />
<meta name="keywords" content="Engraft Solutions is an IT outsourcing company located in Pune in India offering excellent Web Development, Mobile Application, Cloud Computing, QA &amp; Testing, UX / UI Design &amp; Internet Marketing." /> 
<link rel="canonical" href="https://engraftsolutions.com" />
<link rel="shortlink" href="https://engraftsolutions.com" />
<meta property="og:site_name" content="Engraft Solutions" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://engraftsolutions.com" />
<meta property="og:title" content="Home" />
<meta property="og:image:url" content="http://engraftsolutions.com/wp-content/uploads/2020/01/LOGO520.png" />
<meta name="google-site-verification" content="fhqjVGI6WK2BemIjsXfJ6smIaHl65rlvDp8UGj0ZPeY" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<!-- Bootstrap CSS File -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/bootstrap/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/font-awesome/css/font-awesome.css">

<!-- Libraries CSS Files -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/lightbox/css/lightbox.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/revolution-slider/rs-plugin/css/settings.css">

<!-- CSS Owl Carousel -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/owlcarousel/css/owl.theme.default.min.css">

<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/lib/animate/animate.min.css" />

 <!-- Main Stylesheet File -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/css/main.css" />

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap" rel="stylesheet">
 
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155155560-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-155155560-2');
</script>
<meta name="google-site-verification" content="fhqjVGI6WK2BemIjsXfJ6smIaHl65rlvDp8UGj0ZPeY" />

 <script type="text/javascript">
function parseJSAtOnload() {
var links = ["intlTelInput.min.js", "countrySelect.min.js"],
headElement = document.getElementsByTagName("head")[0],
linkElement, i;
for (i = 0; i < links.length; i++) {
linkElement = document.createElement("script");
linkElement.src = links[i];
headElement.appendChild(linkElement);
}
}
if (window.addEventListener)
window.addEventListener("load", parseJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", parseJSAtOnload);
else window.onload = parseJSAtOnload;
</script >  
</head>
<body>


    <div id="wrap">
        <!--==========================
            Header
        ============================-->
        <header id="header">
            <div id="topbar">
                <div class="container">
                    <div class="social-links">
                    <a target="_blank" href="https://twitter.com/EngraftSolutio1" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="https://www.facebook.com/pg/Engraftin-1495640424034059" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" href="https://www.linkedin.com/in/engraft-solutions-1a37501a0" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    <a target="_blank" href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="logo float-left">
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <h1 class="text-light"><a href="<?php echo get_option('home'); ?>" class="scrollto"><img src="http://engraftsolutions.com/wp-content/uploads/2020/01/LOGO520.png" class="resposive" style="width:90%;" /></a></h1>
                    <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
                </div>
                
               <!-- Collect the nav links, forms, and other content for toggling -->
        

            <?php

                  wp_nav_menu( array(

                      'menu'              => 'primary',

                      'theme_location'    => 'primary-menu',

                      'depth'             => 8,

                      'container'         => 'ul',

                      'container_class'   => 'collapse navbar-collapse',

                      'container_id'      => 'bs-example-navbar-collapse-1',

                      'menu_class'        => 'nav navbar-nav main-nav float-right d-none d-lg-block',

                      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',

                      'walker'            => new wp_bootstrap_navwalker())

                  );


              ?>


            </div>
        </header>
