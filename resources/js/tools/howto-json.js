var _supplyCounter = 0;
var _toolsCounter = 0;
var _stepCounter = 0;

const howToSchema = class {
    constructor() {
        this.name = '';
        this.description = undefined;
        this.image = undefined;
        this.totalTime = undefined;
        this.supplyItem = [];
        this.tools = [];
        this.step = [];
        this.costEstimate = undefined;
        this.currency = undefined;
        this.estimate = {
            "@type": "MonetaryAmount",
            "currency": "",
            "value": ""
        };
    }

    resetRender() {
        _stepCounter = 0;
        _toolsCounter = 0;
        _supplyCounter = 0;

        this.name = '';
        this.description = undefined;
        this.image = undefined;
        this.totalTime = undefined;
        this.supplyItem = [];
        this.tools = [];
        this.step = [];
        this.costEstimate = undefined;
        this.currency = undefined;
        this.estimate = {
            "@type": "MonetaryAmount",
            "currency": "",
            "value": ""
        };

        const obj = {
            "@context": "https://schema.org",
            "@type": "HowTo",
            name: this.name,
        };
        obj.name = this.name;

        if (this.description) obj.description = this.description;
        if (this.image) obj.image = this.image;
        if (this.totalTime) obj.totalTime = "PT" + this.totalTime + "M";
        if (this.estimate.currency || this.estimate.value) obj.estimatedCost = this.estimate;
        if (this.supplyItem.length > 0) {
            if (this.supplyItem.length === 1) {
                obj.supply = this.supplyItem[0];
            } else {
                obj.supply = this.supplyItem;
            }
        }
        if (this.tools.length > 0) {
            if (this.tools.length === 1) {
                obj.tool = this.tools[0];
            } else {
                obj.tool = this.tools;
            }
        }
        if (this.step.length > 0) {
            if (this.step.length === 1) {
                obj.step = this.step[0];
            } else {
                obj.step = this.step;
            }
        }
        print(obj);
        return obj;
    }

    render() {
        const obj = {
            "@context": "https://schema.org",
            "@type": "HowTo",
            name: this.name,
        };
        obj.name = this.name;

        if (this.description) obj.description = this.description;
        if (this.image) obj.image = this.image;
        if (this.totalTime) obj.totalTime = "PT" + this.totalTime + "M";
        if (this.estimate.currency || this.estimate.value) obj.estimatedCost = this.estimate;
        if (this.supplyItem.length > 0) {
            if (this.supplyItem.length === 1) {
                obj.supply = this.supplyItem[0];
            } else {
                obj.supply = this.supplyItem;
            }
        }
        if (this.tools.length > 0) {
            if (this.tools.length === 1) {
                obj.tool = this.tools[0];
            } else {
                obj.tool = this.tools;
            }
        }
        if (this.step.length > 0) {
            if (this.step.length === 1) {
                obj.step = this.step[0];
            } else {
                obj.step = this.step;
            }
        }
        print(obj);
        return obj;
    }
}

let howToFormat = new howToSchema();
howToFormat.step.push({
    "@type": "HowToStep",
    "text": "",
})
howToFormat.render();

$('#add-howto-supply').click(function () {
    if (howToFormat.supplyItem.length > 0) _supplyCounter++;
    howToFormat.supplyItem.push({
        "@type": "HowToSupply",
        "name": ""
    })
    howToFormat.render();
    $('#howto-supply').append("<input type='hidden' id='supplyCounter' value='" + (_supplyCounter) + "'><div class=\"row mb-5 supply-name\" data-id=\"" + (_supplyCounter) + "\"><div class=\"col-10\" data-id=\"" + (_supplyCounter) + "\"><label class=\"text-black font-weight-bold\" for=\"tool\" data-id=\"" + (_supplyCounter) + "\">Supply #<span class='supplyCount'>" + (_supplyCounter + 1) + "</span></label>\n" +
        "                <input type=\"text\" name=\"\" class=\"form-control supplyName\" placeholder=\"" + placeholder_supplyTool1 + " supply #" + (_supplyCounter + 1) + " " + placeholder_supplyTool2 + "\" value=\"\" data-id=\"" + (_supplyCounter) + "\"></div><div class=\"col-2\"><div class=\"d-flex justify-content-center mt-9\"><i class=\'bx bxs-x-circle bx-md text-darkgrey delete deleteSupply\' data-id=\"" + (_supplyCounter) + "\"></i></div></div>"
    );
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
});

