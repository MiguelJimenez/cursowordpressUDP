jQuery( document ).on( 'click', '.rating-link', function( e )
{
	e.preventDefault();
	var value = jQuery(this).text();

	jQuery.ajax({
		url : ratings.ajax_url,
		type : 'post',
		data : {
			action : 'rating_site',
			value : value,
			post_id : ratings.post_id
		},
		success : function( response )
		{
			jQuery('#rating-message-error').css( "display", "none" );
			jQuery('#rating-message').css( "display", "block" );
		},
		error : function( error )
		{
			jQuery('#rating-message').css( "display", "none" );
			jQuery('#rating-message-error').css( "display", "block" );
		}
	})
})
