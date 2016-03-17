<?php

/**
* Enregistrement d'une action pour exporter les demandes de catalogues
*/
add_action( 'wp_ajax_export_email', 'my_export_email' );
add_action( 'wp_ajax_nopriv_export_email', 'my_export_email' );

function my_export_email() {

  include('php-excel.class.php');
  include('export-emails.php');

  exit();

}

?>
