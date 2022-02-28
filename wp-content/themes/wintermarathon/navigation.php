<header>
    <div class="menu_background">
        <div id="nav-icon-container"><img id="nav_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/navi/Menue.svg" alt="Navigation"><img id="close_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/navi/close.svg" alt="close navigation">
            <p id="nav_text">Menü</p>
        </div>
        <div id="nav" class="closed">
            <ul>
                <?php
                $options =  array(
                    'menu' => 'Top-Menu',
                    'items_wrap' => '%3$s',
                    'echo' => false,
                    'depth' => 1,
                    'container' => false,
                    'fallback_cb' => 'wp_page_menu',
                    'walker' => new wp_bootstrap_navwalker()
                );
                echo wp_nav_menu($options);
                ?>
            </ul>
        </div>
        <div class="clear"></div>
    </div><a href="<?=bloginfo('url');?>" class="logo_background"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/logo.svg" alt="nav_icon"></a>
    <div class="green_background">
        <h1 class="datum"><?php echo get_option( 'cpa_settings_options' )['txt_headerdate']; ?></h1>
    </div>
    <div class="clear"></div>
</header>