<?php

// [title_subtitle]
function tr_ext_shortcode_title_subtitle($atts, $content=null) {

	wp_enqueue_style('theretailer-title-subtitle-shortcode-styles');

	extract(shortcode_atts(array(
		'title'  => '',
		'title_color' => '#000000',
		'title_size' => '36',
		'subtitle' => '',
		'subtitle_color' => '#000000',
		'subtitle_size' => '17',
		'with_separator' => 'yes',
		'align' => 'center'
	), $atts));
	ob_start();
	?>
    
    <div class="title_subtitle" style="text-align:<?php echo $align; ?>">
        <h3 style="color:<?php echo $title_color; ?> !important; font-size:<?php echo $title_size; ?>px"><?php echo $title; ?></h3>
        <?php if ($with_separator == "yes") { ?><hr class="title_subtitle_separator" style="border-bottom-color:<?php echo $title_color; ?>"></hr><?php } ?>
        <?php if ($subtitle != "") { ?><h4 style="color:<?php echo $subtitle_color; ?> !important; font-size:<?php echo $subtitle_size; ?>px"><?php echo $subtitle; ?></h4><?php } ?>
    </div>

	<?php
	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("title_subtitle", "tr_ext_shortcode_title_subtitle");