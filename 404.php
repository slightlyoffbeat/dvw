<?php
/**
 * The template for displaying a project / portfolio
 */

get_header(); ?>

<div class="content">
  <div class="container">
		<div class="col-md-12 text-center pt5 pb0">
			<h2 class="mb2">Negative, Ghost Rider.</h2>
		</div>
		<div class="col-md-8 col-md-offset-2 pb5 text-center">
			<img class="mb2" src="<?php bloginfo('template_directory')?>/img/aviator.png" alt="Logo" />

			<a style="color: #f2f2f2; text-decoration: underline;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><h4>Return Home</h4></a>

		</div>

		</div>
	</div>

</div><!-- #primary -->

<?php get_footer(); ?>
