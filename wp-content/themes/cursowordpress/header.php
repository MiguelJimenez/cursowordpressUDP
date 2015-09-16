<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="pingback" href="<?php bloginfo('pingback_url' ); ?>">
	<?php wp_head(); ?>
	<title>Document</title>
</head>
<body <?php body_class(); ?>>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo home_url(); ?>">
					<?php
						$options = get_theme_mod('unodepiera_options_theme' );
						$logo = $options['logo'];
						if ($logo)
						{
							?>
								<img src="<?php echo $logo ?>" alt="<?php bloginfo('name' ); ?>" width="50" heigth="50" style="margin-top: -15px">
							<?php 
						}
						else
						{
							bloginfo('name' );
						}

						


					?>
				</a>
			</div>

			<?php
			wp_nav_menu( array(
				'menu'              => 'primary',
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'bs-example-navbar-collapse-1',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'walker'            => new wp_bootstrap_navwalker())
			);
			?>
		</div>
	</nav>


	<div class="container col-md-12">