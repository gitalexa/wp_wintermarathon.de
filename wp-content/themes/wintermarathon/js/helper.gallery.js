/*! wintermarathon-static - v0.1.0-SNAPSHOT - 2016-02-12 */function submitRegist() {
    var form = $(".fancybox-title-inside-wrap form#gallery_register");
    if(form.length) {
        var req = $("input[name=email]", form);
        regHelper(form);
    }
}

function regHelper(form) {
    if(form !== undefined) {
        var req = $("input[name=email]", form);
        var firstname = $("input[name=first_name]", form).val(),
            surname = $("input[name=surname]", form).val(),
            email = req.val();
        var xmlhttp;
        var url = "../ajax/registerMail?name=" + encodeURIComponent(firstname + " " + surname) + "&email=" + encodeURIComponent(email);
        var data_protection = $("#data_protection_active", form);

        if(data_protection.length && data_protection.is(":checked")) {
            if(valEmail(email)) {
                req.parent().removeClass("error");
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();

                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
                            if(xmlhttp.status == 200){
                                buildCookie(firstname + " " + surname, email, 365);
                                updateLayout();
                            } else {
                                $(".fancybox-title-inside-wrap .errorMsg").show();
                            }
                        }
                    };

                    xmlhttp.open("POST", url, true);
                    xmlhttp.send();
                }
            } else {
                req.parent().addClass("error");
                req.bind("focusout", function() {
                    if(valEmail($(this).val())) {
                        $(this).parent().removeClass("error");
                    }
                });
            }
        } else if(data_protection.length) {
            data_protection.parent().addClass("error");
            data_protection.unbind("click");
            data_protection.bind("click", function() {
                if($(this).is(":checked")) {
                    $(this).parent().removeClass("error");
                }
            });
        }
    }
}

function buildCookie(username, email, exdays) {
    var cname = "wintermarathonGalleryUser",
        cvalue = email;
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();

    if(username !== undefined) {
        cvalue += " (" + username + ")";
    }

    document.cookie = cname + "=" + cvalue + ";" + expires;
}

function updateLayout() {
    $(".fancybox-title-inside-wrap .registration").animate({
        opacity: 0.25,
        height: 0
    }, 600, function() {
        var wrap = $(".fancybox-title-inside-wrap");
        var actions = $(".actions-wrapper", wrap);
        var meta = $("meta[name=href]", actions);
        var _gallery = $("meta[name=gallery]", actions);
        var _image = $("meta[name=image]", actions);
        var _tracker = "ET_Event.download('Wintermarathon/" + _gallery.attr("content") + "/" + _image.attr("content") + "', '')";
        wrap.addClass("regDone");
        if(meta.length && !$("a.btn_download", actions).length) {
            actions.prepend('<a class="btn_download" href="' + meta.attr("content") + '" onmousedown="' + _tracker + '"></a>');
        }
    });
}

function valEmail(email) {
    var regX = new RegExp('^([a-zA-Z0-9\\-\\.\\_]+)(\\@)([a-zA-Z0-9\\-\\.]+)(\\.)([a-zA-Z]+)$');
    if(email !== undefined && email.length > 0 && regX.test(email)) {
        return true;
    }
    return false;
}