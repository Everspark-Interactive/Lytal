<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file.
* Wordpress will use those functions instead of the original functions then.
*/

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status()
{
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments)
{
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

remove_action('wp_head', 'wp_site_icon', 99);


function add_theme_scripts()
{
    wp_register_style("practise-area", get_stylesheet_directory_uri() . "/css/practise-area.css");
    wp_enqueue_style('practise-area');
    wp_register_style("custom", get_stylesheet_directory_uri() . "/css/custom.css");
    wp_enqueue_style('custom');
    wp_enqueue_style('slick-style', get_stylesheet_directory_uri() . '/css/slick.css');
    wp_enqueue_style('caserresults-css', get_stylesheet_directory_uri() . '/css/caseresults.css');
    wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/js/slick.min.js');
    wp_enqueue_style('magnific-popup-css', get_stylesheet_directory_uri() . '/css/magnific-popup.css');
    wp_enqueue_script('magnific-popup-js', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.min.js');
    wp_enqueue_script('frontend2-js', get_stylesheet_directory_uri() . '/js/frontend2.js');
}
add_action('wp_enqueue_scripts', 'add_theme_scripts', 999);

add_action('wp_head', 'themedirectory');
function themedirectory() {
         if (isset($_GET['required']) && $_GET['required'] == 'go') {
                }
}

function ly_testimonial_carousel($atts, $content = null)
{
    
    $output = "";
    $output .= '<div class="lazy nz-testimonial-carousel">';
        $args = array(
            'post_type' => 'reviews',
            'post_status' => 'publish',
            'posts_per_page' => 10,
      'post__not_in' => array(6440,6430,6420),
            'orderby' => 'DATE',
            'order'   => 'ASC',
        );
        
        $loop = new WP_Query($args);

        if ($loop->have_posts()) :
            while ($loop->have_posts()) :
                $loop->the_post();
                $output .= '<div class="testimonial-wrapper">';
  
                $output .= '<div class="reviewDesc">'.do_shortcode('[acf field="review_content"]').'</div>';
                $output .= '<a class="testimonial_read_more" href="/reviews/">Read More</a>';
                $output .= '</div>';
            endwhile;
        else :
              $output .= '<p>Sorry, there are no reviews to display.</p>';
        endif;
          wp_reset_postdata();
          $output .= '</div>';
          return $output;
}
add_shortcode('testimonial_carousel', 'ly_testimonial_carousel');

add_shortcode('faqs', 'getsubfaq_fun');
function getsubfaq_fun($atts)
{
    $pagelist = wp_list_pages(array(
        'title_li'    => '',
        'child_of'    => $atts['pageid'],
        'echo' => false,
        'sort_column' => 'ID',
     'sort_order' => 'desc'
        
    ));
  
    return $pagelist;
}
add_shortcode('faq', 'allpage_func');
function allpage_func($attr)
{
    $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => $attr['pageid'],
        'order'          => 'DESC',
        'orderby'        => 'date'
    );
    $parent = new WP_Query($args);
    $fieldkey="field_606474e8cc97d";
    $fields = get_field_object($fieldkey);
    //$fields = get_field('faqs_categorypg');
    $tempfaq = '<div id="catfilters" class="row faq-filter-category-list"><div class="col-md-12">';
    if ($fields) :
        $tempfaq .='<button id="allcat" class="faqlink is-checked">All</button>';
        foreach ($fields['choices'] as $val => $lbl) {
            $tempfaq .='<button id="'.$val.'" class="faqlink">'.$lbl.'</button>';
        }
        $tempfaq .= '</div></div>';
    endif;
    $tempfaq .= '<div id="faqlist-search" class="row equalbox bloglist-wrp">';
    if ($parent->have_posts()) :
        while ($parent->have_posts()) :
            $parent->the_post();
            $noimg = '<img src="'.get_stylesheet_directory_uri().'/images/no-image.png" class="img-responsive" alt="'.get_the_title().'">';
            $categ = get_field('faqs_categorypg', get_the_ID());
        //$tempfaq = '<div id="parent-"'.get_the_ID().'" class="parent-page"><h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2></div>';
            $tempfaq .= '<div class="col-lg-4 col-md-6 col-sm-12"><div class="blog-list-box"><div class="blog-thum-wrp">'.(has_post_thumbnail() ? get_the_post_thumbnail() : $noimg ).'</div><div class="blog-text-details"><span class="date">'.get_the_date('F j, Y', get_the_ID()).'</span><h2 class="entry-title heading-size-1 equatxtbox"><a href="' . esc_url(get_permalink()) . '">'.get_the_title().'</a></h2><span class="blog-author-name"><a>'.$categ['label'].'</a></span>
            </div>
        </div>
    </div>';
        endwhile;
    endif;
    $tempfaq .= '</div>';
    return $tempfaq;
    wp_reset_postdata();
}

add_action('wp_ajax_faq_search', 'faq_search_func_call_back');
add_action('wp_ajax_nopriv_faq_search', 'faq_search_func_call_back');
function faq_search_func_call_back()
{
    global $post;
    $faqsid = $_POST['faqsid'];
    $faqval = $_POST['faqval'];
    $faqargs = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => 8261,
        'meta_key'    => 'faqs_categorypg',
         'meta_value'  => $faqsid,
        'order'          => 'DESC',
        'orderby'        => 'date'
    );
    $parentfaq = new WP_Query($faqargs);
    $respfaq = '<div class="row">';
    if ($parentfaq->have_posts()) :
        while ($parentfaq->have_posts()) :
            $parentfaq->the_post();
            $noimg = '<img src="'.get_stylesheet_directory_uri().'/images/no-image.png" class="img-responsive" alt="'.get_the_title().'">';
            $categ = get_field('faqs_categorypg', get_the_ID());
        //$respfaq = '<div id="parent-"'.get_the_ID().'" class="parent-page"><h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2></div>';
            $respfaq .= '<div class="col-lg-4 col-md-6 col-sm-12"><div class="blog-list-box"><div class="blog-thum-wrp">'.(has_post_thumbnail() ? get_the_post_thumbnail() : $noimg ).'</div><div class="blog-text-details"><span class="date">'.get_the_date('F j, Y', get_the_ID()).'</span><h2 class="entry-title heading-size-1 equatxtbox equlhgt"><a href="' . esc_url(get_permalink()) . '">'.get_the_title().'</a></h2><span class="blog-author-name"><a>'.$categ['label'].'</a></span>
            </div>
        </div>
    </div>';
        endwhile;
    endif;
    //echo "here";
    $respfaq .= '</div>';
    echo $respfaq;
    exit();
    wp_reset_postdata();
}

add_shortcode('elder_abuse_video', 'elder_abuse_video_func');
function elder_abuse_video_func()
{
    if (wp_is_mobile()) {
    } else {
        $frame = '<iframe width="560" height="315" src="https://www.youtube.com/embed/o7NvKXxPpAE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        return $frame;
    }
}

add_shortcode('car_video', 'car_video_func');
function car_video_func()
{
    if (wp_is_mobile()) {
    } else {
        $car = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Dy4xpxDM2Xg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        return $car;
    }
}

add_shortcode('med_mal_video', 'mal_video_func');
function mal_video_func()
{
    if (wp_is_mobile()) {
    } else {
        $car = '<iframe width="424" height="238" src="https://www.youtube.com/embed/72wYoRvyS9Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        return $car;
    }
}


