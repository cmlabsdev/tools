if (lang == "en") {
    var created_at = "Created at "
    var localStorageNone = "This is your first impressions, no history yet!"
} else if (lang == "id") {
    var created_at = "Dibuat pada "
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!"
}

let loader;
var converter = new showdown.Converter();
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
const categories = ['performance', 'accessibility', 'best-practices', 'seo', 'pwa'];
hideResult();
triggerEnter('#analysis-button', '#url');
jQuery('#analysis-button').click(function () {
    let match = /^(http(s)?|ftp):\/\//;
    let urlWeb = jQuery('#url').val().replace(match, "");
    let title = '';
    let button = '';
    let htmlFill = '';
    if (lang === 'en') {
        title = 'The crawling process will take some time';
        button = 'Cancel';
        htmlFill = 'While waiting please read our blog <a href="javascript:window.open(\'https://cmlabs.co/blog/\')" style="text-decoration: underline">here</a>'
    } else {
        title = 'Proses crawling akan memakan waktu';
        button = 'Batal';
        htmlFill = 'Sambil menunggu silahkan baca blog kami <a href="javascript:window.open(\'https://cmlabs.co/blog/\')" style="text-decoration: underline">disini</a>'
    }
    Swal.fire({
        title: title,
        html: htmlFill,
        showCancelButton: true,
        cancelButtonColor: '#FE2151',
        allowClickOutside: false,
        cancelButtonText: button,
        // timer:0,
        // timerProgressBar:true,
        onBeforeOpen: () => {
            // $('#swal2-content').after('<div class="spinner spinner-primary spinner-lg mr-15 spinner-right"></div>');
            // $('.swal2-confirm').after('<br>')
            // Swal.enableButtons();
            $('.swal2-actions').css('flex-direction', 'column');
            $('.swal2-actions').css('flex-direction', 'column');
            $('.swal2-actions').css('flex-wrap', 'nowrap');
            $('.swal2-actions').css('justify-content', 'flex-start');
            $('.swal2-actions').css('align-items', 'center');
            $('.swal2-actions').css('align-content', 'center');
            $('.swal2-confirm').addClass('mb-9');
            Swal.showLoading();
        }
    }).then((result) => {
        if (result.dismiss === 'cancel') {
            loader.abort();
        }
    });
    // jQuery('#spinner').addClass('spinner spinner-success spinner-right');
    hideResult();
    jQuery('#container-loader').css('display', 'block');
    loader = jQuery.ajax({
        url: 'https://pagespeedonline.googleapis.com/pagespeedonline/v5/runPagespeed?category=ACCESSIBILITY&category=BEST_PRACTICES&category=PERFORMANCE&category=PWA&category=SEO&url=' + encodeURIComponent('https://' + urlWeb) + '&key=AIzaSyDjg7PenszK_cEZfg4tzvOlKFmnufwxVLs',
        success: function (data) {
            try {
                increaseCounter('page-speed-counter')
                closeCta()
                renderResult(data)
                refreshLocalStorage();
                checkCounter('page-speed-counter', () => showCta(data))
                saveData(data)
            } catch (e) {
                Swal.close()
                toastr.error(e)
            }
        },
        error: function (response) {
            // jQuery('#spinner').removeClass('spinner spinner-success spinner-right');
            // console.log(response);
            if (response.statusText === 'abort') {
                if (lang === 'en')
                    toastr.error('Cancel button clicked', 'Cancel');
                else toastr.error('Anda membatalkan proses', 'Batal');
            } else {
                if (lang === 'en')
                    toastr.error('Url not found or something went wrong. Use https:// or http://', 'Error');
                else toastr.error('Url tidak ditemukan atau terjadi sesuatu yang salah. Gunakan https:// atau http://', 'Error');
            }
            Swal.close();
        }
    });
});

function showCta(data){
    let score = (data.lighthouseResult.categories.performance.score * 100).toFixed(0);
    if (score < 50){
        $('#cta-danger').show()
    } else if (score < 90){
        $('#cta-warning').show()
    } else if (score < 100){
        $('#cta-good').show()
    }
}

function closeCta(){
    $('#cta-danger').hide()
    $('#cta-warning').hide()
    $('#cta-good').hide()
    $('#notif-form-success').hide()
}

