<?php
/**
 * Template Name: Review
 *
 */

get_header(); ?>
<div class="allReviews">
    <div class="container">
        <?php 
        $args = array( 
        'orderby' => 'date',
        'order' => 'DSC',
        'post_type' => 'reviews',
        'posts_per_page' => 100,
        );
        $the_query = new WP_Query( $args );
        ?>

        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
                    <div class="reviewLists">
                        <div class="reviewDate"><?php echo do_shortcode('[acf field="review_date"]'); ?></div>
                        <div class="reviewStar reviewStar<?php echo do_shortcode('[acf field="review_star"]'); ?>">5<?php /*echo do_shortcode('[acf field="review_star"]'); */ ?></div>
                        <div class="reviewDesc"><?php echo do_shortcode('[acf field="review_content"]'); ?></div>
                        <div class="reviewName"><?php echo do_shortcode('[acf field="review_name"]'); ?></div>
                    </div>
                    <?php endwhile; else: ?> 
                        <p>Sorry, there are no reviews to display.</p> 
                    <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>

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
                $this.parent().prev().toggle();
                $this.prev().toggle();
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
                $(".morecontent span").hide();
            }
        });
        
    };

 })(jQuery);

 jQuery(document).ready(function() {
    
    jQuery(".reviewDesc").shorten({
        "showChars" : 150,
    });

});

</script>

<?php get_footer();