<?php 

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