window.onload = function(){loadFrame()};

window.onresize = function(){resizeWindow()};

$(document).ready(function() {

    $(document).bind('keydown','f2', function() {
        reloadFrame();
    });

    resizeFrame();
});
