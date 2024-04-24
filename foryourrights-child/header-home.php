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
	<script async src="//280767.tctm.co/t.js"></script> 
    <!-- <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->
    <link rel="preload" as="image" href="https://www.foryourrights.com/wp-content/uploads/2023/09/main-banner-650951892ac64.webp" />
<!-- font-family: ‘Playfair Display’, serif;
 font-family: ‘Poppins’, sans-serif; -->
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="facebook-domain-verification" content="z3sgfbkheb9bb2s4vt0iq3l94hzhkr" />
<meta name="google-site-verification" content="0OGz_QUTrVrLWVDAhLYtbRy598zAnBXKRfthQahmeL0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	
	
	<?php if (is_page(array(9593))){ ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
	"name": "Lytal, Reiter, Smith, Ivey & Fronrath",
    "@id": "https://www.foryourrights.com/"
  },
  "headline": "Drawbridge operator charged with manslaughter for death of woman",
  "description": "The bridgetender controlling a Florida drawbridge when a woman walking across fell to her death was arrested Thursday and charged with one count of manslaughter by culpable negligence, West Palm Beach police said in a release.",
  "image": {
    "@type": "ImageObject",
    "url": "https://www.foryourrights.com/wp-content/uploads/2022/03/Drawbridge-operator-charged-with-manslaughter-for-death-of-woman-who-fell-when-bridge-opened.jpg",
    "width": "780",
    "height": "438"
  },
  "author": {
    "@type": "Person",
    "name": "Jamiel Lynch",
    "url": "https://edition.cnn.com/specials/profiles"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Jamiel Lynch",
    "logo": {
      "@type": "ImageObject",
      "url": "//cdn.cnn.com/cnnnext/dam/assets/181129212828-jamiel-lynch-profile-photo-small-11.jpg",
      "width": "120",
      "height": "120"
    }
  },
  "datePublished": "2022-03-19",
  "dateModified": "2022-03-19"
}
</script>






<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
	"name": "Lytal, Reiter, Smith, Ivey & Fronrath",
    "@id": "https://www.foryourrights.com/"
  },
  "headline": "Police: Bridge tender didn’t tell the truth, supervisor texted what to tell police",
  "description": "Authorities say the drawbridge tender who was working when 79-year-old Carol Wright fell to her death didn't tell the truth about what happened.",
  "image": {
    "@type": "ImageObject",
    "url": "https://www.foryourrights.com/wp-content/uploads/2022/03/AAVeLah.png",
    "width": "678",
    "height": "364"
  },
  "author": {
    "@type": "Person",
    "name": "Lenny Cohen",
    "url": "https://www.msn.com/en-us/community/channel/vid-sejh884ncwmwas444uir9w6ctcstrfe0d87fmhm8h7nyu6e5qbpa?ocid=winp1task&cvid=a6c725c3c1aa4017b7bf5f5f9060f565"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Lenny Cohen",
    "logo": {
      "@type": "ImageObject",
      "url": "https://img-s-msn-com.akamaized.net/tenant/amp/entityid/BB17PvZY.img",
      "width": "150",
      "height": "150"
    }
  },
  "datePublished": "2022-03-21",
  "dateModified": "2022-03-21"
}
</script>





<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
	"name": "Lytal, Reiter, Smith, Ivey & Fronrath",
    "@id": "https://www.foryourrights.com/"
  },
  "headline": "Police: Niece urges for safety improvements after aunt’s fatal fall from West Palm Beach drawbridge",
  "description": "The niece of Carol Wright, the woman killed while crossing the Royal Park Bridge in February, tells Contact 5 that better training for bridge tenders and safety improvements on bridges are needed immediately.  ",
  "image": {
    "@type": "ImageObject",
    "url": "https://www.foryourrights.com/wp-content/uploads/2022/03/poster_885c2bbd239044ed80fcb2a770761d3b.jpg",
    "width": "1280",
    "height": "720"
  },
  "author": {
    "@type": "Person",
    "name": "Michael Buczyner",
    "url": "https://www.wptv.com/michael-buczyner884ncwmwas444uir9w6ctcstrfe0d87fmhm8h7nyu6e5qbpa?ocid=winp1task&cvid=a6c725c3c1aa4017b7bf5f5f9060f565"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Michael Buczyner",
    "logo": {
      "@type": "ImageObject",
      "url": "https://ewscripps.brightspotcdn.com/dims4/default/4e324b7/2147483647/strip/true/crop/675x675+208+0/resize/300x300!/quality/90/?url=http%3A%2F%2Fewscripps-brightspot.s3.amazonaws.com%2F37%2F4b%2F0945fcae40a79b6766b98676a10a%2Fmichael-buchner-2021.png",
      "width": "35",
      "height": "35"
    }
  },
  "datePublished": "2022-03-24",
  "dateModified": "2022-03-24"
}
</script>





