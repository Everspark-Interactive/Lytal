<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<style>
  #gform_wrapper_7 ul li input::placeholder, #gform_wrapper_7 ul li textarea::placeholder { color: #fff; }
  #gform_wrapper_7 { margin-top: 0; background: #004812; color: #fff; }
  .gf_page_steps .gf_step { width: 20%; margin: 0; text-align: center; padding: 20px 0; margin-bottom: -1px; }
  .gform_wrapper .gf_page_steps { border-bottom: none; padding: 0 20px; background: #000; }
  .gform_wrapper .gf_step.gf_step_active { background: #004812; height: 100%; }
  section#ninth .bg_one .button_sec #gform_wrapper_7 ul li { display: block; }
  div.ginput_container_name span { display: block; width: 100% !important; }
  div.ginput_container_name span > input, #gform_wrapper_7 ul li input, #gform_wrapper_7 ul li textarea { background: transparent; border: none; border-bottom: 2px solid #fff; color: #fff; }
  input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="number"]:focus, textarea:focus { background-color: transparent; }
  #gform_wrapper_7 ul li input, #gform_wrapper_7 ul li textarea { font-size: 30px !important; height: 100px !important; font-family: 'Lato', sans-serif; font-weight: 400 !important; color: #fff !important; }
  .gform_wrapper div.validation_error { color: #fff; background-color: #790000; }
  .gform_wrapper .validation_message { color: #fff; background-color: #790000; padding: 16px 0; }
  .gform_wrapper .gform_page_footer { border: none; text-align: right; padding: 16px 0; margin: 0; }
</style>
<?php if(!is_page('25')){ ?>
</div>
<!-- .site-content -->
<?php } ?>

<footer id="colophon" class="site-footer" role="contentinfo"> 

  <!-- Form Code Start Here -->

    <!-- Form Code Start Here -->

    <?php if(!is_front_page()) { ?>

        <div class="vc_row wpb_row vc_row-fluid membership-row">

            <div class="wpb_column vc_column_container vc_col-sm-12">

                <div class="vc_column-inner ">

                    <div class="wpb_wrapper">

                        <div class="wpb_text_column wpb_content_element ">

                            <div class="wpb_wrapper">

                                <?php echo do_shortcode("[slide-anything id='391']");?>

                            </div>

                        </div>

                    </div>

               </div>

            </div>

        </div>

    <?php } ?>

    <section id="ninth"> 
    <!--============== Including  Social Link  Section ===================-->

        <div class="bg_one">

            <div class="container">

                <div class="row">

                    <div class="col-lg-10 compensation">

                        <div id="clickto_show" class="top_sec text-center">

                            <h2 class="heading">Free Case Evaluation</h2>

                            <p>5 Simple Steps To A Free Case Review</p>

                        </div>

                        <!--mobile form design==============================-->

                        <div class="mobile_footer">

                            <div class="blue_bg">

                                <p class="" style="text-align: center; padding-right: 70px;color: #ffffff;">All fields are required.</p>

                                <div class="col-lg-5">

                                    <div class="row">

                                        <form id="sidebar_form" name="sidebar_form" class="registerForm sidebar_form1 mobileform1" method="post">

                                            <div class="form-group">

                                                <input type="text" required="" onblur="if (this.value == '') {
                                                    this.value = 'Your name'
                                                }" onfocus="if (this.value == 'Your name') {
                                                    this.value = ''
                                                }" value="Your name" id="yname1" class="form-control text_box1" name="yname1">

                                            </div>

                                            <div class="form-group">

                                                <input type="text" required="" onblur="if (this.value == '') {
                                                    this.value = 'Your e-mail address'
                                                    }" onfocus="if (this.value == 'Your e-mail address') {
                                                    this.value = ''
                                                    }" value="Your e-mail address" id="emailid1" class="form-control text_box1" name="emailid1">

                                            </div>

                                            <div class="form-group">

                                                <input type="tel" required="" onblur="if (this.value == '') {
                                                    this.value = 'Your phone number'
                                                    }" onfocus="if (this.value == 'Your phone number') {
                                                    this.value = ''
                                                    }" value="Your phone number" id="phone1" class="form-control text_box1" name="phone1">

                                            </div>

                                            <div id="234567" class="form-group">

                                                <select id="select2" class="form-control text_box1" name="select2">
                                                    <option value="Select your state">Select your state</option>
                                                    <option value="Alabama">Alabama</option>
                                                    <option value="Alaska">Alaska</option>
                                                    <option value="Arizona">Arizona</option>
                                                    <option value="Arkansas">Arkansas</option>
                                                    <option value="California">California</option>
                                                    <option value="Colorado">Colorado</option>
                                                    <option value="Connecticut">Connecticut</option>
                                                    <option value="Delaware">Delaware</option>
                                                    <option value="Florida">Florida</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Idaho">Idaho</option>
                                                    <option value="Illinois">Illinois</option>
                                                    <option value="Indiana">Indiana</option>
                                                    <option value="Iowa">Iowa</option>
                                                    <option value="Kansas">Kansas</option>
                                                    <option value="Kentucky">Kentucky</option>
                                                    <option value="Louisiana">Louisiana</option>
                                                    <option value="Maine">Maine</option>
                                                    <option value="Maryland">Maryland</option>
                                                    <option value="Massachusetts">Massachusetts</option>
                                                    <option value="Michigan">Michigan</option>
                                                    <option value="Minnesota">Minnesota</option>
                                                    <option value="Mississippi">Mississippi</option>
                                                    <option value="Missouri">Missouri</option>
                                                    <option value="Montana">Montana</option>
                                                    <option value="Nebraska">Nebraska</option>
                                                    <option value="Nevada">Nevada</option>
                                                    <option value="New Hampshire">New Hampshire</option>
                                                    <option value="New Jersey">New Jersey</option>
                                                    <option value="New Mexico">New Mexico</option>
                                                    <option value="New York">New York</option>
                                                    <option value="North Carolina">North Carolina</option>
                                                    <option value="North Dakota">North Dakota</option>
                                                    <option value="Ohio">Ohio</option>
                                                    <option value="Oklahoma">Oklahoma</option>
                                                    <option value="Oregon">Oregon</option>
                                                    <option value="Pennsylvania">Pennsylvania</option>
                                                    <option value="Rhode Island">Rhode Island</option>
                                                    <option value="South Carolina">South Carolina</option>
                                                    <option value="South Dakota">South Dakota</option>
                                                    <option value="Tennessee">Tennessee</option>
                                                    <option value="Texas">Texas</option>
                                                    <option value="Utah">Utah</option>
                                                    <option value="Vermont">Vermont</option>
                                                    <option value="Virginia">Virginia</option>
                                                    <option value="Washington">Washington</option>
                                                    <option value="West Virginia">West Virginia</option>
                                                    <option value="Wisconsin">Wisconsin</option>
                                                    <option value="Wyoming">Wyoming</option>
                                                </select>

                                            </div>

                                            <div tab-item="four" class="form-group" id="input_box">

                                                <textarea onblur="if (this.value == '') {
                                                    this.value = 'Share your story'
                                                    }" onfocus="if (this.value == 'Share your story') {
                                                    this.value = ''
                                                    }" id="share_story1" class="form-control text_box" name="share_story1">Share your story</textarea>
                                            
                                            </div>

                                            <p style="display: none;" class="groupedformular">

                                                <label>Current year <span class="required">*</span></label>

                                                <input type="hidden" value="2016" class="groupedformular-a" name="groupedformular_a4" id="groupedformular_a4">

                                                <input type="text" value="groupedformular" class="groupedformular-q" name="groupedformular_q4" id="groupedformular_q4">

                                            </p>

                                            <p style="display: none;" class="groupedformular">

                                                <label>Leave this field empty</label>

                                                <input type="text" value="" class="groupedformular-e" name="groupedformular_website4" id="groupedformular_website4">

                                            </p>

                                            <button class="side_btn" id="sidebar_btn_one" name="sidebar_btn4">Get my free case evaluation</button>

                                            <p class="bottom_text">Guaranteed response in 24 hours</p>

                                        </form>

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                            </div>

                            <!--blue part close========--> 

                        </div>

                        <div class="button_sec">
                            
                            <?php echo do_shortcode('[gravityform id="7" title="false" description="false" ajax="true"]'); ?>

                        </div>

                        <!-- <div class="button_sec">

                            <ul class="case">
                                <li class="name active">Name</li>
                                <li class="phone" tab-item="one">Phone</li>
                                <li class="email" tab-item="two">Email</li>
                                <li class="state" tab-item="three">State</li>
                                <li class="desc" tab-item="four">Case Description</li>
                            </ul>

                        </div>

                        <div class="bottom_sec">

                            <p class="" style="text-align: right;padding-right: 70px;color: #ffffff;">All fields are required.</p>

                            <div class="row">

                                <div class="col-lg-9 form_one">

                                    <div class="row">

                                        <form class="registerForm" method="post" action="<?php echo home_url();?>/thank-you/">

                                            <div tab-item="one" class="form-group one name_text" id="input_box">

                                                <input type="text"  required="" onblur="if (this.value == '') {
                                                    this.value = 'Enter your first name ...'
                                                    }" onfocus="if (this.value == 'Enter your first name ...') {
                                                    this.value = ''
                                                    }" value="Enter your first name ..." id="txtname" class="form-control text_box" name="txtname">

                                                <input type="text" required="" onblur="if (this.value == '') {
                                                    this.value = 'Enter your last name ...'
                                                    }" onfocus="if (this.value == 'Enter your last name ...') {
                                                    this.value = ''
                                                    }" value="Enter your last name ..." id="txtlname" class="form-control text_box" name="txtlname">

                                                <a class="btns click1" href="javascript:void(0);"></a>

                                            </div>

                                            <div tab-item="two" class="form-group one phone_text" id="input_box" style="display: none;">

                                                <input type="text"  required="" onblur="if (this.value == '') {
                                                    this.value = 'Enter your phone ...'
                                                    }" onfocus="if (this.value == 'Enter your phone ...') {
                                                    this.value = ''
                                                    }" value="Enter your phone ..." id="txtphone" class="form-control text_box" name="textphone">

                                                <a class="btns click2" href="javascript:void(0);"></a>

                                            </div>

                                            <div tab-item="three" class="form-group email_text" id="input_box">

                                                <input type="text"  required="" onblur="if (this.value == '') {
                                                    this.value = 'Enter your Email ...'
                                                    }" onfocus="if (this.value == 'Enter your Email ...') {
                                                    this.value = ''
                                                    }" value="Enter your Email ..." id="txtemail" class="form-control text_box" name="txtemail">

                                                <a class="btns click3" href="javascript:void(0);"></a> </div>

                                            <div tab-item="four" class="form-group state_text" id="input_box">

                                                <input type="text"  required="" onblur="if (this.value == '') {
                                                    this.value = 'Enter your State ...'
                                                    }" onfocus="if (this.value == 'Enter your State ...') {
                                                    this.value = ''
                                                    }" value="Enter your State ..." id="txtstate" class="form-control text_box" name="txtstate">

                                                <a class="btns click4" name="next" href="javascript:void(0);"></a> </div>

                                            <div tab-item="five" class="form-group desc_text" id="input_box">

                                                <textarea rows="5"  cols="50" onblur="if (this.value == '') {
                                                    this.value = 'Enter your Description ...'
                                                    }" onfocus="if (this.value == 'Enter your Description ...') {
                                                    this.value = ''
                                                    }" id="textcase_desc" class="form-control text_box" name="textcase_desc">
                                                    Enter your Description ...
                                                </textarea>

                                                <p style="display: none;" class="groupedformular">

                                                    <label>Current year <span class="required">*</span></label>

                                                    <input type="hidden" value="2016" class="groupedformular-a" name="groupedformular_a2" id="groupedformular_a2">

                                                    <input type="text" value="groupedformular" class="groupedformular-q" name="groupedformular_q2" id="groupedformular_q2">

                                                </p>

                                                <p style="display: none;" class="groupedformular">

                                                    <label>Leave this field empty</label>

                                                    <input type="text" value="" class="groupedformular-e" name="groupedformular_website2" id="groupedformular_website2">

                                                </p>

                                                <button id="submit" name="next" value="next"></button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div> --> <!--bottom section close--> 

                    </div>

                </div>

            </div> <!--container close--> 

        </div> <!--bg_one section close-->



    <div class="bg_two">



      <div class="container">



        <div class="row bottom_border bottom_padding">



          <?php



