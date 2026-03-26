<?php get_header(); ?>

<section class="product-page-container">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article class="product-card">

        <a href="<?php the_permalink(); ?>" class="product-card__link">

          <div class="product-card__image">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium'); ?>
            <?php endif; ?>
          </div>

          <div class="product-card__content">
            <h2 class="product-card__title">
              <?php the_title(); ?>
            </h2>

            <p class="product-card__description">
              <?php echo get_the_excerpt(); ?>
            </p>
          </div>

        </a>

      </article>

  <?php endwhile;
  endif; ?>

</section>

<?php get_footer(); ?>