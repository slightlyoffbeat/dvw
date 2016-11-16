<?php
/**
 * Template part for displaying footer
 */

?>

<footer class="footer">
  <span class="footer__text">Made in sunny San Diego</span>

  <?php if( have_rows('social_links', 'options') ): ?>

  <?php while ( have_rows('social_Links', 'options') ) : the_row(); ?>

  <a class="footer__icon" target="_blank" href="<?php the_sub_field('social_link')?>">
    <i class="footer__icon fa fa-<?php the_sub_field('social_icon')?>" aria-hidden="true"></i>
  </a>

  <?php endwhile; endif; ?>

</footer>
