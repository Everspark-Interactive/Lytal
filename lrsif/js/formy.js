jQuery(document).ready(function ($) {
    $("input").keydown(function (e) {
        if (e.which == 9)
            $(this).next('.btns').trigger('click');
    });
// NORMAL form

    $('body').on('click', 'button#submit2', function () {
        var name = $('#yname').val();
        var email = $('#emailid').val();
        var state = $('#select1').val();
        var cases = $('#share_story').val();
        var phone = $('#yphone').val();

        var groupedformular_a2 = $('#groupedformular_a1').val();
        var groupedformular_q2 = $('#groupedformular_q1').val();
        var groupedformular_website2 = $('#groupedformular_website1').val();
        if ((cases == 'Enter your Description ...') || (cases == '')) {
            $('case_desc').focus();
            $(this).parent().find('.error_msg').remove();
            return false;
        }

        else {
            var dataString = 'name=' + name + '&email=' + email + '&state=' + state + '&cases=' + cases + '&phone=' + phone
                    + '&groupedformular_a2=' + groupedformular_a2
                    + '&groupedformular_q2=' + groupedformular_q2
                    + '&groupedformular_website2=' + groupedformular_website2
                    + '&datastr=footer1';
            // Calling Ajax here for Mailing.
            
            console.log('dataStringZ1:'+dataString);
            $.cookie('dataStringZ1', dataString, { expires: 1, path: '/' });
            $.cookie('dataStringZ1');
            $.ajax({
                type: "POST",
                url: sitehomeurl + "send-mail.php",
                data: dataString

            })
                    .done(function (parent_data) {
                        //alert('Thank you for Contacting Us.. We will Guaranteed response in 24 hours');
                        window.location.href = sitehomeurl + '/thank-you';

                    });
            return false;
        }
    });
    // Sidebar mobile form

    $('#sidebar_btn_one').click(function () {

        var yname1 = $('#yname1').val();
        if (yname1 == 'Your name')
        {
            alert('Name field cannot be blank!');
            $('#yname1').focus();
            return false;
        }


        var emailid1 = $('#emailid1').val();
        if (emailid1 == 'Your e-mail address')
        {
            alert('Email field cannot be blank!');
            $('#emailid1').focus();
            return false;
        }


        var phone1 = $('#phone1').val();
        if (phone1 == 'Your phone number')
        {
            alert('Phone field cannot be blank!');
            $('#phone1').focus();
            return false;
        }

        var select2 = $('#select2').val();
        if (select2 == 'Select your state')
        {
            alert('Please select from one of the following!');
            $('#select2').focus();
            return false;
        }

        var share_story1 = $('#share_story1').val();
        if (share_story1 == 'Share your story')
        {
            alert('Please Share any of your Story here..');
            $('#share_story1').focus();
            return false;
        }
        var groupedformular_website4 = $('#groupedformular_website4').val();
        var groupedformular_q4 = $('#groupedformular_q4').val();
        var groupedformular_a4 = $('#groupedformular_a4').val();

        var dataString = 'yname1=' + yname1
                + '&emailid1=' + emailid1
                + '&phone1=' + phone1
                + '&select2=' + select2
                + '&share_story1=' + share_story1
                + '&groupedformular_website4=' + groupedformular_website4
                + '&groupedformular_q4=' + groupedformular_q4
                + '&groupedformular_a4=' + groupedformular_a4
                ;
        //alert(dataString);

        // Calling Ajax here for Mailing.
        $.ajax({
            type: "POST",
            url: sitehomeurl + "/send-mail_mobile.php",
            data: dataString

        })
                .done(function (parent_data) {
                    window.location.href = sitehomeurl + '/thank-you';
                });
        return false;

    });
    // default


    $('body').on('click', 'button#submit', function () {
        var name = $('#name').val();
        var email = $('#email').val();
        var state = $('#state').val();
        var cases = $('#case_desc').val();
        var phone = $('#phone').val();

        var groupedformular_a2 = $('#groupedformular_a2').val();
        var groupedformular_q2 = $('#groupedformular_q2').val();
        var groupedformular_website2 = $('#groupedformular_website2').val();
        if ((cases == 'Enter your Description ...') || (cases == '')) {
            $('case_desc').focus();
            $(this).parent().find('.error_msg').remove();
            //$(this).parent().prepend("<span class='error_msg'>Please enter your description!</span>");
            return false;
        }
        else {
            var dataString = 'name=' + name + '&email=' + email + '&state=' + state + '&cases=' + cases + '&phone=' + phone
                    + '&groupedformular_a2=' + groupedformular_a2
                    + '&groupedformular_q2=' + groupedformular_q2
                    + '&groupedformular_website2=' + groupedformular_website2
                    + '&datastr=footer1';
            // Calling Ajax here for Mailing.
            
            console.log('dataStringZZ:'+dataString);
            
            $.cookie('dataStringZZ', dataString, { expires: 1, path: '/' });
            $.cookie('dataStringZZ');
            $.ajax({
                type: "POST",
                url: sitehomeurl + "send-mail.php",
                data: dataString
            })
                    .done(function (parent_data) {
                        window.location.href = sitehomeurl + '/thank-you';

                    });
            return false;
        }
    });
 
        // Added by Jit on 17-12-14 for the News Custom Menu item.

        $('.menu-item-type-custom a').attr('target', '_blank');


        $('body').on('click', 'a.video_play', function () {
            $('#video .modal-body').html('');
            $('#video .modal-body').html('<iframe src="//player.vimeo.com/video/120386021?title=0&byline=0&portrait=0&autoplay=1" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
        });

        $('body').on('click', '#stopButton', function () {
            $('#video .modal-body').html('');
        });
        $('body').on('click', '.modal-backdrop', function () {
            $('#video .modal-body').html('');
        });


        $(document).keyup(function (e) {

            if (e.keyCode == 27) {

                $('#video .modal-body').html('');
            }
        });

        $('body').on('click', '.btns', function () {

            var vald = $(this).parent().find('input').val();
            if ((vald == 'Enter your name ...') || (vald == '')) {
                $('#name').focus();
                $(this).parent().find('.error_msg').remove();
                //$(this).parent().prepend("<span class='error_msg'>Please enter name!</span>");
                //alert('hi');
            }
            else if ((vald == 'Enter your Email ...') || (vald == '')) {
                $('#email').focus();
                $(this).parent().find('.error_msg').remove();
                //$(this).parent().prepend("<span class='error_msg'>Please enter email id!</span>");
            }
            else if ((vald == 'Enter your State ...') || (vald == '')) {
                $('#state').focus();
                $(this).parent().find('.error_msg').remove();
                //$(this).parent().prepend("<span class='error_msg'>Please enter state name!</span>");
            }
            else {
                $(this).parent().hide();
                $(this).parent().next().show();
                var k = $(this).parent('#input_box').attr('tab-item');
                $('ul.case li').each(function (index) {
                    if ($(this).attr('tab-item') == k) {
                        $('ul.case li').removeClass('active');
                        $(this).addClass('active');
                    }
                    ;
                });
            }
        });

        $('body').on('click', 'input.text_box', function () {
            $(this).parent().find('.error_msg').remove();
        });
});;
