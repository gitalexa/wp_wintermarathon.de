function loadFrame() {
    $('#style-pages').attr('src',sessionStorage.iFrameUrl);
    var width = sessionStorage.iFrameWidth;
    $('#content').width(width);
    writeSize(width);
}

function openPath(path) {
    var url = window.location.protocol + "//" + window.location.host + path;
    console.log ("load to iframe: " + url);
    $('#style-pages').attr('src',url);
    sessionStorage.iFrameUrl = url;
    showCode();
}

function changeWidthMenu(width) {

    var $codeContainer = $('#code-container');
    var $contentContainer = $('#content-container');

    if ($codeContainer.css("visibility") === 'visible' && $codeContainer.attr('class') === 'vertical-code' ) {

        if (width === 'auto') {
            closeCodeBox();
            changeWidthMenu('auto');
        }
        else {
            var codeWidth = $codeContainer.width() + $contentContainer.width() - parseInt(width);
            $contentContainer.width(width);
            $codeContainer.width(codeWidth);
        }
    }
    else {
        if (width === 'auto') {
            $('#content').width(width);
        }
        else {
            width = parseInt(width) + 10;
            width = width + "px";
            $('#content').width(width);
        }
    }
    writeSize(width);
}

function changeWidthInput() {

    var $codeContainer = $('#code-container');
    var $contentContainer = $('#content-container');
    var width = parseInt($('#size-input').val()) + 10;

    if ($codeContainer.css("visibility") === 'visible' && $codeContainer.attr('class') === 'vertical-code' ) {
        var diffWidth = $contentContainer.width() - width;
        $contentContainer.width(width);
        var codeWidth = $codeContainer.width() + diffWidth;
        $codeContainer.width(codeWidth);
    }
    else {
        $('#content').width(width);
        writeSize(width);
    }
}

function writeSize(width) {
    document.getElementById('size-input').value = document.getElementById('style-pages').scrollWidth;
    sessionStorage.iFrameWidth = width;
}

function openNewTab() {
    window.open($('#style-pages').attr('src'));
}

function resizeFrame() {

    var $codeContainer = $('#code-container');
    var $cover = $('#cover');

    // on "mousedown" store the click location
    $('#drag-bar-v').mousedown(function (event) {

        // capture default data
        var origClientX = event.clientX;
        var origFrameWidth = $('#style-pages').width();
        var origCodeWidth = $codeContainer.width();

        // make a hidden div visible so that it can track mouse movements and make sure the pointer doesn't get lost in the iframe
        $cover.css("display", "block");

        //resize frame without code-box or with code-box horizontal
        if ($codeContainer.css("visibility") === 'hidden' || $codeContainer.attr('class') === 'horizontal-code') {

            // on "mousemove" calculate the math
            $cover.mousemove(function (event) {

                var frameWidth = origFrameWidth + 2 * (event.clientX - origClientX);

                if (frameWidth > 200) {
                    var contentWidth = frameWidth + 10;
                    contentWidth += 'px';
                    $('#content').width(contentWidth);
                    writeSize(contentWidth);
                }
            });

            return false;
        }
        //resize frame with code-box vertical
        else if ($codeContainer.css("visibility") === 'visible' && $codeContainer.attr('class') === 'vertical-code' ) {

            $cover.mousemove(function (event) {

                var frameWidth = origFrameWidth + (event.clientX - origClientX);
                var codeWidth = origCodeWidth - (event.clientX - origClientX);
                if (frameWidth > 200 && codeWidth > 200) {
                    var contentWidth = frameWidth + 10;
                    contentWidth += 'px';
                    $('#content-container').width(contentWidth);
                    $codeContainer.width(codeWidth);
                    writeSize(width);
                }
            });

            return false;
        }
        else
            console.log("Fehler: visibility von #code-container ist weder hidden noch visible!");
            return false;
    });

    //same for horizontal drag-bar in horizontal code-mode
    $('#drag-bar-h').mousedown(function (event) {

        var origClientY = event.clientY;
        var origFrameHeight = $('#style-pages').height();
        var origCodeHeight = $codeContainer.height();

        $cover.css("display", "block");

        $cover.mousemove(function (event) {
            var frameHeight = origFrameHeight + (event.clientY - origClientY);
            var codeHeight = origCodeHeight - (event.clientY - origClientY);
            if (frameHeight > 100 && codeHeight > 100) {
                $('#content-container').height(frameHeight);
                $codeContainer.height(codeHeight);
            }
        });

        return false;
    });

    // on "mouseup" unbind the "mousemove" event and hide the cover again
    $('body').mouseup(function () {
        $cover.unbind('mousemove').css("display", "none");
    });
}

function resizeWindow() {

    var $codeContainer = $('#code-container');

    if ($codeContainer.css("visibility") === 'visible' && $codeContainer.attr('class') === 'vertical-code' ) {
        $('#content-container').width('calc(54% - 19px)');
        $codeContainer.width('46%');
    }

    writeSize('auto');
}