$('#add-howto-tool').click(function () {
    if (howToFormat.tools.length > 0) _toolsCounter++;
    howToFormat.tools.push({
        "@type": "HowToTool",
        "name": "",
    })
    howToFormat.render();
    $('#howto-tool').append("<input type='hidden' id='toolsCounter' value='" + (_toolsCounter) + "'><div class=\"row mb-5 tools-name\" data-id=\"" + (_toolsCounter) + "\"><div class=\"col-10\" data-id=\"" + (_toolsCounter) + "\"><label class=\"text-black font-weight-bold\" for=\"tool\" data-id=\"" + (_toolsCounter) + "\">Tool # <span class='toolsCount'>" + (_toolsCounter + 1) + "</span></label>\n" +
        "                <input type=\"text\" name=\"\" class=\"form-control tool\" placeholder=\"" + placeholder_supplyTool1 + " tool #" + (_toolsCounter + 1) + " " + placeholder_supplyTool2 + "\" value=\"\" data-id=\"" + (_toolsCounter) + "\"></div><div class=\"col-2\"><div class=\"d-flex justify-content-center mt-9\"><i class=\'bx bxs-x-circle bx-md text-darkgrey delete deleteTool\' data-id=\"" + (_toolsCounter) + "\"></i></div></div>"
    );
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
});

$('#add-howto-step').click(function () {
    _stepCounter++;
    howToFormat.step.push({
        "@type": "HowToStep",
        "text": "",
    });
    howToFormat.render();
    $('#howto-step').append("<div class='loopStep' data-id='" + (_stepCounter) + "'><input type='hidden' class='stepCounter' data-id=\"" + (_stepCounter) + "\" value='" + (howToFormat.step.length - 1) + "'><div class=\"row\" data-id=\"" + (_stepCounter) + "\"><div class=\"col-10 col-sm-11\"><label class=\"text-black font-weight-bold\" for=\"instructions\" data-id=\"" + (_stepCounter) + "\">" + label_instructions1 + " #<span class='counter' data-id=\"" + (_stepCounter) + "\">" + (_stepCounter + 1) + "</span>: " + label_instructions2 + "</label>\n" +
        "                <input type=\"text\" name=\"\" class=\"form-control instructions mb-5\" placeholder=\"" + placeholder_instructions + "\" value=\"\" data-id=\"" + (_stepCounter) + "\"></div><div class=\"col-2 col-sm-1\"><div class=\"d-flex justify-content-center mt-9\"><i class=\'bx bxs-x-circle bx-md text-darkgrey delete deleteStep\' data-id=\"" + (_stepCounter) + "\"></i></div></div></div>\n" +
        "                <div class=\"row\" data-id=\"" + (_stepCounter) + "\"><div class=\"col-12 col-md-4 mb-5\"><label class=\"text-black font-weight-bold\" for=\"imageStep\" data-id=\"" + (_stepCounter) + "\">" + label_image + "</label><input type=\"text\" name=\"\" class=\"form-control imageStep\" placeholder=\"" + placeholder_image + "\" value=\"\" data-id=\"" + (_stepCounter) + "\"><div class=\"invalid-feedback\">" + invalid_url + "</div></div>" +
        "                <div class=\"col-12 col-md-4 mb-5\"><label class=\"text-black font-weight-bold\" for=\"nameStep\" data-id=\"" + (_stepCounter) + "\">" + label_name + "</label><input type=\"text\" name=\"\" class=\"form-control nameStep\" placeholder=\"" + placeholder_name + "\" value=\"\" data-id=\"" + (_stepCounter) + "\"></div>" +
        "                <div class=\"col-12 col-md-4 mb-5\"><label class=\"text-black font-weight-bold\" for=\"url\" data-id=\"" + (_stepCounter) + "\">URL</label><input type=\"text\" name=\"\" class=\"form-control url\" placeholder=\"" + placeholder_urlStep + "\" value=\"\" data-id=\"" + (_stepCounter) + "\"><div class=\"invalid-feedback\">" + invalid_url + "</div></div></div></div>");
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    sticky.update();
});

