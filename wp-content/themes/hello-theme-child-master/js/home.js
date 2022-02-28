/*! wintermarathon-static - v0.1.0-SNAPSHOT - 2016-02-12 */$(document).ready(function() {

    $("div.expander").click(function(event) {
        expandArticle($(event.target).parent().parent());
    });

    $('#article-carousel').slick({
        arrows: false,
        dots: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: true
    });

    $('#archive-carousel').slick({
        infinite: true,
        slidesToShow: 2,
        arrows: false,
        dots: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: true,
        responsive: [
            {
                breakpoint: 721,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    $('#partner-carousel').slick({
        infinite: true,
        slidesToShow: 4,
        arrows: false,
        dots: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: true,
        responsive: [
            {
                breakpoint: 721,
                settings: {
                    slidesToShow: 3
                }
            }
        ]
    });




    // Gallery Addon
    $('#gallery-carousel').slick({
        infinite: true,
        slidesToShow: 3,
        arrows: false,
        dots: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: true,

        responsive: [
            {



                breakpoint: 721,
                settings: {
                    slidesToShow: 1
                }
            }
        ]

    });


    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s); js.id = id;
        var appId = $(".fbFeet").attr("data-app-id");
        js.src = "https://connect.facebook.net/de_DE/sdk.js#xfbml=1&appId=" + appId + "&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    (function() {
        if (window.location.href.indexOf('#') !== -1) {
            var hashes = window.location.href.slice(window.location.href.indexOf('#'));
            if (hashes === '#course') {
                $(window).scrollTop($('#course').position().top);
            }
            else if (hashes === '#archive-carousel-container') {
                $(window).scrollTop($('#archive-carousel-container').position().top);
            }
        }
    }());

    function expandArticle($article) {

        var $carousel = $article.parent().parent().parent().parent();
        var $container = $carousel.parent();

        $carousel.slickPause();

        var $layer = $("#article-layer");
        var posTop = $("#content-head").position().top;

        $layer.empty();
        $article.clone().appendTo("#article-layer");
        $layer.height($("body").height());

        var $layerArticle = $layer.find(".article");

        $layerArticle.find('.wufoo-button').click(function(event) {
            wufoo($(event.target));
        });

        $layerArticle.css( "top", posTop);
        $layer.css( "display", "block");
        $(window).scrollTop(0);

        $("div.reducer").click(function() {
            closeLayer();
        });

        $layer.click(function(event) {
            if ($(event.target)[0] == $layer[0]) {
                closeLayer();
            }
        });

        $( document ).on( 'keydown', function ( e ) {
            if ( e.keyCode === 27 ) {
                closeLayer();
            }
        });

        function closeLayer() {
            $layer.css( "display", "none");
            $carousel.slickPlay();
            $(window).scrollTop($container.position().top);
        }

        function wufoo($button) {
            var id = $button.attr("id");
            var $form = $button.parent().parent().find(".wufoo-container");
            console.log($button, $form, id);

            $form.html('<div id="wufoo-' + id + '" class="wufoo-form"></div>');
            $button.css("display", "none");
            $form.css("display", "block");

            (function (d, t) {
                var s = d.createElement(t), options = {
                    'userName': 'exaonline',
                    'formHash': id,
                    'autoResize': true,
                    'height': '661',
                    'async': true,
                    'host': 'wufoo.com',
                    'header': 'show',
                    'ssl': false
                };
                s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
                s.onload = s.onreadystatechange = function () {
                    var rs = this.readyState;
                    if (rs)
                        if (rs != 'complete')
                            if (rs != 'loaded')
                                return;
                    try {
                        id = new WufooForm();
                        id.initialize(options);
                        id.display();
                    } catch (e) {
                    }
                };
                var scr = d.getElementsByTagName(t)[0], par = scr.parentNode;
                par.insertBefore(s, scr);
            })(document, 'script');
        }
    }
});





