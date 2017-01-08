<?php
session_start();
include("func.php");
require("core/core.php");//глобальные переменные и функции
no_cache();
$db = call_db(HOST, USER, PASSWORD, DBNAME);
$lang = check_select_lang();
$result_catpage = check_select_cat($lang);	
$page_title="";//SITE_NAME.' » ';
$news_array = get_blog_news($lang , 3 , 0);
$event_array = get_index_events($lang , 4 , 1);
	/*echo('<pre>');
	print_r($event_array);
	echo('</pre>');*/
?><!doctype html>
<html lang="ru">
<head>
<?php get_keywords($lang, $result_catpage["cat_title"]); ?>
<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="css/extralayers.css" media="screen" />
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/layout.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/fonts.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="js/appear/pokrovAnim.css" />
<link href="css/animate.css" rel="stylesheet">
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
</head>
<body class="header4 activateAppearAnimation">
<!--Шапка сайта-->
<header>
  <div id="mainHeader" role="banner">
    <div class="container">
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header"> 
          <!-- responsive navigation -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Меню</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <div class="pokrov_text">ПОКРОВ</div>
          <!-- Logo --> 
          <a class="navbar-brand" href="index.php">
          <div class="logo_box">
            <?php include('pokrov_logo.php');?>
          </div>
          </a> </div>
        <div class="collapse navbar-collapse" id="mainMenu"> 
			<?php  get_tree_menu(0, $lang, 0 , 0);  ?>
          
        </div>
      </nav>
    <div id="shadow" class="shadow-overlay"></div>
    </div>
  </div>
</header>

<!--Революционный слайдер-->
<section class="revo_slider"  data-pokrovanim="fadeInUp" data-pokrovdelay="100">
  <div class="tp-banner-container">
    <div class="tp-banner" >
		<ul>
			<?php show_slider($lang);?>
		</ul>
    <div class="tp-bannertimer tp-bottom"></div>
   </div>
  </div>
</section>
<!--Наша миссия-->
<section class="our_mission"  data-pokrovanim="fadeInUp" data-pokrovdelay="300">
  <div class="container">
    <div class="row">
		 <?php  if (isset($result_catpage['page_content'])&& $result_catpage['page_content']!='')
						echo(decode_cool($result_catpage['page_content']));/// 
				?>
      
    </div>
  </div>
</section>
<!--Последние новости-->
<section class="last_news" data-pokrovanim="fadeInUp" data-pokrovdelay="500">
  <div class="container">
    <div class="section_header">
      <h2 class="fancy_lines"><span>Последние новости</span></h2>
    </div>
    <div class="row">
	<?php show_blog_news($news_array, $lang,  $global_labels); ?>
      </div>
  </div>
</section>
<!--Последние новости-->
<section class="last_events" data-pokrovanim="fadeInUp" data-pokrovdelay="300">
  <div class="container">
    <div class="section_header">
      <h2 class="fancy_lines"><span>Мероприятия</span></h2>
    </div>
    <div class="row">
	<?php show_events($event_array, $lang,  $global_labels); ?>
	</div>
  </div>
</section>
<?php include('footer_inc.php');?>
<script src="js/vendor/modernizr.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="js/vendor/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/easing/jquery.easing.1.3.js"></script> 
<script type="text/javascript" src="js/appear/jquery.appear.js"></script> 
<script type="text/javascript" src="js/validator/bootstrapValidator.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery.matchHeight-min.js"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script type="text/javascript">
$(function() {
	$('.revo_slider').fadeIn();
    $('.tp-banner').show().revolution({
        dottedOverlay: "none",
        delay: 9000,
        startwidth: 1170,
        startheight: 500,
        hideThumbs: 200,
        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 5,
        navigationType: "none",
        navigationArrows: "solo",
        navigationStyle: "preview4",
        touchenabled: "on",
        onHoverStop: "on",
        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,
        parallax: "mouse",
        parallaxBgFreeze: "on",
        parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
        keyboardNavigation: "on",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,
        shadow: 0,
        fullWidth: "on",
        fullScreen: "off",
        spinner: "spinner4",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        forceFullWidth: "off",
        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        videoJsPath: "rs-plugin/videojs/",
        fullScreenOffsetContainer: ""
    });
	sign_up();
	 $('#ribbon,#text').fadeIn(6000);
	 
	 
	 equalHeight($('.eq-height'));
	 $(window).resize(function () { 
		$(".eq-height").height('auto');
		equalHeight($(".eq-height"));
	});
	   equalHeight($('.eq_height'));
	 $(window).resize(function () { 
		$(".eq_height").height('auto');
		equalHeight($(".eq_height"));
	});
	  
}); //ready
</script>
<?php include_once("analyticstracking.php") ?>
</body>
</html>