 <?php 

// Seção - INTRO - Home
  function cmb2_home_intro($cmb) {

    $cmb->add_field([
      'name' => 'Frase',
      'id' => 'home_frase',
      'type' => 'text',
    ]);

    $cmb->add_field([
      'name' => 'Autor',
      'id' => 'home_autor',
      'type' => 'text',
    ]);

    $cmb->add_field([
      'name' => 'Texto do botão',
      'id' => 'home_botao_texto',
      'type' => 'text',
    ]);

    $cmb->add_field([
      'name' => 'Home Botão Link',
      'id' => 'home_botao_link',
      'type' => 'text_url',
    ]);

    $cmb->add_field([
      'name' => 'Imagem de fundo da Home',
      'id' => 'home_bg_imagem',
      'type' => 'file',
      'options' => [
        'url' => false,
      ]
    ]);

  }

?>  