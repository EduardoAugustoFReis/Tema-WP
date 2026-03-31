<?php get_header(); ?>

<main class="product-single">

  <section class="product-single__wrapper container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $price = get_post_meta(get_the_ID(), 'preco_produto', true);
        ?>

        <div class="product-single__container">

          <!-- IMAGEM -->
          <div class="product-single__image">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
            <?php endif; ?>
          </div>

          <!-- CONTEÚDO -->
          <div class="product-single__content">

            <h1 class="product-single__title">
              <?php the_title(); ?>
            </h1>

            <?php if ($price) : ?>
              <span class="product-single__price">
                R$ <?php echo esc_html($price); ?>
              </span>
            <?php endif; ?>

            <div class="product-single__description">
              <?php the_content(); ?>
            </div>

            <!-- CTA -->
            <a href="/contato" class="product-single__cta">
              Fale conosco
            </a>

          </div>

        </div>

    <?php endwhile;
    endif; ?>

  </section>

</main>

<?php get_footer(); ?>