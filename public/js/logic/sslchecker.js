triggerEnter('#btn-ssl', '#url');
$(document).ready(function() {
    $('#noCrawl').show()
    $('#crawlHttps').hide()
    $('#crawlHttp').hide()
    clearTable()
    refreshLocalStorage()
})

$('#url').on('input', function() {
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

function clearTable() {
    $("#noCrawlResult").show();
    $("#generateCrawlResult").hide();
}

$('#crawlButton').on('click', function() {
    let url = $('#url').val().replace(/^(http(s)?|ftp):\/\//, '');
    url = url.substr(url.length - 1) === '/' ? url.slice(0, -1) : url;
    $.ajax({
        url: SSL_CHECKER_URL,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            url: url
        },
        success: (response) => {
            $('#cta-danger').hide()
            if (response.statusCode === 200){
                renderData(response.data, true)
                save(response.data, url)
                refreshLocalStorage()
                toastr.success('Success scan your ssl', 'Success');
            }else {
                toastr.error('Domain Not found', 'Error');
                $('#result').empty()
                $('#noCrawlResult').show()
            }
        },
        error: (error) => {
            $('#result').empty()
            $('#noCrawlResult').show()
            if (lang === 'en')
                toastr.error('Error happen during proses', 'Error')
            else toastr.error('Error terjadi selama proses berlangsung', 'Error')
        }
    })
});

let getData = function(index) {
    let data = JSON.parse(localStorage.getItem('ssl-checker'))[index]
    $('#url').val(data.url)
    renderData(data)
}

let renderData = function(response, cta = false) {
    if (response) {
        $('#result').empty()
        $('#noCrawlResult').hide()
        let expDate = new Date(response.valid_to)
        let difDate = expDate.getTime() - new Date().getTime()
        let displayText;
        let icon;
        let textExpired;
        if (difDate < 0) {
            if (cta){
                $('#cta-danger').show()
            }else {
                $('#cta-danger').hide()
            }
            displayText = `SSL Certificate expired on ${expDate.getDate()}th, ${parseMonth(expDate.getMonth()+1)} ${expDate.getFullYear()} (${(Math.abs(difDate)/(1000*3600*24)).toFixed(0)} days ago).`
            icon = `<i class='bx bxs-x-circle bx-md' style="color:#D60404"></i>`
            textExpired = `Your TSL Certificate is expired`
        } else {
            displayText = `SSL Certificate expired on ${expDate.getDate()}th, ${parseMonth(expDate.getMonth()+1)} ${expDate.getFullYear()} (${(Math.abs(difDate)/(1000*3600*24)).toFixed(0)} days from now).`
            icon = `<i class='bx bxs-check-circle bx-md' style="color:#67B405"></i>`
            textExpired = `TLS Certificate is installed well.`
        }
        let display = `<div class="d-flex align-items-center mx-5">
                    <i class='bx bxs-check-circle bx-md' style="color:#67B405"></i>
                    <span class="mx-3 technology-name h5 mb-0 text-darkgrey">TLS Certificate</span>
                </div>
                <hr>
                <div class="mx-5 text-black font-weight-bold">
                  <p>Common Name = ${response.subject.CN}</p>
                  <p>Subject Alternative Names = ${response.subjectaltname}</p>
                  <p>Issuer = ${response.issuer.CN}</p>
                  <p>Serial Number = ${response.serialNumber}</p>
                  <p>SHA1 Thumbprint = ${response.fingerprint}</p>
                </div>
                <div class="d-flex align-items-center mx-5 mt-10">
                    ${icon}
                    <span class="mx-3 technology-name h5 mb-0 text-darkgrey">TLS Certificate Expiration Date</span>
                </div>
                <hr>
                <div class="mx-5 text-black font-weight-bold">
                  <p>${displayText}</p>
                </div>
                <div class="d-flex align-items-center mx-5 mt-10">
                    ${icon}
                    <span class="mx-3 technology-name h5 mb-0 text-darkgrey">TLS Certificate Installation Status</span>
                </div>
                <hr>
                <div class="mx-5 text-black font-weight-bold">
                  <p>${textExpired}</p>
                </div>`
        $('#result').append(display)
    }
}

let save = function(data, url) {
    if (data) {
        let local = localStorage.getItem('ssl-checker')
        let temp = []
        if (local) {
            temp = JSON.parse(local)
        }
        let urlFormatted = {
            url: url
        }
        Object.assign(data, urlFormatted)
        temp.push(data)
        localStorage.setItem('ssl-checker', JSON.stringify(temp))
    }
}

const refreshLocalStorage = function() {
    let no_history = lang === 'en' ? 'This is your first impressions, no history yet!' : 'Ini adalah kesan pertama Anda, belum ada riwayat!';

    try {
        const month = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DES']
        $('#localsavemobile').empty();
        $('#localsavedesktop').empty();
        const keys = JSON.parse(localStorage.getItem('ssl-checker'))
        if (keys) {
            if (keys.length > 0){
                let index = 0;
                for (let key of keys) {
                    let date = new Date()
                    let formatDate = `Created at ${date.getHours() < 10 ? ('0'+date.getHours()) : date.getHours()}.${date.getMinutes() < 10 ? ('0'+date.getMinutes()) : date.getMinutes()} | ${date.getDate()}, ${month[date.getMonth()]} ${date.getFullYear()}`
                    let div = `<div class="custom-card py-5 px-3" onclick="getData(${index})">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="local-collection-title">${key.url}
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
                    <div class="local-collection-title">${key.url}</div>
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
                    <span>` + no_history + `</span>
                  </div>
                </li>`
                let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + no_history + `</span>
                    </div>
                </div>`

                $('#localsavemobile').append(div)
                $('#localsavedesktop').append(div2)
            }
        } else {
            let div2 = `<li id="empty-impression" class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                  <div class="d-flex justify-content-center text-center">
                    <span>` + no_history + `</span>
                  </div>
                </li>`
            let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + no_history + `</span>
                    </div>
                </div>`

            $('#localsavemobile').append(div)
            $('#localsavedesktop').append(div2)
        }
    } catch (e) {
        console.log(e)
    }
}

let removeLocal = function(index) {
    const keys = JSON.parse(localStorage.getItem('ssl-checker'))
    keys.splice(index, 1)
    localStorage.setItem('ssl-checker', JSON.stringify(keys))
    refreshLocalStorage()
    $('#result').empty()
    $('#noCrawlResult').show()
}

let clearAll = function () {
    localStorage.removeItem('ssl-checker')
    refreshLocalStorage();
}


function parseMonth(month) {
    switch (month) {
        case 1:
            return 'January';
            break;
        case 2:
            return 'February';
            break;
        case 3:
            return 'March';
            break;
        case 4:
            return 'April';
            break;
        case 5:
            return 'May';
            break;
        case 6:
            return 'June';
            break;
        case 7:
            return 'July';
            break;
        case 8:
            return 'August';
            break;
        case 9:
            return 'September';
            break;
        case 10:
            return 'October';
            break;
        case 11:
            return 'November';
            break;
        case 12:
            return 'December';
            break;
    }
}

function parseMonthId(month) {
    switch (month) {
        case 1:
            return 'Januari';
            break;
        case 2:
            return 'Februari';
            break;
        case 3:
            return 'Maret';
            break;
        case 4:
            return 'April';
            break;
        case 5:
            return 'Mei';
            break;
        case 6:
            return 'Juni';
            break;
        case 7:
            return 'Juli';
            break;
        case 8:
            return 'Agustus';
            break;
        case 9:
            return 'September';
            break;
        case 10:
            return 'Oktober';
            break;
        case 11:
            return 'November';
            break;
        case 12:
            return 'Desember';
            break;
    }
}