<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
	"name": "Lytal, Reiter, Smith, Ivey & Fronrath",
    "@id": "https://www.foryourrights.com/"
  },
  "headline": "Family of woman who fell to her death from Royal Park Bridge sues bridge tender, Florida Drawbridges Inc.",
  "description": "The family of a 79-year-old woman who fell to her death while attempting to cross the Royal Park Bridge is suing the bridge tender and the company that manages the bridge.",
  "image": {
    "@type": "ImageObject",
    "url": "https://www.foryourrights.com/wp-content/uploads/2022/03/download-1.jpeg",
    "width": "1280",
    "height": "720"
  },
  "author": {
    "@type": "Person",
    "name": "Michael Buczyner",
    "url": "https://www.wptv.com/michael-buczyner884ncwmwas444uir9w6ctcstrfe0d87fmhm8h7nyu6e5qbpa?ocid=winp1task&cvid=a6c725c3c1aa4017b7bf5f5f9060f565"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Michael Buczyner",
    "logo": {
      "@type": "ImageObject",
      "url": "https://ewscripps.brightspotcdn.com/dims4/default/4e324b7/2147483647/strip/true/crop/675x675+208+0/resize/300x300!/quality/90/?url=http%3A%2F%2Fewscripps-brightspot.s3.amazonaws.com%2F37%2F4b%2F0945fcae40a79b6766b98676a10a%2Fmichael-buchner-2021.png",
      "width": "35",
      "height": "35"
    }
  },
  "datePublished": "2022-03-28",
  "dateModified": "2022-03-28"
}
</script>





<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
	"name": "Lytal, Reiter, Smith, Ivey & Fronrath",
    "@id": "https://www.foryourrights.com/"
  },
  "headline": "He estate of a woman who fell to her death when a Florida drawbridge opened while she was walking across it has sued a bridge attendant and the company that operates the span.",
   "description": "The estate of a woman who fell to her death when a Florida drawbridge opened while she was walking across it has sued a bridge attendant and the company that operates the span.",
  "image": {
    "@type": "ImageObject",
    "url": "https://www.foryourrights.com/wp-content/uploads/2022/03/Drawbridge-operator-charged-with-manslaughter-for-death-of-woman-who-fell-when-bridge-opened.jpg",
    "width": "780",
    "height": "438"
  },
  "author": {
    "@type": "Person",
    "name": "Jamiel Lynch",
    "url": "https://edition.cnn.com/specials/profiles"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Jamiel Lynch",
    "logo": {
      "@type": "ImageObject",
      "url": "//cdn.cnn.com/cnnnext/dam/assets/181129212828-jamiel-lynch-profile-photo-small-11.jpg",
      "width": "120",
      "height": "120"
    }
  },
  "datePublished": "2022-03-29",
  "dateModified": "2022-03-29"
}
</script>






<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
	"name": "Lytal, Reiter, Smith, Ivey & Fronrath",
    "@id": "https://www.foryourrights.com/"
  },
  "headline": "he estate of a woman who fell to her death when a Florida drawbridge opened while she was walking across it has sued a bridge attendant and the company that operates the span.",
   "description": "Palm Beach County public schools will pay $200,000 to the family of a 7-year-old autistic boy left on a school bus for more than five hours in 2015. School Board members on Wednesday approved the payment to the boy’s parents, Eva Palomino and Eddi Guevara, to settle a lawsuit over the incident.",
  "image": {
    "@type": "ImageObject",
    "url": "https://www.foryourrights.com/wp-content/uploads/2019/03/palmbeachpost-logo.jpg",
    "width": "400",
    "height": "250"
  },
  "author": {
    "@type": "Person",
    "name": "Andrew Marra",
    "url": "https://twitter.com/AMarranara"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Andrew Marra",
    "logo": {
      "@type": "ImageObject",
      "url": "//cdn.cnn.com/cnnnext/dam/assets/181129212828-jamiel-lynch-profile-photo-small-11.jpg",
      "width": "120",
      "height": "120"
    }
  },
  "datePublished": "2022-03-19",
  "dateModified": "2022-03-19"
}
</script>


