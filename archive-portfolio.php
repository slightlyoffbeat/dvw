<?php
  add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'portfolio-page' ) );
  });
?>

<?php
/**
 * The template for displaying list of projects.
 */

get_header(); ?>

	<div class="content">
		<div class="container">
			<div class="col-md-12">
				<div class="featured-project">
					<h1>Projects:</h1>
					<div class="featured-project__image mt1">
						<?php $primaryFeatured = get_field('primary_feature', 'option'); ?>
						<a class="work__link" href="<?php echo get_permalink( $primaryFeatured ) ?>">
							<?php echo get_the_post_thumbnail( $primaryFeatured, 'large' ); ?>
						</a>
						<h4><?php echo get_the_title( $primaryFeatured ) ?></h4>

					</div>
				</div>
			</div>
			<?php

			$my_query = new WP_Query(array(
			    'post__not_in' => array($primaryFeatured),
			    'post_type' => 'portfolio',
			    'paged' => $paged,
			));

			if($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
			?>

				<div class="project-tile">
					<a class="work__link" href="<?php echo get_permalink() ?>">
						<div style="background-image: url(<?php the_post_thumbnail_url( 'large' ); ?> );" class="project-tile__image"></div>
					</a>
					<h4><?php the_title(); ?></h4>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>



<?php get_footer(); ?>