$('.name').keyup(function (event) {
    howToFormat.name = $(this).val();
    howToFormat.render();
    // addHistory();
});

$('.description').keyup(function (event) {
    howToFormat.description = $(this).val();
    howToFormat.render();
});

$('.totalTime').keyup(function (event) {
    howToFormat.totalTime = $(this).val();
    howToFormat.render();
});

$('.imageUrl').keyup(function (event) {
    howToFormat.image = $(this).val();
    howToFormat.render();
})

$('.estimated').keyup(function (event) {
    // let index = parseInt($(this).data('id'));
    howToFormat.estimate.value = $(this).val();
    howToFormat.render();
});

$('.currency').change(function () {
    // let index = parseInt($(this).data('id'));
    howToFormat.estimate.currency = $(this).val();
    howToFormat.render();
});

$(document).on('keyup', '.supplyName', function () {
    let index = parseInt($(this).data('id'));
    howToFormat.supplyItem[index].name = $(this).val();
    howToFormat.render();
});

$(document).on('keyup', '.tool', function () {
    let index = parseInt($(this).data('id'));
    howToFormat.tools[index].name = $(this).val();
    howToFormat.render();
});

$(document).on('click', '.deleteSupply', function () {
    let index = parseInt($(this).data('id'));
    howToFormat.supplyItem.splice(index, 1);
    howToFormat.render();
    for (let i = index + 1; i < howToFormat.supplyItem.length + 1; i++) {
        $('.supplyName[data-id=' + (i - 1) + ']').val($('.supplyName[data-id=' + (i) + ']').val())
    }
    $('span[class="supplyCount"]').each(function (index, item) {
        $(item).html(index + 1);
    });
    $('.supply-name[data-id=' + howToFormat.supplyItem.length + ']').remove();
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    if (howToFormat.supplyItem.length > 0) _supplyCounter--;
});

$(document).on('keyup', '.instructions', function () {
    let index = parseInt($(this).data('id'));
    howToFormat.step[index].text = $(this).val();
    howToFormat.render();
});

$(document).on('keyup', '.imageStep', function () {
    let index = parseInt($(this).data('id'));
    howToFormat.step[index].image = $(this).val();
    howToFormat.render();
});

$(document).on('keyup', '.nameStep', function () {
    let index = parseInt($(this).data('id'));
    howToFormat.step[index].name = $(this).val();
    howToFormat.render();
});

$(document).on('keyup', '.url', function () {
    let index = parseInt($(this).data('id'));
    howToFormat.step[index].url = $(this).val();
    howToFormat.render();
});

$(document).on('click', '.deleteTool', function () {
    let index = parseInt($(this).data('id'));
    howToFormat.tools.splice(index, 1);
    howToFormat.render();
    for (let i = index + 1; i < howToFormat.tools.length + 1; i++) {
        $('.tool[data-id=' + (i - 1) + ']').val($('.tool[data-id=' + (i) + ']').val())
    }
    $('span[class="toolsCount"]').each(function (index, item) {
        $(item).html(index + 1);
    });
    $('.tools-name[data-id=' + howToFormat.tools.length + ']').remove();
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    sticky.update();
    if (howToFormat.tools.length > 0) _toolsCounter--;
});

