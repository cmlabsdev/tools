const LOCAL_STORAGE_KEY = 'tech-lookup-history';

const TechnologyTemplate = (title, icon, category, version) => `
<div class="d-flex justify-content-between align-items-center mx-5">
  <div class="d-flex align-items-center">
    <img src="/media/technologyLookup/icons/${icon}" alt="" width="20px">
    <span class="mx-3 technology-name">${title}</span>
    ${version}
  </div>
  <div class="">
    <span>${category}</span>
  </div>
</div>
<hr>`;

function convertSecond(seconds) {
    let minute = (seconds / 60).toFixed(0);
    let second = seconds % 60;
    return {
        minute,
        second
    }
}

function analyzeUrl(_url) {
    if (checkUrl(_url)) {
        $('#technology-lookup-result-total').text("")
        $.post({
            url: LOOKUP_API_URL,
            data: {
                _token: $('meta[name=csrf-token]').attr('content'),
                url: _url
            },
            beforeSend: () => {
                KTApp.block('#technology-lookup-result-container', {
                    overlayColor: 'gray',
                    opacity: 0.1,
                    state: 'primary'
                });
            },
            success: (res) => {
                if (res.statusCode === 200) {
                    renderAllData(res.data);
                    addHistory(_url, res.data);
                    getHistories();
                } else if (err.responseJSON.statusCode === 429) {
                    let {
                        minute,
                        second
                    } = convertSecond(err.responseJSON.data.current_time);
                    toastr.error(`Please wait for ${minute} minutes and ${second} seconds`, `Error ${err.responseJSON.message}`)
                } else {
                    $('#technology-lookup-result-list').hide();
                    $('#technology-lookup-result-empty').show();
                    toastr.error(res.message, 'Error')
                }
            },
            error: (err) => {
                console.log(err);
                if (err.responseJSON.statusCode === 429) {
                    let {
                        minute,
                        second
                    } = convertSecond(err.responseJSON.data.current_time);
                    toastr.error(`Please wait for ${minute} minutes and ${second} seconds`, `Error ${err.responseJSON.message}`)
                } else {
                    toastr.error(err.responseJSON.message, 'Error')
                }
                $('#technology-lookup-result-list').hide();
                $('#technology-lookup-result-empty').show();
            },
            complete: () => {
                KTApp.unblock('#technology-lookup-result-container');
            }
        })
    } else {
        $('#technology-lookup-result-list').hide();
        $('#technology-lookup-result-empty').show();
        toastr.error('URL Format is not valid', 'Error')
        KTApp.unblock('#technology-lookup-result-container');
    }
}

function renderAllData(data) {
    $('#technology-lookup-result-empty').hide();
    $('#technology-lookup-result-list').empty().show();
    $('#technology-lookup-result-total').text(`(${data.technologies.length})`)
    for (let technology of data.technologies) {
        let _versionLabel = technology.version != null ? `<span class="label label-primary-version label-inline font-weight-normal px-2">${technology.version}</span>` : '';
        $('#technology-lookup-result-list').append(
            TechnologyTemplate(technology.name, technology.icon, technology.categories[0].name, _versionLabel)
        )
    }
}
