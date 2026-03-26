<?php 

// importa as sections
require_once __DIR__ . '/intro.php';
require_once __DIR__ . '/produtos.php';
require_once __DIR__ . '/portfolio.php';
require_once __DIR__ . '/qualidade.php';

add_action('cmb2_admin_init', 'cmb2_fields_home');

function cmb2_fields_home() {

  $cmb = new_cmb2_box([
    'id' => 'home_box',
    'title' => 'Home - Introdução',
    'object_types' => ['page'], // páginas
  ]);

  cmb2_home_intro($cmb);
  cmb2_home_produtos($cmb);
  cmb2_home_portfolio($cmb);
  cmb2_home_qualidade($cmb);
}

?>