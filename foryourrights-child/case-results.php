<?php
/**
 * Template Name: Case Results
 *
 */
get_header('practice'); ?>
<style type="text/css">
	p#zbreadcrumbs {
    margin-top: 25px;
}
	span.text.conf {
    font-size: 24px;
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
.page-template-case-results .practise_area_container .banner-section-left-col p {
    margin: -20px 0px 0px 0px !important;
    font-size: 18px !important;
    font-family: 'poppinsregular' !important;
    color: #fff !important;    max-width: 512px;
}
#av_section_1 .template-page.content.av-content-full{
	    padding-bottom: 80px;
    padding-top: 60px;
}
.case-results-disclaimerndterms p{
	color: #888888;
    font-size: 18px;
    line-height: 1.6em;
	
}
.wrapper-for-case-results{    display: flex;
    flex-wrap: wrap;}
.wrapper-for-case-results .wrapper-for-case-results-single{
    width: calc(33.33% - 30px );
    margin-left: 15px;
    margin-right: 15px;
    border: 1px solid #ab8e2c !important;
    margin-bottom: 30px;
    padding: 25px;
    padding-top: 20px;
    padding-bottom: 50px;
    position: relative;
	}
.wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-amount{font-size: 48px;
    padding-bottom: 5px;
    line-height: 1.2em;}
.wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-amount .sign{font-family: 'poppinsregular' !important;font-size: 30px;
    color: #ab8e2c;}
.wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-amount .text{font-family: 'poppinsmedium';color: #004812;
    font-weight: 600;}
.wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-type{    color: #004812;
    font-size: 16px;
    font-weight: bold;
    padding-bottom: 10px;
    line-height: 1.2em;
    padding-left: 16.89px;font-family: 'poppinsmedium';}
.wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-lcndatt{    color: #ab8e2c;
    font-size: 16px;
    line-height: 1.2em;
    padding-left: 16.89px;font-family: 'poppinsregular' !important;}
.wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-lcndatt .wrapper-for-case-results-single-lc{}
.wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-lcndatt .wrapper-for-case-results-single-att{}
.wrapper-for-case-results .wrapper-for-case-results-single img{
	    position: absolute;
    left: 0;
    width: 100%;
    bottom: 0;
	
}

.wrapper-for-case-results-cnt .wrapper-for-case-results{
	    margin-left: -15px;
    margin-right: -15px;
}
.wrapper-for-case-results-cnt .pagination-wrapper{padding-top: 20px;}
.wrapper-for-case-results-cnt .pagination-wrapper .pagination-ul{margin: 0;
    display: inline;}
.wrapper-for-case-results-cnt .pagination-wrapper .pagination-ul li{    display: inline-block;
    margin: 0;
    margin-right: 10px;}
.wrapper-for-case-results-cnt .pagination-wrapper .pagination-ul li a{color: #ab8e2c;
    background: #fff;
    padding: 18px;
    /* height: 40px; */
    line-height: 1em;
    padding-top: 12px;
    padding-bottom: 12px;
    border: 1px solid #ab8e2c;}
.wrapper-for-case-results-cnt .pagination-wrapper .pagination-ul li.active{ border: 1px solid #ab8e2c;   background: #ab8e2c;
    color: #fff !important;
    padding: 18px;
    /* height: 40px; */
    line-height: 1em;
    padding-top: 12px;padding-bottom: 12px;}
.wrapper-for-case-results-cnt .pagination-wrapper .pagination-ul li a:hover{ border: 1px solid #ab8e2c;   background: #ab8e2c;
    color: #fff !important;
    padding: 18px;
    /* height: 40px; */
    line-height: 1em;
    padding-top: 12px;padding-bottom: 12px;text-decoration:none;}
#filterwrapper-case-results h4{
	color: #b7900b;
    font-size: 24px;
    font-family: 'poppinsregular' !important;
    padding-bottom: 10px;
}
#filterwrapper-case-results form{
	margin-bottom: 0;
    display: flex;
}
#filterwrapper-case-results .case-results-filter-case-type-wrapper{
	    margin-right: 15px;
}
#filterwrapper-case-results  select{
	background-color: #fff !important;
    border-radius: 0 !important;
    border: 1px solid #ccc !important;
    font-family: 'poppinsregular' !important;
    color: #42744f !important;
    font-size: 16px !important;
    padding: 10px !important;
    padding-left: 15px !important;
    background-image: url(https://www.foryourrights.com/wp-content/uploads/2021/09/arrow.jpg) !important;
    background-position: 96% center !important;
    line-height: 20px !important;
	padding-right: 25px !important;
}
#filterwrapper-case-results  .case-results-filter-location-wrapper{
	margin-right: 15px;
	
}
#filterwrapper-case-results  .case-results-filter-search-wrapper{
	width: 45%;
    position: relative;
}
#filterwrapper-case-results  .case-results-filter-search-wrapper #case-result-search{
	background-color: #fff;
    border-radius: 0;
    border: 1px solid #ccc;
    font-family: 'poppinsregular' !important;
    color: #42744f;
    font-size: 16px;
    padding: 10px;
    padding-left: 15px;
   padding-right: 32px;
    line-height: 20px;
}
#filterwrapper-case-results  .case-results-filter-search-wrapper  button{
	background: transparent;
    border: 0;
    position: absolute;
    top: 6px;
    right: 10px;
}
#after_section_2{
	border:0;
}
#filterwrapper-case-results .case-results-filter-search-wrapper button:focus{
	outline:none !important;
}

