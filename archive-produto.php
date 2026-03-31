<?php get_header(); ?>

<main class="product-page">

  <!-- HEADER -->
  <section class="product-page-header">
    <div class="container">

      <h1 class="product-page-title">
        Nossos Produtos
      </h1>

      <p class="product-page-subtitle">
        Veja a lista dos nossos produtos abaixo
      </p>

    </div>
  </section>

  <!-- LISTA -->
  <section class="product-page-container container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="product-card">

          <a href="<?php the_permalink(); ?>" class="product-card__link">

            <div class="product-card__image">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg" alt="Imagem padrão">
              <?php endif; ?>
            </div>

            <div class="product-card__content">

              <h2 class="product-card__title">
                <?php the_title(); ?>
              </h2>

              <p class="product-card__description">
                <?php echo get_the_excerpt(); ?>
              </p>

              <span class="product-card__cta">
                Ver mais →
              </span>

            </div>

          </a>

        </article>

      <?php endwhile;
    else : ?>

      <p>Nenhum produto encontrado.</p>

    <?php endif; ?>

  </section>

</main>

<?php get_footer(); ?>