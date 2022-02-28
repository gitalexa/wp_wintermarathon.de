<?php /* Template Name: Results */ ?>

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

    <div id="content-results" class="content">
        <h2><?php the_title(); ?></h2>

            <?php //content

            // Registration Teaser Post
            $args = array ( 'post_type' => 'post_results', 'posts_per_page' => 200, 'orderby' => 'title', 'order' => 'DESC');
            //$args = array ( 'post_type' => 'post_results', 'posts_per_page' => 5);
            $myposts = get_posts( $args );

            #print_r($myposts);
            #die();
            ?>



            <?php foreach( $myposts as $post ) : setup_postdata($post); ?>
                <?php
                $loop = CFS()->get('results', $post->ID);
                if(get_post_meta( $post->ID, 'result_select', true )) {
                    echo '<div id="latest-results">';
                    get_template_part( 'template-parts/content', "results-men" );
                    get_template_part( 'template-parts/content', "results-women" );
                    get_template_part( 'template-parts/content', "results-mixed" );
                    get_template_part( 'template-parts/content', "results-single" );
                    echo '</div>';
                }
                if($loop && sizeof($loop) > 0) {
                    echo '<div id="older-results"><div class="older-results-comp">';
                    echo '<h3>' . $post->post_title . '</h3><ul class="result-links">';

                    foreach ( $loop as $row ) {
                        if($row["text"] && $row["link"])
                        echo '<li><a href="' . $row["link"] . '">' . $row["text"] . '</a></li>';
                    }

                    echo '</ul></div></div>';
                }
                ?>
                <?php wp_reset_postdata(); ?>

            <?php endforeach; ?>

    </div>


<?php get_footer(); ?>
