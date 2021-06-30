<?php


/**
 * @package ContactUS
 * @version 1.0.0
 */
/*
Plugin Name: ContactUS
Description: this is a contactUS plugin that sends the users messages to your mail and save them in the database.
Author: Achraf ETTGHARSSI
Version: 1.0.0
*/


//supprimer les informationde headers

function reaload_headers()
{
    ob_start();
} 
add_action('init', 'reaload_headers');

//creation de la table contact en paraléle avec l'activation de plugin
function create_table(){

  global $wpdb;
  $table=$wpdb->prefix.'ContactUs';
  $wpdb->query( "CREATE TABLE IF NOT EXISTS $table(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, fullname varchar(255) NOT NULL, email varchar(55) NOT NULL,subjecte varchar(55) NOT NULL, content varchar(255) NOT NULL)");
  }
  register_activation_hook(__FILE__,'create_table');

//supprision de la table contact en paraléle avec l'activation de plugin

function Drop_table(){
  global $wpdb;
  $table=$wpdb->prefix.'ContactUs';
  $wpdb->query( "DROP TABLE if exists $table");  
  }
  register_uninstall_hook( __FILE__,'Drop_table');



function Plugin_Form_ContactUs(){
    include_once('form.php');
    
}

add_shortcode('Form_ContactUs','Plugin_Form_ContactUs');


function admin_dashbord(){
    add_menu_page('forms','Contact','manage_options','contact-dashbord','dashbord_admin_contact','dashicons-email',4);
}
add_action('admin_menu','admin_dashbord');
function dashbord_admin_contact(){
    require_once('dashbord.php');
}