if (lang == "en") {
    var created_at = "Created at "
    var localStorageNone = "This is your first impressions, no history yet!"
} else if (lang == "id") {
    var created_at = "Dibuat pada "
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!"
}

const constrain = {
    minTitleChar: 50,
    minTitlePixel: 250,
    maxTitleChar: 60,
    maxTitlePixel: 600,
    minDescChar: 50,
    minDescPixel: 400,
    maxDescChar: 160,
    maxDescPixel: 920,
}

jQuery('#crawlURL').click(function () {
    let url = jQuery('#url').val();
    $.post({
        url: META_CHECKER_URL,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            url: url
        },
        success: (res) => {
            $('#cta-warning').hide()
            if (res.statusCode === 200) {
                $('#resulttitle').text(ellipsis(res.data.title, 'title'));
                $('#resultdesc').text(ellipsis(res.data.description, 'description'));
                $('#resulturl').text(url.toLowerCase());
                $('#resulttitlemobile').text(ellipsis(res.data.title, 'title'));
                $('#resultdescmobile').text(ellipsis(res.data.description, 'description'));
                $('#resulturlmobile').text(url.toLowerCase());
                $('#desc').val(res.data.description)
                $('#title').val(res.data.title)
                $("#manual-mode").removeClass("d-none").addClass("d-block").slideDown();
                $('#desc').attr('disabled', 'disabled');
                $('#title').attr('disabled', 'disabled');
                var rateTitle = titleChecker(res.data.title);
                fillTitleBar(rateTitle, true);
                var rateDesc = descChecker(res.data.description);
                fillDescBar(rateDesc, true);
                save(url, res.data.title, res.data.description)
                refreshLocalStorage();
            } else {
                toastr.error(res.message)
            }
        },
        error: (err) => {
            toastr.error(err.responseJSON.message)
        }
    });
})

$('#title').on('keyup', function () {
    var rateTitle = titleChecker($(this).val());
    fillTitleBar(rateTitle)
    $('#resulttitle').text(ellipsis($(this).val(), 'title'))
    $('#resulttitlemobile').text(ellipsis($(this).val(), 'title'))
})

$('#desc').on('keyup', function () {
    var rateDesc = descChecker($(this).val());
    fillDescBar(rateDesc);
    $('#resultdesc').text(ellipsis($(this).val(), 'description'));
    $('#resultdescmobile').text(ellipsis($(this).val(), 'description'));
})

$('#url').on('keyup', function () {
    $('#resulturl').text($(this).val().toLowerCase())
    $('#resulturlmobile').text($(this).val().toLowerCase())
})

const ellipsis = function (text, type) {
    if (type === 'title') {
        if (text.length <= constrain.maxTitleChar)
            return text

        return text.slice(0, constrain.maxTitleChar) + '...'
    } else {
        if (text.length <= constrain.maxDescChar)
            return text

        return text.slice(0, constrain.maxDescChar) + '...'
    }
}

const save = function (url, title, description) {
    let key = new Date().getTime();
    let datum = {
        url: url,
        title: title,
        description: description
    }
    const keys = window.localStorage.getItem('keys')
    var temp = define()
    if (keys) {
        temp = JSON.parse(keys)
    }
    if (!temp.meta.includes(key)) {
        temp.meta.push(key)
    }
    localStorage.setItem('keys', JSON.stringify(temp));
    localStorage.setItem(key, JSON.stringify(datum));
}

const removeData = function (key) {
    let keys = JSON.parse(localStorage.getItem('keys'));
    for (var i in keys.meta) {
        if (keys.meta[i] === key) {
            keys.meta.splice(i, 1)
            break;
        }
    }
    localStorage.setItem('keys', JSON.stringify(keys))
    localStorage.removeItem(key)
    refreshLocalStorage();
}

const getMonth = function (index) {
    const month = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL",
        "AUG", "SEP", "OCT", "NOV", "DES"
    ]
    return month[index]
}

