<?php /* Template Name: Impressum */ ?>

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


get_header(); ?>
<div id="content-container">
    <?php get_template_part('navigation'); ?>
    <div id="content-infopage" class="content">
    <h2><?php the_title(); ?></h2>

        <div id="info-area">
            <div class="text-block"><?php echo wpautop($post->post_content, true); ?></div>
        </div>
    </div>


<?php get_footer(); ?>
