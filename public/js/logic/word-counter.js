var WORDS_LENGTH = 0
var TOP_DENSITY = 0

if (lang == "en") {
    var created_at = "Created at "
    var localStorageNone = "This is your first impressions, no history yet!"
} else if (lang == "id") {
    var created_at = "Dibuat pada "
    var localStorageNone = "Ini adalah kesan pertama Anda, belum ada riwayat!"
}
const refreshLocalStorage = function () {
    try {
        $('#localsavemobile').empty();
        $('#localsavedesktop').empty();
        const keys = JSON.parse(localStorage.getItem('keys'))
        if (keys) {
            if (keys.wc.length > 0) {
                for (let key of keys.wc) {
                    let temp = localStorage.getItem(key)
                    let date = new Date(key)
                    let div = '<div class="custom-card py-5 px-3" onclick="getData(' + key + ')">' +
                        '<div class="d-flex align-items-center justify-content-between">' +
                        '<div class="local-collection-title">' + temp + '</div>' +
                        '<div class="d-flex align-items-center">' +
                        '<i class="bx bxs-info-circle text-grey bx-sm mr-2" data-toggle="tooltip" data-theme="dark" title="' + created_at + ((date.getHours() < 10) ? ('0' + date.getHours()) : date.getHours()) + '.' + ((date.getMinutes() < 10) ? ('0' + date.getMinutes()) : date.getMinutes()) + ' | ' + date.getDate() + ', ' + getMonth(date.getMonth()) + ' ' + date.getFullYear() + '"></i>' +
                        '<i class="bx bxs-x-circle text-grey bx-sm" onclick="removeData(' + key + ')"></i>' +
                        '</div>' +
                        '</div>' +
                        '</div>'

                    let div2 = '<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px" onclick="getData(' + key + ')">' +
                        '<div class="d-flex justify-content-between">' +
                        '<div class="local-collection-title">' + temp + '</div>' +
                        '<div class="d-flex align-items-center">' +
                        '<span class="mr-2 text-grey date-created">' + created_at + (date.getHours() < 10 ? ('0' + date.getHours()) : date.getHours()) + '.' + (date.getMinutes() < 10 ? ('0' + date.getMinutes()) : date.getMinutes()) + ' | ' + date.getDate() + ', ' + getMonth(date.getMonth()) + ' ' + date.getFullYear() + '</span>' +
                        '<i class="bx bxs-x-circle text-grey" onclick="removeData(' + key + ')"></i>' +
                        '</div>' +
                        '</div>' +
                        '</li>'
                    $('#localsavemobile').append(div)
                    $('#localsavedesktop').append(div2)
                }
            } else {
                let div2 = `<li id="empty-impression" class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                  <div class="d-flex justify-content-center text-center">
                    <span>` + localStorageNone + `</span>
                  </div>
                </li>`
                let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + localStorageNone + `</span>
                    </div>
                </div>`

                $('#localsavemobile').append(div)
                $('#localsavedesktop').append(div2)
            }
        } else {
            let div2 = `<li id="empty-impression" class="list-group-item list-group-item-action pointer mb-2 border-radius-5px">
                  <div class="d-flex justify-content-center text-center">
                    <span>` + localStorageNone + `</span>
                  </div>
                </li>`
            let div = `<div class="custom-card py-5 px-3">
                    <div class="d-flex justify-content-center text-center">
                        <span>` + localStorageNone + `</span>
                    </div>
                </div>`

            $('#localsavemobile').append(div)
            $('#localsavedesktop').append(div2)
        }
    } catch (e) {

    }
}

const getMonth = function (index) {
    const month = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL",
        "AUG", "SEP", "OCT", "NOV", "DES"
    ]
    return month[index]
}

