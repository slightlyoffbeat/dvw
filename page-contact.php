<?php
  add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'contact-page' ) );
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
      <div class="contact">
        <h2 class="mb0">Say Hello</h2>
        <p class="mb1">Email me at hello at danvswild.com or leave a message below.</p>
        <?php  the_content();  ?>
      </div>
    </div>


  <?php endwhile; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
