const LOCAL_STORAGE_KEY = 'redirect-chain-checker-history';
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
                if (err.responseJSON) {
                    if (err.responseJSON.statusCode === 429) {
                        let { minute, second } = convertSecond(err.responseJSON.data.current_time);
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

function renderAllData(data) {
    $('#redirect-result-container').show();
    $('#redirect-result-empty').hide();
    $('#redirect-result').empty().show();
    $('#cta-danger').hide();

    if (data.redirects.length > 3) {
        $('#cta-danger').show();
    }

    for (let redirect of data.redirects) {
        $('#redirect-result').append(
            RedirectResultTemplate(redirect.url, redirect.status, redirect.date)
        )
    }
}
