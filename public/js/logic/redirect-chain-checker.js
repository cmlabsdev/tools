if (lang == "en") {
    var created_at = "Created at "
    var localStorageNone = "This is your first impressions, no history yet!"
} else if (lang == "id") {
    var created_at = "Dibuat pada "
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!"
}

const REDIRECT_CHAIN_CHECKER_LOCAL_STORAGE_KEY = 'redirect-chain-checker-history';
const REDIRECT_CHAIN_CHECKER_COUNTER_KEY = 'redurect-chain-checker-counter';

const RedirectResultTemplate = (url, status_code, date) => `
<div class="row px-5">
  <div class="col-6">
    <div class="d-flex align-items-center">
      <p class="mb-0 redirect-url-result-link" data-toggle="tooltip" data-theme="dark" title="${url}">${url}</p>
    </div>
  </div>
  <div class="col-6">
    <div class="d-flex align-items-center justify-content-between">
      <span class="label label-primary label-inline font-weight-normal ml-8" data-toggle="tooltip" data-theme="dark" title="Redirect">${status_code}</span>
      <p id="" class="text-black mb-0 desktopDate d-none d-md-block"><em>${date}</em></p>
      <i id="" class="bx bxs-info-circle bx-sm text-darkgrey mr-2 mobileDate d-md-none" data-toggle="tooltip" data-theme="dark" title="${date}"></i>
    </div>
  </div>
</div>
<hr class="my-3">`;

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
    <span>${localStorageNone}</span>
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
  <span>${localStorageNone}</span>
</div>
</div>`;

function getHistories() {
    $('#local-history').empty();
    $('#local-history-mobile').empty();
    let histories = localStorage.getItem(REDIRECT_CHAIN_CHECKER_LOCAL_STORAGE_KEY);
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
    let histories = localStorage.getItem(REDIRECT_CHAIN_CHECKER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    histories.push({
        url: url,
        data: data,
        date: (new Date()).toLocaleDateString('en-GB')
    })
    localStorage.setItem(REDIRECT_CHAIN_CHECKER_LOCAL_STORAGE_KEY, JSON.stringify(histories));
    getHistories();
}

function deleteHistory(_url = null) {
    let histories = [];
    if (_url) {
        histories = localStorage.getItem(REDIRECT_CHAIN_CHECKER_LOCAL_STORAGE_KEY) || [];
        if (typeof (histories) === 'string' || histories instanceof String) histories = JSON.parse(histories);
        histories = histories.filter((history) => {
            return history.url !== _url;
        });
    }

    localStorage.setItem(REDIRECT_CHAIN_CHECKER_LOCAL_STORAGE_KEY, JSON.stringify(histories));
    getHistories();
}

function analyze(_url) {
    if (checkUrl(_url)) {
        $.post({
            url: REDIRECT_CHAIN_CHECKER_API_URL,
            data: {
                _token: $('meta[name=csrf-token]').attr('content'),
                url: _url,
                user_agent: $('#user-agent-select').val()
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
                    renderAllData(res.data);
                    addHistory(_url, res.data);
                    getHistories();
                } else {
                    $('#redirect-result').hide();
                    $('#redirect-result-empty').show();
                    toastr.error(res.message, 'Error')
                }
            },
            error: (err) => {
                if(err.responseJSON){
                    if(err.responseJSON.statusCode === 429){
                        let {minute, second} = convertSecond(err.responseJSON.data.current_time);
                        toastr.error(`Please wait for ${minute} minutes and ${second} seconds`, `Error ${err.responseJSON.message}`)
                    } else {
                        toastr.error(err.responseJSON.message, 'Error')
                    }
                } else {
                    toastr.error(err.statusText, 'Error');
                }

                $('#redirect-result').hide();
                $('#redirect-result-empty').show();
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
        $('#redirect-result').hide();
        $('#redirect-result-empty').show();
        toastr.error('URL Format is not valid', 'Error')
    }
}

function renderAllData(data){
    $('#redirect-result-container').show();
    $('#redirect-result-empty').hide();
    $('#redirect-result').empty().show();
    $('#cta-danger').hide();

    if(data.redirects.length > 3) {
        $('#cta-danger').show();
    }

    for (let redirect of data.redirects) {
        $('#redirect-result').append(
            RedirectResultTemplate(redirect.url, redirect.status, redirect.date)
        )
    }
}

function formatDate(date){
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

function getProtocol(url){
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

$('#input-url').keyup(function () {
    const _url = $(this).val();
    if(checkUrl(_url)){
        $('#empty-url').hide();
        const _protocol = getProtocol(_url)
        if(_protocol === 'https:') {
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

$('#local-history').on('click', '.delete-history--btn', function () {
    deleteHistory($(this).data('url'))
}).on('click', '.history--list', function (e) {
    if (e.target.classList.contains('delete-history--btn')) return;
    const _url = $(this).data('url');

    let histories = localStorage.getItem(REDIRECT_CHAIN_CHECKER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    const history = histories.find(history => {
        return history.url === _url;
    });

    dataResult = history.data;

    renderAllData(history.data);
})

$('#local-history-mobile').on('click', '.delete-history--btn', function () {
    deleteHistory($(this).data('url'))
}).on('click', '.history--list', function (e) {
    if (e.target.classList.contains('delete-history--btn')) return;
    // analyze($(this).data('url'));
    const _url = $(this).data('url');

    let histories = localStorage.getItem(REDIRECT_CHAIN_CHECKER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    const history = histories.find(history => {
        return history.url === _url;
    });

    dataResult = history.data;

    renderAllData(history.data);
})

$('.clear-history--btn').click(function(){
    deleteHistory();
});

$('#analyze-btn').click(function(){
    analyze($('#input-url').val());
})
