<?php

$theretailer_customfont = '';

$default = array(
					'arial',
					'verdana',
					'trebuchet',
					'georgia',
					'times',
					'tahoma',
					'helvetica',
					'Radnika Next Alt',
					'HK Nova',
				);

$googlefonts = array(
	GBT_Opt::getOption( 'new_gb_main_font', array( 'font-family' => 'Radnika Next Alt' ) )['font-family'],
	GBT_Opt::getOption( 'new_gb_secondary_font', array( 'font-family' => 'HK Nova' ) )['font-family']
);

foreach($googlefonts as $googlefont) {

	if(!in_array($googlefont, $default)) {
			$theretailer_customfont = str_replace(' ', '+', $googlefont). ':300,300italic,400,400italic,700,700italic,900,900italic|' . $theretailer_customfont;
	}
}



if ($theretailer_customfont != "") {

	function google_fonts() {
		global $theretailer_customfont;
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'theretailer-googlefonts', "$protocol://fonts.googleapis.com/css?family=". substr_replace($theretailer_customfont ,"",-1) . "' rel='stylesheet' type='text/css" );
	}
	add_action( 'wp_enqueue_scripts', 'google_fonts' );
	add_action( 'admin_enqueue_scripts', 'google_fonts' );

}

?>
