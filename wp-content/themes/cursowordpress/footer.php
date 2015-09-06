<div class="col-md-12 col-sm-12 col-sx-12" id="widgets-footer">
	<div class="col-md-4 col-sm-12 col-xs-12">
		<!-- Función para isertar los widgets -->
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left')) {}?>
	</div>
	<div class="col-md-4 col-sm-12 col-xs-12">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Center')) {}?>
	</div>
	<div class="col-md-4 col-sm-12 col-xs-12">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right')) {}?>
	</div>
</div>

<?php wp_footer(); ?>
	</div>
</body>
</html>