#filterwrapper-case-results ::-webkit-input-placeholder { /* Edge */
 color: #42744f;
}

#filterwrapper-case-results :-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: #42744f;
}

#filterwrapper-case-results ::placeholder {
  color: #42744f;
}
#filterwrapper-case-results .av_one_half:first-child{
    border-radius: 0px;
    width: 58%;
    padding-right: 40px;
    margin-right: 0 !important;	
	
}
#filterwrapper-case-results .av_one_half:last-child{
	border-radius: 0px;
    margin: 0;
    width: 42%;
    background: #fff;
    padding: 40px;
    box-sizing: border-box;
    padding-right: 60px;
    padding-top: 30px;
   
    box-shadow: 0px 0px 30px #0000004f;
    padding-left: 35px;
	    position: absolute;
    right: 0;
    /* border: 0; */
    bottom: 70px;
	
	background-image: url(https://www.foryourrights.com/wp-content/uploads/2021/09/featured-case-dots.jpg);
    background-repeat: no-repeat;
    background-position: left bottom;
    background-size: 52px;
}
#filterwrapper-case-results .av_one_half:last-child h5{
	
	    color: #888888;
    font-size: 18px;
    font-family: 'poppinsregular' !important;
    line-height: 1.2em;
    padding-bottom: 15px;
    margin-bottom: 0;
}
#filterwrapper-case-results .av_one_half:last-child h2{
	font-weight: bold;
    line-height: 1.2em;
	
}
#filterwrapper-case-results .av_one_half:last-child h2 .sign{
	color: #b7900b;
    font-size: 54px;
	
}
#filterwrapper-case-results .av_one_half:last-child h2 .number{
	    color: #004812;
    font-size: 84px;
    margin-right: 15px;
	
}
#filterwrapper-case-results .av_one_half:last-child h2 .text{
	color: #004812;
    font-size: 54px;
    text-transform: capitalize;
	
}
#filterwrapper-case-results{
	background: #ffffff url(https://www.foryourrights.com/wp-content/themes/foryourrights-child/images/about-sect-bg.png) repeat-x top !important;
    padding-bottom: 20px;
}
#after_section_2 .template-page.content.av-content-full{
	
	    padding-top: 10px;
}
#filterwrapper-case-results .av_one_half:last-child  .title{
	    color: #004812;
    font-size: 20px;
    font-weight: bold;
    padding-bottom: 10px;
    line-height: 1.2em;
    padding-left: 34px;
    font-family: 'poppinsmedium';
    padding-top: 15px;
	
}
#filterwrapper-case-results .av_one_half:last-child  .sub-title{
	color: #b7900b;
    font-family: 'poppinsregular' !important;
    line-height: 1.2;
    padding-left: 34px;
    padding-bottom: 20px;
    font-size: 16px;
}
#filterwrapper-case-results .av_one_half:last-child  .desc{
	color: #666666;
    font-family: 'poppinsregular' !important;
    font-size: 14px;
    line-height: 1.6;
    padding-left: 34px;
}
@media only screen and (max-width: 1120px) {
  .wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-amount .text{
	     font-size: 42px; 
  }
}
@media only screen and (max-width: 992px) {
.wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-amount .text {
    font-size: 46px;
}	
.wrapper-for-case-results .wrapper-for-case-results-single {
    width: calc(50% - 30px );
    margin-left: 15px;
margin-right: 15px;}
	#filterwrapper-case-results .av_one_half:last-child h2 .sign{
		    font-size: 34px;
	}
	#filterwrapper-case-results .av_one_half:last-child h2 .number{
		font-size: 64px;
	}
	#filterwrapper-case-results .av_one_half:last-child h2 .text{
		font-size: 34px;
	}
}
@media only screen and (max-width: 960px) {
	#filterwrapper-case-results .case-results-filter-search-wrapper{
		width: 100%;
	}
	#filterwrapper-case-results form{
		flex-wrap: wrap;
	}
	#filterwrapper-case-results .case-results-filter-case-type-wrapper{
		width: calc(50% - 10px );
    margin-right: 20px;
	}
	#filterwrapper-case-results .case-results-filter-location-wrapper{
		width: calc(50% - 10px );
    margin-right: 0;
	}
}
@media only screen and (max-width: 767px) {
	.wrapper-for-case-results .wrapper-for-case-results-single {
    width: calc(100% - 30px );
    margin-left: 15px;
    margin-right: 15px;
    padding-bottom: 80px;
}
#filterwrapper-case-results .av_one_half:first-child{
	order: 2;
    width: 100%;
    padding: 0;
    padding-top: 50px;
}
#filterwrapper-case-results .av_one_half:last-child{
	    order: 1;
    position: relative;
    bottom: auto;
}
#filterwrapper-case-results .entry-content-wrapper{
	display: flex;
    flex-wrap: wrap;
}
}
@media only screen and (max-width: 455px) {
	
	#filterwrapper-case-results .case-results-filter-case-type-wrapper {
    width: 100%;
    margin-right: 0;
}
#filterwrapper-case-results .case-results-filter-search-wrapper {
    width: 100%;
}
#filterwrapper-case-results .case-results-filter-location-wrapper{
	width: 100%;
}
#av_section_1{
	background-position: right !important;
}
}
@media only screen and (max-width: 380px) {
	.wrapper-for-case-results .wrapper-for-case-results-single .wrapper-for-case-results-single-amount .text {
    font-size: 38px;
}
#filterwrapper-case-results .av_one_half:last-child{
	    padding-right: 30px;
}
}
@media only screen and (max-width: 350px) {
#filterwrapper-case-results .av_one_half:last-child{
	border-radius: 0px;
    padding-left: 20px;
}
#filterwrapper-case-results .av_one_half:last-child{
	background-size: 38px;
}
.wrapper-for-case-results .wrapper-for-case-results-single{
	    padding: 15px;
    padding-bottom: 35px;
}
.wrapper-for-case-results-cnt .pagination-wrapper .pagination-ul li{
	margin-bottom: 10px;
}
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
<script>
jQuery(document).ready(function($) {
  $("#filterwrapper-case-results .av-content-full:first").before('<?php echo yoast_breadcrumb( '<p id="zbreadcrumbs">','</p>' ); ?>');
})
</script>
<?php
get_footer('practice');