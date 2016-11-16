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

    <div class="container">
      <div class="experience-info">
        <h1>Dan Brown</h1>
        <h3>Brand & marketing expert. Creator. Product guy. Swiss Army Knife.</h3>
        <a href="#" target="_blank" class="button experience-info__button button--primary">LinkedIn</a>
        <a href="#" target="_blank" class="button experience-info__button button-outline--secondary">Resume</a>
      </div>
    </div>

    <?php get_template_part( 'components/single/single', 'content' ); ?>

  <?php endwhile; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
