<?php 

// Seção - Portfólio - Home
  function cmb2_home_portfolio($cmb) {


    $cmb->add_field([
      'name' => 'Título da seção de portfólio',
      'id' => 'titulo_portfolio_secao',
      'type' => 'text',
    ]);

    // Seção - Portfólio - Home
    $portfolio_group = $cmb->add_field([
      'name' => 'Imagens do portfólio',
      'id' => 'imagens_portfolio',
      'type' => 'group',
      'options' => [
        'group_title' => 'Imagem {#}',
        'add_button' => 'Adicionar Imagem',
        'remove_button' => 'Remover Imagem',
        'sortable' => true,
      ],
    ]);

    $cmb->add_group_field($portfolio_group, [
      'name' => 'Imagem',
      'id' => 'imagem',
      'type' => 'file',
      'options' => [
        'url' => false,
      ],
    ]);

    // CTA
    $cmb->add_field([
      'name' => 'Texto do CTA',
      'id' => 'home_portfolio_cta_texto',
      'type' => 'text',
    ]);

    $cmb->add_field([
      'name' => 'Link do CTA',
      'id' => 'home_portfolio_cta_link',
      'type' => 'text_url',
    ]);

    $cmb->add_field([
      'name' => 'Texto do botão',
      'id' => 'home_portfolio_cta_botao',
      'type' => 'text',
    ]);

  }

?>