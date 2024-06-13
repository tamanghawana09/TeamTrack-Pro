<?php
    /**
     * Plugin Name: Details Plugin
     * Description: This plugin is to store the details of the employee
     * Version: 1.0
     * Author Hawana Tamang
     */

     if(!defined('ABSPATH')){
        exit();
     }

function details_plugin_activation(){
    global $wpdb, $table_prefix;
    $wp_emp_details = $table_prefix . 'emp';

    $create_sql = "CREATE TABLE IF NOT EXISTS `wp_emp_details` (`ID` INT(55) NOT NULL AUTO_INCREMENT , `full_name` VARCHAR(100) NOT NULL , `position` VARCHAR(100) NOT NULL , `address` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `contact_no` VARCHAR(100) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

    $wpdb->query($create_sql);
}
register_activation_hook(__FILE__, 'details_plugin_activation');
