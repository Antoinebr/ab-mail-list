<?php
// form ajax
add_action( 'wp_ajax_form_newsletter', 'form_newsletter' );
add_action( 'wp_ajax_nopriv_form_newsletter', 'form_newsletter' );

function form_newsletter() {

  //$nom = htmlspecialchars($_POST['nom']);
  //$prenom = htmlspecialchars($_POST['prenom']);
  $email = htmlspecialchars($_POST['email']);


  $t = array();

  // if( $prenom == ""){
  //   $t['erreurPrenom'] = "<em class='erreur state-error'>Vous devez rentrer votre prenom</em>";
  //   $erreur = true;
  // }

  // if( $nom == ""){
  //   $t['erreurNom'] = "<em class='erreur state-error'>Vous devez rentrer votre nom</em>";
  //   $erreur = true;
  // }

  if(!filter_var($email , FILTER_VALIDATE_EMAIL)) {
    $t['erreurEmail'] = "<p class='alert-warning erreur state-error form-error'>Votre adresse e-mail n'est pas valide</p>";
    $erreur = true;
  }

  if(!isset($erreur)){
    $t['erreur'] = false;
  }elseif($erreur == true){
    $t['erreur'] = true;
    echo json_encode($t);
    die();
  }


  if($t['erreur'] == false){


    $list = new AbListEmail();
    $result = $list->register_email($email);

    if($result['status'] == 'error'){
      $t['erreur'] = true;
      $t['erreurGlobal'] = "<em class='message alert-danger state-error'>Nous n'avons pas réussi à ajouter votre adresse à la liste</em>";
      echo json_encode($t);
      die();
    }else{
      $t['successMessage'] = "<p class='message sucess alert-success' >Inscription réussie</p>";
      echo json_encode($t);
      die();
    }


    die();
  }



}

?>
