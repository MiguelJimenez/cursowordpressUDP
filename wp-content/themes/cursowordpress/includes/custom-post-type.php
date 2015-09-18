<?php 
if (!function_exists('unodepiera_products_post_type'))
{
	
		/**
		* Registers a new post type
		* @uses $wp_post_types Inserts new post type object into the list
		*
		* @param string  Post type key, must not exceed 20 characters
		* @param array|string  See optional args description above.
		* @return object|WP_Error the registered post type object, or an error object
		*/
		function unodepiera_products_post_type() {
		
			$labels = array(
				'name'                => __( 'Productos', 'unodepiera' ),
				'singular_name'       => __( 'Producto', 'unodepiera' ),
				'add_new'             => _x( 'Añadir Producto', 'unodepiera', 'unodepiera' ),
				'add_new_item'        => __( 'Añadir nuevo produto', 'unodepiera' ),
				'edit_item'           => __( 'Edit Singular Name', 'unodepiera' ),
				'new_item'            => __( 'New Singular Name', 'unodepiera' ),
				'view_item'           => __( 'View Singular Name', 'unodepiera' ),
				'search_items'        => __( 'Search Plural Name', 'unodepiera' ),
				'not_found'           => __( 'No Plural Name found', 'unodepiera' ),
				'not_found_in_trash'  => __( 'No Plural Name found in Trash', 'unodepiera' ),
				'parent_item_colon'   => __( 'Parent Singular Name:', 'unodepiera' ),
				'menu_name'           => __( 'Productos', 'unodepiera' ),
			);
		
			$args = array(
				'labels'                   => $labels,
				'hierarchical'        => false,
				'description'         => 'description',
				'taxonomies'          => array('brands', 'post_tag'),
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => null,
				'menu_icon'           => null,
				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive'         => true,
				'query_var'           => true,
				'can_export'          => true,
				'rewrite'             => true,
				'capability_type'     => 'post',
				'supports'            => array(
					'title', 'editor', 'author', 'thumbnail',
					'excerpt','custom-fields', 'trackbacks', 'comments',
					'revisions', 'page-attributes', 'post-formats'
					)
			);

			register_taxonomy( 'brands', 'products', array(
				'label' => __( 'Marcas'),
				'hierarchical' => 'true',
				'rewrite' => array('slug' => 'brand'),
				'capabilities' => array(
					'manage_terms' => 'administrator',
					'edit_terms' => 'administrator',
					'delete_terms' => 'administrator',
					'assign_terms' => 'administrator', 'editor' , 'author', 'contributor'
				)
			) );
		
			register_post_type( 'products', $args );
		}
		
		add_action( 'init', 'unodepiera_products_post_type' );
		
	
}



