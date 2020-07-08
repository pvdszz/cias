<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php

	if ( have_comments() ) : ?>

		<h2 class="comments-title">

			<?php

				$comments_number = get_comments_number();
				$post_title = '<b class="comments-title__post-title">&ldquo;' . get_the_title() . '&rdquo;</b>';

				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Reply to %s', 'comments title', 'theretailer' ),
						$post_title );
				} else {

					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to %2$s',
							'%1$s Replies to %2$s',
							$comments_number,
							'comments title',
							'theretailer'
						),
						number_format_i18n( $comments_number ),
						$post_title
					);

				}

			?>

		</h2>

		<ol class="comment-list">

			<?php
				wp_list_comments( array(
					'avatar_size' => 40,
					'style'       => 'ol',
					'short_ping'  => true,
					'max_depth'   => 3,
				) );
			?>

		</ol>

			<?php the_comments_pagination( array(
				'prev_text' => '',
				'next_text' => '',
			) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'theretailer' ); ?></p>

	<?php
	endif;

	comment_form( array(
		'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'theretailer' ) . '</label><textarea id="comment" name="comment" cols="45" rows="4" aria-required="true"></textarea></p>'
    ) );
	?>

</div>
