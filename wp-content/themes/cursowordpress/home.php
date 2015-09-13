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
	
	<!-- template part paginación -->
	<?php get_template_part( 'content', 'pagination' ); ?>
	
<?php else: ?>
	<!-- no posts found -->
	<?php get_template_part("content", "empty"); ?>
<?php endif; ?>


</div>
<div class="col-md-4 col-sm-12 col-xs-12">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>