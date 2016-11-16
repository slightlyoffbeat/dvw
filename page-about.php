<?php
  add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'about-page' ) );
  });
?>

<?php
/**
 * The template for displaying a project / portfolio
 */

get_header(); ?>

<div class="content">
  <main class="about">

  <?php while ( have_posts() ) : the_post(); ?>

    <div class="container">
      <div class="about__image">
        <?php the_post_thumbnail(); ?>
      </div>
    </div>

    <?php get_template_part( 'components/single/single', 'content' ); ?>

  <?php endwhile; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
