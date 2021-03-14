
    var reviewCounter = -1;

    let invalid_url = lang ==='en'? 'Invalid URL' : 'URL Tidak Valid';
    let invalid_number = lang ==='en'? 'Value should be more than 0' : 'Nilai harus lebih dari 0';
    let label_image = lang ==='en'? 'Image URL' : 'URL Gambar';
    let label_ingredients = lang ==='en'? 'Ingredients' : 'Bahan';
    let label_step = lang ==='en'? 'Step' : 'Langkah';
    let label_name_step = lang ==='en'? 'Name' : 'Nama';
    let label_text = lang ==='en'? 'Text' : 'Teks';
    let label_image_step = lang ==='en'? 'Image URL' : 'URL Gambar';
    let label_review_name = lang ==='en'? 'Review’s name' : 'Nama Ulasan';
    let label_review_body = lang ==='en'? 'Review’s body' : 'Isi Ulasan';
    let label_review_rating = lang ==='en'? 'Rating' : 'Peringkat';
    let label_review_date = lang ==='en'? 'Date' : 'Tanggal';
    let label_review_author = lang ==='en'? 'Author' : 'Penulis';
    let label_review_publisher = lang ==='en'? 'Publisher' : 'Penerbit';
    let placeholder_image = lang ==='en'? 'Type image url here..' : 'Ketik url gambar di sini..';
    let placeholder_ingredients = lang ==='en'? 'Type ingredient here..' : 'Ketik bahan disini..';
    let placeholder_step = lang ==='en'? 'Type step here..' : 'Ketik langkah di sini..';
    let placeholder_name_step = lang ==='en'? 'Type name here..' : 'Ketik nama di sini..';
    let placeholder_url_step = lang ==='en'? 'Type URL here..' : 'Ketik URL di sini..';
    let placeholder_review_name = lang ==='en'? 'Type review\'s name here..' : 'Ketik nama ulasan disini..';
    let placeholder_review_body = lang ==='en'? 'Type review\'s body here..' : 'Ketik isi ulasan disini..';
    let placeholder_review_date = lang ==='en'? 'Pick a date' : 'Pilih tanggal';
    let placeholder_review_author = lang ==='en'? 'Type author name here..' : 'Ketik nama penulis disini..';
    let placeholder_review_publisher = lang ==='en'? 'Type publisher here..' : 'Ketik penerbit disini';


    const sku = (id) => `<div class="col-12 col-md-4" id="sku">
        <label class="text-black font-weight-bold" for="sku">sku</label>
        <input type="text" name="" class="form-control sku mb-5" placeholder="${$('#skulang').val()}" value="" data-id="${id}">
      </div>`;

    const gtin = (id) => `<div class="col-12 col-md-4" id="gtin8">
    <label class="text-black font-weight-bold" for="gtin8">gtin8</label>
    <input type="text" name="" class="form-control gtin8 mb-5" placeholder="${$('#gtin8lang').val()}" value="" data-id="${id}">
  </div>`;

    const Secondgtin = (id) => `<div class="col-12 col-md-4" id="gtin13">
    <label class="text-black font-weight-bold" for="gtin13">gtin13</label>
    <input type="text" name="" class="form-control gtin13 mb-5" placeholder="${$('#gtin13lang').val()}" value="" data-id="${id}">
  </div>`;

    const Thirdgtin = (id) => `<div class="col-12 col-md-4" id="gtin14">
    <label class="text-black font-weight-bold" for="gtin14">gtin14</label>
    <input type="text" name="" class="form-control gtin14 mb-5" placeholder="${$('#gtin14lang').val()}" value="" data-id="${id}">
  </div>`;

    const mpn = (id) => ` <div class="col-12 col-md-4" id="mpn">
    <label class="text-black font-weight-bold" for="mpn">mpn</label>
    <input type="text" name="" class="form-control mpn mb-5" placeholder="${$('#mpnlang').val()}" value="" data-id="${id}">
  </div>`;

    const productDescription = {
        sku:sku,
        gtin8:gtin,
        gtin13:Secondgtin,
        gtin14:Thirdgtin,
        mpn:mpn,
    }

    const productSchema = class {
        constructor() {
            this.name = '';
            this.image = '';
            this.description = undefined;
            this.brand = undefined;

            this.skuTemp = 'none';
            this.gtin8Temp = 'none';
            this.gtin13Temp = 'none';
            this.gtin14Temp = 'none';
            this.mpnTemp = 'none';

            this.sku = '';
            this.gtin8 = '';
            this.gtin13 = '';
            this.gtin14 = '';
            this.mpn = '';

            this.price = '';
            this.highPrice = '';
            this.priceCurrency = ''
            this.url = '';

            this.offers = undefined;

            this.aggregateRating = undefined;
            this.review = [];


            this.tempIdentify = [];
        }

        temp(){
            const tempObj = {};

            tempObj.price = this.price;
            tempObj.lowPrice = this.price;
            // tempObj.highPrice = this.highPrice;
            tempObj.url = this.url;

            // if(this.offers.url) tempObj.offers.url = this.offers.url;

            return tempObj;
        }

        render(){

            const obj = {
                "@context": "https://schema.org",
                "@type": "Product",
                "name": this.name,
                "image": this.image,
            };

            obj.name = this.name;
            obj.image = this.image;

            if(this.description) obj.description = this.description;

            if(this.brand) obj.brand = this.brand;

            if(this.skuTemp != 'none') obj.sku = this.sku;
            if(this.gtin8Temp != 'none') obj.gtin8 = this.gtin8;
            if(this.gtin13Temp != 'none') obj.gtin13 = this.gtin13;
            if(this.gtin14Temp != 'none') obj.gtin14 = this.gtin14;
            if(this.mpnTemp != 'none') obj.mpn = this.mpn;

            if(this.offers) {
                obj.offers = this.offers;
                obj.offers.lowPrice = this.offers.lowPrice;
                if(this.offers.price) obj.offers.price = this.offers.price;
                if(this.offers.highPrice) obj.offers.highPrice = this.offers.highPrice;
                if(this.offers.offerCount) obj.offers.offerCount = this.offers.offerCount
            }

            if(this.aggregateRating) obj.aggregateRating = this.aggregateRating;

            if(this.review){
                if(this.review.length > 0) {
                    if (this.review.length === 1) {
                        obj.review = this.review[0];
                    } else {
                        obj.review = this.review;
                    }
                }
            }

            $("#json-format").val("<script type=\"application/ld+json\">\n" + JSON.stringify(obj, undefined, 4) + "\n<\/script>");
            return obj;

        }

    }

    let productFormat = new productSchema();
    productFormat.render();