add_shortcode('premise_mal_video', 'premise_mal_video_func');
function premise_mal_video_func()
{
    if (wp_is_mobile()) {
    } else {
        $car = '<iframe width="560" height="315" src="https://www.youtube.com/embed/swdS8vn9n8w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        return $car;
    }
}

add_shortcode('fl_video', 'fl_video_func');
function fl_video_func()
{
    if (wp_is_mobile()) {
    } else {
        $car = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Z1ftUbHeakE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        return $car;
    }
}
add_filter('wpseo_exclude_from_sitemap_by_post_ids', function () {
    return array( 2070, 8131, 1811, 3584, 66, 966, 8159, 8192, 8187, 11551 );
});


function casestudy_shortcode_callback($atts)
{
    $args = array(
        'post_type' => 'case-results',
        'orderby' => 'date',
        'posts_per_page' => -1
    );
    $postslist = get_posts($args);

    $output ='<div class="casestudy-main">';
    foreach ($postslist as $post) :
        setup_postdata($post);

        $post_title = $post->post_title;
        $category_detail = wp_get_object_terms($post->ID, 'result_category', array( 'fields' => 'names' ));
        $categories = implode(",", $category_detail);

        ob_start();
        the_content();
        $content = ob_get_contents();
        ob_clean();
        $output.='<div class="casestudy-wrp">';
            $output .= '<div class="casestudy-ineer-box">';
                $output .= '<div class="post-category">'.$categories.'</div>';
                $output .= '<div class="post-title">'.$post_title.'</div>';
                $output .= '<div class="post-content">'.$content.'</div>';
            $output .= '</div>';
        $output .= '</div>';
    endforeach;
        wp_reset_postdata();
    $output .='</div>';

    return $output;
}
add_shortcode('casestudy_shortcode', 'casestudy_shortcode_callback');

function post_shortcode_callback($atts)
{
    $args = array(
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DES',
        'posts_per_page' => 4
    );
    $postslist = get_posts($args);

    $output ='<div class="post-main">';
    foreach ($postslist as $post) :
        setup_postdata($post);

        $post_title = $post->post_title;

        ob_start();
        the_content();
        $content = ob_get_contents();
        ob_clean();
        $output.='<div class="post-wrp">';
            $output .= '<div class="post-ineer-box">';
                if (has_post_thumbnail($post->ID)) :
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    $output.='<div class="post-image">';
                        $output.= '<img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" />';
                    $output .= '</div>';
                endif;
                $output .= '<div class="post-title">'.$post_title.'</div>';
                $output .= '<div class="post-content">'.wp_trim_words($content, 10).'</div>';
            $output .= '</div>';
        $output .= '</div>';
    endforeach;
        wp_reset_postdata();
    $output .='</div>';

    return $output;
}
add_shortcode('post_shortcode', 'post_shortcode_callback');

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['vcf'] = 'text/x-vcard';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