$(document).on('click', '.deleteStep', function () {
    let index = parseInt($(this).data('id'));
    howToFormat.step.splice($('.stepCounter[data-id=' + index + ']').val(), 1);
    howToFormat.render();
    for (let i = index + 1; i < howToFormat.step.length + 1; i++) {
        $('.loopStep[data-id=' + (i - 1) + ']').val($('.loopStep[data-id=' + (i) + ']').val())
    }
    $('.loopStep[data-id=' + index + ']').remove();
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    $('span[class="counter"]').each(function (index, item) {
        $(item).html($(item).html() - 1);
    });
    $('.stepCounter').each(function (index, item) {
        $(item).val($(item).val() - 1);
    });
    if (howToFormat.step.length > 0) _stepCounter--;
});

$('.reset').click(function (e) {
    $('.name').val('');
    $('.description').val('');
    $('.totalTime').val('');
    $('.imageUrl').val('');
    $('.estimated').val('');
    $('.currency').val('none');
    $('.instructions').val('');
    $('.imageStep').val('');
    $('.nameStep').val('');
    $('.url').val('');
    $('#howto-supply').html('');
    $('#howto-tool').html('');
    $('#howto-step').html('');
    howToFormat.resetRender();
    howToFormat.step.push({
        "@type": "HowToStep",
        "text": "",
    })
    howToFormat.render();
});

// const HOW_TO_LOCAL_STORAGE = 'how-to-storage';
// const _howToLocalStorage = 'how-to-history';

// localStorage.clear();
// localStorage.setItem(HOW_TO_LOCAL_STORAGE, $('#formhowto').html());

// const refreshLocalStorage = function () {
//     try {
//         const keys = JSON.parse(localStorage.getItem(_howToLocalStorage))
//         if (keys.how_to) {
//             for (let key of keys.how_to) {
//                 let temp = JSON.parse(sliceFirstLastLine(localStorage.getItem(key)))
//                 let date = new Date(key * 1000)
//                 // let div = '<div class="custom-card py-5 px-3" onclick="getData('+key+')">'+
//                 //     '<div class="d-flex align-items-center justify-content-between">'+
//                 //     '<div class="local-collection-title">'+temp[0].name+'</div>'+
//                 //     '<div class="d-flex align-items-center">'+
//                 //     '<span class="mr-2 text-grey date-created">Created at '+((date.getHours() < 10) ? ('0'+date.getHours()):date.getHours())+'.'+((date.getMinutes() < 10) ? ('0'+date.getMinutes()):date.getMinutes())+' | '+date.getDate()+', '+getMonth(date.getMonth())+' '+date.getFullYear()+'</span>'+
//                 //     '<i class="bx bxs-x-circle text-grey" onclick="removeData('+key+')"></i>'+
//                 //     '</div>'+
//                 //     '</div>'+
//                 //     '</div>'
//                 let div2 = '<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px" onclick="getData(' + key + ')">' +
//                     '<div class="d-flex justify-content-between">' +
//                     '  <div class="local-collection-title">' + temp['name'] + '</div>' +
//                     '  <div class="d-flex align-items-center">' +
//                     '<span class="mr-2 text-grey date-created">Created at ' + (date.getHours() < 10 ? ('0' + date.getHours()) : date.getHours()) + '.' + (date.getMinutes() < 10 ? ('0' + date.getMinutes()) : date.getMinutes()) + ' | ' + date.getDate() + ', ' + getMonth(date.getMonth()) + ' ' + date.getFullYear() + '</span>' +
//                     '    <i class="bx bxs-x-circle text-grey" onclick="removeData(' + key + ')"></i>' +
//                     '  </div>' +
//                     '</div>' +
//                     '</li>'

//                 // $('#localsavemobile').append(div)
//                 $('#localsavedesktop').append(div2)
//             }
//         }
//     } catch (e) {
//         console.log(e)
//     }
// }

