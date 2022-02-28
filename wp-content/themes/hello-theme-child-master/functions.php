<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.1'
	);

	/*
    wp_enqueue_style(
        'slick-carousel-style',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
        [
            'lick-carousel-style',
        ],
        '1.8.1'
    );
	*/
	
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts' );


//require_once('custom-widgets/my-widgets.php');

function typed_script_init() {

	/*
  	wp_enqueue_script( 'typedJS', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery') );


	 * wp_enqueue_script( 'raceResult', 'https://my.raceresult.com/RRPublish/load.js.php?lang=de');
	*/

}

add_action('wp_enqueue_scripts', 'typed_script_init');


function typed_init() {
/*
    echo '<script>
            jQuery(document).ready(function(){
                jQuery(\'.blog_holder .elementor-posts \').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay:true,
                });
            });
        </script>';
*/
}



//add_action('wp_footer', 'typed_init');

/*test */


add_filter( 'adverts_form_load', 'my_adverts_form_load', 10, 1 );

function my_adverts_form_load( $form ) {
    if( $form["name"] != "advert" ) {
        return $form;
    }
    foreach( $form["field"] as $k => $f ) {


       // echo '<pre>a:  '; print_r ($f["name"]);echo '</pre>';

        if( $f["name"] == "adverts_email" ) {
           $form["field"][$k]["label"] = 'E-Mail';
        }

        if( $f["name"] == "post_title" ) {
            $form["field"][$k]["label"] = 'Titel der Suche';
        }


        if( $f["name"] == "adverts_price" or $f["name"] == "adverts_location" or $f["name"] == "gallery") {
            unset( $form["field"][$k] );
        }
    }
    return $form;
}


add_filter( 'adverts_form_load', 'my_adverts_form_load02', 12, 1 );

function my_adverts_form_load02( $form ) {
    if( $form["name"] != "search" ) {
        return $form;
    }

    foreach( $form["field"] as $k => $f ) {
        //echo '<pre>a:  '; print_r ($f["name"]);echo '</pre>';

        if( $f["name"] == "location") {
            unset( $form["field"][$k] );
        }
    }
    return $form;
}


add_filter( "adverts_css_classes", "my_adverts_css_classes", 10, 2);
function my_adverts_css_classes( $classes, $post_id ) {
    $terms = wp_get_post_terms( $post_id, 'advert_category' );
    foreach( $terms as $key => $term ) {
        $classes .= " alist-item-cat-" . $term->term_id;
    }
    return $classes;
}


add_filter( 'login_url', 'another_login_url', 10, 2);
function another_login_url( $force_reauth, $redirect ){
    $login_url = 'https://wintermarathon.de/auth/login';

    if ( !empty($redirect) )
        $login_url = add_query_arg( 'redirect_to', urlencode( $redirect ), $login_url );

    if ( $force_reauth )
        $login_url = add_query_arg( 'reauth', '1', $login_url ) ;

    return $login_url ;
}


function own_lostpassurl($lostpassword_url, $redirect ) {
    return 'https://wintermarathon.de/auth/lostpassword/';
}
add_filter('lostpassword_url', 'own_lostpassurl', 10, 2);
