<?php

add_action('cmb2_admin_init', 'cmb2_fields_produtos');

// Page-Produtos
function cmb2_fields_produtos()
{
  $cmb = new_cmb2_box([
    'id' => 'produtos_box',
    'title' => 'Produtos',
    'object_types' => ['produto']
  ]);

  $cmb->add_field([
    'name' => 'Preço',
    'id'   => 'preco_produto',
    'type' => 'text_money',
    'before_field' => 'R$'
  ]);
};
