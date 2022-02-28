/*! wintermarathon-static - v0.1.0-SNAPSHOT - 2016-02-12 */$(document).ready(function() {

    $("#nav-icon-container").click(function() {
        handleNav();
    });

    $("div.wufoo-button").click(function(event) {
        loadWufoo($(event.target));
    });

    function handleNav() {

        var $nav = $('#nav');

        if ($nav.attr("class") === "closed") {

            $nav.attr("class", "open");
            $('#nav_icon').css("display", "none");
            $('#close_icon').css("display", "inline-block");

            $('.content').click(function() {
                closeNav();
            });

            $('.menu-link a').click(function() {
                closeNav();
            });

            $( document ).on( 'keydown', function ( e ) {
                if ( e.keyCode === 27 ) {
                    closeNav();
                }
            });
        }
        else {
            closeNav();
        }

        function closeNav() {
            $nav.attr("class", "closed");
            $('#close_icon').css("display", "none");
            $('#nav_icon').css("display", "inline-block");
        }
    }

    function loadWufoo($button) {
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

    //$("#gallerySelect").selectmenu();

    $(".fancybox").fancybox({
        closeBtn: false,
        padding: 0,
        maxWidth: 800,
        width: 800,
        autoWidth: false,
        autoHeight: false,
        autoSize: false,
        scrolling: 'no',
        helpers:  {
            title : {
                type : 'inside'
            },
            overlay : {
                showEarly : false
            }
        }
    });



    // init vars for images and gallery
    var _itemWidth = 150;
    var _offset = 20;

    /*
    $('.wookmark-gallery img').each(function() {
        var _image = $(this);
        var _src = $("meta[name=thumb]", _image.parent()).attr("content");
        var downloadingImage = new Image();
        var _width = _itemWidth;
        var _height;
        var _attr = "";

        downloadingImage.onload = function(){
            _image.attr("src", downloadingImage.src);
        };
        downloadingImage.src = _src;

        for(var i = 0; i < 5 && (_attr === "" || _attr.indexOf("NaN") > 0); i++) {
            _height = (downloadingImage.height / downloadingImage.width) * _width;
            if(_height > 220 && _height <= 225) {
                _height = 220;
            }
            _attr = "width:" + _width + "px;height:" + _height + "px;";
        }

        if(_attr.indexOf("NaN") < 0) {
            _image.attr("style", _attr);
        } else {
            _image.attr("style", "width:" + _width + "px;height:100px;");
        }
    });/**/

    var _query = $('.wookmark-gallery img');
    var _images = new Array(0);
    // Array.prototype.slice.call is not callable under our lovely IE8
    for (var i = 0; i < _query.length; i++) {
        _images.push(_query[i]);
    }

    function elementInViewport(el) {
        if(el !== undefined) {
            var rect = el.getBoundingClientRect();

            return (rect.top >= 0 && rect.left >= 0 && rect.top <= (window.innerHeight || document.documentElement.clientHeight));
        } else {
            return false;
        }
    }

    function loadImage(el) {
        if(el !== undefined) {
            var img = new Image(),
                src = el.getAttribute('data-src');
            if(src === null && $("meta[name=thumb]", el.parentNode).length) {
                src = $("meta[name=thumb]", el.parentNode).attr("content");
            }
            img.onload = function() {
                if (!! el.parent)
                    el.parent.replaceChild(img, el);
                else
                    el.src = src;
            };
            img.src = src;
        }
    }

    function processScroll() {
        var i = 0,
            splice = function(j) {
                _images.splice(j, j);
            };
        while(i < _images.length) {
            if (elementInViewport(_images[i])) {
                loadImage(_images[i]);
                _images.splice(i, 1);
            } else {
                i++;
            }
        }
    }

    processScroll();
    window.addEventListener('scroll', processScroll);

    $('.wookmark-gallery').wookmark({
        itemWidth: _itemWidth.toString(),
        offset: _offset,
        flexibleWidth: function() {
            var _width = $('.wookmark-gallery').width() - 20;
            if(_width < (_itemWidth * 2) + _offset) {
                return (_width - _offset) / 2;
            }
            return _itemWidth;
        }
    });

    var wrapper = $(".article-image-wrapper");
    var timer = false;
    var delay = 200;

    function setArticleHeight15x8() {
        wrapper = $(".article-image-wrapper");

        if(timer) {
            clearInterval(timer);
            timer = false;
        }
        wrapper.each(function() {
            var image = $(".article-image", $(this));
            var width = $(this).width();
            var height = (width / 15 * 8);

            $(this).css("height", height + "px");
            if(image.height() >= height) {
                var top = (image.height() - height) / (-2);

                if(top < 0) {
                    image.css("top", top + "px");
                }
            }
            else {
                var left;
                image.css("height", height + "px");
                image.css("width", "auto");
                if(image.width() >= width) {
                    left = (image.width() - width) / (-2);
                    if(left < 0) {
                        image.css("left", left + "px");
                    }
                } else {
                    image.removeAttr("style");
                }
            }
        });
    }

    if(wrapper.length) {
        timer = setInterval(checkResize, delay);
    }

    function checkResize() {
        var width = $(".article-image", wrapper).width();
        var wrapperWidth = wrapper.width();

        if(width == wrapperWidth) {
            setArticleHeight15x8();
        }
    }

    $(window).resize(function() {
        if(wrapper.length) {
            if(timer) {
                clearInterval(timer);
                timer = false;
            }
            timer = setInterval(checkResize, delay);
        }
    });


    //$('iframe').iFrameResize( {log:true} );


    loadDeferred(".js_deferredImg");


});


/**
 * Use this to load elements not on page load (deferred), for example for images or iframes below the fold.
 * Each element with the class js_deferredImg will be loaded shortly before it enters the viewport.
 * For each element this event is fired only once, then the assigned scrollMonitor is destroyed.
 * On success the element will be added the class isLoaded. Use this class for fade-in animations or something
 * like that.
 * If the element is already inside the viewport, load it immediately.
 * Of cause the scrollMonitor plugin is mandatory!
 */
function loadDeferred(el) {

    var loadDeferredElements = function (el) {
        el.attr("src", el.data("src"));
        el.one("load", function () {
            $(this).addClass("isLoaded");
        });
    };

    var isInsideViewport = function (el) {
        var top = $(window).scrollTop();
        var bottom = top + $(window).height();
        var elTop = el.offset().top;
        var elBot = elTop + el.parent().height(); //use the height of the parent
        if (elTop > top && elTop < bottom ||
            elBot > top && elBot < bottom) {
            return true;
        }
        return false;
    };


    $(el).each(function(){
        var el = $(this);
        if(isInsideViewport(el)){
            loadDeferredElements(el);
        }
        else {
            //Using the parent here is better when starting from the bottom and scrolling up.
            scrollMonitor.create($(this).parent(), 0).enterViewport(function () {
                loadDeferredElements(el);
                this.destroy();
            });
        }
    });
}