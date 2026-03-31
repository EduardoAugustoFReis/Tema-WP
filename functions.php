<?php

// =========================
// HELPERS
// =========================
function get_page_link_or_default($slug)
{
  $page = get_page_by_path($slug);
  return $page ? get_permalink($page->ID) : '#';
}


add_filter('show_admin_bar', '__return_true');


// =========================
// SETUP DO TEMA
// =========================
function starter_theme_setup()
{
  add_theme_support('post-thumbnails');

  // Título automático
  add_theme_support('title-tag');

  // Logo customizada
  add_theme_support('custom-logo');

  // HTML5
  add_theme_support('html5', ['search-form', 'comment-form', 'gallery', 'caption']);
}

add_action('after_setup_theme', 'starter_theme_setup');


// =========================
// INCLUI CMB2
// =========================
require get_template_directory() . '/inc/cmb2/home/home.php';
require get_template_directory() . '/inc/cmb2/header/header.php';
require get_template_directory() . '/inc/cmb2/footer/footer.php';
require get_template_directory() . '/inc/cmb2/produtos/produtos.php';
require get_template_directory() . '/inc/cmb2/contatos/contato.php';
require get_template_directory() . '/inc/cmb2/sobre/sobre.php';


// =========================
// ENQUEUE DE CSS
// =========================
function starter_theme_enqueue_assets()
{
  // GLOBAL
  wp_enqueue_style(
    'starter-theme-style',
    get_stylesheet_uri(),
    [],
    filemtime(get_template_directory() . '/style.css')
  );

  // HOME
  if (is_page_template('page-home.php')) {
    wp_enqueue_style(
      'starter-theme-home',
      get_template_directory_uri() . '/assets/css/home.css',
      ['starter-theme-style'],
      filemtime(get_template_directory() . '/assets/css/home.css')
    );
  }

  // PRODUTOS
  if (is_post_type_archive('produto') || is_singular('produto')) {
    wp_enqueue_style(
      'starter-theme-products',
      get_template_directory_uri() . '/assets/css/products.css',
      ['starter-theme-style'],
      filemtime(get_template_directory() . '/assets/css/products.css')
    );
  }

  // CONTATO
  if (is_page_template('page-contato.php')) {
    wp_enqueue_style(
      'starter-theme-contact',
      get_template_directory_uri() . '/assets/css/contatos.css',
      ['starter-theme-style'],
      filemtime(get_template_directory() . '/assets/css/contatos.css')
    );
  }

  // SOBRE
  if (is_page_template('page-sobre.php')) {
    wp_enqueue_style(
      'starter-theme-about',
      get_template_directory_uri() . '/assets/css/sobre.css',
      ['starter-theme-style'],
      filemtime(get_template_directory() . '/assets/css/sobre.css')
    );
  }
}

add_action('wp_enqueue_scripts', 'starter_theme_enqueue_assets');


// =========================
// CUSTOM POST TYPE - PRODUTO
// =========================
function register_cpt_produtos()
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

add_action('init', 'register_cpt_produtos');


// =========================
// FORMULÁRIO DE CONTATO
// =========================

// Não logados
add_action('admin_post_nopriv_handle_contact_form', 'handle_contact_form');

// Logados
add_action('admin_post_handle_contact_form', 'handle_contact_form');

function handle_contact_form()
{
  // Campos obrigatórios
  if (
    empty($_POST['nome']) ||
    empty($_POST['email']) ||
    empty($_POST['mensagem'])
  ) {
    wp_redirect(wp_get_referer() . '?error=1');
    exit;
  }

  // Honeypot
  if (!empty($_POST['leaveblank']) || ($_POST['dontchange'] ?? '') !== 'http://') {
    wp_redirect(wp_get_referer() . '?error=1');
    exit;
  }

  // Nonce
  if (
    !isset($_POST['contato_form_nonce']) ||
    !wp_verify_nonce($_POST['contato_form_nonce'], 'contato_form_action')
  ) {
    wp_redirect(wp_get_referer() . '?error=1');
    exit;
  }

  // Sanitização
  $nome = sanitize_text_field($_POST['nome']);
  $email = sanitize_email($_POST['email']);
  $telefone = sanitize_text_field($_POST['telefone'] ?? '');
  $mensagem = sanitize_textarea_field($_POST['mensagem']);

  // Validação email
  if (!is_email($email)) {
    wp_redirect(wp_get_referer() . '?error=1');
    exit;
  }

  // Email
  $body  = "Nome: $nome\n";
  $body .= "Email: $email\n";
  $body .= "Telefone: $telefone\n\n";
  $body .= "Mensagem:\n$mensagem";

  $to = get_option('admin_email');
  $subject = 'Novo contato do site';

  $headers = ['Content-Type: text/plain; charset=UTF-8'];

  $enviado = wp_mail($to, $subject, $body, $headers);

  wp_redirect(wp_get_referer() . ($enviado ? '?success=1' : '?error=1'));
  exit;
}
