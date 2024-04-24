<?php
global $avia_config;

$responsive     = avia_get_option('responsive_active') != "disabled" ? "responsive" : "fixed_layout";
$headerS        = avia_header_setting();
$social_args    = array('outside'=>'ul', 'inside'=>'li', 'append' => '');
$icons          = !empty($headerS['header_social']) ? avia_social_media_icons($social_args, false) : "";

if (isset($headerS['disabled'])) {
    return;
}

?>

<header id='header' class='practice-area all_colors header_color <?php avia_is_dark_bg('header_color');
echo " ".$headerS['header_class']; ?>' <?php avia_markup_helper(array('context' => 'header','post_type'=>'forum'));?>>
        <div class="header-wrp">
            <div class="container">
                <div class="header-contain-area">
                    <div class="logo-part">
                        <?php
                        $addition = false;
                        if (!empty($headerS['header_transparency']) && !empty($headerS['header_replacement_logo'])) {
                            $addition = "<img src='".$headerS['header_replacement_logo']."' class='alternate' alt='' title='' />";
                        }
                        
                        echo avia_logo(AVIA_BASE_URL.'images/layout/logo.png', $addition, 'span', true);
                        ?>
                    </div>
                    
                    <div class="phone-and-menu-part">
                        <div class="phone-number">
                            <?php
                            $phone          = $headerS['header_phone_active'] != "" ? $headerS['phone'] : "";
                            if ($phone) {
                                ?><div class='phone-info'><span><?php echo do_shortcode($phone); ?></span></div><?php
                            }
                            ?>
                        </div>

                        <div class="right-menu-section">
                            <?php
                            $main_nav = "<nav class='main_menu' data-selectname='".__('Select a page', 'avia_framework')."' ".avia_markup_helper(array('context' => 'nav', 'echo' => false)).">";
                                $avia_theme_location = 'avia';
                                $avia_menu_class = $avia_theme_location . '-menu';
                                $args = array(
                                    'theme_location'    => $avia_theme_location,
                                    'menu_id'           => $avia_menu_class,
                                    'menu_class'        => 'menu av-main-nav',
                                    'container_class'   => $avia_menu_class.' av-main-nav-wrap'.$icon_beside,
                                    'fallback_cb'       => 'avia_fallback_menu',
                                    'echo'              =>  false,
                                    'walker'            => new avia_responsive_mega_menu()
                                );
                        
                                $wp_main_nav = wp_nav_menu($args);
                                $main_nav .= $wp_main_nav;
                                
                                ob_start();
                                do_action('ava_inside_main_menu'); // todo: replace action with filter, might break user customizations
                                $main_nav .= ob_get_clean();
                            
                                if ($icon_beside) {
                                    $main_nav .= $icons;
                                }
                                    
                                $main_nav .= '</nav>';

                                echo apply_filters('avf_main_menu_nav', $main_nav);
                                ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
<!-- end header -->
</header>


        <?php
            global $post;
        if (is_home()) { ?>
            <?php   return;
        } ?>
            
<?php if (is_singular(array( 'post' )) && ( !has_post_thumbnail($post->ID) )) { ?>
    <div class="headerTitle one" style="background:url(<?php echo get_stylesheet_directory_uri(); ?>/images/inner-banner-bg.jpg) no-repeat center center;background-size:cover;">
        <div class="blackBg"></div>
        <div class="container"><h1><?php the_title(); ?> <small><?php echo do_shortcode('[acf field="header_sub_title"]'); ?></small></h1></div>
    </div>
    <?php return;
}?>
        
<?php if (is_singular(array( 'page' )) && has_post_thumbnail($post->ID)) { ?>
    <div class="headerTitle two" style="background:url(<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?>) no-repeat center center;background-size:cover;">
        <div class="blackBg"></div>
        <div class="container"><h1><?php the_title(); ?> <small><?php echo do_shortcode('[acf field="header_sub_title"]'); ?></small></h1></div>
    </div> 
<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<div class="container"><p id="breadcrummbs">','</p></div>' );
}
?>
<?php } ?>

<?php if (is_single()) { ?>
    <div class="headerTitle three" style="background:url(<?php echo get_stylesheet_directory_uri(); ?>/images/inner-banner-bg.jpg) no-repeat center center;background-size:cover;">
        <div class="blackBg"></div>
        <div class="container">
            <h1><?php the_title(); ?> <small><?php echo do_shortcode('[acf field="header_sub_title"]'); ?></small></h1>
            <p class="author-name">By <?php the_author_posts_link(); ?></p> <!-- Display author's name -->
        </div>
    </div>
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div class="container"><p id="breadcrummbs">', '</p></div>');
    }
    ?>
    <?php return;
}