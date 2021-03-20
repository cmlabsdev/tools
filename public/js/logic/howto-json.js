    const HOW_TO_LOCAL_STORAGE = 'how-to-storage';

    var _supplyCounter = 0;
    var _toolsCounter = 0;
    var _stepCounter = 0;

    let invalid_url = lang ==='en'? 'Invalid URL' : 'URL Tidak Valid';
    let label_step = lang ==='en'? 'Step' : 'Langkah';
    let label_instructions = lang ==='en'? 'instruction' : 'instruksi';
    let label_imageStep = lang ==='en'? 'Image URL' : 'URL Gambar';
    let label_nameStep = lang ==='en'? 'Nama' : 'Name';
    let placeholder_type = lang ==='en'? 'Type' : 'Ketik';
    let placeholder_here = lang ==='en'? 'here..' : 'di sini..';
    let placeholder_instructions = lang ==='en'? 'Type your instruction here..' : 'Ketik instruksi Anda di sini..';
    let placeholder_imageStep = lang ==='en'? 'Type image URL here..' : 'Ketik URL gambar di sini..';
    let placeholder_nameStep = lang ==='en'? 'Type name here..' : 'Ketik nama di sini..';
    let placeholder_urlStep = lang ==='en'? 'Type URL here..' : 'Ketik URL di sini..';

    const jsonSchema = class  {
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

        resetRender(){
            _stepCounter =0;
            _toolsCounter =0;
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
                name:this.name,
            };

            obj.name = this.name;

            if(this.description) obj.description = this.description;

            if(this.image) obj.image = this.image;

            if(this.totalTime) obj.totalTime = "PT"+this.totalTime+"M";

            if(this.supplyItem.length > 0) {
                if (this.supplyItem.length === 1) {
                    obj.supply = this.supplyItem[0];
                } else {
                    obj.supply = this.supplyItem;
                }
            }

            if(this.tools.length > 0) {
                if (this.tools.length === 1) {
                    obj.tools = this.tools[0];
                } else {
                    obj.tools = this.tools;
                }
            }

            if(this.estimate.currency || this.estimate.value) obj.estimateCost = this.estimate;

            if(this.step.length > 0){
                if(this.step.length === 1){
                    obj.step = this.step[0];
                } else {
                    obj.step = this.step;
                }
            }

            $("#json-format").val("<script type=\"application/ld+json\">\n" + JSON.stringify(obj, undefined, 4) + "\n<\/script>");
            return obj;
        }

        render(){

            const obj = {
                "@context": "https://schema.org",
                "@type": "HowTo",
                name:this.name,
            };

            obj.name = this.name;

            if(this.description) obj.description = this.description;

            if(this.image) obj.image = this.image;

            if(this.totalTime) obj.totalTime = "PT"+this.totalTime+"M";

            if(this.supplyItem.length > 0) {
                if (this.supplyItem.length === 1) {
                    obj.supply = this.supplyItem[0];
                } else {
                    obj.supply = this.supplyItem;
                }
            }

            if(this.tools.length > 0) {
                if (this.tools.length === 1) {
                    obj.tools = this.tools[0];
                } else {
                    obj.tools = this.tools;
                }
            }

            if(this.estimate.currency || this.estimate.value) obj.estimateCost = this.estimate;

            if(this.step.length > 0){
                if(this.step.length === 1){
                    obj.step = this.step[0];
                } else {
                    obj.step = this.step;
                }
            }

            $("#json-format").val("<script type=\"application/ld+json\">\n" + JSON.stringify(obj, undefined, 4) + "\n<\/script>");
            return obj;
        }
    }
    localStorage.clear();

    localStorage.setItem(HOW_TO_LOCAL_STORAGE, $('#formhowto').html());


    let jsonFormat = new jsonSchema();
    jsonFormat.step.push({
        "@type": "HowToStep",
        "text": "",
    })
    jsonFormat.render();

    const _howToLocalStorage = 'how-to-history';
    const HistoryTemplate = (name, date) => `
<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px history--list" data-name="${name}">
  <div class="d-flex justify-content-between">
    <div class="local-collection-title">${name}</div>
    <div class="d-flex align-items-center">
      <i class='bx bxs-info-circle text-grey bx-sm mr-2' data-toggle="tooltip" data-theme="dark" title="Created at ${date}"></i>
      <i class='bx bxs-x-circle bx-sm text-grey delete-history--btn' data-name="${name}"></i>
    </div>
  </div>
</li>
`;

    const getMonth = function(index){
        const month = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL",
            "AUG", "SEP", "OCT", "NOV", "DES"]
        return month[index]
    }

    const refreshLocalStorage = function(){
        try{
            const keys = JSON.parse(localStorage.getItem(_howToLocalStorage))
            if (keys.how_to){
                for (let key of keys.how_to){
                    console.log(sleceFirstLastLine(localStorage.getItem(key)))
                    let temp = JSON.parse(sleceFirstLastLine(localStorage.getItem(key)))
                    let date = new Date(key*1000)
                    // let div = '<div class="custom-card py-5 px-3" onclick="getData('+key+')">'+
                    //     '<div class="d-flex align-items-center justify-content-between">'+
                    //     '<div class="local-collection-title">'+temp[0].name+'</div>'+
                    //     '<div class="d-flex align-items-center">'+
                    //     '<span class="mr-2 text-grey date-created">Created at '+((date.getHours() < 10) ? ('0'+date.getHours()):date.getHours())+'.'+((date.getMinutes() < 10) ? ('0'+date.getMinutes()):date.getMinutes())+' | '+date.getDate()+', '+getMonth(date.getMonth())+' '+date.getFullYear()+'</span>'+
                    //     '<i class="bx bxs-x-circle text-grey" onclick="removeData('+key+')"></i>'+
                    //     '</div>'+
                    //     '</div>'+
                    //     '</div>'
                    let div2 = '<li class="list-group-item list-group-item-action pointer mb-2 border-radius-5px" onclick="getData('+key+')">'+
                        '<div class="d-flex justify-content-between">'+
                        '  <div class="local-collection-title">'+temp['name']+'</div>'+
                        '  <div class="d-flex align-items-center">'+
                        '<span class="mr-2 text-grey date-created">Created at '+(date.getHours() < 10 ? ('0'+date.getHours()):date.getHours())+'.'+(date.getMinutes() < 10 ? ('0'+date.getMinutes()):date.getMinutes())+' | '+date.getDate()+', '+getMonth(date.getMonth())+' '+date.getFullYear()+'</span>'+
                        '    <i class="bx bxs-x-circle text-grey" onclick="removeData('+key+')"></i>'+
                        '  </div>'+
                        '</div>'+
                        '</li>'

                    // $('#localsavemobile').append(div)
                    $('#localsavedesktop').append(div2)
                }
            }
        }catch(e){
            console.log(e)
        }
    }

    function getHistories() {
        $('#localsavedesktop').empty();
        // $('#local-history-mobile').empty();
        let histories = localStorage.getItem(_howToLocalStorage);
        histories = histories ? JSON.parse(histories) : [];
        if (!histories || histories.length === 0) {
            $('#localsavedesktop').append(EmptyHistoryTemplate());
            // $('#local-history-mobile').append(EmptyHistoryTemplateMobile());
            return;
        }
        for (let history of histories.reverse()) {
            $('#localsavedesktop').append(
                HistoryTemplate(history.pageName, history.date)
            );
            // $('#local-history-mobile').append(
            //     HistoryTemplateMobile(history.pageName, history.date)
            // )
        }
    }

    const sleceFirstLastLine = function(text){
        let splited = text.split('\n')
        splited.splice(0,1)
        splited.splice(splited.length - 1,1)
        return splited.join('\n')
    }


    const getDataFromText = function(){
        const raw = $('#json-format').val();
        // console.log(sleceFirstLastLine(raw))
        return JSON.parse(sleceFirstLastLine(raw));
    }

    function addHistory(pageName, data) {
        let datas = getDataFromText();
        // console.log(datas.mainEntity.length !== 1 || (datas.mainEntity[0].name && datas.mainEntity[0].acceptedAnswer.text))
        if(datas.length !== 1){
            console.log(datas,"SAVE")
            const key = $('#json-format').data('key');
            const keys = window.localStorage.getItem(_howToLocalStorage)
            var temp = define();
            if (keys){
                temp = JSON.parse(keys)
            }
            if (!temp.how_to.includes(key)){
                temp.how_to.push(key)
            }
            localStorage.setItem(_howToLocalStorage, JSON.stringify(temp));
            localStorage.setItem(key, $('#json-format').val());
        }else{
            console.log(datas,"FAIL")
            const key = $('#json-format').data('key');
            const keys = window.localStorage.getItem(_howToLocalStorage)
            var temp = define();
            if (keys){
                temp = JSON.parse(keys)
                let index = temp.how_to.indexOf(key)
                if (index > 0){
                    temp.how_to.splice(index, 1)
                }
                localStorage.setItem(_howToLocalStorage, JSON.stringify(temp));
                localStorage.removeItem(key);
            }
        }
        // $('#localsavemobile').empty();
        $('#localsavedesktop').empty();
        refreshLocalStorage();
    }


    $ (document).ready(function () {
        // let deletes = lang ==='en'? 'Delete' : 'Hapus';
        // let name = lang ==='en'? 'Name' : 'Nama';
        // let imageUrl = lang ==='en'? 'ImageUrl':'UrlGambar';
        // jsonFormat();

    });

    $('#add-howto-supply').click(function () {
        if(jsonFormat.supplyItem.length > 0) _supplyCounter++;
        // let deletes = lang==='en'?'Delete Supply':'Hapus Supply';
        // let supplyName = lang==='en'?'Supply Name':'Supply';
        jsonFormat.supplyItem.push({
            "@type": "HowToSupply",
            "name": ""
        })

        jsonFormat.render();
        jQuery('#howto-supply').append("<input type='hidden' id='supplyCounter' value='"+(_supplyCounter)+"'><div class=\"row mb-5 supply-name\" data-id=\""+(_supplyCounter)+"\"><div class=\"col-10\" data-id=\""+(_supplyCounter)+"\"><label class=\"text-black font-weight-bold\" for=\"tool\" data-id=\""+(_supplyCounter)+"\">Supply #"+(_supplyCounter+1)+"</label>\n" +
        "                <input type=\"text\" name=\"\" class=\"form-control supplyName\" placeholder=\""+placeholder_type+" supply #"+(_supplyCounter+1)+" "+placeholder_here+"\" value=\"\" data-id=\""+(_supplyCounter)+"\"></div><div class=\"col-2\"><div class=\"d-flex justify-content-center mt-9\"><i class=\'bx bxs-x-circle bx-md text-darkgrey delete deleteSupply\' data-id=\""+(_supplyCounter)+"\"></i></div></div>"
        );
        let row = parseInt($('#json-format').val().split('\n').length);
        $('#json-format').attr('rows',row);
    });

    $('#add-howto-tool').click(function () {
        if(jsonFormat.tools.length > 0) _toolsCounter++;

        // let deletes = lang==='en'?'Delete Tool':'Hapus Tool';
        // let tool = lang==='en'?'Tool Name':'Alat';

        jsonFormat.tools.push({
            "@type": "HowToTool",
            "name": "",
        })

        jsonFormat.render();

        $('#howto-tool').append("<input type='hidden' id='toolsCounter' value='"+(_toolsCounter)+"'><div class=\"row mb-5 tools-name\" data-id=\""+(_toolsCounter)+"\"><div class=\"col-10\" data-id=\""+(_toolsCounter)+"\"><label class=\"text-black font-weight-bold\" for=\"tool\" data-id=\""+(_toolsCounter)+"\">Tool #"+(_toolsCounter+1)+"</label>\n" +
        "                <input type=\"text\" name=\"\" class=\"form-control tool\" placeholder=\""+placeholder_type+" tool #"+(_toolsCounter+1)+" "+placeholder_here+"\" value=\"\" data-id=\""+(_toolsCounter)+"\"></div><div class=\"col-2\"><div class=\"d-flex justify-content-center mt-9\"><i class=\'bx bxs-x-circle bx-md text-darkgrey delete deleteTool\' data-id=\""+(_toolsCounter)+"\"></i></div></div>"
        );
        let row = parseInt(jQuery('#json-format').val().split('\n').length);
        $('#json-format').attr('rows',row);
    });

    $('#add-howto-step').click(function () {
        _stepCounter++;
        // let deletes = lang==='en'?'Delete Step':'Hapus Step';
        // let tool = lang==='en'?'Tool Name':'Alat';
        jsonFormat.step.push({
            "@type": "HowToStep",
            "text": "",
        });

        jsonFormat.render();

        jQuery('#howto-step').append("<div class='loopStep' data-id='"+(_stepCounter)+"'><input type='hidden' id='stepCounter' value='"+(_stepCounter)+"'><div class=\"row\" data-id=\""+(_stepCounter)+"\"><div class=\"col-10 col-sm-11\"><label class=\"text-black font-weight-bold\" for=\"instructions\" data-id=\""+(_stepCounter)+"\">"+label_step+" #"+(_stepCounter+1)+": "+label_instructions+"</label>\n" +
            "                <input type=\"text\" name=\"\" class=\"form-control instructions mb-5\" placeholder=\""+placeholder_instructions+"\" value=\"\" data-id=\""+(_stepCounter)+"\"></div><div class=\"col-2 col-sm-1\"><div class=\"d-flex justify-content-center mt-9\"><i class=\'bx bxs-x-circle bx-md text-darkgrey delete deleteStep\' data-id=\""+(_stepCounter)+"\"></i></div></div></div>\n" +
            "                <div class=\"row\" data-id=\""+(_stepCounter)+"\"><div class=\"col-12 col-md-4 mb-5\"><label class=\"text-black font-weight-bold\" for=\"imageStep\" data-id=\""+(_stepCounter)+"\">"+label_imageStep+"</label><input type=\"text\" name=\"\" class=\"form-control imageStep\" placeholder=\""+placeholder_imageStep+"\" value=\"\" data-id=\""+(_stepCounter)+"\"><div class=\"invalid-feedback\">"+invalid_url+"</div></div>" +
            "                <div class=\"col-12 col-md-4 mb-5\"><label class=\"text-black font-weight-bold\" for=\"nameStep\" data-id=\""+(_stepCounter)+"\">"+label_nameStep+"</label><input type=\"text\" name=\"\" class=\"form-control nameStep\" placeholder=\""+placeholder_nameStep+"\" value=\"\" data-id=\""+(_stepCounter)+"\"></div>" +
            "                <div class=\"col-12 col-md-4 mb-5\"><label class=\"text-black font-weight-bold\" for=\"url\" data-id=\""+(_stepCounter)+"\">URL</label><input type=\"text\" name=\"\" class=\"form-control url\" placeholder=\""+placeholder_urlStep+"\" value=\"\" data-id=\""+(_stepCounter)+"\"><div class=\"invalid-feedback\">"+invalid_url+"</div></div></div></div>");
        let row = parseInt($('#json-format').val().split('\n').length);
        $('#json-format').attr('rows',row);
        sticky.update();
    });

    $('.name').keyup(function(event){
        jsonFormat.name = $(this).val();
        jsonFormat.render();
        addHistory();
    });

    $('.description').keyup(function(event){
        jsonFormat.description = $(this).val();
        jsonFormat.render();
    });

    $('.totalTime').keyup(function(event){
        jsonFormat.totalTime = $(this).val();
        jsonFormat.render();
    });

    $('.imageUrl').keyup(function (event) {
        jsonFormat.image = $(this).val();
        jsonFormat.render();
    })

    $('.estimated').keyup(function(event){
        // let index = parseInt($(this).data('id'));
        jsonFormat.estimate.value = $(this).val();
        jsonFormat.render();
    });

    $('.currency').on('change', function() {
        // let index = parseInt($(this).data('id'));
        // console.log('index:' + index);
        jsonFormat.estimate.currency = $(this).val();
        jsonFormat.render();
    });


    $(document).on('keyup', '.supplyName', function () {
        let index = parseInt($(this).data('id'));
        // console.log(index)
        jsonFormat.supplyItem[index].name = $(this).val();
        jsonFormat.render();
    });

    $(document).on('keyup', '.tool', function () {
        let index = parseInt(jQuery(this).data('id'));
        jsonFormat.tools[index].name = $(this).val();
        jsonFormat.render();
    });

    $(document).on('click', '.deleteSupply', function () {
        let index = parseInt(jQuery(this).data('id'));
        jsonFormat.supplyItem.splice(index, 1);
        jsonFormat.render();

        for(let i = index+1; i < jsonFormat.supplyItem.length + 1; i++){
            $('.supplyName[data-id=' + (i - 1) + ']').val($('.supplyName[data-id=' + (i) + ']').val())
        }

        $('.supply-name[data-id=' + index + ']').remove();
        let row = parseInt($('#json-format').val().split('\n').length);
        $('#json-format').attr('rows',row);

        sticky.update();
        if(jsonFormat.supplyItem.length > 0) _supplyCounter--;
    });

    $(document).on('keyup', '.instructions', function () {
        let index = parseInt(jQuery(this).data('id'));
        jsonFormat.step[index].text = jQuery(this).val();
        jsonFormat.render();
    });

    $(document).on('keyup', '.imageStep', function () {
        let index = parseInt(jQuery(this).data('id'));
        jsonFormat.step[index].image = jQuery(this).val();
        jsonFormat.render();
    });

    $(document).on('keyup', '.nameStep', function () {
        let index = parseInt(jQuery(this).data('id'));
        jsonFormat.step[index].name = jQuery(this).val();
        jsonFormat.render();
    });

    $(document).on('keyup', '.url', function () {
        let index = parseInt(jQuery(this).data('id'));
        jsonFormat.step[index].url = jQuery(this).val();
        jsonFormat.render();
    });



    $(document).on('click', '.deleteTool', function () {
        let index = parseInt(jQuery(this).data('id'));

            jsonFormat.tools.splice(index, 1);
            jsonFormat.render();

            for (let i = index + 1; i < jsonFormat.tools.length + 1; i++) {
                $('.tool[data-id=' + (i - 1) + ']').val($('.tool[data-id=' + (i) + ']').val())
            }

            $('.tools-name[data-id=' + jsonFormat.tools.length + ']').remove();
            let row = parseInt($('#json-format').val().split('\n').length);
            $('#json-format').attr('rows',row);

        sticky.update();
        if(jsonFormat.tools.length > 0) _toolsCounter--;
    });


    $(document).on('click', '.deleteStep', function () {
        let index = parseInt(jQuery(this).data('id'));

            jsonFormat.step.splice(index, 1);
            jsonFormat.render();

            for (let i = index + 1; i < jsonFormat.step.length + 1; i++) {
                $('.loopStep[data-id=' + (i - 1) + ']').val($('.loopStep[data-id=' + (i) + ']').val())
            }

        $('.deleteTool[data-id=' + index + ']').remove();
        $('.row[data-id=' + index + ']').remove();
        let row = parseInt($('#json-format').val().split('\n').length);
        $('#json-format').attr('rows',row);
    if(jsonFormat.step.length > 0) _stepCounter--;
});

$(document).on('change', '#schema-json-ld', function() {
    if($(this).val() !== 'home') {
        window.location = 'json-ld-' + $(this).val() + '-schema-generator'
    }else{
        window.location = 'json-ld-schema-generator'
    }
});

jQuery('#copy').click(function () {
    const copyText = jQuery('#json-format');
    copyText.select();
    // copyText.setSelectionRange(0, 999999); /*For mobile devices*/
    document.execCommand("copy");
    toastr.info('Copied to Clipboard', 'Information');
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


    jsonFormat.resetRender();
    jsonFormat.step.push({
        "@type": "HowToStep",
        "text": "",
    })
    jsonFormat.render();
});
