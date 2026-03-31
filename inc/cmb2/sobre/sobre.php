<?php
add_action('cmb2_admin_init', 'cmb2_sobre_field');

function cmb2_sobre_field()
{
  $cmb = new_cmb2_box([
    'id'           => 'sobre_box',
    'title'        => 'Conteúdo da Página Sobre',
    'object_types' => ['page'],
    'context'      => 'normal',
    'priority'     => 'high',
    'show_on' => [
      'key'   => 'page-template',
      'value' => 'page-sobre.php',
    ],
  ]);

  // =====================
  // 🔹 HISTÓRIA / MISSÃO / VISÃO
  // =====================
  $cmb->add_field([
    'name' => 'Seção: História, Missão e Visão',
    'type' => 'title',
    'id'   => 'sec_historia',
  ]);

  $cmb->add_field([
    'name' => 'Título da Seção',
    'id'   => 'titulo_historia',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'História',
    'id'   => 'historia',
    'type' => 'textarea',
  ]);

  $cmb->add_field([
    'name' => 'Missão',
    'id'   => 'missao',
    'type' => 'textarea',
  ]);

  $cmb->add_field([
    'name' => 'Visão',
    'id'   => 'visao',
    'type' => 'textarea',
  ]);


  // =====================
  // 🔹 VALORES
  // =====================
  $cmb->add_field([
    'name' => 'Seção: Valores',
    'type' => 'title',
    'id'   => 'sec_valores',
  ]);

  $cmb->add_field([
    'name' => 'Título da Seção',
    'id'   => 'titulo_valores',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name'       => 'Valores',
    'id'         => 'valores',
    'type'       => 'text',
    'repeatable' => true,
  ]);


  // =====================
  // 🔹 EQUIPE
  // =====================
  $cmb->add_field([
    'name' => 'Seção: Equipe',
    'type' => 'title',
    'id'   => 'sec_equipe',
  ]);

  $cmb->add_field([
    'name' => 'Imagem da equipe',
    'id'   => 'imagem_equipe',
    'type' => 'file',
  ]);


  // =====================
  // 🔹 QUALIDADE / DIFERENCIAIS
  // =====================
  $cmb->add_field([
    'name' => 'Seção: Qualidade / Diferenciais',
    'type' => 'title',
    'id'   => 'sec_qualidade',
  ]);

  $cmb->add_field([
    'name' => 'Título da Seção',
    'id'   => 'titulo_qualidade',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Imagem Qualidade',
    'id'   => 'imagem_qualidade',
    'type' => 'file',
  ]);

  // Grupo repetível
  $group = $cmb->add_field([
    'id'          => 'qualidade_itens',
    'type'        => 'group',
    'description' => 'Itens da seção Qualidade',
    'options'     => [
      'group_title'   => 'Item {#}',
      'add_button'    => 'Adicionar Item',
      'remove_button' => 'Remover Item',
      'sortable'      => true,
    ],
  ]);

  $cmb->add_group_field($group, [
    'name' => 'Título',
    'id'   => 'titulo',
    'type' => 'text',
  ]);

  $cmb->add_group_field($group, [
    'name' => 'Descrição',
    'id'   => 'descricao',
    'type' => 'textarea',
  ]);
}
