const HREFLANG_CHECKER_LOCAL_STORAGE_KEY = 'hreflang-checker-history';
const HREFLANG_CHECKER_COUNTER_KEY = 'hreflang-checker-counter';

var jqueryRequest = null;

if (lang == "en") {
    var created_at = "Created at "
    var localStorageNone = "This is your first impressions, no history yet!";
} else if (lang == "id") {
    var created_at = "Dibuat pada "
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!";
}

const HistoryTemplate = (url, date) => `
<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px history--list" data-url="${url}">
  <div class="d-flex justify-content-between">
    <div class="local-collection-title">${url}</div>
    <div class="d-flex align-items-center">
      <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="${created_at}${date}"></i>
      <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-url="${url}"></i>
    </div>
  </div>
</li>
`;

const EmptyHistoryTemplate = () => `
<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
  <div class="d-flex justify-content-center text-center">
    <span>` + localStorageNone + `</span>
  </div>
</li>`;

const HistoryTemplateMobile = (url, date) => `
<div class="custom-card py-5 px-3 history--list" data-url="${url}">
<div class="d-flex align-items-center justify-content-between">
  <div class="local-collection-title">${url}</div>
  <div class="d-flex align-items-center">
    <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="${date}"></i>
    <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-url="${url}"></i>
  </div>
</div>
</div>`;

const EmptyHistoryTemplateMobile = () => `
<div class="custom-card py-5 px-3">
<div class="d-flex justify-content-center text-center">
  <span>` + localStorageNone + `</span>
</div>
</div>`;

const HreflangResultTemplate = (no, url, hreflang, language, region) => `
<div class="d-flex mx-5 result-row">
  <div class="number-hreflang">
    <span class="label label-square label-hreflang">${no}</span>
  </div>
  <div class="url-hreflang">
    <p class="mb-0" data-toggle="tooltip" data-theme="dark" title="${url}">${url}</p>
  </div>
  <div class="hreflang">
    <p class="mb-0">${hreflang}</p>
  </div>
  <div class="language-hreflang">
    <p class="mb-0" data-toggle="tooltip" data-theme="dark" title="${language}">${language}</p>
  </div>
  <div class="region-hreflang">
    <p class="mb-0" data-toggle="tooltip" data-theme="dark" title="${region}">${region}</p>
  </div>
</div>
<hr class="my-3">`;

function getHistories() {
    $('#local-history').empty();
    $('#local-history-mobile').empty();
    let histories = localStorage.getItem(HREFLANG_CHECKER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    if (!histories || histories.length === 0) {
        $('#local-history').append(EmptyHistoryTemplate());
        $('#local-history-mobile').append(EmptyHistoryTemplateMobile());
        return;
    }
    for (let history of histories.reverse()) {
        $('#local-history').append(
            HistoryTemplate(history.url, history.date)
        );
        $('#local-history-mobile').append(
            HistoryTemplateMobile(history.url, history.date)
        )
    }
}

function addHistory(url, data) {
    let histories = localStorage.getItem(HREFLANG_CHECKER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    histories.push({
        url: url,
        data: data,
        date: (new Date()).toLocaleDateString('en-GB')
    })
    localStorage.setItem(HREFLANG_CHECKER_LOCAL_STORAGE_KEY, JSON.stringify(histories));
    getHistories();
}

function deleteHistory(_url = null) {
    let histories = [];
    if (_url) {
        histories = localStorage.getItem(HREFLANG_CHECKER_LOCAL_STORAGE_KEY) || [];
        if (typeof(histories) === 'string' || histories instanceof String) histories = JSON.parse(histories);
        histories = histories.filter((history) => {
            return history.url !== _url;
        });
    }

    localStorage.setItem(HREFLANG_CHECKER_LOCAL_STORAGE_KEY, JSON.stringify(histories));
    getHistories();
}

function analyze(_url) {
    if (checkUrl(_url)) {
        jqueryRequest = $.post({
            url: HREFLANG_API_URL,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'url': _url
            },
            beforeSend: () => {
                $('#cancel-request-btn')
                    .removeClass('btn-cancel-disabled')
                    .addClass('btn-cancel')
                    .removeAttr('disabled');
                updateProgressBar(20);
                $('#progress-stop-message').hide();
                $('#progress-finish-message').hide();
                $('#progress-start-message').show();
            },
            success: (res) => {
                if (res.statusCode === 200) {
                    increaseCounter(HREFLANG_CHECKER_COUNTER_KEY);
                    updateProgressBar(50);
                    addHistory(_url, res.data);
                    renderAllData(res.data);
                } else {
                    $('#hreflang-result-header').attr('style', 'display: none !important;');
                    toastr.error(res.message, 'Error API');
                }
            },
            error: (err) => {
                if (err.responseJSON) {
                    toastr.error(err.responseJSON.message, 'Error API');
                } else {
                    toastr.error('Canceled', 'Error');
                }

                $('#no-crawl-result').show();
            },
            complete: () => {
                updateProgressBar(100);
                $('#progress-start-message').hide();
                $('#progress-finish-message').show();
                $('#cancel-request-btn')
                    .removeClass('btn-cancel')
                    .addClass('btn-cancel-disabled')
                    .attr('disabled', 'disabled')
            }
        })
    } else {
        toastr.error('URL Format is not valid', 'Error')
    }
}

function renderAllData(data) {
    $('#no-crawl-result').hide();
    $('#cta-warning').hide();
    $("#hreflang-result-list").empty();
    let _counter = 1;

    if(data.length === 0) {
        // if no result
        $('#no-crawl-result').show();
        $('#hreflang-result-list').append(
            `<p class="text-center d-block">There is no hreflang found</p>`
        );
        $('#hreflang-result-header').attr('style', 'display: none !important;');
        checkCounter(HREFLANG_CHECKER_COUNTER_KEY, () => {
            $('#cta-warning').show();
        })
    } else {
        $('#hreflang-result-header').removeAttr('style');
        for (let _data of data) {
            $("#hreflang-result-list")
                .append(
                    HreflangResultTemplate(_counter++,
                        _data.url,
                        _data.hreflang,
                        _data.language ? _data.language.name : 'undefined',
                        _data.location ? _data.location.name : 'undefined')
                )
        }
    }
}

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

$('#local-history').on('click', '.delete-history--btn', function() {
    deleteHistory($(this).data('url'))
}).on('click', '.history--list', function(e) {
    if (e.target.classList.contains('delete-history--btn')) return;
    const _url = $(this).data('url');

    let histories = localStorage.getItem(HREFLANG_CHECKER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    const history = histories.find(history => {
        return history.url === _url;
    });

    dataResult = history.data;

    renderAllData(history.data);
})

$('#local-history-mobile').on('click', '.delete-history--btn', function() {
    deleteHistory($(this).data('url'))
}).on('click', '.history--list', function(e) {
    if (e.target.classList.contains('delete-history--btn')) return;
    // analyze($(this).data('url'));
    const _url = $(this).data('url');

    let histories = localStorage.getItem(HREFLANG_CHECKER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    const history = histories.find(history => {
        return history.url === _url;
    });

    dataResult = history.data;

    renderAllData(history.data);
})

$('#check-btn').click(function() {
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

$('.clear-history--btn').click(function() {
    deleteHistory();
})
