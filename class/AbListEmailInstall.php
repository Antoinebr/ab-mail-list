<?php
class AbListEmailInstall{
  private $table;

  public function __construct(){
    $this->set_table();
  }

  private function set_table(){
    global $wpdb;
    $this->table = $wpdb->prefix."ab_mail_list";
  }

  public function install_table(){
    global $wpdb;
    // Create the Database table if its not all ready their.
    if($wpdb->get_var("show tables like '".$this->table) != $this->table) {
      $charset_collate = $wpdb->get_charset_collate();

      $sql = "CREATE TABLE $this->table (
        id int(11) NOT NULL AUTO_INCREMENT,
        email varchar(255) CHARACTER SET utf8 NOT NULL,
        date datetime NOT NULL,
        PRIMARY KEY (`id`)
      )$charset_collate;";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );
    }
  }

  public function uninstall_table(){
    if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();
    global $wpdb;
    $wpdb->query( "DROP TABLE IF EXISTS $this->table" );
    //delete_option("my_plugin_db_version");
  }

}
