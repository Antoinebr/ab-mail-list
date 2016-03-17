<?php
function ab_mail_list_scripts() {

  wp_enqueue_script( 'ab-mail-list', plugins_url( '/js/form_newsletter.js' , dirname(__FILE__) ), array('jquery'), '1.10.0', true );
  wp_localize_script('ab-mail-list', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
add_action( 'wp_enqueue_scripts', 'ab_mail_list_scripts' );

?>
