let obj =
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": []
};

obj.mainEntity.push({
    "@type": "Question",
    "name": "",
    "acceptedAnswer": {
        "@type": "Answer",
        "text": ""
    }
});

print(obj);
// refreshLocalStorage();

$('#add').click(function () {
    obj = getDataFromText()
    obj.mainEntity.push({
        "@type": "Question",
        "name": "",
        "acceptedAnswer": {
            "@type": "Answer",
            "text": ""
        }
    });
    print(obj);
    $('#form').append(
        "<div class='row parent' data-id='" + (obj.mainEntity.length - 1) + "'><div class='col-10 col-sm-11'><div class='form-group mb-5'><label for='question-" + (obj.mainEntity.length) + "' data-id='" + (obj.mainEntity.length - 1) + "' class='font-weight-bold question'>" + label_question + " " + (obj.mainEntity.length) + "</label><input type='text' class='form-control question' name='' value='' placeholder='" + placeholder_question + "' data-id='" + (obj.mainEntity.length - 1) + "'></div><div class='form-group mb-5'><label for='answer-" + (obj.mainEntity.length) + "' data-id='" + (obj.mainEntity.length - 1) + "' class='font-weight-bold answer'>" + label_answer + " " + (obj.mainEntity.length) + "</label><input type='text' class='form-control answer' name='' value='' placeholder='" + placeholder_answer + "' data-id='" + (obj.mainEntity.length - 1) + "'></div></div><div class='col-2 col-sm-1'><div class='d-flex justify-content-center mt-9'><i class='bx bxs-x-circle bx-md delete' data-id='" + (obj.mainEntity.length - 1) + "'></i></div></div></div>"
    );
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    // addHistory();
    sticky.update();
});

$(document).on('keyup', '.question', function () {
    let index = parseInt($(this).data('id'));
    obj = getDataFromText()
    obj.mainEntity[index].name = $(this).val();
    print(obj);
    // addHistory();
});

$(document).on('keyup', '.answer', function () {
    let index = parseInt($(this).data('id'));
    let obj = getDataFromText()
    obj.mainEntity[index].acceptedAnswer.text = $(this).val();
    print(obj);
    // addHistory();
});

$(document).on('click', '.delete', function () {
    let index = parseInt($(this).data('id'));
    if (index !== 0) {
        let obj = getDataFromText()
        obj.mainEntity.splice(index, 1);
        print(obj);
        for (let i = 0; i < obj.mainEntity.length; i++) {
            $('.question[data-id=' + i + ']').val(obj.mainEntity[i].name)
            $('.answer[data-id=' + i + ']').val(obj.mainEntity[i].acceptedAnswer.text)
        }
        $('.row[data-id=' + obj.mainEntity.length + ']').remove();
        let row = parseInt($('#json-format').val().split('\n').length);
        $('#json-format').attr('rows', row);
    }
});

$('#reset').click(function () {
    let obj = getDataFromText()
    for (let i = 1; i < obj.mainEntity.length; i++) {
        $('.row[data-id=' + i + ']').remove();
    }
    obj.mainEntity.splice(1, obj.mainEntity.length - 1);
    obj.mainEntity[0].name = '';
    obj.mainEntity[0].acceptedAnswer.text = '';
    $('.question[data-id=' + 0 + ']').val(obj.mainEntity[0].name)
    $('.answer[data-id=' + 0 + ']').val(obj.mainEntity[0].acceptedAnswer.text)
    print(obj);
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
});

// let label_question = lang === 'en' ? 'Question' : 'Pertanyaan';
// let label_answer = lang === 'en' ? 'Answer' : 'Jawaban';
// let placeholder_question = lang === 'en' ? 'Type your question here..' : 'Ketik pertanyaan Anda di sini..';
// let placeholder_answer = lang === 'en' ? 'Type your answer here..' : 'Ketik jawaban Anda di sini..';

// const getData = function (key) {
//     let raw = localStorage.getItem(key);
//     if (raw) {
//         $('.row.parent').remove();
//         $('#json-format').val(raw);
//         $('#json-format').data('key', key)
//         let data = JSON.parse(sliceFirstLastLine(raw));
//         for (let i in data.mainEntity) {
//             if (i == 0) {
//                 $('.question[data-id=' + 0 + ']').val(data.mainEntity[0].name)
//                 $('.answer[data-id=' + 0 + ']').val(data.mainEntity[0].acceptedAnswer.text)
//                 continue;
//             }
//             $('#form').append(
//                 `<div class='row parent' data-id='${i}'><div class='col-10 col-sm-11'><div class='form-group mb-5'><label for='question-${i}' data-id='${i}' class='font-weight-bold question'>Question ${parseInt(i) + 1}</label><input type='text' class='form-control question' name='' value='${data.mainEntity[i].name}' data-id='${i}'></div><div class='form-group mb-5'><label for='answer-${i}' data-id='${i}' class='font-weight-bold answer'>Answer ${parseInt(i) + 1}</label><input type='text' class='form-control answer' name='' value='${data.mainEntity[i].acceptedAnswer.text}' data-id='${i}'></div></div><div class='col-2 col-sm-1'><div class='d-flex justify-content-center mt-9'><i class='bx bxs-x-circle bx-md delete' data-id='${i}'></i></div></div></div>`
//             );
//         }
//     }
// }

