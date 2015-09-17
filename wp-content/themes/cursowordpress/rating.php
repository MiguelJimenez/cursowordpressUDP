<?php
/**
 * Template Name: Rating Page
 *
 * @package WordPress
 * @subpackage Cursounodepiera
 * @since Cursounodepiera 1.0
 */

get_header();
//obtenemos las votaciones deserializadas
$rating = ratingUnserialized();

//sumamos el total de votos
$total = array_sum( $rating );

//obtenemos el porcentaje de cada estrella, 1,2,3,4,5
$five = ($rating[5] * 100) / $total;
$four = ($rating[4] * 100) / $total;
$three = ($rating[3] * 100) / $total;
$two = ($rating[2] * 100) / $total;
$one = ($rating[1] * 100) / $total;

///obtenemos el total de la suma de los votos
$avg = ( $rating[5] * 5 ) + ( $rating[4] * 4 ) + ( $rating[3] * 3 ) + ( $rating[2] * 2 ) + ( $rating[1] * 1 );

?>
<div class="row">

	<div class="col-xs-12 col-md-12">

		<!-- success message -->
		<div class="alert alert-success" id="rating-message">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>
				<?php _e("Tu voto se ha guardado correctamente, gracias", "unodepiera") ?>
			</strong>
		</div>
		<!-- end successs message -->

		<!-- error message -->
		<div class="alert alert-danger" id="rating-message-error">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>
				<?php _e("Ha ocurrido un error procesando la votación", "unodepiera") ?>
			</strong>
		</div>
		<!-- end error message -->

		<div class="well well-sm">
			<div class="row">
				<div class="col-xs-12 col-md-12 text-center">
					<h1 class="rating-num">
						<?php
                        //porcentaje media votos
						echo number_format((float)$avg / $total, 2, '.', '');
						?>
					</h1>
					<div class="rating">
						<?php
                        //muestra las estrellas conforme porcentaje
						echo display_current_rating( round( $avg / $total) );
						?>
					</div>
					<div>
						<span class="glyphicon glyphicon-user"></span><?php echo $total ?> total
					</div>
				</div>
				<div class="col-xs-12 col-md-10">
					<div class="row rating-desc">
						<div class="col-xs-3 col-md-3 text-right rating-link">
							<span class="glyphicon glyphicon-star"></span>5
						</div>
						<div class="col-xs-8 col-md-9">
							<div class="progress progress-striped">
								<div class="progress-bar <?php echo render_progress_bar( $five ) ?>" role="progressbar" aria-valuenow="20"
									aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format((float)$five, 2, '.', '') ?>%">
									<span class="sr-only"><?php echo number_format((float)$five, 2, '.', '') ?>%</span>
								</div>
							</div>
						</div>
						<!-- end 5 -->
						<div class="col-xs-3 col-md-3 text-right rating-link">
							<span class="glyphicon glyphicon-star"></span>4
						</div>
						<div class="col-xs-8 col-md-9">
							<div class="progress">
								<div class="progress-bar <?php echo render_progress_bar( $four ) ?>" role="progressbar" aria-valuenow="20"
									aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format((float)$four, 2, '.', '') ?>%">
									<span class="sr-only"><?php echo number_format((float)$four, 2, '.', '') ?>%</span>
								</div>
							</div>
						</div>
						<!-- end 4 -->
						<div class="col-xs-3 col-md-3 text-right rating-link">
							<span class="glyphicon glyphicon-star"></span>3
						</div>
						<div class="col-xs-8 col-md-9">
							<div class="progress">
								<div class="progress-bar <?php echo render_progress_bar( $three ) ?>" role="progressbar" aria-valuenow="20"
									aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format((float)$three, 2, '.', '') ?>%">
									<span class="sr-only"><?php echo number_format((float)$three, 2, '.', '') ?>%</span>
								</div>
							</div>
						</div>
						<!-- end 3 -->
						<div class="col-xs-3 col-md-3 text-right rating-link">
							<span class="glyphicon glyphicon-star"></span>2
						</div>
						<div class="col-xs-8 col-md-9">
							<div class="progress">
								<div class="progress-bar <?php echo render_progress_bar( $two ) ?>" role="progressbar" aria-valuenow="20"
									aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format((float)$two, 2, '.', '') ?>%">
									<span class="sr-only"><?php echo number_format((float)$two, 2, '.', '') ?>%</span>
								</div>
							</div>
						</div>
						<!-- end 2 -->
						<div class="col-xs-3 col-md-3 text-right rating-link">
							<span class="glyphicon glyphicon-star"></span>1
						</div>
						<div class="col-xs-8 col-md-9">
							<div class="progress">
								<div class="progress-bar <?php echo render_progress_bar( $one ) ?>" role="progressbar" aria-valuenow="80"
									aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format((float)$one, 2, '.', '') ?>%">
									<span class="sr-only"><?php echo number_format((float)$one, 2, '.', '') ?>%</span>
								</div>
							</div>
						</div>
						<!-- end 1 -->
					</div>
					<!-- end row -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