if(is_active_sidebar('sidebar-2')){



dynamic_sidebar('sidebar-2');



}



?>



        </div>



        <div class="row top_padding">



          <?php



if(is_active_sidebar('sidebar-3')){



dynamic_sidebar('sidebar-3');



}



?>



        </div>



        <div class="footer-bottom">



          <?php



if(is_active_sidebar('sidebar-4')){



dynamic_sidebar('sidebar-4');



}



?>



<div class="footer-bottom-text"> <?php



if(is_active_sidebar('sidebar-5')){



dynamic_sidebar('sidebar-5');



}



?></div>



        </div>



      </div>



    </div>



  </section>



  



  <!-- Form Section End Here -->



  <?php if ( has_nav_menu( 'primary' ) ) : ?>



  <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">



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



  <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">



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



  <div class="site-info">



    <?php



          /**



           * Fires before the twentysixteen footer text for footer customization.



           *



           * @since Twenty Sixteen 1.0



           */



          do_action( 'twentysixteen_credits' );



        ?>



  </div>



  <!-- .site-info --> 



</footer>



<!-- .site-footer -->



</div>



<!-- .site-inner -->



</div>



<!-- .site -->





<!-- Start Of NGage --><!-- foryourrights.com -->

<div id="nGageLH" style="visibility:hidden;"></div>