function renderResult(data) {
    refreshAuditsResult();
    // jQuery('#spinner').removeClass('spinner spinner-success spinner-right');
    jQuery('#performance').css('display', 'block');
    for (let j = 0; j < 5; j++) {
        // console.log('real score : '+data.lighthouseResult.categories[categories[j]].score);
        let score = (data.lighthouseResult.categories[categories[j]].score * 100).toFixed(0);
        // console.log('multiple score : '+data.lighthouseResult.categories[categories[j]].score * 100);
        strokeValue(score, j + 1, categories[j]);
        displayAuditsResult(data, categories[j])
    }
    listener();
    addListenerForCollapsible();
    jQuery('#container-loader').css('display', 'none');
    sticky.update();
    var target = $('.collapse');
    for (let i = 0; i < target.length; i++) {
        var observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.attributeName === "class") {
                    sticky.update();
                }
            });
        });
        observer.observe(target[i], {attributes: true});
    }
    Swal.close();
}

function listener() {
    for (let i = 0; i < 5; i++) {
        jQuery('#nav-' + categories[i]).click(function () {
            hideResult();
            jQuery('#' + categories[i]).css('display', 'block');
            sticky.update();
        })
    }
}

function hideResult() {
    for (let j = 0; j < 5; j++) {
        jQuery('#' + categories[j]).css('display', 'none');
    }
}

function strokeValue(score, number, category) {
    let card = jQuery('.' + category);
    // let ribbon = jQuery('#ribbon-'+category);
    let value = jQuery('.value-' + category);
    value.removeClass('value-green');
    value.removeClass('value-orange');
    value.removeClass('value-red');
    card.removeClass('progress-green');
    card.removeClass('progress-red');
    card.removeClass('progress-orange');
    if (score >= 90) {
        card.addClass('progress-green');
        value.addClass('value-green');
    } else if (score >= 50) {
        card.addClass('progress-orange');
        value.addClass('value-orange')
    } else {
        card.addClass('progress-red');
        value.addClass('value-red');
    }
    card.attr('data-percentage', score);
    animateValue('value-' + category, 0, score, 3000);
}

function displayAuditsResult(data, category) {
    let audits = data.lighthouseResult.categories[category].auditRefs;
    let allAudits = data.lighthouseResult.audits;
    let group = [];
    for (let audit of audits) {
        let show = showAs(allAudits[audit.id]);
        if (show.status === 'pass' && audit.group !== 'metrics') {
            if (show.label === 'manual') {
                if (group.includes('manual', 0)) {
                    addItem(allAudits, audit, 'manual-' + category, 'manual')
                } else {
                    group.push('manual');
                    addSubTitle('Additional items to manually check', 'manual', null, 'manual-' + category);
                    addItem(allAudits, audit, 'manual-' + category, 'manual')
                }
            } else if (show.label === 'notApplicable') {
                if (group.includes('notApplicable', 0)) {
                    addItem(allAudits, audit, 'not-app-' + category, 'notApplicable');
                } else {
                    group.push('notApplicable');
                    addSubTitle('Not Applicable', 'notApplicable', null, 'not-app-' + category);
                    addItem(allAudits, audit, 'not-app-' + category, 'notApplicable');
                }
            } else {
                if (group.includes('pass', 0)) {
                    addItem(allAudits, audit, 'pass-' + category, 'pass');
                } else {
                    group.push('pass');
                    addSubTitle('Pass Audit', 'pass', null, 'pass-' + category);
                    addItem(allAudits, audit, 'pass-' + category, 'pass');
                }
            }
        } else {
            if (audit.hasOwnProperty('group')) {
                if (group.includes(audit.group, 0)) {
                    addItem(allAudits, audit, category);
                } else {
                    group.push(audit.group);
                    if (data.lighthouseResult.categoryGroups[audit.group].hasOwnProperty('description')) {
                        addSubTitle(data.lighthouseResult.categoryGroups[audit.group].title, audit.group, data.lighthouseResult.categoryGroups[audit.group].description, category);
                    } else {
                        addSubTitle(data.lighthouseResult.categoryGroups[audit.group].title, audit.group, null, category);
                    }
                    addItem(allAudits, audit, category);
                }
            }
        }
    }
}

