function setHtmlActive() {

    var $tabHTML = $('#tab-html');
    var $tabJade = $('#tab-jade');

    if ($tabHTML.attr("class") === "tab-inactive") {
        $tabHTML.attr("class", "tab-active");
        $tabJade.attr("class", "tab-inactive");
        showCode();
    }
}

function setJadeActive() {

    var $tabHTML = $('#tab-html');
    var $tabJade = $('#tab-jade');

    if ($tabJade.attr("class") === "tab-inactive") {
        $tabJade.attr("class", "tab-active");
        $tabHTML.attr("class", "tab-inactive");
        showCode();
    }
}

function showCode() {
    var url = $('#style-pages').attr('src');

    if (url != undefined) {

        if ($('#tab-jade').attr("class") === "tab-active") {

            if (url.indexOf("/static/") !== -1) {
                url = window.location.protocol + "//" + window.location.host + "/menu/jade" + url.slice(url.indexOf("/styleguide/"), url.length - 4) + "jade";
            }
            else
                console.log("Achtung: Im Pfad fehlt /static/!");
        }

        var code = $.ajax({
            url: url,
            type: "GET",
            async: false}).responseText;

        if (code.indexOf("//**begin**") !== -1)
            code = code.slice(code.indexOf("//**begin**") + 11, code.length);
        if (code.indexOf("<!--**begin**-->") !== -1)
            code = code.slice(code.indexOf("<!--**begin**-->") + 18, code.length);
        if (code.indexOf("<!-- code-start -->") !== -1)
            code = code.slice(code.indexOf("<!-- code-start -->") + 20, code.length);
        if (code.indexOf("<!-- code-end -->") !== -1)
            code = code.slice(0,code.indexOf("<!-- code-end -->"));

        document.getElementById("code-text").textContent = code;

        hljs.highlightBlock(document.getElementById("code-text"));
    }
}

function activateCodeBox() {

    var $codeContainer = $('#code-container');

    if ($codeContainer.attr("class") === 'without-code') {

        showCode();
        var $orientation = $('#orientation');

        if ($orientation.attr('class') === "vertical-orientation") {

            $('#drag-bar-h').css("display","block");
            $codeContainer.attr("class", "horizontal-code");
            $('#content-container').attr("class", "horizontal-content");
            $orientation.text('[vertikal]');
        }
        else if ($orientation.attr('class') === "horizontal-orientation") {

            $('#drag-bar-h').css("display","none");
            $codeContainer.attr("class", "vertical-code");
            $('#content-container').attr("class", "vertical-content");
            $orientation.text('[horizontal]');
        }
        else
            console.log("Attention: #orientation-class is wrong.");
        writeSize();
    }
    else
        closeCodeBox();
}

function rearrangeCodeBox() {

    $('#content').width('auto');
    var $codeContainer = $('#code-container');
    var $orientation = $('#orientation');

    if ($codeContainer.attr('class') === 'horizontal-code') {

        $('#drag-bar-h').css("display","none");
        $codeContainer.attr("class", "vertical-code");
        $('#content-container').attr("class", "vertical-content");
        $orientation.text('[horizontal]');
        $orientation.attr('class','horizontal-orientation');
    }
     else if ($codeContainer.attr('class') === 'vertical-code') {

        $('#drag-bar-h').css("display","block");
        $codeContainer.attr("class", "horizontal-code");
        $('#content-container').attr("class", "horizontal-content");
        $orientation.text('[vertikal]');
        $orientation.attr('class','vertical-orientation');
    }
    else
        console.log("Attention: #code-container-class is wrong.");

    writeSize();
}

function closeCodeBox() {

    $('#code-container').attr("class", "without-code");
    $('#content-container').attr("class", "full-content");
    writeSize();
}