<?php

/**
*
*
* créer une liste d'email et de l'exporter
*
*/
class AbListEmail{

  private $table;
  private $date;

  function __construct(){
    global $wpdb;
    $this->table = $wpdb->prefix . "ab_mail_list";
    $this->date = date("Y-m-d G:i:s");

  }


  /**
  * [Verifie et enregistre l'email]
  * @param  [string]  $email
  * @return boolean
  */
  public function register_email($email){

    if($this->is_valid_email($email) && $this->is_new_email($email)){
      $this->record_email($email);
      do_action( 'abml_after_email_record', $email);
      return array('status' => "success");
    }elseif(!$this->is_new_email($email)){
      return array('status' => "error", 'error_message' => "Vous êtes déja inscrit");
    }

  }


  /**
  * [Verifie la présence d'un mail dans la bdd]
  * @param  [string]  $email
  * @return boolean
  */
  public function is_new_email($email){
    global $wpdb;
    $result = $wpdb->get_results( "SELECT * FROM $this->table WHERE email = '".$email."' ");
    if(!empty($result)){
      return false;
    }else{
      return true;
    }
  }


  /**
  * [enregistre l'email dans la bdd]
  * @param  [string] $email
  * @return [none]
  */
  private function record_email($email){

    global $wpdb;
    $strQuery = "INSERT INTO ".$this->table." (email, date) VALUES ( %s, %s)";
    $wpdb->query( $wpdb->prepare( $strQuery, $email, $this->date ));

  }



  /**
  * [Verifie si un email est valide]
  * @param  [string] $email
  * @return [bool]
  */
  private function is_valid_email($email){
    return (filter_var($email , FILTER_VALIDATE_EMAIL)) ? true :  false;
  }



  /**
  * [Retourne toutes les adresses emails]
  * @return array
  */
  public function get_all_email(){
    global $wpdb;
    $result = $wpdb->get_results( "SELECT * FROM $this->table");
    return $result;
  }


  /**
  * [Supprime toute les adresse email]
  * @return array
  */
  public function delete_all(){

    global $wpdb;
    $wpdb->query("DELETE FROM $this->table");

  }


}