// function getHistories() {
//     $('#localsavedesktop').empty();
//     // $('#local-history-mobile').empty();
//     let histories = localStorage.getItem(_howToLocalStorage);
//     histories = histories ? JSON.parse(histories) : [];
//     if (!histories || histories.length === 0) {
//         $('#localsavedesktop').append(EmptyHistoryTemplate());
//         // $('#local-history-mobile').append(EmptyHistoryTemplateMobile());
//         return;
//     }
//     for (let history of histories.reverse()) {
//         $('#localsavedesktop').append(
//             HistoryTemplate(history.pageName, history.date)
//         );
//         // $('#local-history-mobile').append(
//         //     HistoryTemplateMobile(history.pageName, history.date)
//         // )
//     }
// }

// function addHistory(pageName, data) {
//     let datas = getDataFromText();
//     if (datas.length !== 1) {
//         const key = $('#json-format').data('key');
//         const keys = window.localStorage.getItem(_howToLocalStorage)
//         var temp = define();
//         if (keys) {
//             temp = JSON.parse(keys)
//         }
//         if (!temp.how_to.includes(key)) {
//             temp.how_to.push(key)
//         }
//         localStorage.setItem(_howToLocalStorage, JSON.stringify(temp));
//         localStorage.setItem(key, $('#json-format').val());
//     } else {
//         const key = $('#json-format').data('key');
//         const keys = window.localStorage.getItem(_howToLocalStorage)
//         var temp = define();
//         if (keys) {
//             temp = JSON.parse(keys)
//             let index = temp.how_to.indexOf(key)
//             if (index > 0) {
//                 temp.how_to.splice(index, 1)
//             }
//             localStorage.setItem(_howToLocalStorage, JSON.stringify(temp));
//             localStorage.removeItem(key);
//         }
//     }
//     // $('#localsavemobile').empty();
//     $('#localsavedesktop').empty();
//     refreshLocalStorage();
// }

// let invalid_url = lang === 'en' ? 'Invalid URL' : 'URL Tidak Valid';
// let label_step = lang === 'en' ? 'Step' : 'Langkah';
// let label_instructions = lang === 'en' ? 'instruction' : 'instruksi';
// let label_imageStep = lang === 'en' ? 'Image URL' : 'URL Gambar';
// let label_nameStep = lang === 'en' ? 'Nama' : 'Name';
// let placeholder_type = lang === 'en' ? 'Type' : 'Ketik';
// let placeholder_here = lang === 'en' ? 'here..' : 'di sini..';
// let placeholder_instructions = lang === 'en' ? 'Type your instruction here..' : 'Ketik instruksi Anda di sini..';
// let placeholder_imageStep = lang === 'en' ? 'Type image URL here..' : 'Ketik URL gambar di sini..';
// let placeholder_nameStep = lang === 'en' ? 'Type name here..' : 'Ketik nama di sini..';
// let placeholder_urlStep = lang === 'en' ? 'Type URL here..' : 'Ketik URL di sini..';

// const HistoryTemplate = (name, date) => `
// <li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px history--list" data-name="${name}">
//   <div class="d-flex justify-content-between">
//     <div class="local-collection-title">${name}</div>
//     <div class="d-flex align-items-center">
//       <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="Created at ${date}"></i>
//       <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-name="${name}"></i>
//     </div>
//   </div>
// </li>
// `;

// const getMonth = function (index) {
//     const month = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL",
//         "AUG", "SEP", "OCT", "NOV", "DES"]
//     return month[index]
// }
// const sliceFirstLastLine = function (text) {
//     let splited = text.split('\n')
//     splited.splice(0, 1)
//     splited.splice(splited.length - 1, 1)
//     return splited.join('\n')
// }

// const getDataFromText = function () {
//     const raw = $('#json-format').val();
//     return JSON.parse(sliceFirstLastLine(raw));
// }
// $('#schema-json-ld').on('change', function () {
//     if ($(this).val() !== 'home') {
//         window.location = 'json-ld-' + $(this).val() + '-schema-generator'
//     } else {
//         window.location = 'json-ld-schema-generator'
//     }
// });

// $('#copy').click(function () {
//     const copyText = $('#json-format');
//     copyText.select();
//     document.execCommand("copy");
//     toastr.success('Copied to Clipboard', 'Information');
// });
