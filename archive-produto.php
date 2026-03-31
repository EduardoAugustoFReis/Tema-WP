<?php get_header(); ?>

<main class="product-page">

  <!-- HEADER -->
  <section class="product-page-header">
    <div class="container">

      <h1 class="product-page-title">
        <?php post_type_archive_title(); ?>
      </h1>

      <p class="product-page-subtitle">
        <?php echo esc_html(get_post_type_object('produto')->description ?: 'Veja a lista dos nossos produtos abaixo'); ?>
      </p>

    </div>
  </section>

  <!-- LISTA -->
  <section class="product-page-container container">

    <?php if (have_posts()) : ?>

      <div class="product-grid">

        <?php while (have_posts()) : the_post(); ?>

          <article <?php post_class('product-card'); ?>>

            <a href="<?php the_permalink(); ?>" class="product-card__link">

              <div class="product-card__image">
                <?php if (has_post_thumbnail()) : ?>

                  <?php the_post_thumbnail('medium', [
                    'alt' => esc_attr(get_the_title())
                  ]); ?>

                <?php else : ?>

                  <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/placeholder.jpg'); ?>"
                    alt="Imagem padrão">

                <?php endif; ?>
              </div>

              <div class="product-card__content">

                <h2 class="product-card__title">
                  <?php the_title(); ?>
                </h2>

                <?php if (has_excerpt()) : ?>
                  <p class="product-card__description">
                    <?php echo esc_html(get_the_excerpt()); ?>
                  </p>
                <?php endif; ?>

                <span class="product-card__cta">
                  Ver mais →
                </span>

              </div>

            </a>

          </article>

        <?php endwhile; ?>

      </div>

      <!-- PAGINAÇÃO -->
      <div class="pagination">
        <?php
        the_posts_pagination([
          'mid_size' => 2,
          'prev_text' => '← Anterior',
          'next_text' => 'Próximo →',
        ]);
        ?>
      </div>

    <?php else : ?>

      <p class="no-results">
        Nenhum produto encontrado.
      </p>

    <?php endif; ?>

  </section>

</main>

<?php get_footer(); ?>