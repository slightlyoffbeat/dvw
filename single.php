<?php
/**
 * The template for displaying a single post
 */

get_header(); ?>

<div class="content">
  <main class="project">

  <?php while ( have_posts() ) : the_post(); ?>

    <div class="container">
      <div class="project__hero-wrap">

        <?php if( get_field('featured_video_link') ): ?>
            <?php echo wp_oembed_get( 'https://vimeo.com/191034951' ); ?>
        <?php elseif( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail(); ?>
        <?php endif; ?>

        <div class="project__info">
            <h1 class="project__title"><?php the_title(); ?></h1>
            <span class="project__role"><?php the_field('role') ?></span>
            <?php the_field('project_description') ?>
        </div>
      </div>
    </div>

    <?php get_template_part( 'components/single/single', 'content' ); ?>

  <?php endwhile; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
