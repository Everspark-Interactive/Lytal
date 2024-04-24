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
<meta content="width=device-width" name="viewport">
<link href="http://gmpg.org/xfn/11" rel="profile">
<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  
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
	.footer-bottom .footer_contact {float: none !important; width: 100% !important;}
	section#ninth .bg_two ul.social-buttons {
		height:auto !important;
   		margin-bottom: 15px !important;
	}
	
}

@media only screen and (max-width: 360px) {}
@media only screen and (max-width: 320px) {}



  
  </style>
  
  
  
  
  
  
  
  
  
  
  <?php wp_head(); ?>
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
        
        <a class="mob_logo" href="https://foryourrights.com/"><img src="https://foryourrights.com/wp-content/uploads/2016/08/cropped-new-logo.png" alt="" height="" width=""></a>
        
        <?php if ( is_front_page() && is_home() ) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
          </a></h1>
        <?php else : ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
          </a></p>
        <?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo $description; ?></p>
        <?php endif; ?>
      </div>
      <!-- .site-branding -->
      
      <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
      <button id="menu-toggle" class="menu-toggle">
      <?php _e( 'Menu', 'twentysixteen' ); ?>
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
      

<?php $postid = get_post_type( get_the_ID() );
	  if($postid=='post')
	  {
		  $post_id = '12';
	  }
	  else
	  {
		  $post_id = $post->ID;
	  }
?>
    </div> <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' ); ?> 
<header style="background:none;" data-image-src="<?php echo $image[0]; ?>" data-parallax="scroll" class="parallax-window" id="<?php echo $post->post_name; ?>">
  
  <div class="container"> 
    <!-- Header Texts here by Excerpt  -->
    <div class="row">
      <div class="col-lg-8">
        <div class="intro-text">
          <div class="intro-heading">
            
        </div>
      </div>
      <div class="col-lg-4"></div>
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