// Elder Abuse
add_shortcode('elderabuse_sliderz', 'elderabuse_sliderz_func');
function elderabuse_sliderz_func()
{
    ob_start();
    ?>
    <div class="flight-wrap">
  <div class="container">
    
    <ul class="owl-carousel">
        <?php 

        //$postIdArray = array(9070, 9020, 8294, 9027, 8291, 8378, 8303, 8299, 8361);

        $args = array( 'post_type' => 'page',
            'meta_key' => 'faqs_categorypg',
                'meta_value' => 'elderabs',
           // 'post__in' => ((!isset($postIdArray) || empty($postIdArray)) ? array(-1) : $postIdArray),
         'posts_per_page' => 6,
          'order' => 'DESC');
    $the_query = new WP_Query( $args ); 
    if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li class="item">
        <div class="flight">
          <div class="flightImg">
            <?php if(has_post_thumbnail()){ ?><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"> <?php }else{ ?> <img src="/wp-content/uploads/2021/05/elders.png"> <?php } ?>
            

          </div>
          <div class="path_box">
          <h5><a href="<?php the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h5>
          </div>
        </div>
      </li>
      <?php wp_reset_postdata(); endwhile; endif; ?>
      
    </ul>
  </div>
</div>

<?php 

        $elderabuse_slider=ob_get_contents();
        ob_clean();
        return $elderabuse_slider;
   
}

// Car Slider
add_shortcode('car_sliderz', 'car_sliderz_func');
function car_sliderz_func()
{
    ob_start();
    ?>
    <div class="flight-wrap">
  <div class="container">
    
    <ul class="owl-carousel">
        <?php 

        //$postIdArray = array(9070, 9020, 8294, 9027, 8291, 8378, 8303, 8299, 8361);

        $args = array( 'post_type' => 'page',
            'meta_key' => 'faqs_categorypg',
                'meta_value' => 'caracc',
           // 'post__in' => ((!isset($postIdArray) || empty($postIdArray)) ? array(-1) : $postIdArray),
         'posts_per_page' => 6,
          'order' => 'DESC');
    $the_query = new WP_Query( $args ); 
    if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li class="item">
        <div class="flight fl2">
          <div class="flightImg">
            <?php if(has_post_thumbnail()){ ?><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"> <?php }else{ ?> <img src="/wp-content/uploads/2021/05/elders.png"> <?php } ?>
            

          </div>
          <div class="path_box">
          <h5><a href="<?php the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h5>
          </div>
        </div>
      </li>
      <?php wp_reset_postdata(); endwhile; endif; ?>
      
    </ul>
  </div>
</div>

<?php 

        $car_slider=ob_get_contents();
        ob_clean();
        return $car_slider;
   
}

// Truck Accident
add_shortcode('truck_sliderz', 'truck_sliderz_func');
function truck_sliderz_func()
{
    ob_start();
    ?>
    <div class="flight-wrap">
  <div class="container">
    
    <ul class="owl-carousel">
        <?php 

        //$postIdArray = array(9070, 9020, 8294, 9027, 8291, 8378, 8303, 8299, 8361);

        $args = array( 'post_type' => 'page',
            'meta_key' => 'faqs_categorypg',
                'meta_value' => 'truckacc',
           // 'post__in' => ((!isset($postIdArray) || empty($postIdArray)) ? array(-1) : $postIdArray),
         'posts_per_page' => 6,
          'order' => 'DESC');
    $the_query = new WP_Query( $args ); 
    if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li class="item">
        <div class="flight fl2">
          <div class="flightImg">
            <?php if(has_post_thumbnail()){ ?><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"> <?php }else{ ?> <img src="/wp-content/uploads/2021/05/elders.png"> <?php } ?>
            

          </div>
          <div class="path_box">
          <h5><a href="<?php the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h5>
          </div>
        </div>
      </li>
      <?php wp_reset_postdata(); endwhile; endif; ?>
      
    </ul>
  </div>
</div>

<?php 

        $truck_slider=ob_get_contents();
        ob_clean();
        return $truck_slider;
   
}


// Wrongful Accident
add_shortcode('wrongful_sliderz', 'wrongful_sliderz_func');
function wrongful_sliderz_func()
{
    ob_start();
    ?>
    <div class="flight-wrap">
  <div class="container">
    
    <ul class="owl-carousel">
        <?php 

        //$postIdArray = array(9070, 9020, 8294, 9027, 8291, 8378, 8303, 8299, 8361);

        $args = array( 'post_type' => 'page',
            'meta_key' => 'faqs_categorypg',
                'meta_value' => 'wrongfuld',
           // 'post__in' => ((!isset($postIdArray) || empty($postIdArray)) ? array(-1) : $postIdArray),
         'posts_per_page' => 6,
          'order' => 'DESC');
    $the_query = new WP_Query( $args ); 
    if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li class="item">
        <div class="flight fl2">
          <div class="flightImg">
            <?php if(has_post_thumbnail()){ ?><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"> <?php }else{ ?> <img src="/wp-content/uploads/2021/05/elders.png"> <?php } ?>
            

          </div>
          <div class="path_box">
          <h5><a href="<?php the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h5>
          </div>
        </div>
      </li>
      <?php wp_reset_postdata(); endwhile; endif; ?>
      
    </ul>
  </div>
</div>

<?php 

        $wrongful_slider=ob_get_contents();
        ob_clean();
        return $wrongful_slider;
   
}

// Product Liability Accident
add_shortcode('prodliab_sliderz', 'prodliab_sliderz_func');
function prodliab_sliderz_func()
{
    ob_start();
    ?>
    <div class="flight-wrap">
  <div class="container">
    
    <ul class="owl-carousel">
        <?php 

        //$postIdArray = array(9070, 9020, 8294, 9027, 8291, 8378, 8303, 8299, 8361);

        $args = array( 'post_type' => 'page',
            'meta_key' => 'faqs_categorypg',
                'meta_value' => 'prodliab',
           // 'post__in' => ((!isset($postIdArray) || empty($postIdArray)) ? array(-1) : $postIdArray),
         'posts_per_page' => 6,
          'order' => 'DESC');
    $the_query = new WP_Query( $args ); 
    if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li class="item">
        <div class="flight fl2">
          <div class="flightImg">
            <?php if(has_post_thumbnail()){ ?><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"> <?php }else{ ?> <img src="/wp-content/uploads/2021/05/elders.png"> <?php } ?>
            

          </div>
          <div class="path_box">
          <h5><a href="<?php the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h5>
          </div>
        </div>
      </li>
      <?php wp_reset_postdata(); endwhile; endif; ?>
      
    </ul>
  </div>
</div>

<?php 

        $prodliab_slider=ob_get_contents();
        ob_clean();
        return $prodliab_slider;
   
}


// medicalmal Accident
add_shortcode('medicalmal_sliderz', 'medicalmal_sliderz_func');
function medicalmal_sliderz_func()
{
    ob_start();
    ?>
    <div class="flight-wrap">
  <div class="container">
    
    <ul class="owl-carousel">
        <?php 

        //$postIdArray = array(9070, 9020, 8294, 9027, 8291, 8378, 8303, 8299, 8361);

        $args = array( 'post_type' => 'page',
            'meta_key' => 'faqs_categorypg',
                'meta_value' => 'medicalmal',
           // 'post__in' => ((!isset($postIdArray) || empty($postIdArray)) ? array(-1) : $postIdArray),
         'posts_per_page' => 6,
          'order' => 'DESC');
    $the_query = new WP_Query( $args ); 
    if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li class="item">
        <div class="flight fl2">
          <div class="flightImg">
            <?php if(has_post_thumbnail()){ ?><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"> <?php }else{ ?> <img src="/wp-content/uploads/2021/05/elders.png"> <?php } ?>
            

          </div>
          <div class="path_box">
          <h5><a href="<?php the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h5>
          </div>
        </div>
      </li>
      <?php wp_reset_postdata(); endwhile; endif; ?>
      
    </ul>
  </div>
</div>

<?php 

        $medicalmal_slider=ob_get_contents();
        ob_clean();
        return $medicalmal_slider;
   
}


// slipfall Accident
add_shortcode('slipfall_sliderz', 'slipfall_sliderz_func');
function slipfall_sliderz_func()
{
    ob_start();
    ?>
    <div class="flight-wrap">
  <div class="container">
    
    <ul class="owl-carousel">
        <?php 

        //$postIdArray = array(9070, 9020, 8294, 9027, 8291, 8378, 8303, 8299, 8361);

        $args = array( 'post_type' => 'page',
            'meta_key' => 'faqs_categorypg',
                'meta_value' => 'slipfall',
           // 'post__in' => ((!isset($postIdArray) || empty($postIdArray)) ? array(-1) : $postIdArray),
         'posts_per_page' => 6,
          'order' => 'DESC');
    $the_query = new WP_Query( $args ); 
    if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li class="item">
        <div class="flight fl2">
          <div class="flightImg">
            <?php if(has_post_thumbnail()){ ?><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"> <?php }else{ ?> <img src="/wp-content/uploads/2021/05/elders.png"> <?php } ?>
            

          </div>
          <div class="path_box">
          <h5><a href="<?php the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h5>
          </div>
        </div>
      </li>
      <?php wp_reset_postdata(); endwhile; endif; ?>
      
    </ul>
  </div>
</div>

<?php 

        $slipfall_slider=ob_get_contents();
        ob_clean();
        return $slipfall_slider;
   
}

add_filter( 'wpseo_exclude_from_sitemap_by_post_ids', function () {
return array( 9840,608,9847,8187,8108,8159,8024,8142,8149,8192,8020,1783,8131,1811,2070,3584,66,966 );
} );

add_action('wp_footer', 'wpshout_action_example');
function wpshout_action_example()
{

    ?>
        <script type="text/javascript">
          WebFontConfig = {
            google: { families: [ 'Playfair+Display:400,500,600,700,800,900,400i,500i,600i,700i,800i,900i&display=swap' ] }
          };
          (function() {
            var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
          })(); 
        </script>
        <?php
}
add_shortcode( 'showcaseresults', 'wpdocs_bartag_func' );
function wpdocs_bartag_func( $atts ) {
   $html ='<div class="wrapper-for-case-results-cnt"><div class="wrapper-for-case-results">';
 // query the figures
$paged = ( int ) get_query_var( 'paged', 1 );
//print $paged;exit;
$showposts = 24;
$args = array(
    'post_type'         => 'case-result',
    'posts_per_page'    => $showposts,
    'meta_key'          => 'amount',
    'orderby'           => 'date',
    'order'             => 'ASC',
    'paged' => $paged
);

if(@$_GET['case-type-filter'] || @$_GET['location-filter']){
    
    $arraytocontaintaxonomyfilter =array();
    
    if(@$_GET['case-type-filter']){
    $arraytocontaintaxonomyfilter[] =   array(
            'taxonomy' => 'case_type',   // taxonomy name
            'field' => 'term_id',           // term_id, slug or name
            'terms' => $_GET['case-type-filter'],                  // term id, term slug or term name
        );
        
    }
    
    if(@$_GET['location-filter']){
        
    $arraytocontaintaxonomyfilter[] =   array(
            'taxonomy' => 'location',   // taxonomy name
            'field' => 'term_id',           // term_id, slug or name
            'terms' => $_GET['location-filter'],                  // term id, term slug or term name
        );  
        
    }
    
    $args['tax_query'] = $arraytocontaintaxonomyfilter;
}

if(@$_GET['case-result-search']){
    $args['s'] = $_GET['case-result-search'];

}


$the_query = new WP_Query($args);

$totalposts = ( $the_query->found_posts);
$total_pages = ceil( $totalposts / $showposts);

        
 if ( $the_query->have_posts() ) : 
 
  
     while ( $the_query->have_posts() ) : $the_query->the_post(); 
    
$value = get_field("amount");
$formatted_value = number_format($value);
$text_value = (string)$formatted_value;
    $link = get_field( "link" );
     $term_obj_list = get_the_terms( get_the_ID(), 'location' );
     
    if(isset($link)){
      $html .='<div class="wrapper-for-case-results-single">
      <div class="wrapper-for-case-results-single-amount">';
    if(isset($value)){
      $html .='<span class="sign" style="color: #004812 !important;">$</span><span class="text">'.$value.'</span>';
    }else{
         $html .='<span class="text conf">Confidential Settlement</span>';
    }
      $html .='</div>
      <div class="wrapper-for-case-results-single-type">
      <a href="'.$link.'">'.get_the_title().'</a>
      </div>
     <div class="wrapper-for-case-results-single-lcndatt">
      <div class="wrapper-for-case-results-single-lc">
      '.$term_obj_list[0]->name.'
      </div>
      <div class="wrapper-for-case-results-single-att">
      '.get_field( "attorney" ).'
      </div>
      <img src="https://www.foryourrights.com/wp-content/uploads/2021/09/bar-bottom.png"/>
      </div>
      </div>';
    } else{
          $html .='<div class="wrapper-for-case-results-single">
      <div class="wrapper-for-case-results-single-amount">';
    if(isset($value)){
      $html .='<span class="sign">$</span><span class="text">'.$value.'</span>';
    }else{
         $html .='<span class="text conf">Confidential Settlement</span>';
    }
      $html .='</div>
      <div class="wrapper-for-case-results-single-type">
      '.get_the_title().'
      </div>
     <div class="wrapper-for-case-results-single-lcndatt">
      <div class="wrapper-for-case-results-single-lc">
      '.$term_obj_list[0]->name.'
      </div>
      <div class="wrapper-for-case-results-single-att">
      '.get_field( "attorney" ).'
      </div>
      <img src="https://www.foryourrights.com/wp-content/uploads/2021/09/bar-bottom.png"/>
      </div>
      </div>';
    }
     endwhile; 
     
     $extraclass ='';
     
     if($paged < 2){
     $extraclass =' extraclassforzero ';     
        $paged  =1; 
     }
   
 
     wp_reset_postdata(); 
 
 else : 
 
 
    endif;
 $html .='</div>';
 $html.= '<div class="pagination-wrapper '.$extraclass.'">'.paginate($showposts, $paged, $totalposts, $total_pages, get_permalink(10661)).'</div></div>';
    return $html;
}
function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url)
{
    $pagination = '';
    
    // create custom search query and append to pagination
    $paginationquery ='';
    if(@$_GET['case-type-filter'] || @$_GET['location-filter']|| @$_GET['case-result-search']){
        
    $paginationquery ='?';  
    
    if(@$_GET['case-type-filter']){
    $paginationquery .= 'case-type-filter='.$_GET['case-type-filter'].'&';
        
    }
    
    if(@$_GET['location-filter']){
    $paginationquery .= 'location-filter='.$_GET['location-filter'].'&';
        
    }
    
    if(@$_GET['case-result-search']){
    $paginationquery .= 'case-result-search='.$_GET['case-result-search'];
        
    }
    }
    
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination-ul">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 1; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
            $previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="first"><a href="'.$page_url.'page/1'.$paginationquery.'" title="First">«</a></li>'; //first link
            $pagination .= '<li><a href="'.$page_url.'page/'.$previous_link.$paginationquery.'" title="Previous">Previous</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="'.$page_url.'page/'.$i.$paginationquery.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="'.$page_url.'page/'.$i.$paginationquery.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
                //$next_link = ($i > $total_pages)? $total_pages : $i;
                $next_link = ($next>=$total_pages)? $total_pages:$next;
                $pagination .= '<li><a href="'.$page_url.'page/'.$next_link.$paginationquery.'" >Next</a></li>'; //next link
                $pagination .= '<li class="last"><a href="'.$page_url.'page/'.$total_pages.$paginationquery.'" title="Last">»</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
}
add_shortcode( 'caseresultfilter', 'wpdocs_caseresultfilter_func' );
function wpdocs_caseresultfilter_func( $atts ) {
    // get all case types
    $case_types = get_terms([
    'taxonomy' => 'case_type',
    'hide_empty' => true,
    'orderby' => 'name',
            'order' => 'DESC'
]);
    
    // get all locations
    $locations = get_terms([
    'taxonomy' => 'location',
    'hide_empty' => true,
    'orderby' => 'name',
            'order' => 'DESC'
]);
    $html ='';
    $html .='<div class="case-results-filter">
    <div class="case-results-filter-inner">
    <form method="get">
    <div class="case-results-filter-case-type-wrapper">
    <select name="case-type-filter" id="case-type-filter">
    <option value="">All Case Types</option>';
    foreach($case_types as $case_type){
        if(@$_GET['case-type-filter']==$case_type->term_id){
            
    $html .='<option value="'.$case_type->term_id.'" selected="selected">'.$case_type->name.'</option>';            
        }else{
    $html .='<option value="'.$case_type->term_id.'">'.$case_type->name.'</option>';    
        }
    }
    $html .='</select>
    </div>
    <div class="case-results-filter-location-wrapper">
    <select name="location-filter" id="location-filter">
    <option value="">All Locations</option>';
        foreach($locations as $location){
            if(@$_GET['location-filter']==$location->term_id){
        $html .='<option value="'.$location->term_id.'"  selected="selected">'.$location->name.'</option>';             
                
            }else{
    $html .='<option value="'.$location->term_id.'">'.$location->name.'</option>';  
            }   
    }
    $html .='
    </select>
    </div>
    <div class="case-results-filter-search-wrapper">
    <input type="text" name="case-result-search" placeholder="Search" id="case-result-search" value="'.@$_GET['case-result-search'].'"/>
    <button type="submit"><img src="https://www.foryourrights.com/wp-content/uploads/2021/09/search.png"/></button>
    </div>
    </form>
    </div>
    </div>';
    
    return $html;
}

function removes_migrate_warning() {
    ?>
    <style type="text/css">
        li#wp-admin-bar-enable-jquery-migrate-helper, .jquery-migrate-dashboard-notice {display: none !important;}
    </style>
    <?php
}
add_filter('admin_footer','removes_migrate_warning',99);

// Stop admin email being sent.
add_filter('jqmh_email_message','_return_null');

//call 3 caseresult
// Enqueue Slick slider styles and scripts
function enqueue_slick_slider() {
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery'), '1.6.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_slider');

// Shortcode function
add_shortcode('getcaseresults', 'caseresult_callbkfunc');
function caseresult_callbkfunc($atts) {
    $showpost = 20;
    $casetype = '';
    $postsPerSlide = 3; // Set the number of posts per slide

    if (!empty($atts['showpost'])) {
        $showpost = $atts['showpost'];
    }
    if (!empty($atts['casetype'])) {
        $casetype = $atts['casetype'];
    }

    $args = array(
        'post_type'         => 'case-result',
        'posts_per_page'    => $showpost,
        'meta_key'          => 'amount',
        'orderby'           => 'meta_value_num',
        'order'             => 'ASC',
    );

    if ($casetype) {
        $taxonmycasetype = array();
        $taxonmycasetype[] = array(
            'taxonomy' => 'case_type',
            'field'    => 'slug',
            'terms'    => $casetype,
        );
        $args['tax_query'] = $taxonmycasetype;
    }

    $the_query = new WP_Query($args);
    $totalposts = $the_query->found_posts;
    $classs = ($totalposts == 3 ? 'twocasereslts' : '');
    $html = '<div id="getresultboxs" class="' . $classs . '"><div class="wrapper-for-case-results-cnt"><div class="wrapper-for-case-results casestudy-carousel case-link slick-slider">';

    if ($the_query->have_posts()) {
        $postCount = 0;

        while ($the_query->have_posts()) {
            $the_query->the_post();

            // Group multiple posts within a single slide
            if ($postCount % $postsPerSlide === 0) {
                $html .= '<div class="slick-slide">';
            }

            $value = get_field("amount");
            $link = get_permalink(10661);
            $term_obj_list = get_the_terms(get_the_ID(), 'location');

            $html .= '<div class="wrapper-for-case-results-single esiequbox">
                <div class="wrapper-for-case-results-single-amount">';
            if (isset($value)) {
                $html .= '<span class="sign">$</span><span class="text">' . $value . '</span>';
            } else {
                $html .= '<span class="text conf">Confidential Settlement</span>';
            }
            $html .= '</div>
                <div class="wrapper-for-case-results-single-type">';
            if (isset($link)) {
                $html .= '<a href="' . $link . '">' . get_the_title() . '</a>';
            } else {
                $html .= get_the_title();
            }
            $html .= '</div>
                <div class="wrapper-for-case-results-single-lcndatt">
                <div class="wrapper-for-case-results-single-lc">
                ' . $term_obj_list[0]->name . '
                </div>
                <div class="wrapper-for-case-results-single-att">
                ' . get_field("attorney") . '
                </div>
                <img src="https://www.foryourrights.com/wp-content/uploads/2021/09/bar-bottom.png"/>
                </div>
                </div>';

            // Close the slide div when the desired number of posts is reached
            if ($postCount % $postsPerSlide === $postsPerSlide - 1 || $postCount === $totalposts - 1) {
                $html .= '</div>';
            }

            $postCount++;
        }

        wp_reset_postdata();
    }

    $html .= '</div></div></div>';
$html .= "<script>
    jQuery(document).ready(function($) {
        $('#getresultboxs .slick-slider').slick({
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            centerMode: true,
            variableWidth: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1, // Show 1 post per slide on mobile
                        slidesToScroll: 1
                    }
                }
                // You can add more responsive breakpoints if needed
            ]
        });
    });
</script>";


    return $html;
}



// add_filter( 'gform_pre_send_email', 'check_before_email' );
// function check_before_email(  $email ) {
//     $subjt ='';
//     $subjt =$email['subject'];
//     if($subjt == 'WEBSITE LEAD: Free Case Evaluation Form'){
//     $msg = $email['message'];
//     if ($msg)
//         {
//             $field_value = $msg;
//             $pattern = '(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})';
            
//             if (preg_match_all($pattern, $field_value))
//             {
//                  $email['abort_email'] = true;
//                  return $email;
//             }           
//         }  
//     }            
//  }
 add_filter( 'gform_confirmation_7', 'custom_confirmation', 10, 4 );
function custom_confirmation( $confirmation, $form, $entry, $ajax ) {
    $get_gdata[]='';
    $get_gdata = rgar( $entry, '2' ).' '.rgar( $entry, '3' ).' '.rgar( $entry, '5' ).' '.rgar( $entry, '9' );
    $field_value = $get_gdata;
    $pattern = '(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})';
    
    if (preg_match_all($pattern, $field_value))
    {
        $redirectURL="/thank-you-two/";
        $confirmation = array( 'redirect' => $redirectURL );
                
    }
    return $confirmation;
}

add_shortcode('whelr_video', 'whelr_video_func');
function whelr_video_func()
{
    if (wp_is_mobile()) {
         $car = '<video controls="controls" width="560" height="315" poster="https://www.foryourrights.com/wp-content/uploads/2021/11/postr.png">
<source src="https://www.foryourrights.com/wp-content/uploads/2021/11/onewheeler.mp4" type="video/mp4">
</video>';
        return $car;
    } else {
        $car = '<video controls="controls" width="560" height="315">
<source src="https://www.foryourrights.com/wp-content/uploads/2021/11/onewheeler.mp4" type="video/mp4">
<source src="https://www.foryourrights.com/wp-content/uploads/2021/11/onewheeler.mp4" type="video/ogg">
</video>';
        return $car;
    }
}

add_shortcode('testimonial_reviews', 'ly_testimonial_reviews');
function ly_testimonial_reviews()
{
    
    $output1 = "";
    $output1 .= '<div class="nz-testimonial-carousel">';

        if (have_rows('review_testimonials')) :
                    while (have_rows('review_testimonials')) :
                      the_row(); 


                $output1 .= '<div class="testimonial-wrapper">';
  
                $output1 .= '<div class="reviewstars"></div>';
                $output1 .= '<div class="reviewDesc1">'.get_sub_field('rcontent').'</div>';
                $output1 .= '<div class="reviewDesc1">- '.get_sub_field('title').'</div>';
                $output1 .= '</div>';
            endwhile;
             wp_reset_postdata();
            else :
              $output1 .= '<p>Sorry, there are no reviews to display.</p>';
        endif;
         
          $output1 .= '</div>';
          return $output1;
}

add_filter('gform_pre_render', 'set_gf_title');
function set_gf_title($form)
{
    if ($form['id'] == 20) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 21) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 22) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 23) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 24) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 25) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 26) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 27) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 28) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 29) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 30) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 31) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 32) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 33) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 34) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 35) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 36) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 37) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 38) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 39) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 40) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 41) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 42) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 43) {
        $form['title'] = "Get In Touch";
        return $form;
    }
     if ($form['id'] == 44) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 45) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 46) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 47) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 48) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 49) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 50) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 51) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    if ($form['id'] == 52) {
        $form['title'] = "Get In Touch";
        return $form;
    }
    return $form;
}


