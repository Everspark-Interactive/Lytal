<?php
/**
 * Template Name: practice-area
 *
 */
get_header('practice'); 

?>
<style type="text/css">
	.legal-claim-right-col .av-image-caption-overlay-center p {
        width: auto !important;
}
.page-template-practice-area #menu-item-11486.menu-item.dropdown_ul_available:after,.page-template-practice-area #menu-item-2276.menu-item.dropdown_ul_available:after,.page-template-practice-area #menu-item-23.menu-item.dropdown_ul_available:after{background-image: none;transform: none;}
	#av_section_2 .container span {
    margin-top: 10px !important;
    display: inline-block;
}
.path_box h5 a:hover {
     color: #000000 !important;
    text-decoration: underline !important;
}
.path_box h5 a {
    color: #004812 !important;
        font-size: 18px !important;
}
.owl-item li.item {
    margin-left: 0px !important;
}
.flight-wrap .owl-nav button {
    
    width: 40px !important;
    height: 40px !important;
    line-height: 40px !important;
}
.path_box {
    min-height: 150px;
    padding: 20px !important;
}
.nw-head h2 {
    font-style: normal;
    font-size: 48px !important;
    color: #ab8e2c !important;
    font-family: 'playfair display', 'HelveticaNeue', 'Helvetica Neue', 'Helvetica-Neue', Helvetica, Arial, sans-serif;
    text-transform: none !important;
    font-weight: 700 !important;
    letter-spacing: -1px !important;
}
.ext-padding {
    margin-top: -50px !important;
}
.owl-prev span .fa-arrow-left::before {
    font-size: 22px !important;
}
.owl-next span .fa-arrow-right::before {
    font-size: 22px !important;
}
.fl2 {
    background: #f7f7f7;
}
@media screen and (min-width: 768px) {
  .flightImg img {
    height: 160px;
    width: 100% !important;
}
	.phone-info .rightPhone {
		margin-right: 3em;}
}
</style>
<?php do_action( 'ava_page_template_after_header' );

 	 if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
 	 
 	 do_action( 'ava_after_main_title' );
	 ?>

		<div class='container_wrap practise_area_container zkpg container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			

				<main class='template-page zkpg  <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>

                    <?php
                    /* Run the loop to output the posts.
                    * If you want to overload this in a child theme then include a file
                    * called loop-page.php and that will be used instead.
                    */

                    $avia_config['size'] = avia_layout_class( 'main' , false) == 'fullsize' ? 'entry_without_sidebar' : 'entry_with_sidebar';
                    get_template_part( 'includes/loop', 'page' );
                    ?>

				<!--end content-->
				</main>

				<?php

				//get the sidebar
				$avia_config['currently_viewing'] = 'page';
				get_sidebar();

				?>

			

	
		</div><!-- close default .container_wrap element -->
<?php
get_footer('practice');