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


/**
* Enregistrement d'une action pour supprimer les entrés
*/
add_action( 'wp_ajax_delete_all', 'delete_all' );
add_action( 'wp_ajax_nopriv_delete_all', 'delete_all' );

function delete_all() {
  if(wp_verify_nonce( $_GET['_wpnonce'], 'delete_all_email')){
    $inst = new AbListEmail();
    $inst->delete_all();
    echo "Liste d'email supprimé";
  }else{
    echo "Operation non authorisé";
  }


}
