<?php 

// Seção - Qualidade - Home
  function cmb2_home_qualidade($cmb) {
    // Titulo
    $cmb->add_field([
      'name' => 'Titulo da seção de qualidade',
      'id' => 'titulo_secao_qualidade',
      'type' =>'text',
    ]);


    // Grupo de itens
    $qualidade_group = $cmb->add_field([
      'name' => 'Itens de Qualidade',
      'id' => 'home_qualidade_itens',
      'type' => 'group',
      'options' => [
        'group_title' => 'Item {#}',
        'add_button' => 'Adicionar Item',
        'remove_button' => 'Remover Item',
        'sortable' => true,
      ],
    ]);

    $cmb->add_group_field($qualidade_group, [
      'name' => 'Título',
      'id' => 'titulo',
      'type' => 'text',
    ]);

    $cmb->add_group_field($qualidade_group, [
      'name' => 'Descrição',
      'id' => 'descricao',
      'type' => 'textarea',
    ]);

    // CTA
    $cmb->add_field([
      'name' => 'home qualidade cta texto',
      'id' => 'home_qualidade_cta_texto',
      'type' =>'text',
    ]);

    $cmb->add_field([
      'name' => 'Link do CTA',
      'id' => 'home_qualidade_cta_link',
      'type' => 'text_url',
    ]);

    $cmb->add_field([
      'name' => 'Texto do botão do CTA',
      'id' => 'home_qualidade_cta_botao',
      'type' => 'text',
    ]);

  }

?>