function addSubTitle(title, id, description = null, category) {
    if (description == null) {
        jQuery('.' + category + '-audit').append("<h3 style=\"color:black\">" + converter.makeHtml(title) + "</h3>\n" +
            "    <div id=\"" + id + "\"></div><br>")
    } else {
        jQuery('.' + category + '-audit').append("<br><h3 style=\"color:black\">" + converter.makeHtml(title) + "</h3>\n" +
            "<p>" + converter.makeHtml(description) + "</p>" +
            "    <div id=\"" + id + "\"></div><br>")
    }
}

function addItem(allAudits, audit, category, group = null) {
    let displayValue = '―';
    if (allAudits[audit.id].hasOwnProperty('displayValue')) {
        displayValue += allAudits[audit.id].displayValue;
    } else {
        displayValue = '';
    }
    let table = '';
    if (allAudits[audit.id].hasOwnProperty('details')) {
        if (allAudits[audit.id].details.type === 'table' || allAudits[audit.id].details.type === 'opportunity') {
            if (Array.isArray(allAudits[audit.id].details.items) && allAudits[audit.id].details.items.length) {
                table = "<table style=\"width:100%;\">\n" +
                    "        <thead>\n" +
                    "          <tr>";
                let headings = allAudits[audit.id].details.headings;
                let items = allAudits[audit.id].details.items;
                let loop = 0;
                for (let heading of headings) {
                    let styling = heading['valueType'] === 'url' || heading['itemType'] === 'url' || loop === 0 ? 'class = \"align-left\"' : '';
                    if (heading.hasOwnProperty('label')) {
                        table += "\n<th " + styling + ">" + heading.label + "</th>";
                    } else if (heading.hasOwnProperty('text')) {
                        table += "\n<th " + styling + ">" + heading.text + "</th>";
                    } else {
                        table += "\n<th " + styling + "></th>";
                    }
                    loop++;
                }
                table += "\n  </tr>\n" +
                    "</thead>\n" +
                    "<tbody>\n";
                let _ = 1
                for (let item of items) {
                    table += "<tr>\n";
                    loop = 0;
                    for (let heading of headings) {
                        let styling = heading['valueType'] === 'url' || heading['itemType'] === 'url' || loop === 0 ? 'class = \"align-left\"' : '';
                        if (heading['valueType'] === 'thumbnail' || heading['itemType'] === 'thumbnail') {
                            table += "<td " + styling + "><img src=\"" + item[heading.key] + "\" height=\"auto\" width=\"50px\"></td>";
                        } else if (heading['valueType'] === 'url' || heading['itemType'] === 'url') {
                            if (item[heading.key]) {
                                table += "<td " + styling + "><a href=\"" + item[heading.key] + "\" class=\"url\">" + subStringUrl(item[heading.key]) + "</a></td>";
                            } else {
                                table += "<td " + styling + "><a href=\"" + item["scriptUrl"] + "\" class=\"url\">" + subStringUrl(item["scriptUrl"]) + "</a></td>";
                            }
                        } else {
                            let value = '';
                            if (heading['valueType'] === 'bytes' || heading['itemType'] === 'bytes') {
                                value = (item[heading.key] / 1000).toFixed(1) + " KiB";
                            } else if (heading['valueType'] === 'timespanMs' || heading['itemType'] === 'timespanMs') {
                                value = item[heading.key] + " Ms";
                            } else if (heading['itemType'] === 'ms' || heading['valueType'] === 'ms') {
                                if (item[heading.key] !== undefined) {
                                    value = item[heading.key].toFixed(1) + " ms";
                                } else {
                                    value = "";
                                }
                            } else if (heading['itemType'] === 'code' && item.hasOwnProperty(heading.key)) {
                                value = converter.makeHtml("`" + item[heading.key].value + "`");
                            } else if (heading['itemType'] === 'link') {
                                value = "<a href=\"" + item[heading.key].url + "\">" + subStringUrl(item[heading.key].text) + "</a>"
                            } else if (heading['itemType'] === 'node') {
                                if (item[heading.key]) {
                                    if (audit.id === 'link-name') {
                                        value = "<h5>" + item[heading.key].nodeLabel + "</h5><p>" + converter.makeHtml("`" + item[heading.key].snippet + "`") + "</p>"
                                    } else if (item[heading.key]['explanation']) {
                                        value = "<h5>" + item[heading.key].nodeLabel + "</h5><p>" + item[heading.key].explanation + "</p><p>" + converter.makeHtml("`" + item[heading.key].snippet + "`") + "</p>"
                                    } else {
                                        value = "<h5>" + item[heading.key].nodeLabel + "</h5><p>" + converter.makeHtml("`" + item[heading.key].snippet + "`") + "</p>"
                                    }
                                }
                            } else {
                                value = item[heading.key] + '';
                                if (value === 'undefined') {
                                    value = '';
                                }
                            }
                            table += "<td " + styling + ">" + value + "</td>";
                        }
                        loop++;
                    }
                    table += "</tr>\n";
                }
                table += "</tbody>\n" +
                    "</table>";
            }
        } else if (allAudits[audit.id].details.type === 'criticalrequestchain') {
            let chains = allAudits[audit.id].details.chains;
            table = "<p>Initial Navigation</p><ul class=\"tree\">"
            for (let chain of Object.keys(chains)) {
                table += traceTreeData(chains[chain]);
            }
            table += "</ul>"
        }
    }
    let groupId = '';
    if (group == null) {
        groupId = audit.group;
    } else {
        groupId = group;
    }
    let color = showAs(allAudits[audit.id]).color;
    // jQuery('.' + category + '-audit #' + groupId).append("<hr>\n" +
    //     "    <div class=\"\" style=\"width:6%; float:left\">\n" +
    //     "      <span class=\"dot "+color+"\"></span>\n" +
    //     "    </div>\n" +
    //     "    <div class=\"\" style=\"width:92%; float:left;\">\n" +
    //     "      <p style=\"color:white\">" + converter.makeHtml(allAudits[audit.id].title + displayValue) + "</p>\n" +
    //     "    </div>" +
    //     "    <div class=\"collapsible\">\n" +
    //     "      <p style=\"color:black\">∇</p>\n" +
    //     "    </div>\n" +
    //     "    <div class=\"content " + audit.id + "\">\n" +
    //     "      <p style=\"color:white;\">" + converter.makeHtml(allAudits[audit.id].description) + "</p>\n" +
    //     table +
    //     "    </div>\n");
    jQuery('.' + category + '-audit #' + groupId).append("<div class=\"card\">\n" +
        "                        <div class=\"card-header\">\n" +
        "                            <div class=\"card-title collapsed\" data-toggle=\"collapse\" data-target=\"#" + audit.id + "\">\n" +
        "<div class=\"mr-3\" style=\"width:15px\">" +
        "<div class=\"btn btn-icon btn-circle bg-" + color + "\" style=\"height:15px; width:15px\">\n" +
        "    </div></div><span class=\"title\">" + converter.makeHtml(allAudits[audit.id].title) + "<p class=\"text-" + color + "\">" + displayValue + "</p></span>" +
        "                            </div>\n" +
        "                        </div>\n" +
        "                        <div id=\"" + audit.id + "\" class=\"collapse\" data-parent=\"#" + category + "-audit\">\n" +
        "                            <div class=\"card-body\">\n" +
        converter.makeHtml(allAudits[audit.id].description) +
        table +
        "                            </div>\n" +
        "                        </div>\n" +
        "                    </div>");
}

