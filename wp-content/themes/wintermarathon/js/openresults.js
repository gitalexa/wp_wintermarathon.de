$(document).ready(function() {
    $(".result-expander").click(function(event) {
        expandResult($(event.target).parent().parent());
    });

    function expandResult($result) {
        var $layer = $result.find(".result-layer");
        $layer.show();
        //$("body").css("overflow", "hidden");
        $(window).scrollTop(0);

        $(".reducer").click(function () {
            closeResultLayer();
        });

        $layer.click(function (event) {
            if ($(event.target)[0] == $layer[0]) {
                closeResultLayer();
            }
        });

        $(document).on('keydown', function (e) {
            if (e.keyCode === 27) {
                closeResultLayer();
            }
        });

        function closeResultLayer() {
            $layer.hide();
            $("body").css("overflow", "auto");
        }
    }
});