const refreshLocalStorage = function () {
    try {
        $('#localsavemobile').empty();
        $('#localsavedesktop').empty();
        const keys = JSON.parse(localStorage.getItem('keys'))
        if (keys) {
            if (keys.meta.length > 0) {
                for (let key of keys.meta) {
                    let temp = JSON.parse(localStorage.getItem(key)).url
                    let date = new Date(key)
                    let div = '<div class="custom-card py-5 px-3" onclick="getData(' + key + ')">' +
                        '<div class="d-flex align-items-center justify-content-between">' +
                        '<div class="local-collection-title">' + temp + '</div>' +
                        '<div class="d-flex align-items-center">' +
                        '<i class="bx bxs-info-circle text-grey bx-sm mr-2" data-toggle="tooltip" data-theme="dark" title="' + created_at + ((date.getHours() < 10) ? ('0' + date.getHours()) : date.getHours()) + '.' + ((date.getMinutes() < 10) ? ('0' + date.getMinutes()) : date.getMinutes()) + ' | ' + date.getDate() + ', ' + getMonth(date.getMonth()) + ' ' + date.getFullYear() + '"></i>' +
                        '<i class="bx bxs-x-circle text-grey bx-sm" onclick="removeData(' + key + ')"></i>' +
                        '</div>' +
                        '</div>' +
                        '</div>'

                    let div2 = '<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px" onclick="getData(' + key + ')">' +
                        '<div class="d-flex justify-content-between">' +
                        '  <div class="local-collection-title">' + temp + '</div>' +
                        '  <div class="d-flex align-items-center">' +
                        '    <span class="mr-2 text-grey date-created">' + created_at + (date.getHours() < 10 ? ('0' + date.getHours()) : date.getHours()) + '.' + (date.getMinutes() < 10 ? ('0' + date.getMinutes()) : date.getMinutes()) + ' | ' + date.getDate() + ', ' + getMonth(date.getMonth()) + ' ' + date.getFullYear() + '</span>' +
                        '    <i class="bx bxs-x-circle text-grey" onclick="removeData(' + key + ')"></i>' +
                        '  </div>' +
                        '</div>' +
                        '</li>'

                    $('#localsavemobile').append(div)
                    $('#localsavedesktop').append(div2)
                }
            } else {
                let div2 = `<li id="empty-impression" class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                  <div class="d-flex justify-content-center text-center">
                    <span>` + localStorageNone + `</span>
                  </div>
                </li>`
                let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + localStorageNone + `</span>
                    </div>
                </div>`

                $('#localsavemobile').append(div)
                $('#localsavedesktop').append(div2)
            }
        } else {
            let div2 = `<li id="empty-impression" class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                  <div class="d-flex justify-content-center text-center">
                    <span>` + localStorageNone + `</span>
                  </div>
                </li>`
            let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + localStorageNone + `</span>
                    </div>
                </div>`

            $('#localsavemobile').append(div)
            $('#localsavedesktop').append(div2)
        }
    } catch (e) {
    }
}

const getData = function (key) {
    if (localStorage.getItem(key)) {
        var res = JSON.parse(localStorage.getItem(key));
        $('#resulttitle').text(res.title);
        $('#resultdesc').text(res.description);
        $('#resulturl').text(res.url);
        $('#resulttitlemobile').text(res.title);
        $('#resultdescmobile').text(res.description);
        $('#resulturlmobile').text(res.url);
        $('#desc').val(res.description)
        $('#title').val(res.title)
        $("#manual-mode").show();
        $('#desc').attr('disabled', 'disabled');
        $('#title').attr('disabled', 'disabled');
        var rateTitle = titleChecker(res.title);
        fillTitleBar(rateTitle);
        var rateDesc = descChecker(res.description);
        fillDescBar(rateDesc);
    }
}

const clearAll = function () {
    var res = JSON.parse(localStorage.getItem('keys'));
    for (let i of res.meta) {
        localStorage.removeItem(i);
    }
    res.meta = [];
    localStorage.setItem('keys', JSON.stringify(res))
    refreshLocalStorage()
}

