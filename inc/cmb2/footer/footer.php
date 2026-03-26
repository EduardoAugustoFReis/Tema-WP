<?php
add_action('cmb2_admin_init', 'cmb2_fields_footer');

function cmb2_fields_footer()
{
  // pegar todas as páginas existentes
  $pages = get_pages();
  $options = [];
  foreach ($pages as $page) {
    $options[$page->ID] = $page->post_title;
  }

  $cmb = new_cmb2_box([
    'id' => 'footer_box',
    'title' => 'Footer - Configuração',
    'object_types' => ['options-page'],
    'option_key' => 'footer_settings',
    'icon_url' => 'dashicons-admin-site',
  ]);

  // Logo do Footer
  $cmb->add_field([
    'name' => 'Logo so site',
    'id' => 'footer_logo',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  // Texto sobre o site
  $cmb->add_field([
    'name' => 'Descrição do site',
    'id'   => 'footer_text',
    'type' => 'textarea_small',
  ]);

  $menu = $cmb->add_field([
    'name' => 'Menu do footer',
    'id' => 'footer_menu',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title'   => 'Link {#}',
      'add_button'    => 'Adicionar link',
      'remove_button' => 'Remover link',
      'sortable' => true,
    ],
  ]);

  $cmb->add_group_field($menu, [
    'name' => 'Texto do link',
    'id'   => 'link_text',
    'type' => 'text',
  ]);

  $cmb->add_group_field($menu, [
    'name' => 'Página',
    'id'   => 'link_page',
    'type' => 'select',
    'options' => $options,
    'desc'    => 'Escolha uma página interna do site',
  ]);

  // Redes sociais
  $socials = $cmb->add_field([
    'name' => 'Redes sociais',
    'id' => 'footer_socials',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => '{#} Rede Social',
      'add_button'    => 'Adicionar rede',
      'remove_button' => 'Remover rede',
    ],
  ]);

  $cmb->add_group_field($socials, [
    'name' => 'Nome da rede',
    'id'   => 'name',
    'type' => 'text',
  ]);

  $cmb->add_group_field($socials, [
    'name' => 'URL',
    'id'   => 'url',
    'type' => 'text_url',
  ]);

  $cmb->add_group_field($socials, [
    'name' => 'Ícone (caminho da imagem)',
    'id'   => 'icon',
    'type' => 'file',
    'options' => ['url' => false],
  ]);

  // Texto de copyright
  $cmb->add_field([
    'name' => 'Copyright',
    'id'   => 'footer_copyright',
    'type' => 'text',
    'default' => '© 2026 Meu Site - Todos os direitos reservados',
  ]);
}
