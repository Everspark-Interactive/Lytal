//jQuery(document).ready(function() {
        jQuery(".owl-carousel").owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                700: {
                    items: 1,
                    nav: false
                },
                900: {
                    items: 2,
                    nav: false
                },
                1170: {
                    items: 4,
                    nav: true,
                    loop: true
                }
            }
        });
    //});;
