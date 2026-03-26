<?php
add_action('cmb2_admin_init', 'cmb2_fields_header');

function cmb2_fields_header()
{
  // pegar todas as páginas existentes
  $pages = get_pages();
  $options = [];
  foreach ($pages as $page) {
    $options[$page->ID] = $page->post_title;
  }

  $cmb = new_cmb2_box([
    'id' => 'header_box',
    'title' => 'Header - Configuração',
    'object_types' => ['options-page'],
    'option_key'   => 'header_settings',
    'icon_url'     => 'dashicons-admin-site',
  ]);

  $cmb->add_field([
    'name' => 'Logo do site',
    'id'   => 'header_logo',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  // group Menu Navegação

  $menu = $cmb->add_field([
    'name' => 'Menu principal',
    'id' => 'header_menu',
    'type' => 'group',
    'repeatable'  => true,
    'options' => [
      'group_title'   => 'Link {#}',
      'add_button'    => 'Adicionar link',
      'remove_button' => 'Remover link',
    ],
  ]);

  // subcampos do group Menu navegação
  $cmb->add_group_field($menu, [
    'name' => 'Texto do link',
    'id'   => 'link_text',
    'type' => 'text',
  ]);

  $cmb->add_group_field($menu, [
    'name'    => 'Página',
    'id'      => 'link_page',
    'type'    => 'select',
    'options' => $options,
    'desc'    => 'Escolha uma página interna do site',
  ]);
}
