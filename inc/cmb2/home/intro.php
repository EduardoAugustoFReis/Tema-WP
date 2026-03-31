 <?php

  // Seção - INTRO - Home
  function cmb2_home_intro($cmb)
  {

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
      'name' => 'Imagem de fundo da Home',
      'id' => 'home_bg_imagem',
      'type' => 'file',
      'options' => [
        'url' => false,
      ]
    ]);
  }

  ?>  