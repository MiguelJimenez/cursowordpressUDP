<?php 

// Definimos el directorio de nuestras imágenes
define('IMAGE_DIRECTORY', get_template_directory_uri().'/imgs/');

// Nuestra función de configuración 'add_theme_support'
if (!function_exists('unodepiera_setup'))
{
	function unodepiera_setup()
	{
		// Añadir imagen destacada
		add_theme_support('post-thumbnails' );

		// Soporte para el título - título de la pestaña de arriba
		add_theme_support('title-tag' );

		// Soporte para HTML5
		$args = array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
			);
		add_theme_support('html5', $args );
	}
	add_action( 'after_setup_theme', 'unodepiera_setup');
}

// Añadir scripts
if(!function_exists("unodepiera_scripts"))
{
	function unodepiera_scripts()
	{
		wp_enqueue_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array('jquery'), true);
		wp_register_script( 'functions', get_template_directory_uri().'/js/functions.js', array('jquery'));
		wp_enqueue_script('functions' );

		// Para añadir AJAX
		global $wp_query;

		wp_localize_script( 'functions', 'ratings', array(
			'ajax_url'	=> admin_url('admin-ajax.php' ),
			'post_id' 	=> $wp_query->post->ID
		));

	}
	add_action( 'wp_enqueue_scripts', 'unodepiera_scripts');
}

// Registramos estilos
if(!function_exists("unodepiera_styles"))
{
	function unodepiera_styles()
	{
		wp_enqueue_style( 'bootstrap', '//bootswatch.com/united/bootstrap.min.css' );
		wp_register_style('styles', get_template_directory_uri() . '/css/styles.css');
		wp_enqueue_style('styles');

	}
	add_action( 'wp_enqueue_scripts', 'unodepiera_styles');
}

// Utilizamos el archivo navwalker wp_bootstrap_navwalker.php
require_once('navwalker/wp_bootstrap_navwalker.php');

// Registrar la navegación
register_nav_menus(array(
	'primary'	=> __( 'Primary Menu', 'unodepiera' )
	) );

// Registro de Widgets 
if (!function_exists('unodepiera_add_widgets_footer'))
{
	function unodepiera_add_widgets_footer()
	{
		   /**
			* Creates a sidebar
			* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
			*/
			$args = array(
				'name'          => __( 'Footer Left', 'unodepiera' ),
				'id'            => 'sidebar-footer-left',
				'description'   => __( 'Widgets para el footer', 'unodepiera' ),
				'class'         => '',
				'before_widget' => '<div id="%1" class="widget %2">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>'
				);

			register_sidebar( $args );

			register_sidebar( array(
				'name'          => __( 'Footer Center', 'unodepiera' ),
				'id'            => 'sidebar-footer-center',
				'description'   => __( 'Widgets para el footer', 'unodepiera' ),
				'class'         => '',
				'before_widget' => '<div id="%1" class="widget %2">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>'
				)); 

			register_sidebar( array(
				'name'          => __( 'Footer Right', 'unodepiera' ),
				'id'            => 'sidebar-footer-right',
				'description'   => __( 'Widgets para el footer', 'unodepiera' ),
				'class'         => '',
				'before_widget' => '<div id="%1" class="widget %2">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>'
				)); 
		}
		add_action( 'widgets_init', 'unodepiera_add_widgets_footer');
	}

// Registro Sidebar
	if (!function_exists('unodepiera_add_sidebar'))
	{
		function unodepiera_add_sidebar()
		{
			register_sidebar( array(
				'name'          => __( 'Main Sidebar', 'unodepiera' ),
				'id'            => 'sidebar-frontal',
				'description'   => __( 'Sidebar para la página principal', 'unodepiera' ),
				'class'         => '',
				'before_widget' => '<div id="%1" class="widget %2">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>'
				)); 

		}
		add_action( 'widgets_init', 'unodepiera_add_sidebar');
	}

	require_once(trailingslashit( get_template_directory()).'includes/comments.php');

	if( ! function_exists( "unodepiera_search_form" ) )
	{
		function unodepiera_search_form( $form )
		{
			$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
			<div><label class="screen-reader-text" for="s">' . __( 'Buscar para', 'unodepiera' ) . '</label>
			<div class="input-group">
			<input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="Ingresa aquí tu búsqueda...">
			<span class="input-group-btn">
			<button class="btn btn-default" id="searchsubmit" type="submit">'. esc_attr__( 'Search' ) .'</button>
			</span>
			</div><!-- /input-group -->
			</div>
			</form>';
			return $form;
		}
		add_filter( 'get_search_form', 'unodepiera_search_form' );
	}

// Para ingresar un shortcode
/* Podemos usar el shortcode en el backend de WP con [unodepiera_404]
O también dentro del código con:
 echo do_shortcode('[unodepiera_404]');
*/
if (!function_exists('unodepiera_404_shortcode'))
{
	function unodepiera_404_shortcode($args)
	{
		return "<img src='".IMAGE_DIRECTORY."404.jpg' class='img-respinsive'>";
	}
	add_shortcode( 'unodepiera_404', 'unodepiera_404_shortcode' );
}


// CUSTOM OPTIONS THEME
require_once(trailingslashit( get_template_directory()).'includes/customizer.php');

// RATING WEB
require_once( trailingslashit( get_template_directory() )  . 'includes/rating.php');

// CUSTOM POST TYPE PRODUCTS
require_once( trailingslashit( get_template_directory() )  . 'includes/custom-post-type.php');
