<?php

if( ! function_exists( 'unodepiera_comment_form_fields' ) )
{
	function unodepiera_comment_form_fields($fields)
	{
		$comment_user = wp_get_current_commenter();
		$require      = get_option( 'require_name_email' );
		$fields   =  array(
			'author'    =>  '<div class="form-group comment-form-author">' .
			'<label for="author">' . __( 'Name' ) .
			( $require ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="author" name="author" type="text" value="' .
			esc_attr( $comment_user['comment_author'] ) . '" size="30" /></div>',
			'email'     =>  '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) .
			( $require ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" id="email" name="email" type="email" value="' .
			esc_attr(  $comment_user['comment_author_email'] ) . '" size="30" /></div>',
			'url'       =>  '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) .
			'</label> ' . '<input class="form-control" id="url" name="url" type="url" value="' .
			esc_attr( $comment_user['comment_author_url'] ) . '" size="30" /></div>'
			);

		return $fields;
	}
	add_filter( 'comment_form_default_fields', 'unodepiera_comment_form_fields' );
}

if( ! function_exists( 'unodepiera_comment_form' ) )
{
	function unodepiera_comment_form( $args )
	{
		$args['title_reply'] = __( 'Deja un comentario positivo', 'unodepiera' );
		$args['comment_notes_before'] = "Tus notas al principio";
		$args['comment_notes_after'] = "Tus notas al final";
		$args['comment_field'] = '<div class="form-group comment-form-comment">
		<label for="comment">' . __( 'Comentario', 'unodepiera' ) . '</label>
		<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</div>';
		$args['class_submit'] = 'btn btn-default';
		$args['label_submit'] = __("Envia tu comentario", "unodepiera");

		return $args;
	}
	add_filter( 'comment_form_defaults', 'unodepiera_comment_form' );
}
