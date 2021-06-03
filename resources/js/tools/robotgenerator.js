// Register new robot data
let main = {
    "defaultaccess": "",
    "crawldelay": "",
    "sitemap": "",
    "directive": []
}

// Get all data from input
$('#robotAccess').change(function () {
    main.defaultaccess = $(this).val()
    setRobotResult()
});

$('#crawlDelay').change(function () {
    main.crawldelay = $(this).val()
    setRobotResult()
});

$('#sitemap').keyup(function () {
    main.sitemap = $(this).val()
    setRobotResult()
});

$(document).on('change', '.access-directive', function () {
    let index = parseInt($(this).data('id'));
    main.directive[index].access = $(this).val();
    setRobotResult()
});

$(document).on('change', '.robot-user-agent', function () {
    let index = parseInt($(this).data('id'));
    main.directive[index].useragent = $(this).val();
    setRobotResult()
});

$(document).on('keyup', '.directory', function () {
    let index = parseInt($(this).data('id'));
    main.directive[index].directory = $(this).val();
    setRobotResult()
});

// Add Directive Function
$('#add').click(function () {
    $('#directive-title').removeClass('d-none')
    $('#add-directive').addClass('d-none')
    $('#add-more-directive').removeClass('d-none')

    main.directive.push({
        "access": "",
        "useragent": "",
        "directory": ""
    });

    $('#form').append(
        "<div class=\"row directive-row\" data-id=\"" + (main.directive.length - 1) + "\">" +
        "<div class=\"col-10 col-sm-11\">" +
        "<div class=\"row\">" +
        "<div class=\"col-md-4\">" +
        "<div class=\"form-group\">" +
        "<select name=\"\" class=\"form-control access-directive\" data-id=\"" + (main.directive.length - 1) + "\">" +
        "<option value=\"\" disabled selected>" + placeholder_access + "</option>" +
        "<option value=\"Allow\">" + access_opt_1 + "</option>" +
        "<option value=\"Disallow\">" + access_opt_2 + "</option>" +
        "</select>" +
        "</div>" +
        "</div>" +
        "<div class=\"col-md-4\">" +
        "<div class=\"form-group\">" +
        "<select name=\"\" class=\"form-control robot-user-agent\" data-id=\"" + (main.directive.length - 1) + "\">" +
        "<option value=\"\" disabled selected>" + placeholder_user_agent + "</option>" +
        "</select>" +
        "</div>" +
        "</div>" +
        "<div class=\"col-md-4\">" +
        "<div class=\"form-group\">" +
        "<input type=\"text\" class=\"form-control directory\" name=\"\" value=\"\" placeholder=\"/" + placeholder_directory + "\" data-id=\"" + (main.directive.length - 1) + "\" required>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<div class=\"col-2 col-sm-1\">" +
        "<div class=\"d-flex justify-content-center align-items-center mt-1\">" +
        "<i class='bx bxs-x-circle bx-md delete-robo remove' data-id=\"" + (main.directive.length - 1) + "\"></i>" +
        "</div>" +
        "</div>" +
        "</div>"
    )

    $.getJSON('../json/robots.json', function (data) {
        for (let i = 0; i < data.bot.length; i++) {
            $('.robot-user-agent').append(
                "<option value=\"" + data.bot[i].value + "\">" + data.bot[i].name + "</option>"
            );
        }
    });
});

// Automatically set data to textarea
function setRobotResult() {
    let defuseragent = 'User-agent: *'
    defaccess = '',
        crawldel = '',
        sitemap = ''

    if (main.defaultaccess === '') {
        defaccess = ''
    } else {
        defaccess = defuseragent + "\n" + main.defaultaccess + ": /"
    }

    if (main.crawldelay === '') {
        crawldel = ''
    } else {
        crawldel = '\n\nCrawl-delay: ' + main.crawldelay
    }

    if (main.sitemap === '') {
        sitemap = ''
    } else {
        sitemap = '\n\nSitemap: ' + main.sitemap
    }

    let directive = ''

    for (let i = 0; i < main.directive.length; i++) {
        let useragent = main.directive[i].useragent,
            access = main.directive[i].access,
            directory = main.directive[i].directory

        if (directory == '') {
            directory = '/'
        }

        if (useragent === '*' && directory === '/' && access === main.defaultaccess) {
            directive += ''
        } else {
            directive += "\n\nUser-agent: " + useragent + "\n" + access + ": " + directory;
        }
    }

    $("#json-format").val(defaccess + "" + crawldel + "" + sitemap + "" + directive);
}

// Remove Action
$(document).on('click', '.remove', function () {
    let index = parseInt($(this).data('id'));

    main.directive.splice(index, 1);

    for (let i = index; i < main.directive.length; i++) {
        $('.user-agent[data-id=' + i + ']').val($('.user-agent[data-id=' + i + ']').val())
        $('.access-directive[data-id=' + i + ']').val($('.access-directive[data-id=' + i + ']').val())
        $('.directory[data-id=' + i + ']').val($('.directory[data-id=' + i + ']').val())
    }
    $('.user-agent[data-id=' + main.directive.length + ']').remove();
    $('.access-directive[data-id=' + main.directive.length + ']').remove();
    $('.directory[data-id=' + main.directive.length + ']').remove();
    $('.remove[data-id=' + main.directive.length + ']').remove();
    $('.directive-row[data-id=' + main.directive.length + ']').remove();

    if (main.directive.length === 0) {
        $('#directive-title').addClass('d-none')
        $('#add-directive').removeClass('d-none')
        $('#add-more-directive').addClass('d-none')
    }
    setRobotResult()
});

