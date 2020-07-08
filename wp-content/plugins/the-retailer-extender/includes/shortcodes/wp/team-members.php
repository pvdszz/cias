<?php

// [team_member]
function tr_ext_team_member($params = array(), $content = null) {

	wp_enqueue_style('theretailer-team-members-shortcode-styles');

	extract(shortcode_atts(array(
		'image_url' => '',
		'name' => 'Name',
		'role' => 'Role'
	), $params));
	
	if (is_numeric($image_url)) {
		$image_url = wp_get_attachment_url($image_url);
	}
	
	$content = do_shortcode($content);
	$team_member = '
		<div class="shortcode_meet_the_team">
			<div class="shortcode_meet_the_team_img_placeholder"><img src="'.$image_url.'" alt="" /></div>
			<h3>'.$name.'</h3>
			<div class="small_sep"></div>
			<div class="role">'.$role.'</div>
			<p>'.$content.'</p>
		</div>
	';
	return $team_member;
}

add_shortcode('team_member', 'tr_ext_team_member');