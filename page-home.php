<?php
// Template Name: Home
get_header();

$id = get_the_ID();

// ================= HOME =================
$home = [
  'frase' => get_post_meta($id, 'home_frase', true),
  'autor' => get_post_meta($id, 'home_autor', true),
  'bg' => get_post_meta($id, 'home_bg_imagem', true),
];

// ================= PRODUTOS =================
$produtos_titulo = get_post_meta($id, 'home_produtos_titulo', true);
$produtos = get_post_meta($id, 'home_produtos', true);

$produtos_cta = [
  'texto' => get_post_meta($id, 'home_produtos_cta_texto', true),
  'link' => get_post_meta($id, 'home_produtos_cta_link', true),
  'botao' => get_post_meta($id, 'home_produtos_cta_botao', true),
];

$link = !empty($produtos_cta['link'])
  ? esc_url($produtos_cta['link'])
  : get_page_link_or_default('produtos');

// ================= QUALIDADE =================
$qualidade = [
  'titulo' => get_post_meta($id, 'titulo_secao_qualidade', true),
  'itens' => get_post_meta($id, 'home_qualidade_itens', true),
  'cta_texto' => get_post_meta($id, 'home_qualidade_cta_texto', true),
  'cta_link' => get_post_meta($id, 'home_qualidade_cta_link', true),
  'cta_botao' => get_post_meta($id, 'home_qualidade_cta_botao', true),
];

$qualidade_link = !empty($qualidade['cta_link'])
  ? esc_url($qualidade['cta_link'])
  : get_page_link_or_default('sobre');
?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <!-- HERO -->
      <section
        class="home-hero"
        <?php if (!empty($home['bg'])) : ?>
        style="background-image: url('<?php echo esc_url($home['bg']); ?>');"
        <?php endif; ?>>
        <div class="container">
          <div class="home-hero__content">
            <h1><?php the_title(); ?></h1>

            <?php if (!empty($home['frase'])) : ?>
              <blockquote class="home-hero__quote">
                <p><?php echo esc_html($home['frase']); ?></p>
                <?php if (!empty($home['autor'])) : ?>
                  <cite><?php echo esc_html($home['autor']); ?></cite>
                <?php endif; ?>
              </blockquote>
            <?php endif; ?>
          </div>
        </div>
      </section>

      <!-- PRODUTOS -->
      <section class="home-products section">
        <div class="container">

          <?php if (!empty($produtos_titulo)) : ?>
            <h2 class="home-title"><?php echo esc_html($produtos_titulo); ?></h2>
          <?php endif; ?>

          <?php if (!empty($produtos)) : ?>
            <ul class="home-products__list grid grid-3">
              <?php foreach ($produtos as $produto) : ?>
                <li class="home-products__item card">

                  <?php if (!empty($produto['imagem_do_produto'])) : ?>
                    <div class="home-products__image">
                      <img
                        src="<?php echo esc_url($produto['imagem_do_produto']); ?>"
                        alt="<?php echo esc_attr($produto['titulo_do_produto']); ?>">
                    </div>
                  <?php endif; ?>

                  <?php if (!empty($produto['titulo_do_produto'])) : ?>
                    <h3><?php echo esc_html($produto['titulo_do_produto']); ?></h3>
                  <?php endif; ?>

                  <?php if (!empty($produto['descricao_do_produto'])) : ?>
                    <p><?php echo esc_html($produto['descricao_do_produto']); ?></p>
                  <?php endif; ?>

                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <?php if (!empty($produtos_cta['texto']) || !empty($produtos_cta['botao'])) : ?>
            <div class="home-cta">
              <?php if (!empty($produtos_cta['texto'])) : ?>
                <p><?php echo esc_html($produtos_cta['texto']); ?></p>
              <?php endif; ?>

              <?php if (!empty($produtos_cta['botao'])) : ?>
                <a href="<?php echo esc_url($link); ?>" class="home-button home-button--dark">
                  <?php echo esc_html($produtos_cta['botao'] ?: 'Saiba mais'); ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endif; ?>

        </div>
      </section>

      <!-- QUALIDADE -->
      <section class="home-quality section">
        <div class="container">

          <?php if (!empty($qualidade['titulo'])) : ?>
            <h2 class="home-title"><?php echo esc_html($qualidade['titulo']); ?></h2>
          <?php endif; ?>

          <?php if (!empty($qualidade['itens'])) : ?>
            <ul class="home-quality__list grid grid-3">
              <?php foreach ($qualidade['itens'] as $item) : ?>
                <li class="home-quality__item card">

                  <?php if (!empty($item['titulo'])) : ?>
                    <h3><?php echo esc_html($item['titulo']); ?></h3>
                  <?php endif; ?>

                  <?php if (!empty($item['descricao'])) : ?>
                    <p><?php echo esc_html($item['descricao']); ?></p>
                  <?php endif; ?>

                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <?php if (!empty($qualidade['cta_texto']) || !empty($qualidade['cta_botao'])) : ?>
            <div class="home-cta">
              <?php if (!empty($qualidade['cta_texto'])) : ?>
                <p><?php echo esc_html($qualidade['cta_texto']); ?></p>
              <?php endif; ?>

              <?php if (!empty($qualidade['cta_botao'])) : ?>
                <a href="<?php echo esc_url($qualidade_link); ?>" class="home-button home-button--dark">
                  <?php echo esc_html($qualidade['cta_botao'] ?: 'Saiba mais'); ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endif; ?>

        </div>
      </section>

  <?php endwhile;
  endif; ?>

</main>

<?php get_footer(); ?>