var input = document.querySelectorAll('textarea')[0],
    characterCount = document.querySelector('#characterCount'),
    wordCount = document.querySelector('#wordCount'),
    sentenceCount = document.querySelector('#sentenceCount'),
    paragraphCount = document.querySelector('#paragraphCount'),
    readingTime = document.querySelector('#readingTime'),
    topKeywordsMobile = document.querySelector('#topKeywordsMobile'),
    topKeywords2Mobile = document.querySelector('#top2Mobile'),
    topKeywords3Mobile = document.querySelector('#top3Mobile');
characterCount.innerHTML = 0;
wordCount.innerHTML = 0;
sentenceCount.innerHTML = 0;
paragraphCount.innerHTML = 0;
readingTime.innerHTML = 0;

let topKeyword = []
let topKeywordMobile = []
for (let i = 1; i < 6; i++) {
    topKeyword.push(document.querySelector('#top' + i))
    topKeywordMobile.push(document.querySelector('#top' + i + 'Mobile'))
}

let prefilled_en = '( text bellow is an example, you can change the example anytime )\n\nCommon Phases In Content Writing\n\nThen, what are the phases in developing a good content writing? Here we have seven common phases that can be applied for online writing. However, these steps must be firstly adjusted to the project objectives since different project may come with different scheme and approach, too. The seven phases are in the following :';
let prefilled_id = '( teks di bawah ini adalah contoh, Anda dapat mengubah contoh kapan saja )\n\nFase Umum Dalam Penulisan Konten\n\nLalu, apa saja tahapan dalam mengembangkan content writing yang baik? Di sini kami memiliki tujuh fase umum yang dapat diterapkan untuk penulisan online. Namun, langkah-langkah ini harus terlebih dahulu disesuaikan dengan tujuan proyek karena proyek yang berbeda mungkin datang dengan skema dan pendekatan yang berbeda juga. Ketujuh fase tersebut adalah sebagai berikut :';

if ($('#textarea').val() === '') {
    if (lang === 'en')
        $('#textarea').val(prefilled_en);
    else $('#textarea').val(prefilled_id);
    start();
} else if ($('#textarea').val() === prefilled_en || $('#textarea').val() === prefilled_id) {
    if (lang === 'en')
        $('#textarea').val(prefilled_en);
    else $('#textarea').val(prefilled_id);
    start();
} else {
    start()
}

refreshLocalStorage();

$('#textarea').on('input', function () {
    if ($('#autosaveParam').data('autosave') == "on") {
        if ($(this).val() || $(this).val() !== '') {
            const key = $(this).data('key');
            const keys = window.localStorage.getItem('keys')
            var temp = define();
            if (keys) {
                temp = JSON.parse(keys)
            }
            if (!temp.wc.includes(key)) {
                temp.wc.push(key)
            }
            window.localStorage.setItem('keys', JSON.stringify(temp));
            window.localStorage.setItem(key, $('#textarea').val());
        } else {
            const key = $(this).data('key');
            const keys = window.localStorage.getItem('keys')
            var temp = define();
            if (keys) {
                temp = JSON.parse(keys)
                let index = temp.wc.indexOf(key)
                if (index > 0) {
                    temp.wc.splice(index, 1)
                }
                window.localStorage.setItem('keys', JSON.stringify(temp));
                window.localStorage.removeItem(key);
            }
        }
    }
    start();
})

$('#textarea').keypress(function (e) {
    if (e.key === " ") {
        saveState()
    }
})

$(window).keydown(function (e) {
    if ((e.metaKey || e.ctrlKey) && e.key === "z") {
        $('#textarea').val(State.undo())
        e.preventDefault()
    }
})

const pasteListener = function () {
    $('#cta-warning').hide()
    setTimeout(function() {
        increaseCounter('word-counter-count')
        checkCounterForWordCounter('word-counter-count', () => showCta())
    }, 100);
}

const getData = function (key) {
    if (localStorage.getItem(key)) {
        $('#textarea').val(localStorage.getItem(key));
        $('#textarea').data('key', key)
        start();
    }
}