function addListenerForCollapsible() {
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
}

function traceTreeData(data) {
    let table = '';
    if (data.hasOwnProperty('children')) {
        table += "<li><a href=\"" + data['request'].url + "\" class=\"url\">" + subStringUrl(data['request'].url) + "</a><ul>";
        for (let datum of Object.keys(data.children)) {
            table += traceTreeData(data.children[datum]);
        }
        table += "</ul></li>"
    } else {
        table += "<li><a href=\"" + data['request'].url + "\" class=\"url\">" + subStringUrl(data['request'].url) + "</a></li>"
    }
    return table;
}

function subStringUrl(url) {
    let constrainUrl = 33;
    let fixedUrl = '...';
    if (url.length > constrainUrl) {
        fixedUrl += url.substring(url.length - constrainUrl);
    } else {
        fixedUrl = url;
    }
    return fixedUrl;
}

function showAs(audit) {
    let PASS = 0.9,
        AVERAGE = 0.5;
    switch (audit.scoreDisplayMode) {
        case "manual":
        case "notApplicable":
            return {label: audit.scoreDisplayMode, status: 'pass', color: 'grey'};
        case "error":
        case "informative":
            return {label: audit.scoreDisplayMode, status: 'fail', color: 'red'};
        case "numeric":
        case "binary":
        default:
            if (audit.score >= PASS) {
                return {label: audit.scoreDisplayMode, status: 'pass', color: 'green'};
            } else if (audit.score >= AVERAGE) {
                return {label: audit.scoreDisplayMode, status: 'fail', color: 'orange'};
            } else if (audit.score >= 0) {
                return {label: audit.scoreDisplayMode, status: 'fail', color: 'red'};
            } else {
                return {label: audit.scoreDisplayMode, status: 'fail', color: 'grey'};
            }
    }
}

