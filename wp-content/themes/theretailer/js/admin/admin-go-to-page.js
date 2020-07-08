jQuery(function($) {

	"use strict";

    var in_customizer = false;

    if ( typeof wp !== 'undefined' ) {
    	if ( typeof wp.customize !== 'undefined' ) {
        	in_customizer =  typeof wp.customize.section !== 'undefined' ? true : false;
        }
    }

    if ( in_customizer ) {

		wp.customize.section( 'shop', function( section ) {
	        go_to_page( section, 'shop' );
	    } );

	    wp.customize.section( 'blog', function( section ) {
	        go_to_page( section, 'blog' );
	    } );

	    wp.customize.section( 'product', function( section ) {
	        go_to_page( section, 'product' );
	    } );

	}

	function go_to_page( section, page ) {

    	section.expanded.bind( function( isExpanded ) {
            if ( isExpanded ) {
            	var data = {
            		'action' : 'theretailer_get_section_url',
            		'page'	 : page
            	};

				jQuery.post( 'admin-ajax.php', data, function(response) {
					wp.customize.previewer.previewUrl.set(response);
				});
            }
        } );
    }

});
