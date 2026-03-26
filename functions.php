<?php
// =========================
// SUPORTE DO TEMA
// =========================
function bikecraft_theme_setup()
{
  // Habilita imagem destacada (Featured Image)
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'bikecraft_theme_setup');


// =========================
// INCLUI CMB2
// =========================
require get_template_directory() . '/inc/cmb2/home/home.php';
require get_template_directory() . '/inc/cmb2/header/header.php';
require get_template_directory() . '/inc/cmb2/footer/footer.php';


// =========================
// ENQUEUE DE CSS
// =========================
function bikecraft_enqueue_assets()
{
  // GLOBAL
  wp_enqueue_style(
    'bikecraft-style',
    get_stylesheet_directory_uri() . '/style.css',
    [],
    filemtime(get_template_directory() . '/style.css')
  );

  // HOME
  if (is_page_template('page-home.php')) {
    wp_enqueue_style(
      'bikecraft-home',
      get_template_directory_uri() . '/assets/css/home.css',
      ['bikecraft-style'],
      filemtime(get_template_directory() . '/assets/css/home.css')
    );
  }

  // PRODUTOS (LISTA + PÁGINA INDIVIDUAL)
  if (is_post_type_archive('produto') || is_singular('produto')) {
    wp_enqueue_style(
      'bikecraft-products',
      get_template_directory_uri() . '/assets/css/products.css',
      ['bikecraft-style'],
      filemtime(get_template_directory() . '/assets/css/products.css')
    );
  }
}

add_action('wp_enqueue_scripts', 'bikecraft_enqueue_assets');


// =========================
// CUSTOM POST TYPE PRODUTO
// =========================
function bikecraft_register_produtos()
{
  register_post_type('produto', [
    'labels' => [
      'name' => 'Produtos',
      'singular_name' => 'Produto',
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'produtos'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_icon' => 'dashicons-cart',
  ]);
}

add_action('init', 'bikecraft_register_produtos');
