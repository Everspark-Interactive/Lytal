<?php
if (is_front_page()) {
    if (! defined('ABSPATH')) {
        die();
    }
    
    global $avia_config;
    
    $lightbox_option = avia_get_option('lightbox_active');
    $avia_config['use_standard_lightbox'] = empty($lightbox_option) || ( 'lightbox_active' == $lightbox_option ) ? 'lightbox_active' : 'disabled';
    /**
     * Allow to overwrite the option setting for using the standard lightbox
     * Make sure to return 'disabled' to deactivate the standard lightbox - all checks are done against this string
     *
     * @added_by Günter
     * @since 4.2.6
     * @param string $use_standard_lightbox             'lightbox_active' | 'disabled'
     * @return string                                   'lightbox_active' | 'disabled'
     */
    $avia_config['use_standard_lightbox'] = apply_filters('avf_use_standard_lightbox', $avia_config['use_standard_lightbox']);

    $style                  = $avia_config['box_class'];
    $responsive             = avia_get_option('responsive_active') != "disabled" ? "responsive" : "fixed_layout";
    $blank                  = isset($avia_config['template']) ? $avia_config['template'] : "";
    $av_lightbox            = $avia_config['use_standard_lightbox'] != "disabled" ? 'av-default-lightbox' : 'av-custom-lightbox';
    $preloader              = avia_get_option('preloader') == "preloader" ? 'av-preloader-active av-preloader-enabled' : 'av-preloader-disabled';
    $sidebar_styling        = avia_get_option('sidebar_styling');
    $filterable_classes     = avia_header_class_filter(avia_header_class_string());
    $av_classes_manually    = "av-no-preview"; /*required for live previews*/
    $av_classes_manually   .= avia_is_burger_menu() ? " html_burger_menu_active" : " html_text_menu_active";
    
    /**
     * @since 4.2.3 we support columns in rtl order (before they were ltr only). To be backward comp. with old sites use this filter.
     */
    $rtl_support            = 'yes' == apply_filters('avf_rtl_column_support', 'yes') ? ' rtl_columns ' : '';
    
    ?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo "html_{$style} ".$responsive." ".$preloader." ".$av_lightbox." ".$filterable_classes." ".$av_classes_manually ?> ">
<head>

	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="google-site-verification" content="0OGz_QUTrVrLWVDAhLYtbRy598zAnBXKRfthQahmeL0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
    <?php
/*
 * outputs a rel=follow or nofollow tag to circumvent google duplicate content for archives
 * located in framework/php/function-set-avia-frontend.php
 */
    if (function_exists('avia_set_follow')) {
        echo avia_set_follow();
    }

    ?>


<!-- mobile setting -->
    <?php

    if (strpos($responsive, 'responsive') !== false) {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
    }
    ?>


<!-- Scripts/CSS and wp_head hook -->
    <?php
/* Always have wp_head() just before the closing </head>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to add elements to <head> such
 * as styles, scripts, and meta tags.
 */

    wp_head();

    ?>
<script async src="//280767.tctm.co/t.js"></script> 
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '2190112634437554'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=2190112634437554&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


	
	
	
	
	
	
<!-- Google Tag Manager -->
<!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WRJLT9P');</script>-->
<!-- End Google Tag Manager -->
	
    <?php if (is_page(6805)) : ?>
<link href="https://fonts.googleapis.com/css2?family=Scheherazade:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
    <?php endif; ?>
    <?php if (wp_is_mobile()) {?>
    <style>
        #top #wrap_all #socket .social_bookmarks li a{width:44px;height:44px;background:url(https://www.foryourrights.com/wp-content/uploads/2020/10/mob-social-icons.jpg) no-repeat;font-size:0px;}
    </style>
    <?php } else {?>
    <style>
        #top #wrap_all #socket .social_bookmarks li a{width:44px;height:44px;background:url(https://www.foryourrights.com/wp-content/uploads/2020/10/social-icons.jpg) no-repeat;font-size:0px;}
    </style>
    <?php }?>
    <?php if (is_page(array(25,1558))) : ?>
<!-- Lytal Reiter_NovDec2020_Site Visits_ATT-Activity-Pixel -->
<img src="https://tags.w55c.net/rs?id=9b717c2804ae4adea020b920e03ec7af&t=marketing" style="display:none;"/>
    <?php endif; ?>
    <?php if(is_page(array(573,7258,7632,8847,7602))){?>
    <!--  Clickcease.com tracking-->
    <script type='text/javascript'>var script = document.createElement('script');
    script.async = true; script.type = 'text/javascript';
    var target = 'https://www.clickcease.com/monitor/stat.js';
    script.src = target;var elem = document.head;elem.appendChild(script);
    </script>
    <noscript>
    <a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com/stats/stats.aspx' alt='ClickCease'/></a>
    </noscript>
    <!--  Clickcease.com tracking-->
<?php } ?>
<style>section .avia_textblock p a, section .avia_textblock p a  b,section .avia_textblock ul li a,section .avia_textblock ul li a b,section .avia_textblock ol li a,section .avia_textblock ol li a b,.av_toggle_section .toggle_wrap .toggle_content p a,article.post .entry-content p a span,.av_toggle_section .toggle_wrap .toggle_content ul li a{color: #b7900b !important;}</style>
</head>




<body id="top" <?php body_class($rtl_support . $style." ".$avia_config['font_stack']." ".$blank." ".$sidebar_styling);
avia_markup_helper(array('context' => 'body')); ?>>
    <script async src='https://tag.simpli.fi/sifitag/1dd500b0-64d4-0138-71c0-067f653fa718'></script>
   

    <img style="position: absolute;" alt="Jelly MDHV" src="https://jelly.mdhv.io/v1/star.gif?pid=S0q4XDUx02uiVcA5aVqIKS4lty7z&src=mh&evt=hi">

    <?php
    
    do_action('ava_after_body_opening_tag');
        
    if ("av-preloader-active av-preloader-enabled" === $preloader) {
        echo avia_preload_screen();
    }
        
    ?>


    <?php
    if (!$blank) { //blank templates dont display header nor footer
    //fetch the template file that holds the main menu, located in includes/helper-menu-main.php
         get_template_part('includes/helper', 'main-menu');
    } ?>
    
    <div id='main' class='all_colors' data-scroll-offset='<?php echo avia_header_setting('header_scroll_offset'); ?>'>

    <?php
        
    if (isset($avia_config['temp_logo_container'])) {
        echo $avia_config['temp_logo_container'];
    }
        do_action('ava_after_main_container');
} else {?>
    <?php
    if (! defined('ABSPATH')) {
        die();
    }
    
    global $avia_config;
    
    $lightbox_option = avia_get_option('lightbox_active');
    $avia_config['use_standard_lightbox'] = empty($lightbox_option) || ( 'lightbox_active' == $lightbox_option ) ? 'lightbox_active' : 'disabled';
    /**
     * Allow to overwrite the option setting for using the standard lightbox
     * Make sure to return 'disabled' to deactivate the standard lightbox - all checks are done against this string
     *
     * @added_by Günter
     * @since 4.2.6
     * @param string $use_standard_lightbox             'lightbox_active' | 'disabled'
     * @return string                                   'lightbox_active' | 'disabled'
     */
    $avia_config['use_standard_lightbox'] = apply_filters('avf_use_standard_lightbox', $avia_config['use_standard_lightbox']);

    $style                  = $avia_config['box_class'];
    $responsive             = avia_get_option('responsive_active') != "disabled" ? "responsive" : "fixed_layout";
    $blank                  = isset($avia_config['template']) ? $avia_config['template'] : "";
    $av_lightbox            = $avia_config['use_standard_lightbox'] != "disabled" ? 'av-default-lightbox' : 'av-custom-lightbox';
    $preloader              = avia_get_option('preloader') == "preloader" ? 'av-preloader-active av-preloader-enabled' : 'av-preloader-disabled';
    $sidebar_styling        = avia_get_option('sidebar_styling');
    $filterable_classes     = avia_header_class_filter(avia_header_class_string());
    $av_classes_manually    = "av-no-preview"; /*required for live previews*/
    $av_classes_manually   .= avia_is_burger_menu() ? " html_burger_menu_active" : " html_text_menu_active";
    
    /**
     * @since 4.2.3 we support columns in rtl order (before they were ltr only). To be backward comp. with old sites use this filter.
     */
    $rtl_support            = 'yes' == apply_filters('avf_rtl_column_support', 'yes') ? ' rtl_columns ' : '';
    
    ?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo "html_{$style} ".$responsive." ".$preloader." ".$av_lightbox." ".$filterable_classes." ".$av_classes_manually ?> ">
<head>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->
<!-- font-family: ‘Playfair Display’, serif;
 font-family: ‘Poppins’, sans-serif; -->
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="google-site-verification" content="0OGz_QUTrVrLWVDAhLYtbRy598zAnBXKRfthQahmeL0" />
    <?php
/*
 * outputs a rel=follow or nofollow tag to circumvent google duplicate content for archives
 * located in framework/php/function-set-avia-frontend.php
 */
    if (function_exists('avia_set_follow')) {
        echo avia_set_follow();
    }

    ?>

<!-- mobile setting -->
    <?php

    if (strpos($responsive, 'responsive') !== false) {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
    }
    ?>


<!-- Scripts/CSS and wp_head hook -->
    <?php
/* Always have wp_head() just before the closing </head>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to add elements to <head> such
 * as styles, scripts, and meta tags.
 */

    wp_head();

    ?>

<script async src="//280767.tctm.co/t.js"></script> 

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '2190112634437554'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=2190112634437554&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<!-- Google Tag Manager -->
<!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WRJLT9P');</script>-->
<!-- End Google Tag Manager -->

<!--New scheme upload for organizatation ahsan  theme header-->
<script type="application/ld+json">
[
 {
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Lytal, Reiter, Smith, Ivey & Fronrath",
  "alternateName": "Lytal Reiter",
  "url": "https://www.foryourrights.com/",
  "logo": "https://www.foryourrights.com/wp-content/uploads/2020/10/lytal-logo-min.png",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "561-363-7760",
    "contactType": "customer service",
    "contactOption": "TollFree",
    "areaServed": "US",
    "availableLanguage": ["en","es"]
  },
  "sameAs": [
    "https://www.facebook.com/foryourrights",
    "https://twitter.com/4your_rights",
    "https://www.instagram.com/lytal_reiter/",
    "https://www.youtube.com/channel/UC7wzOTiZX7_Tro7f_Z_WKrQ",
    "https://www.linkedin.com/company/the-law-firm-of-lytal-reiter-smith-ivey-&-fronrath/"
  ]
}
,
 {
      "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "item": {
                "@id": "https://www.foryourrights.com/",
                "name": "Home"
            }
        }
    ]
  },
  {
      "@context": "http://schema.org",
  "@type": "LegalService",
  "name": "Lytal, Reiter, Smith, Ivey & Fronrath.",
  "description": "We have assembled some links to get you started.",
  "url": "https://www.foryourrights.com/",
  "image": "https://www.foryourrights.com/wp-content/uploads/2020/10/lytal-logo-min.png",
  "priceRange": "$",
  "telephone": "(561) 655-1990",
  "hasMap": "https://g.page/LytalReiter?share",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Florida",
    "addressRegion": "Florida United States",
    "postalCode": "33401",
    "streetAddress": "Lytal, Reiter, Smith, Ivey & Fronrath 515 N Flagler Dr, 10th floor"
  },
   "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4",
    "reviewCount": "250"
  },
  "sameAs": [
      "https://www.facebook.com/foryourrights",
    "https://www.instagram.com/lytal_reiter/",
    "https://www.linkedin.com/company/the-law-firm-of-lytal-reiter-smith-ivey-&-fronrath/?report.success=KJ_KkFGTDCfMt-A7wV3Fn9Yvgwr02Kd6AZHGx4bQCDiP6-2rfP2oxyVoEQiPrcAQ7Bf",
    "https://twitter.com/4your_rights",
    "https://www.youtube.com/channel/UC7wzOTiZX7_Tro7f_Z_WKrQ"
  ],
  "openingHours": "Mo,Tu,We,Th,Fr, 09:00-18:00"
  },
  {
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "Lytal, Reiter, Smith, Ivey & Fronrath",
  "image": "https://www.foryourrights.com/wp-content/uploads/2020/10/lytal-logo-min.png",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount": "366",
    "reviewCount": "366"
  },
  "review": [{
    "@type": "Review",
    "reviewBody": "I mainly worked with Rob Bradshaw and Debi Duprey. To say that they always went above and beyond is an understatement. The staff were excellent at explaining everything relating to my car accident case. I felt empowered and confident with such a great team on my side. Highly Rex come to to anyone who appreciates hard work and transparency.",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5",
      "bestRating": "5",
      "worstRating": "1"
    },
    "datePublished": "2022-08-02",
    "author": {"@type": "Person", "name": "Megan Nicole"},
    "publisher": {"@type": "Organization", "name": "Google"}
  },{
    "@type": "Review",
    "reviewBody": "My experience with this firm was amazing from beginning to the very end. Steve Sanchez  and Trey Lytal went above and beyond my expectations.  They both continously fought for me even when I  had no more fight left in me as a result I was awarded a generous settlement.  If I'm being honest ,I was an emotional mess as a result of my accident but Steve and Trey talked me back down  to sanity many times through this process.  I hold these two gentlemen very near and dear to my heart.",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5",
      "bestRating": "5",
      "worstRating": "1"
    },
    "datePublished": "2022-07-26",
    "author": {"@type": "Person", "name": "Laurie Lautieri"},
    "publisher": {"@type": "Organization", "name": "Google"}
  },{
    "@type": "Review",
    "reviewBody": "The group at Lyter Reiter law firm truly went above and beyond in handling my personal injury claim. They diligently explained every situation in detail to me and answered all of my questions. I had the pleasure of dealing with Mr.William S. Williams and his personal legal assistant Debra who from the very start, was upfront and realistic regarding the situation and expectations. In the end he maximized my claim, for which I am very grateful. I was very fortunate to fall into the care of the Lyter Reiter law firm group, and I would highly recommend them to anyone in need of a law firm to handle a personal injury matter.",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5",
      "bestRating": "5",
      "worstRating": "1"
    },
    "datePublished": "2022-05-10",
    "author": {"@type": "Person", "name": "Janine Mangum"},
    "publisher": {"@type": "Organization", "name": "Google"}
  },{
    "@type": "Review",
    "reviewBody": "Steve Sanchez and the entire team at Lytal, Reiter, Smith Ivey & Fronrath; are the best attorney's office!  very professional and helpful !!! Steve Sanchez is a fantastic paralegal and investigator; he really cares about his clients and always keep you updated on your case and make sure to get the best results. He is there for you every step of the process and always answer promptly to my questions. I highly recommend this office, they are simply the best.",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5",
      "bestRating": "5",
      "worstRating": "1"
    },
    "datePublished": "2022-07-22",
    "author": {"@type": "Person", "name": "Selena Espinoza"},
    "publisher": {"@type": "Organization", "name": "Google"}
  }]
}

]
</script>

    <?php if (is_page(8261)) : ?>
