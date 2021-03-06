<?php

function wm_setup() {
    register_nav_menus(
        array(
            'top_menu' => __( 'Top Menu', 'wintermarathon' )
        )
    );
}
add_action( 'after_setup_theme', 'wm_setup' );

/* Register menus */
function wm_register_theme_menu() {
    register_nav_menu( 'footery', 'Footery Navigation Menu' );
}
add_action( 'init', 'wm_register_theme_menu' );


// Register Custom Navigation Walker
//require_once('nss_navwalker.php');
//require_once('nss_menu_walker.php');
require_once('wp_bootstrap_navwalker.php');




add_filter('post_gallery','customFormatGallery',10,2);

function customFormatGallery($string,$attr){

    $output = "";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
        $output .= '<div class="logo-container"><a href="' . $imagePost->post_content . '" target="_blank"><img src="' . wp_get_attachment_image_src($imagePost->ID)[0] . '" alt="eXa-online"></a></div>';
    }

    return $output;
}






//Custom Theme Settings
add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
    add_options_page('Global Custom Fields', 'Global Custom Fields', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
    ?>
    <div class='wrap'>
        <h2>Global Custom Fields</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>

            <p><strong>Datum (Header):</strong><br />
                <input type="text" name="headerdate" size="45" value="<?php echo get_option('headerdate'); ?>" /></p>

            <p><input type="submit" name="Submit" value="Update Options" /></p>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="headerdate" />

        </form>
    </div>
    <?php
}



add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'post_news',
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'News' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'news'),
        )
    );
    register_post_type( 'post_results',
        array(
            'labels' => array(
                'name' => __( 'Ergebnisse' ),
                'singular_name' => __( 'Ergebnisse' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'results'),
            #'rewrite' => array('slug' => 'ergebnis'),
        )
    );
}






if (!is_admin()){


    // goodbye NextGen junk
    define('NGG_SKIP_LOAD_SCRIPTS', true);
    function nextgen_styles() {
        wp_deregister_style('NextGEN');
    }
    add_action('wp_print_styles', 'nextgen_styles', 100);
    add_action( 'wp_print_scripts', 'de_script', 101 );


}





function de_script() {
    wp_dequeue_script( 'jquery' );
    wp_deregister_script( 'jquery' );


}

#add_action('wp_print_styles', 'nextgengallery_removeStyle');
#add_filter('show_nextgen_version', '__return_null');
#define('NGG_SKIP_LOAD_SCRIPTS', true);


class WP_HTML_Compression {
    protected $compress_css = true;
    protected $compress_js = true;
    protected $info_comment = true;
    protected $remove_comments = true;

    protected $html;
    public function __construct($html) {
        if (!empty($html)) {
            $this->parseHTML($html);
        }
    }
    public function __toString() {
        return $this->html;
    }

    protected function minifyHTML($html) {
        $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
        preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
        $overriding = false;
        $raw_tag = false;
        $html = '';
        foreach ($matches as $token) {
            $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
            $content = $token[0];
            if (is_null($tag)) {
                if ( !empty($token['script']) ) {
                    $strip = $this->compress_js;
                }
                else if ( !empty($token['style']) ) {
                    $strip = $this->compress_css;
                }
                else if ($content == '<!--wp-html-compression no compression-->') {
                    $overriding = !$overriding;
                    continue;
                }
                else if ($this->remove_comments) {
                    if (!$overriding && $raw_tag != 'textarea') {
                        $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
                    }
                }
            }
            else {
                if ($tag == 'pre' || $tag == 'textarea') {
                    $raw_tag = $tag;
                }
                else if ($tag == '/pre' || $tag == '/textarea') {
                    $raw_tag = false;
                }
                else {
                    if ($raw_tag || $overriding) {
                        $strip = false;
                    }
                    else {
                        $strip = true;
                        $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
                        $content = str_replace(' />', '/>', $content);
                    }
                }
            }
            if ($strip) {
                $content = $this->removeWhiteSpace($content);
            }
            $html .= $content;
        }
        return $html;
    }
    public function parseHTML($html) {
        $this->html = $this->minifyHTML($html);

    }
    protected function removeWhiteSpace($str) {
        $str = str_replace("\t", ' ', $str);
        $str = str_replace("\n",  '', $str);
        $str = str_replace("\r",  '', $str);
        while (stristr($str, '  ')) {
            $str = str_replace('  ', ' ', $str);
        }
        return $str;
    }
}
function wp_html_compression_finish($html) {
    return new WP_HTML_Compression($html);
}
function wp_html_compression_start() {
    ob_start('wp_html_compression_finish');
}





#add_action('get_header', 'wp_html_compression_start',9999);


?>
