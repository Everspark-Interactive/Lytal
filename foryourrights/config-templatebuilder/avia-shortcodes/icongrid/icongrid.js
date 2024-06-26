(function($)
{ 
	"use strict";

    $(window).on('load', function (e) {
		$('.avia-icongrid-flipbox').avia_sc_icongrid();
    });
	
	// -------------------------------------------------------------------------------------------
	// Icongrid shortcode javascript
	// -------------------------------------------------------------------------------------------
	
	$.fn.avia_sc_icongrid = function(options)
	{
		return this.each(function()
		{
			var container = $(this),
                icongrid_id = '#' + $(this).attr('id'),
                methods;

            methods =
			{
				buildIconGrid: function () {

                    this.setMinHeight($(icongrid_id + ' li article'));
                    this.createFlipBackground($(icongrid_id + ' li'));


				},

				setMinHeight: function (els) {

					if (els.length < 2) return;

					var elsHeights = new Array();
					els.css('min-height', '0').each(function (i) {
						var current = $(this);
						var currentHeight = current.outerHeight(true);
						elsHeights.push(currentHeight);
					});

					var largest = Math.max.apply(null, elsHeights);
					els.css('min-height', largest);


				},

				createFlipBackground: function(els) {

				//	if ( ! container.hasClass('avia-icongrid-flipbox') ) return;

					els.each(function(index,element){
						var back = $(this).find('.avia-icongrid-content');
						if (back.length > 0) {
							if ( $(this).find('.avia-icongrid-flipback').length <= 0 ) {
                                var flipback = back.clone().addClass('avia-icongrid-flipback').removeClass('avia-icongrid-content');
                                back.after(flipback);
							}
						}
					});

				}
			};
            methods.buildIconGrid();
            $(window).on( 'resize', function() {
                methods.buildIconGrid();
            });
		});
	}
	
	
}(jQuery));;