<link rel="stylesheet" href="/wp-content/themes/foryourrights-child/css/bootstraprow.css" type="text/css" media="all" />
    <?php endif; ?>
    <?php if (is_page(6805)) : ?>
<link href="https://fonts.googleapis.com/css2?family=Scheherazade:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
    <?php endif; ?>
    <?php if (wp_is_mobile()) {?>
    <style>
        #top #wrap_all #socket .social_bookmarks li a{width:44px;height:44px;background:url(https://www.foryourrights.com/wp-content/uploads/2020/10/mob-social-icons.jpg) no-repeat;font-size:0px;}
    </style>
    <?php } else {?>
    <style>
        #top #wrap_all #socket .social_bookmarks li a{width:44px;height:44px;background:url(https://www.foryourrights.com/wp-content/uploads/2020/10/social-icons.jpg) no-repeat;font-size:0px;}
    </style>
    <?php }?>
    <?php if (is_page(array(25,1558))) : ?>
<!-- Lytal Reiter_NovDec2020_Site Visits_ATT-Activity-Pixel -->
<img src="https://tags.w55c.net/rs?id=9b717c2804ae4adea020b920e03ec7af&t=marketing" style="display:none;"/>
    <?php endif; ?>
    <style>section .avia_textblock p a, section .avia_textblock p a  b,section .avia_textblock ul li a,section .avia_textblock ul li a b,section .avia_textblock ol li a,section .avia_textblock ol li a b,.av_toggle_section .toggle_wrap .toggle_content p a,article.post .entry-content p a span,.av_toggle_section .toggle_wrap .toggle_content ul li a{color: #b7900b !important;}</style>
</head>




<body id="top" <?php body_class($rtl_support . $style." ".$avia_config['font_stack']." ".$blank." ".$sidebar_styling);
avia_markup_helper(array('context' => 'body')); ?>>
    <script async src='https://tag.simpli.fi/sifitag/1dd500b0-64d4-0138-71c0-067f653fa718'></script>
   

    <img style="position: absolute;" src="https://jelly.mdhv.io/v1/star.gif?pid=S0q4XDUx02uiVcA5aVqIKS4lty7z&src=mh&evt=hi">

    <?php
    
    do_action('ava_after_body_opening_tag');
        
    if ("av-preloader-active av-preloader-enabled" === $preloader) {
        echo avia_preload_screen();
    }
        
    ?>

   

    <?php
    if (!$blank) { //blank templates dont display header nor footer
    //fetch the template file that holds the main menu, located in includes/helper-menu-main.php
         get_template_part('includes/helper', 'main-menu-practice');
    } ?>
    
    <div id='main' class='all_colors' data-scroll-offset='<?php echo avia_header_setting('header_scroll_offset'); ?>'>

    <?php
        
    if (isset($avia_config['temp_logo_container'])) {
        echo $avia_config['temp_logo_container'];
    }
        do_action('ava_after_main_container');
        
    ?>
<?php } ?>
		