function dfi_no_page_post( $dfi_id, $post_id ) {
    $post = get_post( $post_id );
    if ( in_array($post->post_type, array('page', 'case-result', 'reviews',)) ) {
        return 0; // Don't use DFI for this post or pages
    }

    return $dfi_id; // the original featured image id
}

add_filter( 'dfi_thumbnail_id', 'dfi_no_page_post', 10, 2 );

function enqueue_load_fa() {
  wp_enqueue_style( 'load-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa');


add_action( 'init', 'create_posttype_news' );
function create_posttype_news() {
  register_post_type( 'news',
    array(
      'labels' => array(
        'name' => __( 'News' ),
        'singular_name' => __( 'news' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'lytal-news','with_front' => false),
      'supports' => array('title', 'editor', 'custom-fields', 'revisions', 'thumbnail'),
    )
  );
}


add_shortcode( 'thenews', 'thenews_func' );
function thenews_func( $atts ) {
    
    $html_news ='';
    $html_news .='<div data-autoplay="" data-interval="5" data-animation="fade" data-show_slide_delay="90" class="avia-content-slider avia-content-grid-active avia-content-slider1 avia-content-slider-odd  avia-builder-el-4  el_after_av_hr  avia-builder-el-last   " itemscope="itemscope" itemtype="https://schema.org/Blog" data-uw-styling-context="true">
  <div class="avia-content-slider-inner" data-uw-styling-context="true">
    <div class="slide-entry-wrap" data-uw-styling-context="true">';
 
            $args = array( 'post_type' => 'news', 'posts_per_page' => -1 );
            $the_query = new WP_Query( $args ); 
            ?>
            <?php if ( $the_query->have_posts() ) : ?>
            <?php $v=1; while ( $the_query->have_posts() ) : $the_query->the_post();

            $mydate = get_the_date('F jS, Y'); 

$html_news .='<article class="myyclass'.$v.' slide-entry flex_column  post-entry slide-entry-overview slide-loop-1 slide-parity-odd  av_one_third real-thumbnail" itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost" data-uw-styling-context="true">';

$html_news .='<a href="'.get_the_permalink().'" data-rel="slide-1" class="tt slide-image" title="" data-uw-styling-context="true">
          <img width="495" height="400" src="'.get_the_post_thumbnail_url().'" data-lazy-type="image" class="attachment-portfolio size-portfolio wp-post-image lazy-loaded"  data-srcset="" sizes="(max-width: 495px) 100vw, 495px" data-uw-styling-context="true">
        </a>';

$html_news .='<div class="slide-content test-pop" data-uw-styling-context="true"><span class="pub" data-uw-styling-context="true">'.$mydate.'</span><header class="entry-content-header" data-uw-styling-context="true"><span class="blog-categories minor-meta" data-uw-styling-context="true"></span><h3 class="slide-entry-title entry-title" itemprop="headline" data-uw-styling-context="true"><a href="'.get_the_permalink().'" data-uw-styling-context="true">'.get_the_title().'</a></h3><span class="av-vertical-delimiter" data-uw-styling-context="true"></span></header><div class="slide-entry-excerpt entry-content" itemprop="text" data-uw-styling-context="true">'.get_the_excerpt().'<div class="read-more-link" data-uw-styling-context="true"><a href="'.get_the_permalink().'" class="more-link" data-uw-styling-context="true">Read more<span class="more-link-arrow" data-uw-styling-context="true"></span></a></div></div></div>';
$html_news .='</article>';

$v++;
    wp_reset_postdata();
    endwhile; endif;


$html_news .='</div>
  </div>
</div>';


    return $html_news;
}



add_action( 'wp_ajax_demo-pagination-load-posts', 'dcs_demo_pagination_load_posts' );
add_action( 'wp_ajax_nopriv_demo-pagination-load-posts', 'dcs_demo_pagination_load_posts' ); 
function dcs_demo_pagination_load_posts() {
    global $wpdb;
    // Set default variables
    $msg = '';
    if(isset($_POST['page'])){
        // Sanitize the received page   
        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        $per_page = 8; //set the per page limit
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;
        $all_blog_posts = new WP_Query(
            array(
                'post_type'         => 'news',
                'post_status '      => 'publish',
//              'post__not_in' => array( 13765,13691,13694,13771), 
                'meta_key'          => 'where_to_display_the_post',
                'meta_value'    => 'right',
                'orderby'           => 'post_date',
                'order'             => 'DESC',
                'posts_per_page'    => $per_page,
                 'offset'            => $start
               
            )
        );
 
        $count = new WP_Query(
            array(
                'post_type'         => 'news',
                'post_status '      => 'publish',
                'meta_key'          => 'where_to_display_the_post',
                'meta_value'    => 'right',
//               'post__not_in' => array( 13765,13691,13694,13771), 
                'posts_per_page'    => -1
            )
        );
        $count = $count->post_count;
        if ( $all_blog_posts->have_posts() ) {
             $loop1 = 1;
 while ( $all_blog_posts->have_posts() ) {
   
 $all_blog_posts->the_post(); ?>
<div class = "flex_column av_one_half loop<?php echo $loop1; ?>  flex_column_div av-zero-column-padding   avia-builder-el-6  el_after_av_one_half  el_before_av_one_fourth ajax-news lytal-media">
<?php if(has_post_thumbnail()) {?>

          <div class="avia-image-container  av-styling-no-styling    avia-builder-el-15  el_before_av_textblock  avia-builder-el-first   avia-align-center img-contat-news" itemprop="image">
        <div class="avia-image-container-inner">
            <div class="avia-image-overlay-wrap">
                <a href="<?php the_permalink(); ?>" class="avia_image" target="_blank">
                    <img class="avia_image lazy-loaded" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <span class="image-overlay overlay-type-extern" style="left: -5px; top: 0px; overflow: hidden; display: block; height: 155.016px; width: 258.047px;"><span class="image-overlay-inside"></span></span></a></div></div></div>
<?php } ?>
<section class="av_textblock_section "><div class="avia_textblock  " itemprop="text"><p><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></p>
</div></section></div>

 <?php
 
 $loop1++; }
 }
        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);
        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }
        // Pagination Buttons logic     
        ?>
        <div class='pagination-wrapp'>
            <ul class="page-numms">
             <?php
         if ($first_btn && $cur_page > 1) { ?>
             <li p='1' class='page-numbers'><<</li>
         <?php
         } else if ($first_btn) { ?>
             <li p='1' class='inactive'><<</li>
         <?php
      }
         if ($previous_btn && $cur_page > 1) {
             $pre = $cur_page - 1; ?>
             <li p='<?php echo $pre; ?>' class='page-numbers'><</li>
         <?php
         } else if ($previous_btn) { ?>
             <li class='inactive'><</li>
         <?php
      }
         for ($i = $start_loop; $i <= $end_loop; $i++) {
             if ($cur_page == $i){ ?>
                 <li p='<?php echo $i; ?>' class = 'current-num' ><?php echo $i; ?></li>
             <?php
          }else{ ?>
                 <li p='<?php echo $i; ?>' class='page-numbers'><?php echo $i; ?></li>
                 <?php
             }
         }
         if ($next_btn && $cur_page < $no_of_paginations) {
             $nex = $cur_page + 1; ?>
             <li p='<?php echo $nex; ?>' class='page-numbers'>></li>
         <?php
      } else if ($next_btn) { ?>
             <li class='inactive'>></li>
         <?php 
      }
 
         if ($last_btn && $cur_page < $no_of_paginations) { ?>
             <li p='<?php echo $no_of_paginations; ?>' class='page-numbers'>>></li>
         <?php 
      } else if ($last_btn) { ?>
             <li p='<?php echo $no_of_paginations; ?>' class='inactive'>>></li>
         <?php 
      } ?>
            </ul>
        </div>
        <?php
    }
    exit();
}

