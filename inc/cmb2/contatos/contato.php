<?php

add_action('cmb2_admin_init', 'cmb2_contato_field');

function cmb2_contato_field()
{
  $cmb = new_cmb2_box([
    'id' => 'contato_box',
    'title' => 'Informações de Contato',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-contato.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Telefone',
    'id' => 'contato_telefone',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Email',
    'id' => 'contato_email',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Endereço',
    'id' => 'contato_endereco',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Cidade',
    'id' => 'contato_cidade',
    'type' => 'text',
  ]);

  $group = $cmb->add_field([
    'id' => 'contato_redes',
    'type' => 'group',
    'options' => [
      'group_title' => 'Rede {#}',
      'add_button' => 'Adicionar Rede',
      'remove_button' => 'Remover',
      'sortable' => true,
    ],
  ]);

  $cmb->add_group_field($group, [
    'name' => 'Nome',
    'id' => 'nome',
    'type' => 'text',
  ]);

  $cmb->add_group_field($group, [
    'name' => 'Link',
    'id' => 'url',
    'type' => 'text_url',
  ]);

  $cmb->add_group_field($group, [
    'name' => 'Ícone',
    'id' => 'icone',
    'type' => 'file',
  ]);

  // ======================
  // FORMULÁRIO
  // ======================

  $cmb->add_field([
    'name' => 'Título do formulário',
    'id' => 'contato_form_titulo',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Texto do botão',
    'id' => 'contato_form_botao',
    'type' => 'text',
    'default' => 'Enviar mensagem',
  ]);

  // ======================
  // MAPA
  // ======================

  $cmb->add_field([
    'name' => 'Link do mapa',
    'id' => 'contato_mapa_link',
    'type' => 'text_url',
  ]);
}
