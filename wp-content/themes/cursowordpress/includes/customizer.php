<?php 
if (!function_exists('unodepiera_customizer'))
{
	function unodepiera_customizer($wp_customize)
	{
		// Sección header
		$wp_customize->add_section('unodepiera_header', array(
			'title'			=> __( 'Header', 'unodepiera' ),
			'description'	=> __( 'Opciones para el Header', 'unodpiera' ),
			'priority'		=> 36
		));

		$wp_customize->add_setting('unodepiera_options_theme[logo]', array(
			'default'	=> ''
		));

		// añadir control imagen customizer
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
				'label'		=> __( 'Subir logo', 'unodepiera' ),
				'section'	=> 'unodepiera_header',
				'settings'	=> 'unodepiera_options_theme[logo]'
		)));
	}
}
add_action( 'customize_register', 'unodepiera_customizer');