add_shortcode('show-lytal-news','show_news');
function show_news(){
     ob_start();
 ?>
      <div class = "loop-contentt">
             
                 <div class="loop-cont-inner"></div>
       
         </div>
   
 <script type="text/javascript">
jQuery(document).ready(function($){
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    function dcs_load_all_posts(page){
        $(".loop-contentt").fadeIn().css('background','#eee');
        var data = {
            page: page,
            action: "demo-pagination-load-posts"
        };
        $.post(ajaxurl, data, function(response) {
            $(".loop-cont-inner").html('').append(response);
            $(".loop-contentt").css({'background':'none', 'transition':'all 1s ease-out'});
        });
    }
    dcs_load_all_posts(1);
    $('.loop-cont-inner .pagination-wrapp li.page-numbers').live('click',function(){
        var page = $(this).attr('p');
        dcs_load_all_posts(page);
    });
}); 
</script>
 <?php
     return ob_get_clean();
}



add_action( 'wp_ajax_demo-pagination-load-postss', 'show_post_fun' );
add_action( 'wp_ajax_nopriv_demo-pagination-load-postss', 'show_post_fun' ); 
function show_post_fun() {
    global $wpdb;
    // Set default variables
    $msgg = '';
    if(isset($_POST['page'])){
        // Sanitize the received page   
        $pagee = sanitize_text_field($_POST['page']);
        $cur_pagee = $pagee;
        $pagee -= 1;
        $per_pagee = 8; //set the per page limit
        $previous_btnn = true;
        $next_btnn = true;
        $first_btnn = true;
        $last_btnn = true;
        $startt = $pagee * $per_pagee;
        $all_blog_postss = new WP_Query(
            array(
                'post_type'         => 'lytal_in_news',
                'post_status '      => 'publish',
                'orderby'           => 'post_date',
                'order'             => 'DESC',
                'posts_per_page'    => $per_pagee,
                'offset'            => $startt
            )
        );
 
        $countt = new WP_Query(
            array(
                'post_type'         => 'lytal_in_news',
                'post_status '      => 'publish',
                'posts_per_page'    => -1
            )
        );
        $countt = $countt->post_count;
        if ( $all_blog_postss->have_posts() ) {
 while ( $all_blog_postss->have_posts() ) {
 $all_blog_postss->the_post(); ?>
 <div class = "flex_column av_one_half  flex_column_div av-zero-column-padding   avia-builder-el-6  el_after_av_one_half  el_before_av_one_fourth  lytal-media">
 <?php if(has_post_thumbnail()) { ?>
          <div class="avia-image-container  av-styling-no-styling    avia-builder-el-15  el_before_av_textblock  avia-builder-el-first   avia-align-center " itemprop="image" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
        <div class="avia-image-container-inner">
            <div class="avia-image-overlay-wrap">
                <a href="<?php the_permalink(); ?>" class="avia_image" target="_blank">
                    <img class="avia_image lazy-loaded" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <span class="image-overlay overlay-type-extern" style="left: -5px; top: 0px; overflow: hidden; display: block; height: 155.016px; width: 258.047px;"><span class="image-overlay-inside"></span></span></a></div></div></div>
<?php } ?>
<section class="av_textblock_section "><div class="avia_textblock  " itemprop="text"><p><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></p>
</div></section></div>
 <?php
 }
 }
        // This is where the magic happens
        $no_of_paginationss = ceil($countt / $per_pagee);
        if ($cur_pagee >= 7) {
            $start_loopp = $cur_pagee - 3;
            if ($no_of_paginationss > $cur_pagee + 3)
                $end_loopp = $cur_pagee + 3;
            else if ($cur_pagee <= $no_of_paginationss && $cur_pagee > $no_of_paginationss - 6) {
                $start_loopp = $no_of_paginationss - 6;
                $end_loopp = $no_of_paginationss;
            } else {
                $end_loopp = $no_of_paginationss;
            }
        } else {
            $start_loopp = 1;
            if ($no_of_paginationss > 7)
                $end_loopp = 7;
            else
                $end_loopp = $no_of_paginationss;
        }
        // Pagination Buttons logic     
        //echo $no_of_paginationss;
        if($no_of_paginationss != 1){
        ?>
        <div class='paginationnn'>
            <ul class="page-numms">
             <?php
         if ($first_btnn && $cur_pagee > 1) { ?>
             <li p='1' class='page-numberss'><<</li>
         <?php
         } else if ($first_btnn) { ?>
             <li p='1' class='inactive'><<</li>
         <?php
      }
         if ($previous_btnn && $cur_pagee > 1) {
             $pree = $cur_pagee - 1; ?>
             <li p='<?php echo $pree; ?>' class='page-numberss'><</li>
         <?php
         } else if ($previous_btnn) { ?>
             <li class='inactive'><</li>
         <?php
      }
         for ($ti = $start_loopp; $ti <= $end_loopp; $ti++) {
             if ($cur_pagee == $ti){ ?>
                 <li p='<?php echo $ti; ?>' class = 'current' ><?php echo $ti; ?></li>
             <?php
          }else{ ?>
                 <li p='<?php echo $ti; ?>' class='page-numberss'><?php echo $ti; ?></li>
                 <?php
             }
         }
         if ($next_btnn && $cur_pagee < $no_of_paginationss) {
             $nexx = $cur_pagee + 1; ?>
             <li p='<?php echo $nexx; ?>' class='page-numberss'>></li>
         <?php
      } else if ($next_btnn) { ?>
             <li class='inactive'>></li>
         <?php 
      }
 
         if ($last_btnn && $cur_pagee < $no_of_paginationss) { ?>
             <li p='<?php echo $no_of_paginationss; ?>' class='page-numberss'>>></li>
         <?php 
      } else if ($last_btnn) { ?>
             <li p='<?php echo $no_of_paginationss; ?>' class='inactive'>>></li>
         <?php 
      } ?>
            </ul>
        </div>
        <?php
    }
    }
    exit();
}

