<?php

// [icon_box]
function tr_ext_icon_box_shortcode($params = array(), $content = null) {

	wp_enqueue_style('theretailer-linea-fonts-styles');
	wp_enqueue_style('theretailer-icon-box-shortcode-styles');

	extract(shortcode_atts(array(
		'icon' => '',
		'icon_position' => 'top',
		'icon_style' => 'normal',
		'icon_color' => '#000',
		'icon_bg_color' => '#ffffff',
		'title' => '',
		'link_name' => '',
		'link_url' => ''
	), $params));
	
	if (is_numeric($icon)) {
		$icon = wp_get_attachment_url($icon);
	}
		
	$title_markup = "";
	$content_markup = "";
	$button_markup = "";
	
	if ($title != "") $title_markup = '<h3 class="title">' . $title . '</h3>';
	if ($content != "") $content_markup = '<p>' . do_shortcode($content) . '</p>';
	if ($link_name != "") $button_markup = '<a class="icon_box_read_more" href="' . $link_url . '">' . $link_name . '</a>';
	
	$icon_box_markup = '		
		<div class="shortcode_icon_box icon_position_'.$icon_position.' icon_style_'.$icon_style.'">
			<div class="icon_wrapper" style="background-color:'.$icon_bg_color.'; border-color:'.$icon_color.'">
				<div class="icon '.$icon.'" style="color:'.$icon_color.'"></div>
			</div>'
			.$title_markup
			.$content_markup
			.$button_markup.
		'</div>
	';
	return $icon_box_markup;
}

add_shortcode('icon_box', 'tr_ext_icon_box_shortcode');