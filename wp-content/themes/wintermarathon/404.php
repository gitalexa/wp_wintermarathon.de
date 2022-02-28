<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php get_header(); ?>

<div id="content-container">

	<?php get_template_part( 'navigation'); ?>

	<div id="content-infopage" class="content">
		<h2>Seite nicht gefunden!</h2>
		<div id="info-area">
			<div class="info-comp">
				<div class="text-block">
					<p>Die angegebene Seite wurde leider nicht gefunden. <a href="/">Zurück zur Startseite?</a></p>
				</div>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>