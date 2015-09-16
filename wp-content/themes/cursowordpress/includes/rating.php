<?php
if( ! function_exists( "rating_site" ) )
{
    function rating_site()
    {
        $rating = get_post_meta( $_POST['post_id'], 'rating_web', true );
        if( empty( $rating ) )
        {
            $rating = array(
                "1" => 0,
                "2" => 0,
                "3" => 0,
                "4" => 0,
                "5" => 0
            );
            update_post_meta( $_POST['post_id'], 'rating_web', serialize( $rating ) );
        }
        $unserialize = maybe_unserialize( $rating ); //unserialize con wordpress
        $unserialize[ trim( $_POST["value"] ) ] += 1;
        update_post_meta( $_POST['post_id'], 'rating_web', serialize( $unserialize ) );
        die();
    }
}
add_action( 'wp_ajax_nopriv_rating_site', 'rating_site' );
add_action( 'wp_ajax_rating_site', 'rating_site' );

//devuelve los datos en formato array
function ratingUnserialized()
{
    global $wp_query;
    $rating = get_post_meta( $wp_query->post->ID, 'rating_web', true );
    return maybe_unserialize( $rating );
}

//pinta las estrellas votadas
function display_current_rating( $value )
{
    if( $value == 0 )
    {
        return '<span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty">
        </span><span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty">
        </span><span class="glyphicon glyphicon-star-empty"></span>';
    }
    else if( $value == 1 )
    {
        return '<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty">
        </span><span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty">
        </span><span class="glyphicon glyphicon-star-empty"></span>';
    }
    else if( $value == 2 )
    {
        return '<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
        </span><span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty">
        </span><span class="glyphicon glyphicon-star-empty"></span>';
    }
    else if( $value == 3 )
    {
        return '<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
        </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty">
        </span><span class="glyphicon glyphicon-star-empty"></span>';
    }
    else if( $value == 4 )
    {
        return '<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
        </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
        </span><span class="glyphicon glyphicon-star-empty"></span>';
    }
    else if( $value == 5 )
    {
        return '<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
        </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
        </span><span class="glyphicon glyphicon-star"></span>';
    }
}


//añade clases al progress bar
function render_progress_bar( $value )
{
    if( $value < 10 )
    {
        return "progress-bar-danger";
    }
    else if( $value < 40 )
    {
        return "progress-bar-warning";
    }
    else if( $value < 70 )
    {
        return "progress-bar-info";
    }
    else
    {
        return "progress-bar-success";
    }
}