// Export Action
$('#export').click(function () {
    var text = $('#json-format').val();
    var blob = new Blob([text], {
        type: "text/plain"
    });
    var anchor = document.createElement("a");
    anchor.download = "robots.txt";
    anchor.href = window.URL.createObjectURL(blob);
    anchor.target = "_blank";
    anchor.style.display = "none";
    document.body.appendChild(anchor);
    anchor.click();
    document.body.removeChild(anchor);

    toastr.success('Successfully Exporting Files', 'Success');
});

// Reset Action
$('#reset').click(function () {
    $('#robotAccess').val('')
    $('#crawlDelay').val('')
    $('#sitemap').val('')

    for (let i = 0; i < main.directive.length; i++) {
        $('.user-agent[data-id=' + i + ']').remove();
        $('.access-directive[data-id=' + i + ']').remove();
        $('.directory[data-id=' + i + ']').remove();
        $('.remove[data-id=' + i + ']').remove();
        $('.directive-row[data-id=' + i + ']').remove();
    }

    $('#json-format').val('')

    main = {
        "defaultaccess": "",
        "crawldelay": "",
        "sitemap": "",
        "directive": []
    }

    if (main.directive.length === 0) {
        $('#directive-title').addClass('d-none')
        $('#add-directive').removeClass('d-none')
        $('#add-more-directive').addClass('d-none')
    }
});

// $('#local-history').on('click', '.delete-history--btn', function () {
//     deleteHistory($(this).data('url'))
// }).on('click', '.history--list', function (e) {
//     if (e.target.classList.contains('delete-history--btn')) return;
//     const _url = $(this).data('url');

//     let histories = localStorage.getItem(ROBOTS_TXT_LOCAL_STORAGE_KEY);
//     histories = histories ? JSON.parse(histories) : [];
//     const history = histories.find(history => {
//         return history.url === _url;
//     });

//     dataResult = history.data;

//     renderAllData(history.data);
// })

// $('#local-history-mobile').on('click', '.delete-history--btn', function () {
//     deleteHistory($(this).data('url'))
// }).on('click', '.history--list', function (e) {
//     if (e.target.classList.contains('delete-history--btn')) return;
//     // analyze($(this).data('url'));
//     const _url = $(this).data('url');

//     let histories = localStorage.getItem(ROBOTS_TXT_LOCAL_STORAGE_KEY);
//     histories = histories ? JSON.parse(histories) : [];
//     const history = histories.find(history => {
//         return history.url === _url;
//     });

//     dataResult = history.data;

//     renderAllData(history.data);
// })

// const ROBOTS_TXT_LOCAL_STORAGE_KEY = 'robots-txt-history'

// const HistoryTemplate = (url, date) => `
// <li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px history--list" data-url="${url}">
//     <div class="d-flex justify-content-between">
//     <div class="local-collection-title">${url}</div>
//     <div class="d-flex align-items-center">
//         <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="${date}"></i>
//         <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-url="${url}"></i>
//     </div>
//     </div>
// </li>
// `;

// const EmptyHistoryTemplate = () => `
// <li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
//     <div class="d-flex justify-content-center text-center">
//     <span>This is your first impressions, no history yet!</span>
//     </div>
// </li>`;

// const HistoryTemplateMobile = (url, date) => `
// <div class="custom-card py-5 px-3 history--list" data-url="${url}">
// <div class="d-flex align-items-center justify-content-between">
//     <div class="local-collection-title">${url}</div>
//     <div class="d-flex align-items-center">
//     <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="${date}"></i>
//     <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-url="${url}"></i>
//     </div>
// </div>
// </div>`;

// const EmptyHistoryTemplateMobile = () => `
// <div class="custom-card py-5 px-3">
// <div class="d-flex justify-content-center text-center">
//     <span>This is your first impressions, no history yet!</span>
// </div>
// </div>`;

// function getHistories() {
//     $('#local-history').empty();
//     $('#local-history-mobile').empty();
//     let histories = localStorage.getItem(ROBOTS_TXT_LOCAL_STORAGE_KEY);
//     histories = histories ? JSON.parse(histories) : [];
//     if (!histories || histories.length === 0) {
//         $('#local-history').append(EmptyHistoryTemplate());
//         $('#local-history-mobile').append(EmptyHistoryTemplateMobile());
//         return;
//     }
//     for (let history of histories.reverse()) {
//         $('#local-history').append(
//             HistoryTemplate(history.url, history.date)
//         );
//         $('#local-history-mobile').append(
//             HistoryTemplateMobile(history.url, history.date)
//         )
//     }
// }

// function addHistory(url, data) {
//     let histories = localStorage.getItem(ROBOTS_TXT_LOCAL_STORAGE_KEY);
//     histories = histories ? JSON.parse(histories) : [];
//     histories.push({
//         url: url,
//         data: data,
//         date: (new Date()).toLocaleDateString('en-GB')
//     })
//     localStorage.setItem(ROBOTS_TXT_LOCAL_STORAGE_KEY, JSON.stringify(histories));
//     getHistories();
// }

// function deleteHistory(_url = null) {
//     let histories = [];
//     if (_url) {
//         histories = localStorage.getItem(ROBOTS_TXT_LOCAL_STORAGE_KEY) || [];
//         if (typeof(histories) === 'string' || histories instanceof String) histories = JSON.parse(histories);
//         histories = histories.filter((history) => {
//             return history.url !== _url;
//         });
//     }

//     localStorage.setItem(ROBOTS_TXT_LOCAL_STORAGE_KEY, JSON.stringify(histories));
//     getHistories();
// }

// $('.clear-history--btn').click(function() {
//     deleteHistory();
// });
