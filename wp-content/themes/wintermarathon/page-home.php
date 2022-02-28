<?php /* Template Name: Startseite */ ?>

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

    <div id="content-home" class="content">
        <?php get_template_part("template-parts/content", "head") ?>


        <?php if ( have_posts() ) : ?>
            <?php
            // Registration Teaser Post
            $args = array ( 'category_name' => 'Registration Teaser', 'posts_per_page' => 1);
            $myposts = get_posts( $args );
            ?>
            <?php foreach( $myposts as $post ) : setup_postdata($post); ?>
                <?php get_template_part( 'template-parts/content', "registration" ); ?>
            <?php endforeach; ?>

            <?php
            // Infopage Teaser Post
            $args = array ( 'category_name' => 'Infopage Teaser', 'posts_per_page' => 1);
            $myposts = get_posts( $args );
            ?>
            <?php foreach( $myposts as $post ) : setup_postdata($post); ?>
                <?php get_template_part( 'template-parts/content', "infopage" ); ?>
            <?php endforeach; ?>

            <?php
            // News Article Posts
            $args = array ( 'post_type' => 'post_news', 'posts_per_page' => 6);
            $myposts = get_posts( $args );

            if(sizeof($myposts) > 0):
            ?>
            <div id="article-carousel-container">
                <div id="article-carousel">
                <?php foreach( $myposts as $post ) : setup_postdata($post); ?>
                    <?php get_template_part( 'template-parts/content', "article" ); ?>
                <?php endforeach; ?>
                </div>
                <div class="button-container"></div>
            </div>
            <?php endif; ?>

            <?php
            // Partner Logo Slider
            $args = array ( 'category_name' => 'Partner', 'posts_per_page' => 1);
            $myposts = get_posts( $args );
            ?>
            <?php foreach( $myposts as $post ) : setup_postdata($post); ?>
                <?php get_template_part( 'template-parts/content', "partner" );
                ?>
            <?php endforeach; ?>

            <?php
            // Course Post
            $args = array ( 'category_name' => 'Streckenverlauf', 'posts_per_page' => 1);
            $myposts = get_posts( $args );
            ?>
            <?php foreach( $myposts as $post ) : setup_postdata($post); ?>
                <?php get_template_part( 'template-parts/content', "course" ); ?>
            <?php endforeach; ?>

            <?php
            // News Archive Article Posts
            $args = array ( 'post_type' => 'post_news', 'posts_per_page' => 10);
            $myposts = get_posts( $args );

            if(sizeof($myposts) > 6):
                ?>
                <div id="archive-carousel-container">
                    <h3>Archiv</h3>
                    <div id="archive-carousel">
                        <?php foreach( $myposts as $key=>$post ) : setup_postdata($post); ?>
                            <?php if($key >= 6) get_template_part( 'template-parts/content', "article" ); ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="button-container"></div>
                </div>
            <?php endif;?>




            <?php
                // Gallery Slider
            // Infopage Teaser Post
            $args = array ( 'category_name' => 'Gallery Slider', 'posts_per_page' => 1);
            $myposts = get_posts( $args );
            ?>
                <div id="gallery-carousel-container">
                    <h3>Fotos</h3>
                    <div id="gallery-carousel">

                        <?php foreach( $myposts as $post ) : setup_postdata($post); ?>
                            <?php get_template_part( 'template-parts/content', "gallery" ); ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="button-container"></div>
                </div>








            <div id="article-layer" class="layer"></div>
        <?php
        endif;
        ?>
    </div>


<?php get_footer(); ?>
