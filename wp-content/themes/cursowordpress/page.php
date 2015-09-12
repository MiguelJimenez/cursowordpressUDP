<?php get_header( ); ?>

<div class="col-md-8 col-sm-12 col-xs-12">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- post -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?php the_title(); ?></h3>
		</div>
		<div class="panel-body">
			<?php 
			if (has_post_thumbnail())
			{
				?>
				<div class="col-md-6">
					<?php the_post_thumbnail( 'medium', array('class' => 'img-responsive') ); ?>
				</div>
				<?php 
			}
			?>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
	<!-- no posts found -->
<?php endif; ?>
</div>


<div class="col-md-4 col-sm-12 col-xs-12">
	<?php get_sidebar(); ?>
</div>

<?php get_footer( ); ?>