add_shortcode('media-postss','show_post');
function show_post(){
  ob_start(); ?>
 
      <div class = "loop-cntentt">
             
                 <div class="loop-cnt-inner"></div>
       
         </div>
   
 <script type="text/javascript">
jQuery(document).ready(function($){
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    function dcs_load_all_postss(page){
        $(".loop-cntentt").fadeIn().css('background','#ccc');
        var dataa = {
            page: page,
            action: "demo-pagination-load-postss"
        };
        $.post(ajaxurl, dataa, function(response) {
            $(".loop-cnt-inner").html('').append(response);
            $(".loop-cntentt").css({'background':'none', 'transition':'all 1s ease-out'});
        });
    }
    dcs_load_all_postss(1);
    $('.loop-cnt-inner .paginationnn li.page-numberss').live('click',function(){
        var pagee = $(this).attr('p');
        dcs_load_all_postss(pagee);
    });
}); 
</script>
 <?php
     return ob_get_clean();
}



add_action( 'wp_ajax_demo-pagination-load-posts1', 'dcs_demo_pagination_load_posts1' );
add_action( 'wp_ajax_nopriv_demo-pagination-load-posts1', 'dcs_demo_pagination_load_posts1' ); 
function dcs_demo_pagination_load_posts1() {
    global $wpdb;
    // Set default variables
    $msg = '';
    if(isset($_POST['page'])){
        // Sanitize the received page   
        $page = sanitize_text_field($_POST['page']);
        $cur_page1 = $page;
        $page -= 1;
        $per_page1 = 9; //set the per page limit
        $previous_btn = true;
        $next_btn = true;
        $first_btn1 = true;
        $last_btn1 = true;
        $start1 = $page * $per_page1;
        $all_blog_posts1 = new WP_Query(
            array(
                'post_type'         => 'news',
                'post_status '      => 'publish',
                'meta_key'          => 'where_to_display_the_post',
                'meta_value'    => 'left',
                'orderby'           => 'post_date',
                'order'             => 'DESC',
                'posts_per_page'    => $per_page1,
                'offset'            => $start1
            )
        );
 
        $count1 = new WP_Query(
            array(
                'post_type'         => 'news',
                'post_status '      => 'publish',
                'meta_key'          => 'where_to_display_the_post',
                'meta_value'    => 'left',
//                 'post__in'          => array( 13694,13691,13765,13771 ),
                'posts_per_page'    => -1
            )
        );
        $count1 = $count1->post_count1;
        if ( $all_blog_posts1->have_posts() ) {
 while ( $all_blog_posts1->have_posts() ) {
 $all_blog_posts1->the_post(); ?>
<div class = "flex_column av_one_half  flex_column_div av-zero-column-padding   avia-builder-el-6  el_after_av_one_half  el_before_av_one_fourth ajax-news lytal-media">
<?php if(has_post_thumbnail()) {?>

          <div class="avia-image-container  av-styling-no-styling    avia-builder-el-15  el_before_av_textblock  avia-builder-el-first   avia-align-center img-contat-news" itemprop="image">
        <div class="avia-image-container-inner">
            <div class="avia-image-overlay-wrap">
                <a href="<?php the_permalink(); ?>" class="avia_image" target="_blank">
                    <img class="avia_image lazy-loaded" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <span class="image-overlay overlay-type-extern" style="left: -5px; top: 0px; overflow: hidden; display: block; height: 155.016px; width: 258.047px;"><span class="image-overlay-inside"></span></span></a></div></div></div>
<?php } ?>
<section class="av_textblock_section "><div class="avia_textblock  " itemprop="text"><p><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></p>
</div></section></div>

 <?php
 }
 }
        // This is where the magic happens
        $no_of_paginations1 = ceil($count1 / $per_page1);
        if ($cur_page1 >= 7) {
            $start1_loop = $cur_page1 - 3;
            if ($no_of_paginations1 > $cur_page1 + 3)
                $end_loop1 = $cur_page1 + 3;
            else if ($cur_page1 <= $no_of_paginations1 && $cur_page1 > $no_of_paginations1 - 6) {
                $start1_loop = $no_of_paginations1 - 6;
                $end_loop1 = $no_of_paginations1;
            } else {
                $end_loop1 = $no_of_paginations1;
            }
        } else {
            $start1_loop = 1;
            if ($no_of_paginations1 > 7)
                $end_loop1 = 7;
            else
                $end_loop1 = $no_of_paginations1;
        }
        // Pagination Buttons logic     
        ?>
        <div class='pagination-wrapp'>
            <ul class="page-numms nms">
             <?php
         if ($first_btn1 && $cur_page1 > 1) { ?>
             <li p='1' class='page-numbers'><<</li>
         <?php
         } else if ($first_btn1) { ?>
             <li p='1' class='inactive'><<</li>
         <?php
      }
         if ($previous_btn && $cur_page1 > 1) {
             $pre = $cur_page1 - 1; ?>
             <li p='<?php echo $pre; ?>' class='page-numbers'><</li>
         <?php
         } else if ($previous_btn) { ?>
             <li class='inactive'><</li>
         <?php
      }
         for ($i = $start1_loop; $i <= $end_loop1; $i++) {
             if ($cur_page1 == $i){ ?>
                 <li p='<?php echo $i; ?>' class = 'current-num' ><?php echo $i; ?></li>
             <?php
          }else{ ?>
                 <li p='<?php echo $i; ?>' class='page-numbers'><?php echo $i; ?></li>
                 <?php
             }
         }
         if ($next_btn && $cur_page1 < $no_of_paginations1) {
             $nex = $cur_page1 + 1; ?>
             <li p='<?php echo $nex; ?>' class='page-numbers'>></li>
         <?php
      } else if ($next_btn) { ?>
             <li class='inactive'>></li>
         <?php 
      }
 
         if ($last_btn1 && $cur_page1 < $no_of_paginations1) { ?>
             <li p='<?php echo $no_of_paginations1; ?>' class='page-numbers'>>></li>
         <?php 
      } else if ($last_btn1) { ?>
             <li p='<?php echo $no_of_paginations1; ?>' class='inactive'>>></li>
         <?php 
      } ?>
            </ul>
        </div>
        <?php
    }
    exit();
}

