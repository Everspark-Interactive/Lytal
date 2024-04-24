jQuery(document).ready(function ($) {
// jQuery for page scrolling feature - requires jQuery Easing plugin
    $(function () {
        $('p:empty').remove();

    });

// Highlight the top nav as scrolling occurs
    /*$('body').scrollspy({
     target: '.navbar-fixed-top'
     })*/

// Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function () {
        $('.navbar-toggle:visible').click();
    });
    $(function () {
        $('#accordion .aacr:first-child .panel-collapse').addClass('in');

    });
    jQuery(function ($) {
        var $active = $('#accordion .panel-collapse.in').prev().addClass('active');
        $active.find('a').prepend('<i class="glyphicon glyphicon-minus"></i>');
        $('#accordion .panel-heading').not($active).find('a').prepend('<i class="glyphicon glyphicon-plus"></i>');
        $('#accordion').on('show.bs.collapse', function (e) {
            $('#accordion .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
            $(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
        });
    });

    $(function () {
        $('a#result').click(function () {
            $(this).parent().find('a').removeClass('active_one');
            $(this).addClass('active_one');
            $('section#inner_one .testimonial').hide();
            $('section#inner_one .case_studies').show();
        });
        $('a#testi').click(function () {
            $(this).parent().find('a').removeClass('active_one');
            $(this).addClass('active_one');
            $('section#inner_one .case_studies').hide();
            $('section#inner_one .testimonial').show();
        });

        $('ul.cat_nav li').click(function () {
            $('ul.cat_nav li').removeClass('active');
            $(this).addClass('active');
            var cat = $(this).attr('data-item');
            if (cat == 'all_cat') {
                $('section#inner_one .case_studies ul li').show();
            }
            else {
                $('section#inner_one .case_studies ul li').hide();
                $('section#inner_one .case_studies ul li.' + cat).show();
            }



        });

    });

///// here for the FAQ Subject Category Wise Listing of Posts....

    $(function () {
        //alert('Hii');

        $('body.page-faq .sidebar_nav li').click(function () {
            var li_id = $(this).attr('id');
            //$('.latest_faq_posts').hide();
            var dataString = 'li_id=' + li_id;

            $.ajax({
                type: "POST",
                url: "http://synaptic.in/imelton/wp-content/themes/imelton/faq_sub_cat.php",
                data: dataString
            })
                    .done(function (faq_data) {
                        $('.right_side').html(faq_data);



                    });

        });


        var headH = $('body.page header').height() + 0;
        var secT = $('section#inner_top').outerHeight() + 0;
        var k = $('section#inner_one').outerHeight() - $('.left_sidebar').outerHeight();
        var total = headH + secT;
        var to = total + k;
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            //>=, not <=

            if (scroll >= total) {
                //clearHeader, not clearheader - caps H
                $(".left_sidebar").addClass('position-fixed');
            }
            else {
                $(".left_sidebar").removeClass('position-fixed');
            }

            if (scroll >= to) {
                //clearHeader, not clearheader - caps H
                $(".left_sidebar").removeClass('position-fixed');
            }


        });
/////// Added by Jit on 17-12-14 for the Scrolling window Down

        $(".top_section_scroll").click(function () {
            //$(this).animate(function(){
            $('html, body').animate({
                scrollTop: $(".top_sec").offset().top
            }, 3000);
            //});
        });
        $("a.practice").click(function () {

            var l = $(this).attr('data-item');
            $('html, body').animate({
                scrollTop: $(l).offset().top
            }, 2000);

        });

        $('.select_cat').click(function () {
            var $menu = $('ul.cat_nav');
            if ($menu.is(':visible')) {
                $menu.slideUp("fast");
            }
            else {
                $menu.slideDown("fast");
            }
        });

        if (screen.width < 768) {
            $('ul.cat_nav li').click(function () {
                var te = $(this).find('a').text();
                $('.select_cat').html(te);
                $(this).parent('ul.cat_nav').slideUp("fast");
            });
        }




    });



});;
