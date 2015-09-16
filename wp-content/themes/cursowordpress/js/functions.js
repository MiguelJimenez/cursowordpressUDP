jQuery(document).ready(function()
{
	// console.log(ratings);
	jQuery.ajax({
		url: 'ratings.ajax_url',
		type: 'post',
		data: {
			action: 'rating_site',
			
			post_id: ratings.post_id
		}
	});
	

});