// const refreshLocalStorage = function () {
//     try {
//         const keys = JSON.parse(localStorage.getItem('keys'))
//         if (keys.faq) {
//             for (let key of keys.faq) {
//                 let temp = JSON.parse(sliceFirstLastLine(localStorage.getItem(key)))
//                 let date = new Date(key * 1000)
//                 let div = '<div class="custom-card py-5 px-3" onclick="getData(' + key + ')">' +
//                     '<div class="d-flex align-items-center justify-content-between">' +
//                     '<div class="local-collection-title">' + temp.mainEntity[0].name + '</div>' +
//                     '<div class="d-flex align-items-center">' +
//                     '<span class="mr-2 text-grey date-created">Created at ' + ((date.getHours() < 10) ? ('0' + date.getHours()) : date.getHours()) + '.' + ((date.getMinutes() < 10) ? ('0' + date.getMinutes()) : date.getMinutes()) + ' | ' + date.getDate() + ', ' + getMonth(date.getMonth()) + ' ' + date.getFullYear() + '</span>' +
//                     '<i class="bx bxs-x-circle text-grey" onclick="removeData(' + key + ')"></i>' +
//                     '</div>' +
//                     '</div>' +
//                     '</div>'

//                 let div2 = '<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px" onclick="getData(' + key + ')">' +
//                     '<div class="d-flex justify-content-between">' +
//                     '  <div class="local-collection-title">' + temp.mainEntity[0].name + '</div>' +
//                     '  <div class="d-flex align-items-center">' +
//                     '<span class="mr-2 text-grey date-created">Created at ' + (date.getHours() < 10 ? ('0' + date.getHours()) : date.getHours()) + '.' + (date.getMinutes() < 10 ? ('0' + date.getMinutes()) : date.getMinutes()) + ' | ' + date.getDate() + ', ' + getMonth(date.getMonth()) + ' ' + date.getFullYear() + '</span>' +
//                     '    <i class="bx bxs-x-circle text-grey" onclick="removeData(' + key + ')"></i>' +
//                     '  </div>' +
//                     '</div>' +
//                     '</li>'

//                 $('#localsavemobile').append(div)
//                 $('#localsavedesktop').append(div2)
//             }
//         }
//     } catch (e) {
//         console.log(e)
//     }
// }

// const removeData = function (key) {
//     let currentKey = $('#textarea').data('key')
//     if (currentKey === key) {
//         for (let i = 1; i < main.mainEntity.length; i++) {
//             $('.row[data-id=' + i + ']').remove();
//         }
//         let data = getDataFromText()
//         data.mainEntity.splice(1, main.mainEntity.length - 1);
//         data.mainEntity[0].name = '';
//         data.mainEntity[0].acceptedAnswer.text = '';
//         $('.question[data-id=' + 0 + ']').val(main.mainEntity[0].name)
//         $('.answer[data-id=' + 0 + ']').val(main.mainEntity[0].acceptedAnswer.text)
//         print(data);
//         let row = parseInt($('#json-format').val().split('\n').length);
//         $('#json-format').attr('rows', row);
//     }
//     let keys = JSON.parse(localStorage.getItem('keys'));
//     for (var i in keys.faq) {
//         if (keys.faq[i] === key) {
//             keys.faq.splice(i, 1)
//             break;
//         }
//     }
//     localStorage.setItem('keys', JSON.stringify(keys))
//     localStorage.removeItem(key)
//     $('#localsavemobile').empty();
//     $('#localsavedesktop').empty();
//     refreshLocalStorage();
// }

// const addHistory = function () {
//     let data = getDataFromText();
//     if (data.mainEntity.length !== 1 || (data.mainEntity[0].name && data.mainEntity[0].acceptedAnswer.text)) {
//         const key = $('#json-format').data('key');
//         const keys = window.localStorage.getItem('keys')
//         var temp = define();
//         if (keys) {
//             temp = JSON.parse(keys)
//         }
//         if (!temp.faq.includes(key)) {
//             temp.faq.push(key)
//         }
//         window.localStorage.setItem('keys', JSON.stringify(temp));
//         window.localStorage.setItem(key, $('#json-format').val());
//     } else {
//         const key = $('#json-format').data('key');
//         const keys = window.localStorage.getItem('keys')
//         var temp = define();
//         if (keys) {
//             temp = JSON.parse(keys)
//             let index = temp.faq.indexOf(key)
//             if (index > 0) {
//                 temp.faq.splice(index, 1)
//             }
//             window.localStorage.setItem('keys', JSON.stringify(temp));
//             window.localStorage.removeItem(key);
//         }
//     }
// }

// const clearAll = function () {
//     var res = JSON.parse(localStorage.getItem('keys'));
//     for (let i of res.faq) {
//         localStorage.removeItem(i);
//     }
//     res.faq = [];
//     localStorage.setItem('keys', JSON.stringify(res))
//     $('#localsavemobile').empty();
//     $('#localsavedesktop').empty();
// }

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

// $('#schema-json-ld').change(function () {
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
