function print(obj) {
    $("#json-format").val("<script type=\"application/ld+json\">\n" + JSON.stringify(obj, undefined, 4) + "\n<\/script>");
}

const getMonth = function (index) {
    const month = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL",
        "AUG", "SEP", "OCT", "NOV", "DES"]
    return month[index]
}

const sliceFirstLastLine = function (text) {
    let splited = text.split('\n')
    splited.splice(0, 1)
    splited.splice(splited.length - 1, 1)
    return splited.join('\n')
}

const getDataFromText = function () {
    const raw = $('#json-format').val();
    return JSON.parse(sliceFirstLastLine(raw));
}

$('#schema-json-ld').change(function () {
    if ($(this).val() !== 'home') {
        window.location = 'json-ld-' + $(this).val() + '-schema-generator'
    } else {
        window.location = 'json-ld-schema-generator'
    }
});

$('#copy').click(function () {
    const copyText = $('#json-format');
    copyText.select();
    document.execCommand("copy");
    toastr.success('Copied to Clipboard', 'Information');
});

$.each($('textarea[data-autoresize]'), function () {
    var offset = this.offsetHeight - this.clientHeight;
    var resizeTextarea = function (el) {
        $(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    $(this).on('keyup input', function () {
        resizeTextarea(this);
    }).removeAttr('data-autoresize');
});

$('a[href*="#"]:not([href="#"])').click(function () {
    var offset = -80;
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top + offset
            }, 400);
            return false;
        }
    }
});

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

function formatDate(date) {
    // Format should be : DD/MM/YYYY HH:ii
    return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()} ${date.getHours()}:${date.getMinutes()}`
}

function checkUrl(url) {
    try {
        let _url = new URL(url)
        return _url.protocol === 'https:' || _url.protocol === 'http:';
    } catch (e) {
        return false
    }
}

function getProtocol(url) {
    try {
        let _url = new URL(url)
        return _url.protocol;
    } catch (e) {
        return false
    }
}

function updateProgressBar(value) {
    $('#progress-bar-loader')
        .css('width', `${value}%`)
        .attr('aria-valuenow', value);
}

$('#input-url').keyup(function() {
    const _url = $(this).val();
    if (checkUrl(_url)) {
        $('#empty-url').hide();
        const _protocol = getProtocol(_url)
        if (_protocol === 'https:') {
            $('#unsecure-url').hide();
            $('#secure-url').show();
        } else {
            $('#secure-url').hide();
            $('#unsecure-url').show();
        }
    } else {
        $('#empty-url').show();
        $('#secure-url').hide();
        $('#unsecure-url').hide();
    }
});

$('#analyze-btn').click(function() {
    analyze($('#input-url').val());
})

$('#cancel-request-btn').click(function() {
    jqueryRequest.abort();
    updateProgressBar(0);
    $('#cancel-request-btn')
        .removeClass('btn-cancel')
        .addClass('btn-cancel-disabled')
        .attr('disabled', 'disabled')
})