<!-- ahsan header home -->

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
	"name": "Lytal, Reiter, Smith, Ivey & Fronrath",
    "@id": "https://www.foryourrights.com/"
  },
  "headline": "Autopilot failed to keep Tesla from sliding under semitruck at 68 mph, lawsuit claims",
   "description": "A Tesla car, running on Autopilot, skidded 1,600 feet after sliding under a semitruck at 68 mph, shearing off its top and killing its driver, according to a lawyer who is suing the carmaker.",
  "image": {
    "@type": "ImageObject",
    "url": "https://www.foryourrights.com/wp-content/uploads/2019/03/sun-sentinel-logo.jpg",
    "width": "400",
    "height": "250"
  },
  "author": {
    "@type": "Person",
    "name": "Brooke Baitinger",
    "url": "https://www.sun-sentinel.com/sfl-brooke-baitinger-staff-staff.html"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Brooke Baitinger",
    "logo": {
      "@type": "ImageObject",
      "url": "https://www.sun-sentinel.com/resizer/9kaIgPYmKifwlkKANEhx1wRe7X0=/72x72/top/s3.amazonaws.com/arc-authors/tronc/42089eef-467f-4ccd-9234-5ee5a00641d3.png",
      "width": "72",
      "height": "72"
    }
  },
  "datePublished": "2022-03-29",
  "dateModified": "2022-03-29"
}
</script>


<?php } ?>
	
	
	
	
	
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

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-39681216-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-39681216-1');
</script>
<!-- Google Tag Manager -->
<!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WRJLT9P');</script>-->
<!-- End Google Tag Manager -->
<script type="application/ld+json">
[
  {
"@context": "http://schema.org",
"@type": "Organization",
"@id":"https://www.foryourrights.com/#org",
"legalName": "Lytal, Reiter, Smith, Ivey & Fronrath",
 "description": "We have assembled some links to get you started.",
 "url": "https://www.foryourrights.com/",
"logo": "https://www.foryourrights.com/wp-content/uploads/2020/10/lytal-logo-min.png",
"image":
{"@type": "ImageObject",
"name": "Lytal, Reiter, Smith, Ivey & Fronrath. image",
"url": "https://www.foryourrights.com/wp-content/uploads/2020/10/lytal-logo-min.png"
},
"areaServed":[
{
"@type": "State",
"name": "Florida"
}
],
"sameAs": [ "https://www.facebook.com/foryourrights",
    "https://www.instagram.com/lytal_reiter/",
    "https://www.linkedin.com/company/the-law-firm-of-lytal-reiter-smith-ivey-&-fronrath/?report.success=KJ_KkFGTDCfMt-A7wV3Fn9Yvgwr02Kd6AZHGx4bQCDiP6-2rfP2oxyVoEQiPrcAQ7Bf",
    "https://twitter.com/4your_rights",
    "https://www.youtube.com/channel/UC7wzOTiZX7_Tro7f_Z_WKrQ"],
"ContactPoint":[
{
"@type": "ContactPoint",
"name": "Lytal, Reiter, Smith, Ivey & Fronrath",
"availableLanguage": {
"@type": "Language",
"name": "English"
},
"telephone": "(561) 655-1990",
"contactType": "Customer Support",
"url": "https://www.foryourrights.com/contact/"
}
]
},
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
  }
]
</script>
<style>
@font-face {
    font-family: 'Playfair Display Black';
    font-style: normal;
    font-weight: 400;
    src: local('Playfair Display Black'), local('PlayfairDisplay-Black'),
        url(http://allfont.net/cache/fonts/playfair-display-black_842bbdadbd0e9ebf8990bdf667b5ac25.woff) format('woff'),
        url(http://allfont.net/cache/fonts/playfair-display-black_842bbdadbd0e9ebf8990bdf667b5ac25.ttf) format('truetype');
}
	</style>
	
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
<?php if (is_page(array(25,1558,9593))) : ?>
<!-- Lytal Reiter_NovDec2020_Site Visits_ATT-Activity-Pixel -->
<img src="https://tags.w55c.net/rs?id=9b717c2804ae4adea020b920e03ec7af&t=marketing" style="display:none;"/>
<?php endif; ?>
	<?php if(is_page(array(9593))){?>
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
    <style>
     .page-template-home-new .google-map.row .av_one_forth {margin-left: 0px!important;border: 2px solid #d6a300;width: 25%;height: 400px;}
     @media screen and (max-width: 1023px){ .page-template-home-new .google-map.row .av_one_forth {width: 100%;height: 300px;}}
    </style>
</head>




<body id="top" <?php body_class($rtl_support . $style." ".$avia_config['font_stack']." ".$blank." ".$sidebar_styling);
avia_markup_helper(array('context' => 'body')); ?>>
    <script async src='https://tag.simpli.fi/sifitag/1dd500b0-64d4-0138-71c0-067f653fa718'></script>
    

    <img style="position: absolute;" src="https://jelly.mdhv.io/v1/star.gif?pid=S0q4XDUx02uiVcA5aVqIKS4lty7z&src=mh&evt=hi" alt="Jelly MDHV">

    <?php
    
    do_action('ava_after_body_opening_tag');
        
    if ("av-preloader-active av-preloader-enabled" === $preloader) {
        echo avia_preload_screen();
    }
        
    ?>

    <div id='wrap_all'>

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