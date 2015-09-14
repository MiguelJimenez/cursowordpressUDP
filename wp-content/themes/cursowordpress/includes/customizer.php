<?php
if( ! function_exists( "unodepiera_customizer" ) )
{
    function unodepiera_customizer( $wp_customize )
    {
        //seccion Header
        $wp_customize->add_section('unodepiera_header', array(
          'title' => __('Header', 'unodepiera'),
          'description' => __('Opciones para el Header', 'unodepiera'),
          'priority' => 36
          ));

        $wp_customize->add_setting('unodepiera_options_theme[logo]', array(
          'default' => '',
          ));

        //añadir control imagen customizer
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
          'label' => __('Subir logo', 'unodepiera'),
          'section' => 'unodepiera_header',
          'settings' => 'unodepiera_options_theme[logo]'
          )));

        //sección footer
        $wp_customize->add_section('unodepiera_footer', array(
          'title' => __('Footer', 'unodepiera'),
          'description' => __('Opciones para el footer', 'unodepiera'),
          'priority' => 37
          ));

        $wp_customize->add_setting('unodepiera_options_theme[copyright]', array(
          'default' => date('Y') . ' &copy; ' . get_bloginfo('name'),
          ));

        //añadir control texto customizer
        $wp_customize->add_control('unodepiera_options_theme[copyright]', array(
          'label' => __('Texto copyright footer', 'unodepiera'),
          'section' => 'unodepiera_footer',
          'settings' => 'unodepiera_options_theme[copyright]'
          ));
    }
}
add_action('customize_register', 'unodepiera_customizer');