$('#url').on('input', function () {
    let check = regexHttps($(this).val());
    if (check === 'https') {
        $('#noCrawl').hide()
        $('#crawlHttps').show()
        $('#crawlHttp').hide()
    } else if (check === 'http') {
        $('#noCrawl').hide()
        $('#crawlHttps').hide()
        $('#crawlHttp').show()
    } else {
        $('#noCrawl').show()
        $('#crawlHttps').hide()
        $('#crawlHttp').hide()
    }
})

function regexHttps(url) {
    let httpsPattern = new RegExp("^https:\/\/")
    let httpPattern = new RegExp("^http:\/\/")
    if (httpsPattern.test(url)) {
        return 'https'
    } else if (httpPattern.test(url)) {
        return 'http'
    } else {
        return 'none'
    }
}

function animateValue(id, start, end, duration) {
    var range = end - start;
    var current = start;
    var increment = end > start ? 1 : -1;
    var stepTime = Math.abs(Math.floor(duration / range));
    var obj = jQuery('.' + id);
    var timer = setInterval(function () {
        current += increment;
        obj.html(current + '%');
        if (current == end) {
            clearInterval(timer);
        }
    }, stepTime);
}

function refreshAuditsResult() {
    for (let j = 0; j < 5; j++) {
        jQuery('#' + categories[j] + '-audit').empty();
        jQuery('#pass-' + categories[j] + '-audit').empty();
        jQuery('#not-app-' + categories[j] + '-audit').empty();
        jQuery('#manual-' + categories[j] + '-audit').empty();
    }
}

let saveData = function (data) {
    let dataFromLocal = localStorage.getItem('page-speed')
    let storage = []
    if (dataFromLocal) {
        storage = JSON.parse(dataFromLocal)
    }
    storage.push(data)
    localStorage.setItem('page-speed', JSON.stringify(storage))
}

