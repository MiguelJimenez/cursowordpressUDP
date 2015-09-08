<?php 

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
		wp_register_script( 'functions', get_template_directory_uri().'js/functions.js', array('jquery'));
		wp_enqueue_script('functions' );

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