<script type="text/javascript" src="https://messenger.ngageics.com/ilnksrvr.aspx?websiteid=68-35-196-19-30-66-18-128" async="async"></script>

<!-- End Of NGage -->

<?php wp_footer(); ?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo home_url();?>/wp-content/themes/lrsif/contact-buttons.css">



<div class="jquery-script-ads">

</div>



<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/js/paralax.js"></script>



<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/js/classie.js"></script>



<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/js/cbpAnimatedHeader.js"></script>



<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/js/melton.js"></script>



<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/js/formy.js"></script>







<script>







jQuery('.owl-inner').wrap('<div class="container owl-slide-container"></div>');



jQuery( ".container.owl-slide-container" ).wrap( "<section id='owl-slide-sec'></section>" );







jQuery('.review-row').wrap('<div class="container review-container"></div>');



jQuery( ".container.review-container" ).wrap( "<section id='review-sec'></section>" );







jQuery( ".florida-dis" ).wrap( "<section id='florida-sec'></section>" );



jQuery('#florida-sec').wrapInner('<div class="container"></div>');







jQuery( ".pillars-row" ).wrap( "<section id='pillars-sec'></section>" );



jQuery('#pillars-sec').wrapInner('<div class="container"></div>');







jQuery( ".years-row" ).wrap( "<section id='years-sec'></section>" );



