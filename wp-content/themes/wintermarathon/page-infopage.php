<?php /* Template Name: Infopage */ ?>

<?php
/**
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
 */
?>

<?php get_header(); ?>

<div id="content-container">

    <?php get_template_part('navigation'); ?>

    <div id="content-infopage" class="content">
        <h2><?php the_title(); ?></h2>
        <div id="info-area">
            <?php //content
            if(!empty($post->post_content)) {
                echo wpautop($post->post_content, true);
            }

            $loop = CFS()->get('eintraege');

            foreach ( $loop as $row ) {
                echo '<div class="info-comp">';

                echo '<p class="info-headline">' . $row['eintrag'] . '</p>';
                echo '<div class="break"><p>' . $row['inhalt'] . '</p></div><div class="clear_spezi"></div></div>';
                if($row['trennstrich']) {
                    echo '<div class="line-comp"></div>';
                }
            }

            ?>


            <?php

            if(CFS()->get("iframe_adresse")) { ?>
                <div class="iframe-comp">
                    <iframe width="100%" height="<?php echo (CFS()->get("iframe_height") ? : "500"); ?>px" frameborder="0" allowtransparency="true" scrolling="auto" name="iFrame" data-css="" src="<?php echo CFS()->get("iframe_adresse") ?>"></iframe>
                    <div class="clear_spezi"></div>
                </div>
            <?php
            }

            ?>
        </div>
    </div>


<?php get_footer(); ?>
