	<?php get_header(); ?>

	<div class="col-md-8 col-xs-12 col-sm-12">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- post -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
			<div class="panel-body">
	
				<?php 
					if (has_post_thumbnail())
					{
					?>
						<div class="col-md-4">
							<?php the_post_thumbnail( 'thumbnail', array('class' => 'img-responsive') ); ?>
						</div>
					<?php 
					}
				?>

				<div class="col-md-8 col-sm-12 col-xs-12">
					<?php the_content( __('Seguir leyendo', 'unodepiera') ); ?>
				</div>
			</div>
			<div class="panel-footer">
				<p>
					<?php _e('Autor', 'unodepiera') ?>: <?php the_author_posts_link(); ?>
					<?php _e('Categorías', 'unodepiera') ?>: <?php echo get_the_category_list( ", ", $post_id); ?>

				</p>
			</div>
		</div>
	<?php endwhile; ?>
	<!-- post navigation -->

	<?php the_posts_pagination(array(
		'pre_text'				=> __( 'Página anterior', 'unodepiera' ),
		'next_text'				=> __( 'Página siguiente', 'unodepiera' ),
		'before_page_number'	=> '<span class="meta-nav screen-reader-text">'. __( 'Página', 'unodepiera' ).'</span>'
	)); ?>
<?php else: ?>
	<!-- no posts found -->
	<?php _e( 'No hay nada que mostrar', 'unodepiera' ); ?>
<?php endif; ?>


</div>
<div class="col-md-4 col-sm-12 col-xs-12">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>