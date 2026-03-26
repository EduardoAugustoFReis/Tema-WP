<?php get_header(); ?>

<section class="product-single">
  <div class="product-single__container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <h1><?php the_title(); ?></h1>

      <div class="product-single__image">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('large'); ?>
        <?php endif; ?>
      </div>

      <div class="product-single__content">
        <?php the_content(); ?>
      </div>

    <?php endwhile; endif; ?>

  </div>
</section>

<?php get_footer(); ?>