const titleChecker = function (title) {
    var titlesizer = $('#titlesizer');
    var rate = 0;
    var badChar = 0;
    var badPixel = 0;
    var l = title.length;
    if (l >= constrain.minTitleChar && l <= constrain.maxTitleChar) {
        rate++;
    } else if (l > constrain.minTitleChar) {
        badChar = l - constrain.maxTitleChar
    } else {
        badChar = l - constrain.minTitleChar
    }

    titlesizer.attr("style","font-family: arial, sans-serif !important;font-size: 18px!important;position:absolute!important;white-space:nowrap!important;visibility:hidden!important")
    titlesizer.append(title);
    var pixel = Math.floor(titlesizer.innerWidth());
    if (pixel >= constrain.minTitlePixel && pixel <= constrain.maxTitlePixel) {
        rate += 2;
    } else if (pixel > constrain.maxTitlePixel) {
        badPixel = pixel - constrain.maxTitlePixel
    } else {
        badPixel = pixel - constrain.minTitlePixel
    }
    titlesizer.empty();

    let word = 0
    if (title.length > 0)
        word = title.split(' ').length

    return {
        rate: rate,
        word: word,
        pixel: pixel,
        char: l,
        badChar: badChar,
        badPixel: badPixel
    };
}

const descChecker = function (desc) {
    var descsizer = $('#descsizer');
    var rate = 0;
    var badChar = 0;
    var badPixel = 0;
    var l = desc.length;
    if (l >= constrain.minDescChar && l <= constrain.maxDescChar) {
        rate++;
    } else if (l > constrain.maxDescChar) {
        badChar = l - constrain.maxDescChar
    } else {
        badChar = l - constrain.minDescChar
    }

    descsizer.attr("style", "font-family: arial, sans-serif !important;font-size:13px !important;position:absolute !important;visibility:hidden !important;white-space:nowrap !important;");
    descsizer.append(desc)
    var pixel = Math.floor(descsizer.innerWidth());
    if (pixel >= constrain.minDescPixel && pixel <= constrain.maxDescPixel) {
        rate += 2;
    } else if (pixel > constrain.maxDescPixel) {
        badPixel = pixel - constrain.maxDescPixel
    } else {
        badPixel = pixel - constrain.minDescPixel
    }
    descsizer.empty()

    let word = 0
    if (desc.length > 0)
        word = desc.split(' ').length

    return {
        rate: rate,
        word: word,
        pixel: pixel,
        char: l,
        badChar: badChar,
        badPixel: badPixel
    };
}

const fillTitleBar = function (param, cta=false) {
    for (let i = 1; i < param.rate + 1; i++) {
        $('#titlebar' + i).removeClass("blank")
        $('#titlebar' + i).addClass("active")
    }
    for (let i = param.rate + 1; i < 4; i++) {
        $('#titlebar' + i).removeClass("active")
        $('#titlebar' + i).addClass("blank")
    }

    //cta
    if (cta){
        if (param.rate >= 3){
            $('#cta-warning').hide()
        }else {
            $('#cta-warning').show()
        }
    }else {
        $('#cta-warning').hide()
    }

    $('#title-char').text(param.char)
    $('#title-pixel').text(param.pixel + 'px')
    $('#title-word').text(param.word)
    if (param.char > 0) {
        if (param.badChar !== 0) {
            if (param.badChar < 0) {
                $('#title-bad-char-point').text('Your character less than ' + constrain.minTitleChar)
            } else {
                $('#title-bad-char-point').text('Your character more than ' + constrain.maxTitleChar)
            }
            $('#title-bad-char').removeClass('d-none')
            $('#title-bad-char').addClass('d-flex')
        } else {
            $('#title-bad-char').removeClass('d-flex')
            $('#title-bad-char').addClass('d-none')
        }
        if (param.badPixel !== 0) {
            if (param.badPixel < 0) {
                $('#title-bad-pixel-point').text('Your pixel less than ' + constrain.minTitlePixel)
            } else {
                $('#title-bad-pixel-point').text('Your pixel more than ' + constrain.maxTitlePixel)
            }
            $('#title-bad-pixel').removeClass('d-none')
            $('#title-bad-pixel').addClass('d-flex')
        } else {
            $('#title-bad-pixel').removeClass('d-flex')
            $('#title-bad-pixel').addClass('d-none')
        }
    } else {
        $('#cta-warning').hide()
        $('#title-bad-char').removeClass('d-flex')
        $('#title-bad-char').addClass('d-none')
        $('#title-bad-pixel').removeClass('d-flex')
        $('#title-bad-pixel').addClass('d-none')
    }
}

