function print() {
    jQuery("#json-format").val("<script type=\"application/ld+json\">\n" + JSON.stringify(main, undefined, 4) + "\n<\/script>");
}

let main =
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "mainEntity": []
    };

jQuery(document).ready(function () {
    let deletes = lang ==='en'? 'Delete' : 'Hapus';
    let headline = lang ==='en'? 'Headline' : 'Judul';
    let url = lang ==='en'?'Url':'Url';
    let pictureUrl = lang ==='en'? 'PictureUrl':'UrlGambar';
    let authorType = lang ==='en'? 'AuthorType':'TipePenulis';
    let author = lang ==='en'?'Author':'Penulis';
    let publisherType = lang==='en'?'PublisherType':'TipePenerbit';
    let publisher = lang ==='en'? 'Publisher' : 'Penerbit';
    let publisherLogoUrl = lang ==='en'? 'PublisherLogoUrl' : 'UrlLogoPenerbit';
    let datePublished = lang ==='en'? 'DatePublisher' : 'TanggalPenerbit';
    let dateModified = lang ==='en'? 'DateModefied':'TanggalDiubah';


    main.mainEntity.push({
        "@type": "Article",
        "headline": "",
        "url":"",
        "pictureUrl":"",
        "author":{
            "@type":"",
            "author":"",
        },
        "publisher":{
            "@type":"organization",
            "name":"",
            "logo":{
                "type":"ImageObject",
                "url":"",
            }
        },
    });
    print();
    jQuery('#add-article').click(function () {
        main.mainEntity.push({
            "@type": "Article",
            "headline": "",
            "url":"",
            "pictureUrl":"",
            "author":{
                "@type":"",
                "author":"",
            },
            "publisher":{
                "@type":"organization",
                "name":"",
                "logo":{
                    "type":"ImageObject",
                    "url":"",
                }
            },
        });
        print();
        jQuery('#formArticle').append("<button type=\"button\" class=\"btn btn-danger mb-2 delete\" name=\"button\" data-id=\""+(main.mainEntity.length-1)+"\">"+deletes+"</button>\n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 headline\" placeholder=\""+headline+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 url\" placeholder=\""+url+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 pictureUrl\" placeholder=\""+pictureUrl+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <select name=\"\" id=\"authortype\" class=\"form-control mb-5 authorType\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <option value=\"\">Value</option> \n" +
            "                <option value=\"person\">Person</option> \n" +
            "                <option value=\"organization\">Organization</option> \n" +
            "                </select> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 author\" placeholder=\""+author+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 publisher\" placeholder=\""+publisher+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 publisherLogoUrl\" placeholder=\""+publisherLogoUrl+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"date\" name=\"\" class=\"form-control mb-5 datePublished\" placeholder=\""+datePublished+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"date\" name=\"\" class=\"form-control mb-7 dateModified\" placeholder=\""+dateModified+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\">"
        );
        let row = parseInt(jQuery('#json-format').val().split('\n').length);
        jQuery('#json-format').attr('rows',row);
        sticky.update();
    });
});

jQuery(document).on('keyup', '.headline', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].headline = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.url', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].url = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.pictureUrl', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].pictureUrl = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.authorType', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].author['@type'] = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.author', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].author.author = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.publisher', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].publisher.name = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.publisherLogoUrl', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].publisher.logo.url = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.datePublished', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].datePublished = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.dateModified', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].dateModified = jQuery(this).val();
    print();
});

jQuery(document).on('click', '.delete', function () {
    let index = parseInt(jQuery(this).data('id'));
    if (index!==0){
        main.mainEntity.splice(index, 1);
        print();
        for (let i = index + 1; i < main.mainEntity.length + 1; i++) {
            jQuery('.headline[data-id=' + (i - 1) + ']').val(jQuery('.headline[data-id=' + (i) + ']').val())
            jQuery('.url[data-id=' + (i - 1) + ']').val(jQuery('.url[data-id=' + (i) + ']').val())
            jQuery('.pictureUrl[data-id=' + (i - 1) + ']').val(jQuery('.pictureUrl[data-id=' + (i) + ']').val())
            jQuery('.authorType[data-id=' + (i - 1) + ']').val(jQuery('.authorType[data-id=' + (i) + ']').val())
            jQuery('.author[data-id=' + (i - 1) + ']').val(jQuery('.headline[data-id=' + (i) + ']').val())
            jQuery('.publisher[data-id=' + (i - 1) + ']').val(jQuery('.publisher[data-id=' + (i) + ']').val())
            jQuery('.publisherLogoUrl[data-id=' + (i - 1) + ']').val(jQuery('.publisherLogoUrl[data-id=' + (i) + ']').val())
            jQuery('.datePublished[data-id=' + (i - 1) + ']').val(jQuery('.datePublished[data-id=' + (i) + ']').val())
            jQuery('.dateModified[data-id=' + (i - 1) + ']').val(jQuery('.dateModified[data-id=' + (i) + ']').val())
        }
        jQuery('label[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.headline[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.url[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.pictureUrl[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.authorType[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.author[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.publisher[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.publisherLogoUrl[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.datePublished[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.dateModified[data-id=' + main.mainEntity.length + ']').remove();
        
        jQuery('.delete[data-id=' + main.mainEntity.length + ']').remove();
        let row = parseInt(jQuery('#json-format').val().split('\n').length);
        jQuery('#json-format').attr('rows',row);
    }
    sticky.update();
});

jQuery('#copy').click(function () {
    const copyText = jQuery('#json-format');
    copyText.select();
    // copyText.setSelectionRange(0, 999999); /*For mobile devices*/
    document.execCommand("copy");
});
