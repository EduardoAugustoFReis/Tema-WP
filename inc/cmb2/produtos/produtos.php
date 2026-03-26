<?php

add_action('cmb2_admin_init', 'cmb2_fields_produtos');

// Page-Produtos
function cmb2_fields_produtos()
{
  $cmb = new_cmb2_box([
    'id' => 'produtos_box',
    'title' => 'Produtos',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'produtos.php', // nome do seu template
    ],
  ]);

  $cmb->add_field([
    'name' => 'Título do produto',
    'id'   => 'produto_titulo',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Imagem principal',
    'id'   => 'produto_imagem_1',
    'type' => 'file',
  ]);
};
