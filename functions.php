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
require get_template_directory() . '/inc/cmb2/produtos/produtos.php';
require get_template_directory() . '/inc/cmb2/contatos/contato.php';
require get_template_directory() . '/inc/cmb2/sobre/sobre.php';


// =========================
// ENQUEUE DE CSS - gerenciador de CSS
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

  // CONTATO
  if (is_page_template('page-contato.php')) {
    wp_enqueue_style(
      'bikecraft-contact',
      get_template_directory_uri() . '/assets/css/contatos.css',
      ['bikecraft-style'],
      filemtime(get_template_directory() . '/assets/css/contatos.css')
    );
  }

  // CONTATO
  if (is_page_template('page-sobre.php')) {
    wp_enqueue_style(
      'bikecraft-contact',
      get_template_directory_uri() . '/assets/css/sobre.css',
      ['bikecraft-style'],
      filemtime(get_template_directory() . '/assets/css/sobre.css')
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


// Para usuários NÃO logados
add_action('admin_post_nopriv_contato_form', 'handle_contato_form');

// Para usuários logados
add_action('admin_post_contato_form', 'handle_contato_form');

function handle_contato_form()
{
  // Verifica campos obrigatórios
  if (
    empty($_POST['nome']) ||
    empty($_POST['email']) ||
    empty($_POST['mensagem'])
  ) {
    wp_redirect(wp_get_referer() . '?error=1');
    exit;
  }

  if (!empty($_POST['leaveblank']) || $_POST['dontchange'] !== 'http://') {
    wp_redirect(wp_get_referer() . '?error=1');
    exit;
  }

  // Verifica nonce (segurança)
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
  $telefone = sanitize_text_field($_POST['telefone']);
  $mensagem = sanitize_textarea_field($_POST['mensagem']);

  // Validação de email
  if (!is_email($email)) {
    wp_redirect(wp_get_referer() . '?error=1');
    exit;
  }

  // Monta email
  $body = "Nome: $nome\n";
  $body .= "Email: $email\n";
  $body .= "Telefone: $telefone\n\n";
  $body .= "Mensagem:\n$mensagem";

  $to = get_option('admin_email');
  $subject = 'Novo contato do site';

  $enviado = wp_mail($to, $subject, $body);

  if ($enviado) {
    wp_redirect(wp_get_referer() . '?success=1');
  } else {
    wp_redirect(wp_get_referer() . '?error=1');
  }

  exit;
}