const removeData = function (key) {
    let currentKey = $('#textarea').data('key')
    if (currentKey === key) {
        $('#textarea').data('key', new Date().getTime())
        $('#textarea').val('')
        start();
    }
    let keys = JSON.parse(localStorage.getItem('keys'));
    for (var i in keys.wc) {
        if (keys.wc[i] === key) {
            keys.wc.splice(i, 1)
            break;
        }
    }
    localStorage.setItem('keys', JSON.stringify(keys))
    localStorage.removeItem(key)
    refreshLocalStorage();
}

const clearAll = function () {
    var res = JSON.parse(localStorage.getItem('keys'));
    for (let i of res.wc) {
        localStorage.removeItem(i);
    }
    res.wc = [];
    localStorage.setItem('keys', JSON.stringify(res))
    refreshLocalStorage()
}

$('#new-text').click(function () {
    if ($('#textarea').val()) {
        const key = $('#textarea').data('key');
        const keys = window.localStorage.getItem('keys')
        var temp = define();
        if (keys) {
            temp = JSON.parse(keys)
        }
        if (!temp.wc.includes(key)) {
            temp.wc.push(key)
        }
        window.localStorage.setItem('keys', JSON.stringify(temp));
        window.localStorage.setItem(key, $('#textarea').val());
    }
    $('#textarea').data('key', new Date().getTime())
    $('#textarea').val('')
    refreshLocalStorage();
})

jQuery('#reset').click(function () {
    sessionStorage.clear();
    jQuery('#textarea').val('');
    jQuery('.collapse').collapse('hide');
    start();

    characterCount.innerHTML = 0;
    wordCount.innerHTML = 0;
    sentenceCount.innerHTML = 0;
    paragraphCount.innerHTML = 0;
    readingTime.innerHTML = 0;

    topKeywords.innerHTML = '';
    topKeywords2.innerHTML = '';
    topKeywords3.innerHTML = '';
    topKeywordsMobile.innerHTML = '';
    topKeywords2Mobile.innerHTML = '';
    topKeywords3Mobile.innerHTML = '';

});

