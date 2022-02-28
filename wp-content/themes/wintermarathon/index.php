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

	<?php get_template_part( 'navigation'); ?>

	<?php if ( have_posts() ) : ?>

		<?php if($post->post_type == "post_news") {
			?>

			<div id="content-article">
				<div class="article">
					<img src="<?php echo CFS()->get('picture') ?>" alt="Article" class="article-image">
					<div class="copyright-line"><?php echo CFS()->get('author') ?></div>
					<div class="article-text">
						<h3><?php the_title(); ?></h3>
						<div class="text-block"><?php echo wpautop($post->post_content, true); ?></div>
						<p class="ellipsis">...</p>
					</div>
					<div class="expander"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/navi/plus.svg" alt="Plus">
						<div class="clear"></div>
					</div>
					<div class="share-plus-reducer">
						<?php if(CFS()->get("facebook")): ?>
							<div class="fb-share-container"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="window.open(this.href, 'mywin', 'left=20,top=20,width=700,height=400,toolbar=1,resizable=0'); return false;">Teilen</a></div>
						<?php endif; ?>
						<div class="reducer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/navi/minus.svg" alt="Minus">
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>

		<?php
		} else if($post->post_type == "post_results") {
			echo '<div id="content-results" class="content">';
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
			#echo '</div>';
		} else { ?>
			<div id="content-infopage" class="content">
				<h2><?php the_title(); ?></h2>
				<div id="info-area">
					<div class="text-block">
						
						<?php # echo wpautop($post->post_content, true); ?>
						
						<?php echo wpautop(apply_filters('the_content', $post->post_content ), true);?>
					
					
						
						
						<?php # Bastelei ?>
						
						
						<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
				
				
				
			#while ( have_posts() ) :
				
				
				#the_post();
				#echo wpautop(apply_filters('the_content', $post->post_content ), true);

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				#get_template_part( 'content', get_post_format() );

				// End the loop.
			#endwhile;

			

			// If no content, include the "No posts found" template.
		else :
			#get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
						
						
						<?php # Bastelei ?>		
						
						<?php # echo $post->post_type ?>
					
					</div>
				</div>
			</div>

		<?php
		}

		?>


	<?php
	// If no content, include the "No posts found" template.
	else :
		get_template_part( 'content', 'none' );
	endif;
	?>

</div>


<?php get_footer(); ?>