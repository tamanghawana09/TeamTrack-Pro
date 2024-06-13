<?php
    /**
     * Plugin Name: Login Plugin
     * Description: This plugin is for the login and registration
     * Version: 1.0
     * Author: Hawana Tamang
     */
if(!defined('ABSPATH')){
    exit();
}
function login_plugin_activation(){
    global $wpdb , $table_prefix;
    $wp_emp = $table_prefix.'emp';

   $create_sql = "CREATE TABLE IF NOT EXISTS `wp_emp` (`ID` INT(55) NOT NULL AUTO_INCREMENT , `full_name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `password` VARCHAR(55) NOT NULL , `repassword` VARCHAR(55) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

   $wpdb->query($create_sql);


}
register_activation_hook(__FILE__, 'login_plugin_activation');