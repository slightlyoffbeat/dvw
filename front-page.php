<?php get_header(); ?>

<div class="hero">
  <div class="container">
    <div class="intro">
      <div class="intro__wrap">
        <h1 class='intro__title'>Dan Brown</h1>
        <p class="intro__text">I am a creator, <a href="#" target="blank">developer</a>, product guy, strategist, <a href="#" target="_blank">homebrewer</a>, runner,
          sock enthusiast, beard evangelist, <a href="#">writer</a>, drummer, adventurer, Oxford comma advocate,
          and <a href="#">human Swiss Army Knife</a>.</p>
          <a href="#"><i class="intro__icon fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#"><i class="intro__icon fa fa-github" aria-hidden="true"></i></a>
          <a href="#"><i class="intro__icon fa fa-linkedin" aria-hidden="true"></i></a>
          <a href="#"><i class="intro__icon fa fa-instagram" aria-hidden="true"></i></a>
          <a href="#"><i class="intro__icon fa fa-rss" aria-hidden="true"></i></a>
          <a href="#"><i class="intro__icon fa fa-envelope-o" aria-hidden="true"></i></a>
      </div>

      <span class="scroll-down"><span>Scroll Down</span></span>

      </div> <!--/hero-wrap-->
  </div>
</div>


<?php
  $featured_1x1_1 = get_field('featured_1x1-1', 'option');
  $featured_1x1_2 = get_field('featured_1x1-2', 'option');
  $featured_1x1_3 = get_field('featured_1x1-3', 'option');
  $featured_1x2_1 = get_field('featured_1x2-1', 'option');
  $featured_2x2 = get_field('featured_2x2', 'option');
  $featured_1x3 = get_field('featured_1x3', 'option');

?>

<div class="work home-slate">
  <div class="container">
    <h2 class="section-title">My Work</h2>

    <a class="work__link" href="<?php echo get_permalink( $featured_1x1_1 ) ?>">
      <div class="work__item work__item--1x1">
        <div style="background-image: url('<?php the_field('1x1-image', $featured_1x1_1); ?>')"
         class="work__photo"></div>
        <div class="work__hover">
          <div class="work__hover-outer">
            <div class="work__hover-inner">
              <div class="work__hover-content">
                <h4><?php echo get_the_title( $featured_1x1_1 ) ?></h4>
                <span class="work__info"><?php the_field('role', $featured_1x1_1); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>

    <a class="work__link" href="<?php echo get_permalink( $featured_1x2_1 ) ?>">
      <div class="work__item work__item--1x2">
        <div style="background-image: url('<?php the_field('1x2-image', $featured_1x2_1); ?>')" class="work__photo"></div>
        <div class="work__hover">
          <div class="work__hover-outer">
            <div class="work__hover-inner">
              <div class="work__hover-content">
                <h4><?php echo get_the_title( $featured_1x2_1 ) ?></h4>
                <span class="work__info"><?php the_field('role', $featured_1x2_1); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>

    <a class="work__link" href="<?php echo get_permalink( $featured_2x2 ) ?>">
      <div class="work__item work__item--2x2">
        <div style="background-image: url('<?php the_field('2x2-image', $featured_2x2); ?>')"
         class="work__photo work__photo--double"></div>
        <div class="work__hover">
          <div class="work__hover-outer">
            <div class="work__hover-inner">
              <div class="work__hover-content">
                <h4><?php echo get_the_title( $featured_2x2 ) ?></h4>
                <span class="work__info"><?php the_field('role', $featured_2x2); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>

    <a class="work__link" href="<?php echo get_permalink( $featured_1x1_2 ) ?>">
      <div class="work__item work__item--1x1">
        <div style="background-image: url('<?php the_field('1x1-image', $featured_1x1_2); ?>')"
         class="work__photo"></div>
        <div class="work__hover">
          <div class="work__hover-outer">
            <div class="work__hover-inner">
              <div class="work__hover-content">
                <h4><?php echo get_the_title( $featured_1x1_2 ) ?></h4>
                <span class="work__info"><?php the_field('role', $featured_1x1_2); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>

    <a class="work__link" href="<?php echo get_permalink( $featured_1x1_3 ) ?>">
      <div class="work__item work__item--1x1">
        <div style="background-image: url('<?php the_field('1x1-image', $featured_1x1_3); ?>')"
         class="work__photo"></div>
        <div class="work__hover">
          <div class="work__hover-outer">
            <div class="work__hover-inner">
              <div class="work__hover-content">
                <h4><?php echo get_the_title( $featured_1x1_3 ) ?></h4>
                <span class="work__info"><?php the_field('role', $featured_1x1_3); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>

    <a class="work__link" href="<?php echo get_permalink( $featured_1x3 ) ?>">
      <div class="work__item work__item--1x3">
        <div style="background-image: url('<?php the_field('1x3-image', $featured_1x3); ?>')"
         class="work__photo"></div>
        <div class="work__hover">
          <div class="work__hover-outer">
            <div class="work__hover-inner">
              <div class="work__hover-content">
                <h4><?php echo get_the_title( $featured_1x3 ) ?></h4>
                <span class="work__info"><?php the_field('role', $featured_1x3); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>

  </div> <!--/container-->
</div> <!--/work-->

<div class="snippet home-slate">
  <div class="container">
    <h2 class="section-title">Words I've Written</h2>
    <div class="snippet__post">
      <h3 class="snippet__title">Switching to all-grain brewing: Building my MLT.</h3>
      <span class="snippet__meta">Beer / May 1, 2016</span>
      <a class="button snippet__button">Read More</a>
    </div>

    <div class="snippet__post">
      <h3 class="snippet__title">Switching to all-grain brewing: Building my MLT.</h3>
      <span class="snippet__meta">Beer / May 1, 2016</span>
      <a class="button snippet__button">Read More</a>
    </div>

    <div class="snippet__post">
      <h3 class="snippet__title">Switching to all-grain brewing: Building my MLT.</h3>
      <span class="snippet__meta">Beer / May 1, 2016</span>
      <a class="button snippet__button">Read More</a>
    </div>
  </div> <!--/container -->
</div> <!--/snippet-->


<div class="insta home-slate">
  <div class="container">
    <h2 class="section-title">Me IRL</h2>
    <div id="instafeed"></div>
  </div>
</div> <!--/insta-->

<?php get_footer(); ?>
