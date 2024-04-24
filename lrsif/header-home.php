<?php



/**



 * The template for displaying the header



 *



 * Displays all of the head element and everything up until the "site-content" div.



 *



 * @package WordPress



 * @subpackage Twenty_Sixteen



 * @since Twenty Sixteen 1.0



 */







?>



<!DOCTYPE html>



<html <?php language_attributes(); ?> class="no-js">



<head>



<meta charset="<?php bloginfo( 'charset' ); ?>">



<meta name="viewport" content="width=device-width, initial-scale=1">



<link rel="profile" href="http://gmpg.org/xfn/11">



<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>



<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">



<?php endif; ?>

  
  
  
  <style type="text/css">
  
  
	
@media only screen and (max-width: 768px) {}
@media only screen and (max-width: 640px) {
	#pillars-sec ul li {
    width: 100%;
    padding: 15px;
    float: none;
}
}

@media only screen and (max-width: 480px) {
	.footer_contact{float: none !important; width: 100% !important;}
	.footer-bottom .col-lg-6.text-center {
	float: none !important;
	width: 100% !important;
}
	section#ninth .bg_two ul.social-buttons {height:auto !important;margin-bottom: 15px !important;}
	section#ninth .bg_two .col-lg-4.text-center {
	float: none !important;
	width: 100% !important;
}
	
}

@media only screen and (max-width: 360px) {}
@media only screen and (max-width: 320px) {}



  
  </style>
  
  
  
  
<?php wp_head(); ?>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

</head>







<body <?php body_class(); ?>>



<div id="page" class="site">



<div class="site-inner">



<a class="skip-link screen-reader-text" href="#content">



<?php _e( 'Skip to content', 'twentysixteen' ); ?>



</a>



<div class="header-top">



  <div class="container">



  <div class="border_bg">&nbsp;</div>



    <div class="site-header-main">



      <div class="site-branding">



        <?php twentysixteen_the_custom_logo(); ?>

        

        <a class="mob_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2016/06/mob_logo.png" alt="" height="" width=""></a>



        <?php if ( is_front_page() && is_home() ) : ?>



        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">



          <?php //bloginfo( 'name' ); ?>



          </a></h1>



        <?php else : ?>



        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">



          <?php //bloginfo( 'name' ); ?>



          </a></p>



        <?php endif;







					$description = get_bloginfo( 'description', 'display' );



					if ( $description || is_customize_preview() ) : ?>



        <p class="site-description"><?php echo $description; ?></p>



        <?php endif; ?>



      </div>



      <!-- .site-branding -->



      



      <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>

      <button id="menu-toggle" class="menu-toggle navbar-toggle collapsed" data-target="#site-header-menu" data-toggle="collapse" aria-expanded="false">



      <p><?php _e( 'Menu', 'twentysixteen' ); ?></p>

		<span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

      </button>



      <div id="site-header-menu" class="site-header-menu">



        <?php if ( has_nav_menu( 'primary' ) ) : ?>



        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">



          <?php



									wp_nav_menu( array(



										'theme_location' => 'primary',



										'menu_class'     => 'primary-menu',



									 ) );



								?>



        </nav>



        <!-- .main-navigation -->



        <?php endif; ?>



        <?php if ( has_nav_menu( 'social' ) ) : ?>



        <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">



          <?php



									wp_nav_menu( array(



										'theme_location' => 'social',



										'menu_class'     => 'social-links-menu',



										'depth'          => 1,



										'link_before'    => '<span class="screen-reader-text">',



										'link_after'     => '</span>',



									) );



								?>



        </nav>



        <!-- .social-navigation -->



        <?php endif; ?>



      </div>



      <!-- .site-header-menu -->



      <?php endif; ?>



    </div>



    <!-- .site-header-main --></div>



</div>



<div class="container call_us">



      <span class="call">



      <p>Get Help Now <a href="tel:(561) 655-1990">(561) 655-1990</a> | Toll-Free <a href="tel:(800) 654-2024">(800) 654-2024</a>      <a href="javascript:openSupport('2620160627101','Welcome');" class="live-chat">live chat</a></p>



      </span>

      

      



    </div>



<header id="masthead" class="site-header" role="banner">



  <video loop autoplay poster="" id="video_one">



    <source type="video/mp4" src="<?php echo get_template_directory_uri()?>/video/LR_Web Video 2016_Jan2017.mp4"></source>



    <source type="video/webm" src="<?php echo get_template_directory_uri()?>/video/LR_Web Video 2016_Jan2017_VP8_001.webm"></source>



    <source type="video/ogg" src="<?php echo get_template_directory_uri()?>/video/LR_Web Video 2016_Jan2017_libtheora.ogv"></source>



  </video>



  <div style="background-image:url('http://newsomelaw.com/wp-content/themes/imelton/img/header_bg.jpg')" class="mobile-bg"></div>



  <div class="video_transparent"></div>



  <script>



          jQuery(document).ready(function ($) {



              if ($(window).scrollTop() == 0) {



                  playVid();



              } else {







                  pauseVid();



              }



          });



          var video_one = document.getElementById("video_one");







          function playVid() {



              video_one.play();



          }







          function pauseVid() {



              video_one.pause();



          }

      </script>



  <div class="container"> 



    <!-- Header Texts here by Excerpt  -->



    <div class="row">



      <div class="col-lg-8">



        <div class="intro-text">



          <div class="intro-heading">



            <h1><span>LYTAL, REITER, SMITH, IVEY & FRONRATH</span>

<br />TRIAL ATTORNEYS THAT FIGHT FOR YOUR RIGHTS

</h1>



          </div>



          <div class="con">We are Board Certified Trial Lawyers representing people and families in all types of Personal Injury cases</div>



          <p><a href="<?php echo home_url('/'); ?>no-recovery-no-fee/" class="read_case btn btn-xl active_one"><strong>No Recovery, No Fee</strong>Never pay out-of-pocket</a><a href="<?php echo home_url('/'); ?>do-i-have-a-case/" class="get_a_free btn btn-xl" style="float:right;"><strong>Do I Have A Case?</strong>Schedule a FREE Consultation</a><a href="<?php echo home_url('/'); ?>referring-attorneys/" class="get_a_free btn btn-xl btn-esf"><strong>Co-Counsel & Referrals</strong>Get the additional expertise needed for your case</a> </p>



        </div>



      </div>



      <div class="col-lg-4"></div>

    <div class="best-law"><img src="http://lrsif.darque.info/wp-content/uploads/2017/10/BLF-2018_Silver_Standard-2.png" width="121" height="120"><img src="<?php echo home_url();?>/wp-content/uploads/2016/06/Super_Lawyers_Logo.png" height="120"><img src="<?php echo home_url();?>/wp-content/uploads/2016/06/FLBarBoardCert.png" height="120"></div>

    </div>



    <!-- Header Texts here by Excerpt  --> 



  </div>



  <?php if ( get_header_image() ) : ?>



  <?php



					/**



					 * Filter the default twentysixteen custom header sizes attribute.



					 *



					 * @since Twenty Sixteen 1.0



					 *



					 * @param string $custom_header_sizes sizes attribute



					 * for Custom Header. Default '(max-width: 709px) 85vw,



					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.



					 */



					$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );



				?>



  <div class="header-image"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"> </a> </div>



  <!-- .header-image -->



  <?php endif; // End header image check. ?>



</header>



<!-- .site-header -->



<div class="home_wrapper">



<?php if(!is_page('25')){ ?>



<div id="content" class="site-content">



<?php } ?>







