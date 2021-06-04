const LOCAL_STORAGE_KEY = 'hreflang-checker-history';
const HREFLANG_CHECKER_COUNTER_KEY = 'hreflang-checker-counter';

var jqueryRequest = null;

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

    if (data.length === 0) {
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
