const LINK_ANALYZER_LOCAL_STORAGE_KEY = 'link-analyzer-history'
const LINK_ANALYZER_COUNTER_KEY = 'link-analyzer-counter';
var jqueryRequest = undefined;
var dataResult = undefined;
var counter = 1;
var analyzeChart = undefined;

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


const LinkTemplate = (no, url, rels, title) => `
<div class="d-flex mx-5 result-row">
  <div class="number-analyzer d-flex align-items-center">
    <span class="label label-square label-analyzer">${no}</span>
  </div>
  <div class="url-analyzer d-flex align-items-center">
    <p class="mb-0" data-toggle="tooltip" data-theme="dark" title="${url}">${url}</p>
  </div>
  <div class="link-rel-analyzer d-flex align-items-center">
    <p class="mb-0">${rels}</p>
  </div>
  <div class="anchor-analyzer d-flex align-items-center">
    <p class="mb-0">${title}</p>
  </div>
</div>
<hr class="my-3">
`

function getHistories() {
    $('#local-history').empty();
    $('#local-history-mobile').empty();
    let histories = localStorage.getItem(LINK_ANALYZER_LOCAL_STORAGE_KEY);
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
    let histories = localStorage.getItem(LINK_ANALYZER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    histories.push({
        url: url,
        data: data,
        date: (new Date()).toLocaleDateString('en-GB')
    })
    localStorage.setItem(LINK_ANALYZER_LOCAL_STORAGE_KEY, JSON.stringify(histories));
    getHistories();
}

function deleteHistory(_url = null) {
    let histories = [];
    if (_url) {
        histories = localStorage.getItem(LINK_ANALYZER_LOCAL_STORAGE_KEY) || [];
        if (typeof(histories) === 'string' || histories instanceof String) histories = JSON.parse(histories);
        histories = histories.filter((history) => {
            return history.url !== _url;
        });
    }

    localStorage.setItem(LINK_ANALYZER_LOCAL_STORAGE_KEY, JSON.stringify(histories));
    getHistories();
}

function analyze(_url) {
    if (checkUrl(_url)) {
        jqueryRequest = $.post({
            url: LINK_ANALYZER_API_URL,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'url': _url
            },
            beforeSend: () => {
                updateProgressBar(50);
                $('#progress-stop-message').hide();
                $('#progress-start-message').show();
                $('#progress-finish-message').hide();
                $('#cancel-request-btn')
                    .removeClass('btn-cancel-disabled')
                    .addClass('btn-cancel')
                    .removeAttr('disabled');
                updateProgressBar(20);
            },
            success: (res) => {
                if (res.statusCode === 200) {
                    // Render stats value
                    dataResult = res.data;

                    increaseCounter(LINK_ANALYZER_COUNTER_KEY);
                    addHistory(_url, res.data)
                    renderAllData(res.data);
                } else {
                    toastr.error(res.message, 'Error API');
                }
            },
            error: (err) => {
                if (err.responseJSON) {
                    toastr.error(err.responseJSON.message, 'Error API');
                } else {
                    toastr.error('Canceled', 'Error');
                }
            },
            complete: () => {
                $('#progress-start-message').hide();
                $('#progress-finish-message').show();
                updateProgressBar(100);
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
    $('#external-link-list').empty();
    $('#internal-link-list').empty();
    $('#show-more-internal').addClass('d-flex').show();
    $('#show-more-external').addClass('d-flex').show();
    $('#empty-container').hide();
    $('#analyzer-container').show();

    createChart(
        data.internal_links.value,
        data.external_links.value,
        data.nofollow_links.value,
        data.dofollow_links.value
    )
    renderStatsValue(data);
    $('#external-links-value-tab').text(`External Links (${data.external_links.value})`);
    $('#internal-links-value-tab').text(`Internal Links (${data.internal_links.value})`);
    counter = 1;
    checkCounter(LINK_ANALYZER_COUNTER_KEY, () => {
        $('#cta-danger').show();
    })
    renderListOfLinks(10);
}

function renderStatsValue(data) {
    $('#total-links-value').text(data.links.value);
    $('#percentage-links-value').text(`${data.links.percentage}%`);
    $('#internal-links-value').text(data.internal_links.value);
    $('#internal-links-percentage').text(`${data.internal_links.percentage}%`);
    $('#external-links-value').text(data.external_links.value);
    $('#external-links-percentage').text(`${data.external_links.percentage}%`);
    $('#nofollow-links-value').text(data.nofollow_links.value);
    $('#nofollow-links-percentage').text(`${data.nofollow_links.percentage}%`);
    $('#dofollow-links-value').text(data.dofollow_links.value);
    $('#dofollow-links-percentage').text(`${data.dofollow_links.percentage}%`);
}

function renderListOfLinks(amount = 10) {
    const internalLinks = dataResult.internal_links.links.slice(0, amount);
    const externalLinks = dataResult.external_links.links.slice(0, amount);
    // console.log(internalLinks)
    dataResult.internal_links.links = dataResult.internal_links.links.slice(amount);
    dataResult.external_links.links = dataResult.external_links.links.slice(amount);

    if (dataResult.internal_links.links.length === 0) {
        $('#show-more-internal').removeClass('d-flex').hide();
    }

    if (dataResult.external_links.links.length === 0) {
        $('#show-more-external').removeClass('d-flex').hide();
    }

    let no = counter;
    for (let link of internalLinks) {
        $('#internal-link-list').append(
            LinkTemplate(no++, link.url, link.rels.length ? link.rels.join(', ') : ' - ', link.title)
        )
    }

    no = counter;
    for (let link of externalLinks) {
        $('#external-link-list').append(
            LinkTemplate(no++, link.url, link.rels.length ? link.rels.join(', ') : ' - ', link.title)
        )
    }

    counter += amount;
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
        // console.log(e)
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

function createChart(internal_link_value, external_link_value, nofollow_link_value, dofollow_link_value) {
    var ctx = document.getElementById('analyzer-chart').getContext('2d');
    if (analyzeChart != null) {
        analyzeChart.data.datasets[0].data = [internal_link_value, external_link_value, nofollow_link_value, dofollow_link_value];
        analyzeChart.update();
    } else {
        analyzeChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Internal Links', 'External Links', 'No-Follow', 'Do-Follow'],
                datasets: [{
                    label: '# of Votes',
                    data: [internal_link_value, external_link_value, nofollow_link_value, dofollow_link_value],
                    backgroundColor: [
                        'rgba(24,160,251,1)',
                        'rgb(251,201,24,1)',
                        'rgba(151,24,251,1)',
                        'rgba(255,86,86,1)'
                    ],
                    borderColor: [
                        'rgba(24,160,251,1)',
                        'rgb(251,201,24,1)',
                        'rgba(151,24,251,1)',
                        'rgba(255,86,86,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    align: 'start',
                    padding: 20
                },
                scales: {
                    xAxes: [{
                        display: false,
                    }],
                    yAxes: [{
                        display: false,
                    }]
                },
                tooltips: {
                    backgroundColor: '#fff',
                    cornerRadius: 0,
                    displayColors: false,
                    titleFontFamily: "'Roboto', sans-serif",
                    titleFontColor: '#2A2F33',
                    bodyAlign: 'center',
                    bodyFontFamily: "'Roboto', sans-serif",
                    bodyFontColor: '#2A2F33',
                    bodyFontStyle: 'normal',
                }
            }
        });
    }
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

    let histories = localStorage.getItem(LINK_ANALYZER_LOCAL_STORAGE_KEY);
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

    let histories = localStorage.getItem(LINK_ANALYZER_LOCAL_STORAGE_KEY);
    histories = histories ? JSON.parse(histories) : [];
    const history = histories.find(history => {
        return history.url === _url;
    });

    dataResult = history.data;

    renderAllData(history.data);
})

$('#analyze-btn').click(function() {
    analyze($('#input-url').val());
    $('#cta-danger').hide();
})

$('.show-more--btn').click(function() {
    renderListOfLinks(10);
});

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
});
