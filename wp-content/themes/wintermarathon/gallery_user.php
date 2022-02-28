<?php
/**
 *
 *
 * /**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 *
 *
 *
 *
 * Created by PhpStorm.
 * User: mabraham
 * Date: 24.02.16
 * Time: 10:52
Script um die Daten der Gallery auszulesen und in die Datenbank zu schreiben.
 */
require( realpath('../../../').'/wp-load.php' );
global $wpdb;
$table_name = $wpdb->prefix . 'gallery_user';
get_header();
$op=$_REQUEST['op'];
$name=$_REQUEST['name'];
$vorname=$_REQUEST['vorname'];
$email=$_REQUEST['email'];
$error=0;
    $wpdb->insert(
        $table_name,
        array(
            'vorname' => $vorname,
            'nachname' => $name,
            'mail' => $email
        )
    );
?>