jQuery('#years-sec').wrapInner('<div class="container"></div>');







jQuery( ".membership-row" ).wrap( "<section id='membership-sec'></section>" );



jQuery('#membership-sec').wrapInner('<div class="container"></div>');







jQuery( ".insurance-row" ).wrap( "<section id='insurance-sec'></section>" );



jQuery('#insurance-sec').wrapInner('<div class="container"></div>');







jQuery('.tour-row').wrapInner('<div class="container"></div>');







jQuery( ".section-one" ).wrap( "<section id='one'></section>" );



jQuery('#one').wrapInner('<div class="container"></div>');







jQuery( ".section-two" ).wrap( "<section id='two'></section>" );



jQuery('#two').wrapInner('<div class="container"></div>');







jQuery( ".section-three" ).wrap( "<section id='three'></section>" );



jQuery('#three').wrapInner('<div class="container"></div>');







jQuery( ".section-four" ).wrap( "<section id='fourth'></section>" );



jQuery('#fourth').wrapInner('<div class="container"></div>');







jQuery( ".section-fifth" ).wrap( "<section id='fifth'></section>" );



jQuery('#fifth').wrapInner('<div class="container"></div>');







jQuery( ".section-seventh" ).wrap( "<section id='seventh'></section>" );



jQuery('#seventh').wrapInner('<div class="container"></div>');







