<?php /* Template Name: Gallery Seite */
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 * document.cookie = cname + "=" + cvalue + ";" + expires + "; " +domain+" ;path=/";
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */


$gallery = $post->gallery_id;
$gallery_anzeigen = $post->gallery_show;
$fotograph = $post->fotograf;

$page_id=get_the_id()  ;
get_header();




?>
<div id="content-container">
    <?php get_template_part('navigation'); ?>
<div id="content-infopage" class="content">
    <h2>Fotos</h2>
    <div id="info-area">
        <div class="photo-index">
            <div id="gallery-area">


<?php

echo the_content();

if (function_exists('gallery_page')) {
        if ($gallery_anzeigen== TRUE){

        gallery_page($gallery, $fotograph, $page_id);
          }
else {
      echo '<p><strong>Keine Fotogalerie aktiv!</strong></p><p style="padding-bottom: 50px;"><br>Pr&uuml;fen Sie im Backend die Einstellungen</p>';
      }
                } else {
    echo '<p><strong>Plugin nicht vorhanden oder nicht aktiv!</strong></p><p style="padding-bottom: 50px;"><br>Pr&uuml;fen Sie im Backend die Einstellungen</p>';
}
?>
       </div>
        </div>
    </div>
    <?php
get_footer(); ?>
