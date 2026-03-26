<?php 

// Seção - Produtos - Home
  function cmb2_home_produtos($cmb) {

    // título da seção
    $cmb->add_field([
      'name' => 'Título da seção Produtos',
      'id' => 'home_produtos_titulo',
      'type' => 'text',
    ]);

    // Grupo de produtos - Home
    $produtos_home_group = $cmb->add_field([
      'name' => 'Produtos da Home',
      'id' => 'home_produtos',
      'type' => 'group',
      'options' => [
        'group_title' => 'Produto {#}',
        'add_button' => 'Adicionar Produto',
        'remove_button' => 'Remover Produto',
        'sortable' => true,
      ],
    ]);

    $cmb->add_group_field($produtos_home_group, [
      'name' => 'Título do produto',
      'id' => 'titulo_do_produto',
      'type' => 'text',
    ]);

    $cmb->add_group_field($produtos_home_group, [
      'name' => 'Descrição do produto',
      'id' => 'descricao_do_produto',
      'type' => 'textarea',
    ]);

    $cmb->add_group_field($produtos_home_group, [
      'name' => 'Imagem do produto',
      'id' => 'imagem_do_produto',
      'type' => 'file',
      'options' => [
        'url' => false,
      ],
    ]);

    // Call to action (CTA)
    $cmb->add_field([
      'name' => 'Texto do CTA',
      'id' => 'home_produtos_cta_texto',
      'type' => 'text',
    ]);

    $cmb->add_field([
      'name' => 'Link do CTA',
      'id' => 'home_produtos_cta_link',
      'type' => 'text_url',
    ]);

    $cmb->add_field([
      'name' => 'Texto do botão CTA',
      'id' => 'home_produtos_cta_botao',
      'type' => 'text',
    ]);

  }

?>