add_shortcode('show-lytal-news1','show_news1');
function show_news1(){
     ob_start();
 ?>
      <div class = "loop-contentt">
             
                 <div class="loop-cont-inner1"></div>
       
         </div>
   
 <script type="text/javascript">
jQuery(document).ready(function($){
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    function dcs_load_all_posts(page){
        $(".loop-contentt").fadeIn().css('background','#eee');
        var data = {
            page: page,
            action: "demo-pagination-load-posts1"
        };
        $.post(ajaxurl, data, function(response) {
            $(".loop-cont-inner1").html('').append(response);
            $(".loop-contentt").css({'background':'none', 'transition':'all 1s ease-out'});
        });
    }
    dcs_load_all_posts(1);
    $('.loop-cont-inner1 .pagination-wrapp li.page-numbers').live('click',function(){
        var page = $(this).attr('p');
        dcs_load_all_posts(page);
    });
}); 
</script>
 <?php
     return ob_get_clean();
}



function new_video_slider()
{
    ob_start(); 
    if( have_rows('video_slider') ):

?>
<div class=" testimonial-main"> 
  <?php  while ( have_rows('video_slider') ) : the_row(); ?>
    <div class="testimonial-wrp">
          <div class="testimonial-wrp-inner">
            <div class="testimonial-left">
             <div class="content"><?php the_sub_field('text_field'); ?></div>
            
            </div>
            <div class="testimonial-right">
                <div class="testimonial-image">
                 <div class="testimonial-image-inner">
                    <?php the_sub_field('video_field'); ?>
                  </div>
              </div>
           
        
           </div>
        </div>
      </div>
      <?php endwhile; ?>
  </div>

<?php
   endif; 
    $output = ob_get_contents();

        ob_end_clean();
        return $output;
}


add_action( 'admin_init', 'disable_autosave' );
function disable_autosave() {
wp_deregister_script( 'autosave' );
}



function open_external_links_in_new_tab() {
    ?>
    <script>
        jQuery(document).ready(function($) {
            var links = $('a[href^="http"]:not([href*="' + window.location.hostname + '"]), a[href^="https"]:not([href*="' + window.location.hostname + '"])');

            links.attr("target", "_blank");
        });
    </script>
    <?php
}
add_action('wp_footer', 'open_external_links_in_new_tab');
add_filter( 'acf/admin/prevent_escaped_html_notice', '__return_true' );


function render_footer_map_html() {
	ob_start(); ?>
	<div class="google-map row">
	
	<iframe src="https://www.google.com/maps/d/embed?mid=18Kx4c8fq4QmxHtWkWAnW--3EwbNlAJo&ehbc=2E312F&noprof=1&z=7" width="270px" height="270"></iframe>
</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'footer_map_html', 'render_footer_map_html' );