const fillDescBar = function (param, cta=false) {
    for (let i = 1; i < param.rate + 1; i++) {
        $('#descbar' + i).removeClass("blank")
        $('#descbar' + i).addClass("active")
    }
    for (let i = param.rate + 1; i < 4; i++) {
        $('#descbar' + i).removeClass("active")
        $('#descbar' + i).addClass("blank")
    }

    //cta
    if (cta){
        if (param.rate >= 3){
            $('#cta-warning').hide()
        }else {
            $('#cta-warning').show()
        }
    }else {
        $('#cta-warning').hide()
    }

    $('#desc-char').text(param.char)
    $('#desc-pixel').text(param.pixel + 'px')
    $('#desc-word').text(param.word)
    if (param.char > 0) {
        if (param.badChar !== 0) {
            if (param.badChar < 0) {
                $('#desc-bad-char-point').text('Your character less than ' + constrain.minDescChar)
            } else {
                $('#desc-bad-char-point').text('Your character more than ' + constrain.maxDescChar)
            }
            $('#desc-bad-char').removeClass('d-none')
            $('#desc-bad-char').addClass('d-flex')
        } else {
            $('#desc-bad-char').removeClass('d-flex')
            $('#desc-bad-char').addClass('d-none')
        }
        if (param.badPixel !== 0) {
            if (param.badPixel < 0) {
                $('#desc-bad-pixel-point').text('Your pixel less than ' + constrain.minDescPixel)
            } else {
                $('#desc-bad-pixel-point').text('Your pixel more than ' + constrain.maxDescPixel)
            }
            $('#desc-bad-pixel').removeClass('d-none')
            $('#desc-bad-pixel').addClass('d-flex')
        } else {
            $('#desc-bad-pixel').removeClass('d-flex')
            $('#desc-bad-pixel').addClass('d-none')
        }
    } else {
        $('#cta-warning').hide()
        $('#desc-bad-char').removeClass('d-flex')
        $('#desc-bad-char').addClass('d-none')
        $('#desc-bad-pixel').removeClass('d-flex')
        $('#desc-bad-pixel').addClass('d-none')
    }
}

$(document).ready(function () {
    $("#crawlURL").attr("disabled", true);
    $("#title").focus();
    $('#manualModeOff').click(function () {
        $('#manualModeOn').removeClass("d-none").addClass("d-block");
        $('#botModeOff').removeClass("d-none").addClass("d-block");
        $('#manual-mode').removeClass("d-none").addClass("d-block").slideDown();
        $('#manualModeOff').removeClass("d-block").addClass("d-none");
        $('#botModeOn').removeClass("d-block").addClass("d-none");
        $("#crawlURL").attr("disabled", true);
        $('#title').attr('disabled', false);
        $('#desc').attr('disabled', false);
        $("#title").focus();
    });

    $('#botModeOff').click(function () {
        $('#botModeOn').removeClass("d-none").addClass("d-block");
        $('#manualModeOff').removeClass("d-none").addClass("d-block");
        $('#manual-mode').slideUp().removeClass("d-block");
        $('#botModeOff').removeClass("d-block").addClass("d-none");
        $('#manualModeOn').removeClass("d-block").addClass("d-none");
        $("#crawlURL").attr("disabled", false);
        $('#title').attr('disabled', true);
        $('#desc').attr('disabled', true);
        $("#url").focus();
    });

    refreshLocalStorage();
});
jQuery.each(jQuery('textarea[data-autoresize]'), function () {
    var offset = this.offsetHeight - this.clientHeight;

    var resizeTextarea = function (el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function () {
        resizeTextarea(this);
    }).removeAttr('data-autoresize');
});