function start() {

    characterCount.innerHTML = numberWithCommas(input.value.length);

    var words = input.value.replace(/['";:,.?\xbf\-!\xa1]+/g, "").match(/\S+/g);
    if (words) {
        wordCount.innerHTML = words.length;
        WORDS_LENGTH = words.length
    } else {
        wordCount.innerHTML = 0;
        WORDS_LENGTH = 0
    }
    console.log("WOrd", WORDS_LENGTH)

    if (words) {
        var sentences = input.value.match(/\w([^.?!;\u2026]+[.?!;\u2026]+)/g);
        if (!sentences) {
            sentenceCount.innerHTML = 0;
        } else {
            sentenceCount.innerHTML = sentences.length;
        }
    } else {
        sentenceCount.innerHTML = 0;
    }

    if (words) {
        var paragraphs = input.value.replace(/\n$/gm, '').split(/\n/);
        paragraphCount.innerHTML = paragraphs.length;
    } else {
        paragraphCount.innerHTML = 0;
    }
    if (words) {
        var seconds = Math.floor(words.length * 60 / 275);
        if (seconds > 59) {
            var minutes = Math.floor(seconds / 60);
            seconds = seconds - minutes * 60;
            readingTime.innerHTML = minutes + "m " + seconds + "s";
        } else {
            readingTime.innerHTML = seconds + "s";
        }
    } else {
        readingTime.innerHTML = "0s";
    }

    if (words) {
        var nonStopWords = [];
        var stopWords = ["+", "a", "able", "about", "above", "abst", "accordance", "according", "accordingly", "across", "actually", "adj", "after", "afterwards", "again", "against", "ah", "all", "almost", "alone", "along", "already", "also", "although", "always", "am", "among", "amongst", "an", "and", "another", "any", "anybody", "anyhow", "anymore", "anyone", "anything", "anyway", "anyways", "anywhere", "apparently", "approximately", "are", "aren", "arent", "around", "as", "aside", "at", "auth", "available", "away", "awfully", "b", "back", "be", "because", "before", "beforehand", "behind", "below", "beside", "besides", "between", "beyond", "biol", "both", "brief", "briefly", "but", "by", "c", "ca", "certain", "certainly", "co", "com", "contain", "couldnt", "d", "downwards", "due", "e", "ed", "edu", "eg", "eight", "either", "else", "elsewhere", "et", "et-al", "etc", "even", "ever", "ex", "f", "ff", "fifth", "first", "five", "fix", "followed", "following", "follows", "for", "former", "formerly", "forth", "found", "four", "from", "further", "furthermore", "g", "gave", "get", "gets", "getting", "give", "given", "gives", "giving", "go", "goes", "gone", "got", "gotten", "h", "had", "happens", "hardly", "has", "hasn't", "have", "haven't", "having", "he", "hed", "hence", "her", "here", "hereafter", "hereby", "herein", "heres", "hereupon", "hers", "herself", "hes", "hi", "hid", "him", "himself", "his", "hither", "home", "how", "howbeit", "however", "hundred", "i", "id", "ie", "if", "i'll", "im", "immediate", "immediately", "importance", "important", "in", "inc", "indeed", "index", "information", "instead", "into", "invention", "inward", "is", "isn't", "it", "itd", "it'll", "its", "itself", "i've", "j", "just", "k", "keep", "keeps", "kept", "kg", "km", "know", "known", "knows", "l", "largely", "last", "lately", "later", "latter", "latterly", "least", "less", "lest", "let", "lets", "like", "liked", "likely", "line", "little", "'ll", "look", "looking", "looks", "ltd", "m", "made", "mainly", "make", "makes", "many", "may", "maybe", "me", "mean", "means", "meantime", "meanwhile", "merely", "mg", "might", "million", "miss", "ml", "more", "moreover", "most", "mostly", "mr", "mrs", "much", "mug", "must", "my", "myself", "n", "na", "name", "namely", "nay", "nd", "near", "nearly", "necessarily", "necessary", "need", "needs", "neither", "never", "nevertheless", "new", "next", "nine", "ninety", "no", "nobody", "non", "none", "nonetheless", "noone", "nor", "normally", "nos", "not", "noted", "nothing", "now", "nowhere", "o", "obtain", "obtained", "obviously", "of", "off", "often", "oh", "ok", "okay", "old", "omitted", "on", "once", "one", "ones", "only", "onto", "or", "ord", "other", "others", "otherwise", "ought", "our", "ours", "ourselves", "out", "outside", "over", "overall", "owing", "own", "p", "page", "pages", "part", "particular", "particularly", "per", "perhaps", "placed", "please", "plus", "poorly", "possible", "possibly", "potentially", "pp", "predominantly", "previously", "primarily", "probably", "promptly", "proud", "provides", "put", "q", "que", "quickly", "quite", "qv", "r", "ran", "rather", "rd", "re", "readily", "really", "recent", "recently", "ref", "refs", "regarding", "regardless", "regards", "related", "relatively", "research", "respectively", "resulted", "resulting", "results", "right", "run", "s", "said", "same", "saw", "say", "saying", "says", "sec", "section", "see", "seeing", "seem", "seemed", "seeming", "seems", "seen", "self", "selves", "sent", "seven", "several", "shall", "she", "shed", "she'll", "shes", "should", "shouldn't", "show", "showed", "shown", "showns", "shows", "significant", "significantly", "similar", "similarly", "since", "six", "slightly", "so", "some", "somebody", "somehow", "someone", "somethan", "something", "sometime", "sometimes", "somewhat", "somewhere", "soon", "sorry", "specifically", "specified", "specify", "specifying", "still", "stop", "strongly", "sub", "substantially", "successfully", "such", "sufficiently", "sup", "sure", "t", "take", "taken", "taking", "tell", "tends", "th", "than", "thanx", "that", "that'll", "thats", "that've", "the", "their", "theirs", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "thered", "therefore", "therein", "there'll", "thereof", "therere", "theres", "thereto", "thereupon", "there've", "these", "they", "theyd", "they'll", "theyre", "they've", "think", "this", "those", "thou", "though", "thoughh", "thousand", "throug", "through", "throughout", "thru", "thus", "til", "tip", "to", "together", "too", "took", "toward", "towards", "tried", "tries", "truly", "try", "trying", "ts", "twice", "two", "u", "un", "under", "unfortunately", "unless", "unlike", "unlikely", "until", "unto", "up", "upon", "ups", "us", "use", "used", "useful", "usefully", "usefulness", "uses", "using", "usually", "v", "value", "various", "'ve", "very", "via", "viz", "vol", "vols", "vs", "w", "want", "wants", "was", "wasn't", "way", "we", "wed", "welcome", "we'll", "went", "were", "weren't", "we've", "what", "whatever", "what'll", "whats", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "wheres", "whereupon", "wherever", "whether", "which", "while", "whim", "whither", "who", "whod", "whoever", "whole", "who'll", "whom", "whomever", "whos", "whose", "why", "widely", "willing", "wish", "with", "within", "without", "won't", "words", "world", "would", "wouldn't", "www", "x", "y", "yes", "yet", "you", "youd", "you'll", "your", "youre", "yours", "yourself", "yourselves", "you've", "z", "zero", "(", ")"];
        for (var i = 0; i < words.length; i++) {
            if (stopWords.indexOf(words[i].toLowerCase()) === -1) {
                nonStopWords.push(words[i].toLowerCase());
            }
        }

        for (let j = 1; j < 6; j++) {
            var keywords = {};
            for (var i = 0; i < (nonStopWords.length - (j - 1)); i++) {
                var key = ''
                for (let k = i; k < i + j; k++) {
                    key += nonStopWords[k] + ' '
                }
                key = key.trim()
                if (key in keywords) {
                    keywords[key] += 1;
                } else {
                    keywords[key] = 1;
                }
            }
            var sortedKeywords = [];
            var weights = 0;
            for (var keyword in keywords) {
                sortedKeywords.push([keyword, keywords[keyword]])
                weights += keywords[keyword]
            }
            sortedKeywords.sort(function (a, b) {
                return b[1] - a[1]
            });

            let density = 0
            if (j === 2 || j === 3){
                if (sortedKeywords[0]){
                    density = sortedKeywords[0]
                }

                if (density > TOP_DENSITY)
                    TOP_DENSITY = density
            }

            topKeyword[j - 1].innerHTML = "";
            for (var i = 0; i < sortedKeywords.length && i < 10; i++) {
                var div = document.createElement('div');
                if (i == 9) {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>"
                } else if (i > 2) {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<hr class='my-2'>"
                } else {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<hr class='my-2'>"
                }
                topKeyword[j - 1].appendChild(div);
            }

            topKeywordMobile[j - 1].innerHTML = "";
            for (var i = 0; i < sortedKeywords.length && i < 10; i++) {
                var div = document.createElement('div');
                if (i == 9) {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] + "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>"
                } else if (i > 2) {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-non-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<hr class='my-2'>"
                } else {
                    div.innerHTML = "<div class='row'>" +
                        "<div class='col-8'>" +
                        "<div class='d-flex justify-content-start align-items-center'>" +
                        "<div class='container-label-top-keywords mr-3'>" +
                        "<span class='label label-lg label-top-3'>" + (i + 1) + "</span>" +
                        "</div>" + sortedKeywords[i][0] +
                        "</div>" +
                        "</div>" +
                        "<div class='col-4 d-flex justify-content-end align-items-center'>" +
                        "<div class='d-flex justify-content-end align-items-center'>" +
                        "<span class='mr-3 font-weight-bolder mt-1'>" + sortedKeywords[i][1] + "</span>" +
                        "<span class='mt-1'>" + ((sortedKeywords[i][1] / nonStopWords.length) * 100).toFixed(1) + "%</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<hr class='my-2'>"
                }
                topKeywordMobile[j - 1].appendChild(div);
            }
        }
    }
}

$(document).ready(function () {
    $('#textarea').data('key', new Date().getTime())

    $('#autoSaveOff').tooltip({
        'template': '<div class="tooltip tooltip-autosave-off" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
    });

    $('#autoSaveOn').tooltip({
        'template': '<div class="tooltip tooltip-autosave-on" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
    });
    $("#top2").hide();
    $("#top3").hide();
    $("#top4").hide();
    $("#top5").hide();
    $("#top2Mobile").hide();
    $("#top3Mobile").hide();
    $("#top4Mobile").hide();
    $("#top5Mobile").hide();
    $("#autoSaveOff").hide();

    $("#autoSaveOn").click(function () {
        $("#autoSaveOn").hide();
        $("#autoSaveOff").show();
        $('#autosaveParam').data('autosave', 'off');
    });

    $("#autoSaveOff").click(function () {
        $("#autoSaveOn").show();
        $("#autoSaveOff").hide();
        $('#autosaveParam').data('autosave', 'on');
    });


    $("#copy-text").click(function () {
        const textarea = $('#textarea');
        textarea.select();
        document.execCommand("copy");
        toastr.success('Copied to Clipboard', 'Information');
    });

    $("#set-font-size-18px").click(function () {
        $("#set-font-size-18px").addClass("active");
        $("#set-font-size-12px").removeClass("active");
        $("#set-font-size-15px").removeClass("active");
        $("#textarea").addClass("font-size-18px");
        $("#textarea").removeClass("font-size-12px");
        $("#textarea").removeClass("font-size-15px");
    });

    $("#set-font-size-12px").click(function () {
        $("#set-font-size-18px").removeClass("active");
        $("#set-font-size-12px").addClass("active");
        $("#set-font-size-15px").removeClass("active");
        $("#textarea").removeClass("font-size-18px");
        $("#textarea").addClass("font-size-12px");
        $("#textarea").removeClass("font-size-15px");
    });

    $("#set-font-size-15px").click(function () {
        $("#set-font-size-18px").removeClass("active");
        $("#set-font-size-12px").removeClass("active");
        $("#set-font-size-15px").addClass("active");
        $("#textarea").removeClass("font-size-18px");
        $("#textarea").removeClass("font-size-12px");
        $("#textarea").addClass("font-size-15px");
    });

    $("#showWords1Desktop").click(function () {
        $("#showWords1Desktop").addClass("active");
        $("#showWords2Desktop").removeClass("active");
        $("#showWords3Desktop").removeClass("active");
        $("#showWords4Desktop").removeClass("active");
        $("#showWords5Desktop").removeClass("active");
        $("#showWords1Mobile").addClass("active");
        $("#showWords2Mobile").removeClass("active");
        $("#showWords3Mobile").removeClass("active");
        $("#showWords4Mobile").removeClass("active");
        $("#showWords5Mobile").removeClass("active");
        $("#top1").show();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").hide();
        $("#top1Mobile").show();
        $("#top2Mobile").hide();
        $("#top3Mobile").hide();
        $("#top4Mobile").hide();
        $("#top5Mobile").hide();
    });

    $("#showWords2Desktop").click(function () {
        $("#showWords1Desktop").removeClass("active");
        $("#showWords2Desktop").addClass("active");
        $("#showWords3Desktop").removeClass("active");
        $("#showWords4Desktop").removeClass("active");
        $("#showWords5Desktop").removeClass("active");
        $("#showWords1Mobile").removeClass("active");
        $("#showWords2Mobile").addClass("active");
        $("#showWords3Mobile").removeClass("active");
        $("#showWords4Mobile").removeClass("active");
        $("#showWords5Mobile").removeClass("active");
        $("#top1").hide();
        $("#top2").show();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").hide();
        $("#top1Mobile").hide();
        $("#top2Mobile").show();
        $("#top3Mobile").hide();
        $("#top4Mobile").hide();
        $("#top5Mobile").hide();
    });

    $("#showWords3Desktop").click(function () {
        $("#showWords1Desktop").removeClass("active");
        $("#showWords2Desktop").removeClass("active");
        $("#showWords3Desktop").addClass("active");
        $("#showWords4Desktop").removeClass("active");
        $("#showWords5Desktop").removeClass("active");
        $("#showWords1Mobile").removeClass("active");
        $("#showWords2Mobile").removeClass("active");
        $("#showWords3Mobile").addClass("active");
        $("#showWords4Mobile").removeClass("active");
        $("#showWords5Mobile").removeClass("active");
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").show();
        $("#top4").hide();
        $("#top5").hide();
        $("#top1Mobile").hide();
        $("#top2Mobile").hide();
        $("#top3Mobile").show();
        $("#top4Mobile").hide();
        $("#top5Mobile").hide();
    });

    $("#showWords4Desktop").click(function () {
        $("#showWords1Desktop").removeClass("active");
        $("#showWords2Desktop").removeClass("active");
        $("#showWords3Desktop").removeClass("active");
        $("#showWords4Desktop").addClass("active");
        $("#showWords5Desktop").removeClass("active");
        $("#showWords1Mobile").removeClass("active");
        $("#showWords2Mobile").removeClass("active");
        $("#showWords3Mobile").removeClass("active");
        $("#showWords4Mobile").addClass("active");
        $("#showWords5Mobile").removeClass("active");
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").show();
        $("#top5").hide();
        $("#top1Mobile").hide();
        $("#top2Mobile").hide();
        $("#top3Mobile").hide();
        $("#top4Mobile").show();
        $("#top5Mobile").hide();
    });

    $("#showWords5Desktop").click(function () {
        $("#showWords1Desktop").removeClass("active");
        $("#showWords2Desktop").removeClass("active");
        $("#showWords3Desktop").removeClass("active");
        $("#showWords4Desktop").removeClass("active");
        $("#showWords5Desktop").addClass("active");
        $("#showWords1Mobile").removeClass("active");
        $("#showWords2Mobile").removeClass("active");
        $("#showWords3Mobile").removeClass("active");
        $("#showWords4Mobile").removeClass("active");
        $("#showWords5Mobile").addClass("active");
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").show();
        $("#top1Mobile").hide();
        $("#top2Mobile").hide();
        $("#top3Mobile").hide();
        $("#top4Mobile").hide();
        $("#top5Mobile").show();
    });

    $("#showWords1Mobile").click(function () {
        $("#showWords1Desktop").addClass("active");
        $("#showWords2Desktop").removeClass("active");
        $("#showWords3Desktop").removeClass("active");
        $("#showWords4Desktop").removeClass("active");
        $("#showWords5Desktop").removeClass("active");
        $("#showWords1Mobile").addClass("active");
        $("#showWords2Mobile").removeClass("active");
        $("#showWords3Mobile").removeClass("active");
        $("#showWords4Mobile").removeClass("active");
        $("#showWords5Mobile").removeClass("active");
        $("#top1").show();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").hide();
        $("#top1Mobile").show();
        $("#top2Mobile").hide();
        $("#top3Mobile").hide();
        $("#top4Mobile").hide();
        $("#top5Mobile").hide();
    });

    $("#showWords2Mobile").click(function () {
        $("#showWords1Desktop").removeClass("active");
        $("#showWords2Desktop").addClass("active");
        $("#showWords3Desktop").removeClass("active");
        $("#showWords4Desktop").removeClass("active");
        $("#showWords5Desktop").removeClass("active");
        $("#showWords1Mobile").removeClass("active");
        $("#showWords2Mobile").addClass("active");
        $("#showWords3Mobile").removeClass("active");
        $("#showWords4Mobile").removeClass("active");
        $("#showWords5Mobile").removeClass("active");
        $("#top1").hide();
        $("#top2").show();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").hide();
        $("#top1Mobile").hide();
        $("#top2Mobile").show();
        $("#top3Mobile").hide();
        $("#top4Mobile").hide();
        $("#top5Mobile").hide();
    });

    $("#showWords3Mobile").click(function () {
        $("#showWords1Desktop").removeClass("active");
        $("#showWords2Desktop").removeClass("active");
        $("#showWords3Desktop").addClass("active");
        $("#showWords4Desktop").removeClass("active");
        $("#showWords5Desktop").removeClass("active");
        $("#showWords1Mobile").removeClass("active");
        $("#showWords2Mobile").removeClass("active");
        $("#showWords3Mobile").addClass("active");
        $("#showWords4Mobile").removeClass("active");
        $("#showWords5Mobile").removeClass("active");
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").show();
        $("#top4").hide();
        $("#top5").hide();
        $("#top1Mobile").hide();
        $("#top2Mobile").hide();
        $("#top3Mobile").show();
        $("#top4Mobile").hide();
        $("#top5Mobile").hide();
    });

    $("#showWords4Mobile").click(function () {
        $("#showWords1Desktop").removeClass("active");
        $("#showWords2Desktop").removeClass("active");
        $("#showWords3Desktop").removeClass("active");
        $("#showWords4Desktop").addClass("active");
        $("#showWords5Desktop").removeClass("active");
        $("#showWords1Mobile").removeClass("active");
        $("#showWords2Mobile").removeClass("active");
        $("#showWords3Mobile").removeClass("active");
        $("#showWords4Mobile").addClass("active");
        $("#showWords5Mobile").removeClass("active");
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").show();
        $("#top5").hide();
        $("#top1Mobile").hide();
        $("#top2Mobile").hide();
        $("#top3Mobile").hide();
        $("#top4Mobile").show();
        $("#top5Mobile").hide();
    });

    $("#showWords5Mobile").click(function () {
        $("#showWords1Desktop").removeClass("active");
        $("#showWords2Desktop").removeClass("active");
        $("#showWords3Desktop").removeClass("active");
        $("#showWords4Desktop").removeClass("active");
        $("#showWords5Desktop").addClass("active");
        $("#showWords1Mobile").removeClass("active");
        $("#showWords2Mobile").removeClass("active");
        $("#showWords3Mobile").removeClass("active");
        $("#showWords4Mobile").removeClass("active");
        $("#showWords5Mobile").addClass("active");
        $("#top1").hide();
        $("#top2").hide();
        $("#top3").hide();
        $("#top4").hide();
        $("#top5").show();
        $("#top1Mobile").hide();
        $("#top2Mobile").hide();
        $("#top3Mobile").hide();
        $("#top4Mobile").hide();
        $("#top5Mobile").show();
    });

    $('a[href*="#"]:not([href="#"])').click(function () {
        var offset = -80;
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top + offset
                }, 400);
                return false;
            }
        }
    });

    lastData();
});