jQuery(document).ready(function () {
    let deletes = lang ==='en'? 'Delete' : 'Hapus';
    let jobTitle = lang ==='en'?'JobTitle':'Jabatan';
    let identifier = lang==='en'?'Identifier':'Identifier';
    let description = lang ==='en'?'Description':'Deskripsi';
    let name = lang==='en'?'Name':'Nama';
    let companyUrl = lang==='en'?'CompanyUrl':'UrlCompany';
    let industry = lang==='en'?'Industry':'Industry';
    let employmentType = lang==='en'?'EmploymentType':'TipePegawai';

});

    $('.name').keyup(function (e) {
        productFormat.name = $(this).val();
        productFormat.render();
    });

    $('.image').keyup(function (e) {
        productFormat.image = $(this).val();
        productFormat.render();
    });

    $('.description').keyup(function (e) {
        productFormat.description = $(this).val();
        productFormat.render();
    });

    $('.productBrand').keyup(function (e) {
        productFormat.brand = $(this).val();
        productFormat.render();
    });

    $('.identifier').change(function (e) {

        if(productFormat.tempIdentify.length > $(this).val().length){
            for(let i=0; i < productFormat.tempIdentify.length; i++){
                if($.inArray(productFormat.tempIdentify[i], $(this).val()) == -1) {

                    if(productFormat.tempIdentify[i] === 'sku'){
                        productFormat.skuTemp = "none";
                        productFormat.sku = "";
                    } else if(productFormat.tempIdentify[i] === 'gtin8'){
                        productFormat.gtin8Temp = "none";
                        productFormat.gtin8 = "";
                    } else if(productFormat.tempIdentify[i] === 'gtin13'){
                        productFormat.gtin13Temp = "none";
                        productFormat.gtin13 = "";
                    } else if(productFormat.tempIdentify[i] === 'gtin14'){
                        productFormat.gtin14Temp = "none";
                        productFormat.gtin14 = "";
                    } else {
                        productFormat.mpnTemp = "none";
                        productFormat.mpn = "";
                    }

                    $('#'+productFormat.tempIdentify[i]+'').remove();
                    productFormat.tempIdentify.splice(i, 1);

                }
            }

        }

        for (let i=0;i< $(this).val().length; i++){
            if($.inArray($(this).val()[i], productFormat.tempIdentify) == -1) {
                // counterSocial++;
                $('.product-description').append(eval('productDescription.'+$(this).val()[i]+'('+i+')'));
                if($(this).val()[i] === 'sku'){
                    productFormat.skuTemp = "filled";
                } else if($(this).val()[i] === 'gtin8'){
                    productFormat.gtin8Temp = "filled";
                } else if($(this).val()[i] === 'gtin13'){
                    productFormat.gtin13Temp = "filled";
                } else if($(this).val()[i] === 'gtin14'){
                    productFormat.gtin14Temp = "filled";
                } else {
                    productFormat.mpnTemp = "filled";
                }
                productFormat.tempIdentify.push($(this).val()[i]);

            }
        }

        productFormat.render();

    });

    $(document).on('keyup', '.gtin8', function () {
        productFormat.gtin8 = $(this).val();
        productFormat.render();
    });

    $(document).on('keyup', '.sku', function () {
        productFormat.sku = $(this).val();
        productFormat.render();
    });

    $(document).on('keyup', '.gtin14', function () {
        productFormat.gtin14 = $(this).val();
        productFormat.render();
    });

    $(document).on('keyup', '.mpn', function () {
        productFormat.mpn = $(this).val();
        productFormat.render();
    });

    $(document).on('keyup', '.gtin13', function () {
        productFormat.gtin13 = $(this).val();
        productFormat.render();
    });

    $('.url').keyup(function (e) {
        productFormat.offers.url = $(this).val();
        productFormat.temp();
        productFormat.render();
    });

    $('.priceCurrency').change(function (e) {
        productFormat.offers.priceCurrency = $(this).val();
        productFormat.temp();
        productFormat.render();
    });

    $('.price').keyup(function (e) {
        productFormat.offers.price = $(this).val();
        productFormat.temp();
        productFormat.render();
    });

    $('.highPrice').keyup(function (e) {
        if($(this).val().length < 1){
            delete productFormat.offers.highPrice;
        }else{
            productFormat.offers.highPrice = $(this).val();
        }
        productFormat.render();
    });

    $('.offer').keyup(function (e) {

        if($(this).val().length < 1){
            delete productFormat.offers.offerCount;
        }else{
            productFormat.offers.offerCount = $(this).val();
        }
        productFormat.render();

    });

    $('.ratingValue').keyup(function (e) {

        if($(this).val().length < 1){
            $('.ratingCount').attr('disabled', true)
            $('.bestRating').attr('disabled', true)
            $('.worstRating').attr('disabled', true)
            delete productFormat.aggregateRating;
            $('.ratingCount').val('');
            $('.bestRating').val('');
            $('.worstRating').val('');

        }else{
            $('.ratingCount').removeAttr('disabled')
            $('.bestRating').removeAttr('disabled')
            $('.worstRating').removeAttr('disabled')
            productFormat.aggregateRating = {
                "@type": "AggregateRating",
                "ratingValue": $(this).val(),
                "bestRating": "",
                "worstRating": "",
                "ratingCount": ""
            }
        }

        productFormat.render();

    });

    $('.ratingCount').keyup(function (e) {
        productFormat.aggregateRating.ratingCount = $(this).val();
        productFormat.render();
    });

    $('.bestRating').keyup(function (e) {
        productFormat.aggregateRating.bestRating = $(this).val();
        productFormat.render();
    });

    $('.worstRating').keyup(function (e) {
        productFormat.aggregateRating.worstRating = $(this).val();
        productFormat.render();
    });

    $(document).on('click', '#add-product-review', function () {
        let index = parseInt(jQuery(this).data('id'));
        let deletes = lang ==='en'? 'Delete Review' : 'Hapus Review';
        reviewCounter++;

        $('#addReview').append("<div class=\"row review-data\" data-id=\""+(reviewCounter)+"\"><div class=\"col-12 col-lg-6\"><label class=\"text-black font-weight-bold\" for=\"review\">#"+(reviewCounter+1)+" "+label_review_name+"</label><input type=\"text\" name=\"\" class=\"form-control review mb-5\" placeholder=\""+placeholder_review_name+"\" value=\"\" data-id=\""+(reviewCounter)+"\">" +
            "                   <div class=\"row\"><div class=\"col-6 col-md-4 mb-5\"><label class=\"text-black font-weight-bold\" for=\"rating\">"+label_review_rating+"</label><input type=\"number\" name=\"\" class=\"form-control rating\" placeholder=\"0\" value=\"\" min=\"0\" data-id=\""+(reviewCounter)+"\"><div class=\"invalid-feedback\" data-id="+(reviewCounter)+">"+invalid_number+"</div></div>" +
            "                   <div class=\"col-6 col-md-8\"><label class=\"text-black font-weight-bold\" for=\"dateReview\">"+label_review_date+"</label><div class=\"input-group date\"><div class=\"input-group-append\"><span class=\"input-group-text\"><i class=\"bx bx-calendar text-darkgrey\"></i></span></div>" +
            "                   <input type=\"text\" id=\"kt_datepicker_2\" name=\"\" class=\"form-control custom-date dateReview\" readonly  placeholder=\""+placeholder_review_date+"\" value=\"\" data-id=\""+(reviewCounter)+"\"/></div></div></div></div>" +
            "                   <div class=\"col-12 col-lg-6 mb-8 mb-lg-5\"><label class=\"text-black font-weight-bold\" for=\"reviewBody\">"+label_review_body+"</label><textarea name=\"\" class=\"form-control custom-textarea-82 reviewBody\" placeholder=\""+placeholder_review_body+"\" data-id=\""+(reviewCounter)+"\"></textarea></div></div>" +
            "                   <div class=\"row mb-5 author-data\" data-id=\""+(reviewCounter)+"\"><div class=\"col-5\"><label class=\"text-black font-weight-bold\" for=\"authorReview\">"+label_review_author+"</label><input type=\"text\" name=\"\" class=\"form-control authorReview\" placeholder=\""+placeholder_review_author+"\" value=\"\" data-id=\""+(reviewCounter)+"\"></div>" +
            "                   <div class=\"col-6\"><label class=\"text-black font-weight-bold\" for=\"publisher\">"+label_review_publisher+"</label><input type=\"text\" name=\"\" class=\"form-control publisher\" placeholder=\""+placeholder_review_publisher+"\" value=\"\" data-id=\""+(reviewCounter)+"\"></div>" +
            "                   <div class=\"col-1\"><div class=\"d-flex justify-content-center mt-9\"><i class=\"bx bxs-x-circle bx-md delete deleteReview\"></i></div></div></div>"
        );

        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            }
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        }

        $('#addReview').find('.custom-date').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows
        });

        let row = parseInt($('#json-format').val().split('\n').length);
        jQuery('#json-format').attr('rows',row);


        productFormat.review.push({
            "@type": "Review",
            "reviewBody": "",
            "author": {"@type": "Person", "name": ""}
        });
        productFormat.render();
    });

    $(document).on('click', '.deleteReview', function () {
        let index = parseInt($(this).data('id'));
        productFormat.review.splice(index, 1);
        productFormat.render();

        for(let i = index+1; i < productFormat.review.length + 1; i++){
            $('.review-data[data-id=' + (i - 1) + ']').val($('.review-data[data-id=' + (i) + ']').val())
            $('.author-data[data-id=' + (i - 1) + ']').val($('.author-data[data-id=' + (i) + ']').val())
            $('.daleteReview[data-id=' + (i - 1) + ']').val($('.daleteReview[data-id=' + (i) + ']').val())
            $('.review[data-id=' + (i - 1) + ']').val($('.review[data-id=' + (i) + ']').val())
            $('.reviewBody[data-id=' + (i - 1) + ']').val($('.reviewBody[data-id=' + (i) + ']').val())
            $('.rating[data-id=' + (i - 1) + ']').val($('.rating[data-id=' + (i) + ']').val())
            $('.dateReview[data-id=' + (i - 1) + ']').val($('.dateReview[data-id=' + (i) + ']').val())
            $('.authorReview[data-id=' + (i - 1) + ']').val($('.authorReview[data-id=' + (i) + ']').val())
            $('.publisher[data-id=' + (i - 1) + ']').val($('.publisher[data-id=' + (i) + ']').val())
        }

        $('.review-data[data-id=' + productFormat.review.length + ']').remove();
        $('.author-data[data-id=' + productFormat.review.length + ']').remove();
        let row = parseInt($('#json-format').val().split('\n').length);
        $('#json-format').attr('rows',row);
        reviewCounter--;
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
    });

    $(document).on("change", ".offerType", function() {
        var selectedItem = $(this).val();

        if(selectedItem === "Aggregate Offer") {
            productFormat.offers = {
                "@type": "AggregateOffer",
                "url": "",
                "priceCurrency": "",
                "lowPrice": ""
            }
            $(".url, .price, .priceCurrency").removeAttr("disabled");
            $(".priceCurrency").selectpicker("refresh");
            $("#ag_offer").css('display', 'flex');
            $("#offer").css('display', 'none');
        }else if(selectedItem === "Offer"){
            productFormat.offers = {
                "@type": "Offer",
                "url": "",
                "priceCurrency": "",
                "price": ""
            }
            $(".url, .price, .priceCurrency").removeAttr("disabled");
            $(".priceCurrency").selectpicker("refresh");
            $("#offer").css('display', 'flex');
            $("#ag_offer").css('display', 'none');
        }else if(selectedItem === "None"){
            delete productFormat.offers;
            $(".url, .price, .priceCurrency").attr("disabled", true);
            $(".priceCurrency").selectpicker("refresh");
            $("#ag_offer").css('display', 'none');
            $("#offer").css('display', 'none');
        }
        productFormat.render();
    });
