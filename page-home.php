<?php
// Template Name: Home
get_header();

$id = get_the_ID();

$home = [
  'frase' => get_post_meta($id, 'home_frase', true),
  'autor' => get_post_meta($id, 'home_autor', true),
  'home_botao_texto' => get_post_meta($id, 'home_botao_texto', true),
  'home_botao_link' => get_post_meta($id, 'home_botao_link', true),
  'bg' => get_post_meta($id, 'home_bg_imagem', true),
];

$produtos_titulo = get_post_meta($id, 'home_produtos_titulo', true);

$produtos = get_post_meta($id, 'home_produtos', true);

$produtos_cta = [
  'texto' => get_post_meta($id, 'home_produtos_cta_texto', true),
  'link' => get_post_meta($id, 'home_produtos_cta_link', true),
  'botao' => get_post_meta($id, 'home_produtos_cta_botao', true),
];

$link = $produtos_cta['link'];

if ($link) {
  $link = esc_url($link);
} else {
  $page = get_page_by_path('produtos');
  $link = $page ? get_permalink($page->ID) : '#';
}


$portfolio = [
  'titulo' => get_post_meta($id, 'titulo_portfolio_secao', true),
  'imagens_portfolio' => get_post_meta($id, 'imagens_portfolio', true),
  'cta_texto' => get_post_meta($id, 'home_portfolio_cta_texto', true),
  'cta_link' => get_post_meta($id, 'home_portfolio_cta_link', true),
  'cta_botao' => get_post_meta($id, 'home_portfolio_cta_botao', true),
];

$link_portfolio = $portfolio['cta_link'];

if (!$link_portfolio) {
  $page = get_page_by_path('portfolio');
  $link_portfolio = $page ? get_permalink($page->ID) : '#';
}


$qualidade = [
  'titulo' => get_post_meta($id, 'titulo_secao_qualidade', true),
  'itens' => get_post_meta($id, 'home_qualidade_itens', true),
  'cta_texto' => get_post_meta($id, 'home_qualidade_cta_texto', true),
  'cta_link' => get_post_meta($id, 'home_qualidade_cta_link', true),
  'cta_botao' => get_post_meta($id, 'home_qualidade_cta_botao', true),
];

$qualidade_link = $qualidade['cta_link'];

if (!$qualidade_link) {
  $page = get_page_by_path('sobre');
  $qualidade_link = $page ? get_permalink($page->ID) : '#';
}

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="home-hero" style="background-image: url('<?php echo esc_url($home['bg']); ?>');">
      <div class="home-hero__content">
        <h1><?php the_title(); ?></h1>

        <blockquote class="home-hero__quote">
          <p><?php echo esc_html($home['frase']); ?></p>
          <cite><?php echo esc_html($home['autor']); ?></cite>
        </blockquote>

        <a href="<?php echo esc_url($home['home_botao_link']); ?>" class="home-button">
          <?php echo esc_html($home['home_botao_texto']); ?>
        </a>
      </div>
    </section>

    <section class="home-products">
      <h2 class="home-title"><?php echo esc_html($produtos_titulo); ?></h2>

      <ul class="home-products__list">
        <?php if ($produtos) : foreach ($produtos as $produto) : ?>
            <li class="home-products__item">

              <div class="home-products__image">
                <img src="<?php echo esc_url($produto['imagem_do_produto']); ?>" alt="">
              </div>

              <h3><?php echo esc_html($produto['titulo_do_produto']); ?></h3>
              <p><?php echo esc_html($produto['descricao_do_produto']); ?></p>

            </li>
        <?php endforeach;
        endif; ?>
      </ul>

      <div class="home-cta">
        <p><?php echo esc_html($produtos_cta['texto']); ?></p>
        <a href="<?php echo esc_url($link); ?>" class="home-button home-button--dark">
          <?php echo esc_html($produtos_cta['botao']); ?>
        </a>
      </div>
    </section>

    <section class="home-portfolio">
      <div class="home-portfolio__container">
        <h2 class="home-title"><?php echo esc_html($portfolio['titulo']); ?></h2>

        <div class="home-portfolio__grid">
          <?php foreach ($portfolio['imagens_portfolio'] as $img) : ?>
            <div class="home-portfolio__item">
              <img src="<?php echo esc_url($img['imagem']); ?>" alt="">
            </div>
          <?php endforeach; ?>
        </div>

        <div class="home-cta">
          <p><?php echo esc_html($portfolio['cta_texto']); ?></p>
          <a href="<?php echo esc_url($link_portfolio); ?>" class="home-button">
            <?php echo esc_html($portfolio['cta_botao']); ?>
          </a>
        </div>
      </div>
    </section>

    <section class="home-quality">
      <h2 class="home-title"><?php echo esc_html($qualidade['titulo']); ?></h2>

      <ul class="home-quality__list">
        <?php foreach ($qualidade['itens'] as $item) : ?>
          <li class="home-quality__item">
            <h3><?php echo esc_html($item['titulo']); ?></h3>
            <p><?php echo esc_html($item['descricao']); ?></p>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="home-cta">
        <p><?php echo esc_html($qualidade['cta_texto']); ?></p>
        <a href="<?php echo esc_url($qualidade_link); ?>" class="home-button home-button--dark">
          <?php echo esc_html($qualidade['cta_botao']); ?>
        </a>
      </div>
    </section>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>