jQuery.each(jQuery('textarea[data-autoresize]'), function () {
    var offset = this.offsetHeight - this.clientHeight;

    var resizeTextarea = function (el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function () {
        resizeTextarea(this);
    }).removeAttr('data-autoresize');
});

var counter = 0;

function myFunction() {
    document.getElementById("kd").style.borderBottom = "2px solid #24daff";
    counter += 1;
    if (counter == 1) {
        $('#textarea').popover().click(function () {
            setTimeout(function () {
                $('#textarea').popover('hide');
            }, 24000);
        });
    } else {
        $('#textarea').popover().click(function () {
            $('#textarea').popover('hide');
        });
    }
}

const lastData = function () {
    let data = JSON.parse(localStorage.getItem('keys'))
    if (data.wc.length > 0) {
        if (localStorage.getItem(data.wc[data.wc.length - 1])) {
            $('#textarea').val(localStorage.getItem(data.wc[data.wc.length - 1]));
            $('#textarea').data('key', data.wc[data.wc.length - 1])
            start();
        }
    }
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

const showCta = function () {
    console.log(WORDS_LENGTH)
    console.log(TOP_DENSITY)
    if (WORDS_LENGTH > 700 && (TOP_DENSITY < 1 || TOP_DENSITY > 3)){
        $('#cta-warning').show()
    }
}