const refreshLocalStorage = function () {
    try {
        const month = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DES']
        $('#localsavemobile').empty();
        $('#localsavedesktop').empty();
        const keys = JSON.parse(localStorage.getItem('page-speed'))
        if (keys) {
            if (keys.length > 0) {
                let index = 0;
                for (let key of keys) {
                    let date = new Date(key.analysisUTCTimestamp)
                    date.setTime(date.getTime())
                    let formatDate = `${created_at} ${date.getHours() < 10 ? ('0' + date.getHours()) : date.getHours()}.${date.getMinutes() < 10 ? ('0' + date.getMinutes()) : date.getMinutes()} | ${date.getDate()}, ${month[date.getMonth()]} ${date.getFullYear()}`
                    let div = `<div class="custom-card py-5 px-3" onclick="getData(${index})">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="local-collection-title">${key.id}
                        </div>
                        <div class="d-flex align-items-center">
                            <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark"
                               title="${formatDate}"></i>
                            <i class='bx bxs-x-circle bx-sm text-grey' onclick="removeLocal(${index})"></i>
                        </div>
                    </div>
                </div>`

                    let div2 = `<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px" onclick="getData(${index})">
                  <div class="d-flex justify-content-between">
                    <div class="local-collection-title">${key.id}</div>
                    <div class="d-flex align-items-center">
                      <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="${formatDate}"></i>
                      <i class='bx bxs-x-circle bx-sm text-grey' onclick="removeLocal(${index})"></i>
                    </div>
                  </div>`
                    index++
                    $('#localsavemobile').append(div)
                    $('#localsavedesktop').append(div2)
                }
            }else {
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
        console.log(e)
    }
}

let removeLocal = function (index) {
    const keys = JSON.parse(localStorage.getItem('page-speed'))
    keys.splice(index, 1)
    localStorage.setItem('page-speed', JSON.stringify(keys))
    refreshLocalStorage()
}

let getData = function (index) {
    let local = JSON.parse(localStorage.getItem('page-speed'))
    $('#url').val(local[index].id)
    closeCta()
    renderResult(local[index])
}

let clearAll = function () {
    localStorage.removeItem('page-speed')
    refreshLocalStorage();
}

refreshLocalStorage();

$(document).ready(function () {
    $("#performancePB").click(function () {
        $("#performance").fadeIn().removeClass("d-none").addClass("d-block");
        $("#accessibility").removeClass("d-block").addClass("d-none").fadeOut();
        $("#best-practices").removeClass("d-block").addClass("d-none").fadeOut();
        $("#seo").removeClass("d-block").addClass("d-none").fadeOut();
        $("#pwa").removeClass("d-block").addClass("d-none").fadeOut();

        $("#performancePB").addClass("active");
        $("#accessibilityPB").removeClass("active");
        $("#practicePB").removeClass("active");
        $("#seoPB").removeClass("active");
        $("#pwaPB").removeClass("active");
    });

    $("#accessibilityPB").click(function () {
        $("#performance").removeClass("d-block").addClass("d-none").fadeOut();
        $("#accessibility").fadeIn().removeClass("d-none").addClass("d-block");
        $("#best-practices").removeClass("d-block").addClass("d-none").fadeOut();
        $("#seo").removeClass("d-block").addClass("d-none").fadeOut();
        $("#pwa").removeClass("d-block").addClass("d-none").fadeOut();

        $("#performancePB").removeClass("active");
        $("#accessibilityPB").addClass("active");
        $("#practicePB").removeClass("active");
        $("#seoPB").removeClass("active");
        $("#pwaPB").removeClass("active");
    });

    $("#practicePB").click(function () {
        $("#performance").removeClass("d-block").addClass("d-none").fadeOut();
        $("#accessibility").removeClass("d-block").addClass("d-none").fadeOut();
        $("#best-practices").fadeIn().removeClass("d-none").addClass("d-block");
        $("#seo").removeClass("d-block").addClass("d-none").fadeOut();
        $("#pwa").removeClass("d-block").addClass("d-none").fadeOut();

        $("#performancePB").removeClass("active");
        $("#accessibilityPB").removeClass("active");
        $("#practicePB").addClass("active");
        $("#seoPB").removeClass("active");
        $("#pwaPB").removeClass("active");
    });

    $("#seoPB").click(function () {

        $("#performance").removeClass("d-block").addClass("d-none").fadeOut();
        $("#accessibility").removeClass("d-block").addClass("d-none").fadeOut();
        $("#best-practices").removeClass("d-block").addClass("d-none").fadeOut();
        $("#seo").fadeIn().removeClass("d-none").addClass("d-block");
        $("#pwa").removeClass("d-block").addClass("d-none").fadeOut();

        $("#performancePB").removeClass("active");
        $("#accessibilityPB").removeClass("active");
        $("#practicePB").removeClass("active");
        $("#seoPB").addClass("active");
        $("#pwaPB").removeClass("active");
    });

    $("#pwaPB").click(function () {
        $("#performance").removeClass("d-block").addClass("d-none").fadeOut();
        $("#accessibility").removeClass("d-block").addClass("d-none").fadeOut();
        $("#best-practices").removeClass("d-block").addClass("d-none").fadeOut();
        $("#seo").removeClass("d-block").addClass("d-none").fadeOut();
        $("#pwa").fadeIn().removeClass("d-none").addClass("d-block");

        $("#performancePB").removeClass("active");
        $("#accessibilityPB").removeClass("active");
        $("#practicePB").removeClass("active");
        $("#seoPB").removeClass("active");
        $("#pwaPB").addClass("active");
    });
});