jQuery( ".section-eighth" ).wrap( "<section id='eighth'></section>" );



jQuery('#eighth').wrapInner('<div class="container"></div>');







jQuery('.section-inner').wrap('<div class="container sections"></div>');



jQuery( ".container.sections " ).wrapAll( "<section id='inner_one'></section>" );







jQuery('.team_top').wrap('<div class="container team-top"></div>');



jQuery( ".container.team-top " ).wrapAll( "<section id='inner_top'></section>" );







jQuery('.team').wrap('<div class="container team-row"></div>');



jQuery( ".container.team-row" ).wrapAll( "<section id='inner_one' class='team-one'></section>" );







jQuery('.team-detail-row').wrap('<div class="container team-detail-main"></div>');



jQuery( ".container.team-detail-main" ).wrapAll( "<section id='inner_one' class='team-detail-one'></section>" );







jQuery('.results-row').wrap('<div class="container results-wrap"></div>');



jQuery( ".container.results-wrap" ).wrap( "<div class='sections results'></div>" );



jQuery( ".sections.results" ).wrap( "<div class='case_studies'></div>" );



jQuery( ".case_studies" ).wrap( "<section id='inner_one'></section>" );







jQuery('.results-row').wrap('<div class="container results-wrap"></div>');







jQuery('.practicetop').wrap('<div class="container practice-top"></div>');



jQuery( ".container.practice-top" ).wrapAll( "<section id='inner_top' class='practice_inner_top'></section>" );







jQuery('.sectionspracticearea-inner').wrap('<div class="container sectionspracticearea-wrap"></div>');



jQuery('.container.sectionspracticearea-wrap').wrap('<div class="sections practice_area"></div>');







jQuery( ".sections.practice_area" ).wrapAll( "<section id='inner_one' class='sectionspracticearea-top'></section>" );







jQuery('.contact-row').wrap('<div class="container contact-container"></div>');



jQuery( ".container.contact-container" ).wrap( "<section id='contact_inner'></section>" );







jQuery('.referring-row').wrap('<div class="container referring-container"></div>');



jQuery( ".container.referring-container" ).wrap( "<div class='sections sidebar_wrap'></div>" );



jQuery( ".sections.sidebar_wrap" ).wrap( "<section id='inner_one' class='referring-one'></section>" );







jQuery('.page-template-new .content-area, .single-format-standard .content-area').wrap('<div class="bloginner"></div>');



jQuery('.page-template-new .sidebar, .single-format-standard .sidebar').wrap('<div class="blogsidebar"></div>');



jQuery('.bloginner, .blogsidebar').wrapAll('<div id="blog_content"></div>');



jQuery("#blog_content").wrap( "<section id='blog_section'></section>" );







