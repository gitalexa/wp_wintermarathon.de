<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

    <footer>
        <div class="imprint">
            <div class="socialIcon"><a href="https://www.facebook.com/pages/Wintermarathon/122058981230441" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/social_icon/facebook.svg" alt="nav_icon"></a></div>
            <article>
                <p class="dark">© <?php echo strftime("%Y"); ?> Laufgemeinschaft eXa e.V.</p>
                <h5>Kontakt</h5>
                <p class="dark">LG eXa Leipzig e.V.<br>Drosselnest 4<br>04288 Leipzig<br>E-Mail    info(at)lg-exa.de<br>Telefon    034297 - 904120<br>WWW:&nbsp;<a href="https://www.lg-exa.de" target="_blank" title="Homepage LG eXa e.V. Leipzig" rel="nofollow">www.lg-exa.de</a><br>Design:&nbsp;<a href="http://www.exa-online.de" title="eXa-online GmbH Leipzig" target="_blank">eXa-Online GmbH</a></p>
               <?php
                wp_nav_menu( array(
                'menu' => 'Footer'
                ) );
?>
            </article>

        </div>
    </footer>
</div>

<?php wp_footer(); ?>

<script defer type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script defer type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script defer type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/static/js/wookmark.js"></script>
<script defer type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/static/js/jquery.fancybox.js"></script>
<script defer type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/static/slick/slick.min.js"></script>
<script defer type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/static/js/main.js"></script>
<script defer type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/static/js/home.js"></script>
<script defer type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/static/js/certification.js"></script>
<script defer type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/static/js/vendor/jspdf.min.js"></script>
<!-- <script defer type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/openresults.js"></script> -->

<?php get_template_part( 'global/analytics' ); ?>
</body>
</html>
