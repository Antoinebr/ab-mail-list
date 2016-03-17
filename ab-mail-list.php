<?php
/**
* Plugin Name: AB Mail List
* Plugin URI: http://antoinebrossault.com
* Description: Ce plugin permet créer une liste d'email et de l'exporter
* Version: 1
* Author: Antoine Brossault
*/


/**
*  Installation des tables
*/
require ('class/AbListEmailInstall.php');

function ab_mail_list_install(){
  $install = new AbListEmailInstall(); $install->install_table();
}
register_activation_hook( __FILE__, 'ab_mail_list_install');


/**
*  Supression des tables
*/
function ab_mail_list_uninstall(){
  $install = new AbListEmailInstall(); $install->uninstall_table();
}
register_uninstall_hook( __FILE__, 'ab_mail_list_uninstall');



/**
* Register page admin
*/
require 'register/admin_page.php';

/**
* Chargement de la class de gestion des emails
*/
require 'class/AbListEmail.php';


/**
* Chargement des actions d'exports
*/
include('exports/init.php');


/**
* Chargement du widget
*/
require 'widget/widget_newsletter.php';


/**
* Chargement des actions AJAX
*/
require 'ajax/form_newsletter.php';


/**
* Chargement du script js
*/
require 'register/scripts.php';