jQuery('.animated').after('<div class="bullet_line_border"></div>');







</script> 



<script>



    jQuery(document).ready(function(jQuery ){



         jQuery('.phone_text').hide();



        jQuery ('.name').addClass('active');



        jQuery ('.name').click(function () {



            jQuery ('.name_text').show();



            jQuery ('.email_text').hide();



            jQuery ('.state_text').hide();



            jQuery ('.desc_text').hide();



            jQuery ('.phone_text').hide();



            jQuery ('.name').addClass('active');



            jQuery ('.email').removeClass('active');



            jQuery ('.state').removeClass('active');



            jQuery ('.desc').removeClass('active');



            jQuery ('.phone').removeClass('active');



        });



        jQuery ('.email').click(function () {



            jQuery ('.name_text').hide();



            jQuery ('.email_text').show();



            jQuery ('.state_text').hide();



            jQuery ('.desc_text').hide();



            jQuery ('.phone_text').hide();



            jQuery ('.name').removeClass('active');



            jQuery ('.email').addClass('active');



            jQuery ('.state').removeClass('active');



            jQuery ('.desc').removeClass('active');



            jQuery ('.phone').removeClass('active');



        });



        jQuery ('.state').click(function () {



            jQuery ('.name_text').hide();



            jQuery ('.email_text').hide();



            jQuery ('.state_text').show();



            jQuery ('.desc_text').hide();



            jQuery ('.phone_text').hide();



            jQuery ('.name').removeClass('active');



            jQuery ('.email').removeClass('active');



            jQuery ('.state').addClass('active');



            jQuery ('.desc').removeClass('active');



            jQuery ('.phone').removeClass('active');



        });



        jQuery ('.desc').click(function () {



            jQuery ('.name_text').hide();



            jQuery ('.email_text').hide();



            jQuery ('.state_text').hide();



            jQuery ('.desc_text').show();



            jQuery ('.phone_text').hide();



            jQuery ('.name').removeClass('active');



            jQuery ('.email').removeClass('active');



            jQuery ('.state').removeClass('active');



            jQuery ('.desc').addClass('active');



            jQuery ('.phone').removeClass('active');



        });



        jQuery ('.phone').click(function () {



            jQuery ('.name_text').hide();



            jQuery ('.email_text').hide();



            jQuery ('.state_text').hide();



            jQuery ('.desc_text').hide();



            jQuery ('.phone_text').show();



            jQuery ('.name').removeClass('active');



            jQuery ('.email').removeClass('active');



            jQuery ('.state').removeClass('active');



            jQuery ('.desc').removeClass('active');



            jQuery ('.phone').addClass('active');



        });







    });



</script>



<!--<script>



var vid = document.getElementById("video_one");



vid.playbackRate = 0.5; 



</script> -->



<script src="<?php echo home_url();?>/wp-content/themes/lrsif/jquery.contact-buttons.js"></script>
<script src="<?php echo home_url();?>/wp-content/themes/lrsif/demo.js"></script>
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
  </script>
<script src="<?php echo home_url();?>/wp-content/themes/lrsif/js/waypoints.min.js"></script> 
<script src="<?php echo home_url();?>/wp-content/themes/lrsif/js/jquery.counterup.min.js"></script> 
<script type="text/javascript" src="//cdn.callrail.com/companies/807323229/ff9ff1c8e07a5fa4e844/12/swap.js"></script>

<?php wp_footer(); ?>

<script type="text/javascript">
  (function() {
    window._pa = window._pa || {};
    // _pa.orderId = "myOrderId"; // OPTIONAL: attach unique conversion identifier to conversions
    // _pa.revenue = "19.99"; // OPTIONAL: attach dynamic purchase values to conversions
    // _pa.productId = "myProductId"; // OPTIONAL: Include product ID for use with dynamic ads
    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.marinsm.com/serve/5a7615c83a62d5dcfe000057.js";
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
  })();
</script>


</body>
</html>