function print() {
    jQuery("#json-format").val("<script type=\"application/ld+json\">\n" + JSON.stringify(main, undefined, 4) + "\n<\/script>");
}

let main =
    {
        "@context": "https://schema.org",
        "@type": "Event",
        "mainEntity": []
    };

jQuery(document).ready(function () {
    let deletes = lang ==='en'? 'Delete' : 'Hapus';
    let offerType = lang==='en'?'OfferType':'TipePemesanan';
    let nameOffer = lang==='en'?'NameOffer':'Nama Pemesanan';
    let price = lang==='en'?'Price':'Harga';
    let priceCurrency = lang==='en'?'PriceCurrency':'Kurs';
    let validFrom = lang==='en'?'ValidFromm':'MulaiValid';
    let url = lang==='en'?'Url':'Url';
    let availability = lang==='en'?'Availability':'Ketersediaan';

    main.mainEntity.push({
        "@type": "person",
        "name": "",
        "description":"",
    });
    print();
    jQuery('#add-event').click(function () {
        main.mainEntity.push({
            "offers": {
                "@type": "Offer",
                "name": "",
                "price": "",
                "priceCurrency": "",
                "validFrom": "",
                "url": "",
                "availability": ""
              }
            });
        print();
        jQuery('#formevent').append("<button type=\"button\" class=\"btn btn-danger mb-2 delete\" name=\"button\" data-id=\""+(main.mainEntity.length-1)+"\">"+deletes+"</button>\n" +
        "                <input type=\"text\" name=\"\" class=\"form-control mb-5 nameOffer\" placeholder=\""+nameOffer+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
        "                <input type=\"text\" name=\"\" class=\"form-control mb-5 price\" placeholder=\""+price+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
        "                <input type=\"date\" name=\"\" class=\"form-control mb-5 validFrom\" placeholder=\""+validFrom+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
        "                <input type=\"text\" name=\"\" class=\"form-control mb-5 url\" placeholder=\""+url+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
        "                <select name=\"\" id=\"\" class=\"form-control mb-5 availability\" data-id=\""+(main.mainEntity.length-1)+"\"> +\n"+
        "                <option value=\"\">Availability</option> \n"+
        "                <option value=\"inStock\">In Stock</option> \n"+
        "                <option value=\"soldOut\">Sold Out</option> \n"+
        "                <option value=\"preOrder\">Pre Order</option> \n"
        );
        console.log("button clicked")
        let row = parseInt(jQuery('#json-format').val().split('\n').length);
        jQuery('#json-format').attr('rows',row);
        sticky.update();
    });
});

jQuery(document).on('keyup', '.name', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].name = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.description', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].description = jQuery(this).val();
    print();
});


jQuery(document).on('change', '.startDate', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].startDate = jQuery(this).val();

    print();
});

jQuery(document).on('change', '.starttime', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].starttime = jQuery(this).val();

    print();
});

jQuery(document).on('change', '.endDate', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].endDate = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.endtime', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].endtime = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.eventStatus', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].eventStatus = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.attendance', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log(jQuery(this).val())
    if (jQuery(this).val() == 'offline') {
        main.mainEntity[index].eventAttendanceMode = jQuery(this).val();
        main.mainEntity[index].location ={
                "@type": "Place",
                "name": "",
                "address": {
                        "@type": "PostalAddress",
                        "streetAddress": "",
                        "addressLocality": "",
                        "postalCode": "",
                        "addressCountry": ""
                    }
        };
        let nameEvent = lang ==='en'?'NameEvent':'NamaEvent';
        let streetAddress = lang ==='en'?'StreetAddress':'AlamatJalan';
        let addressLocality = lang==='en'?'AddressLocality':'AlamatLokal';
        let postalCode = lang==='en'?'PostalCode':'KodePos';
        let addressCountry = lang==='en'?'addressCountry':'AlamatKota';
        jQuery('#formevent2').empty();
        jQuery('#formevent2').append(
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 nameEvent\" placeholder=\""+nameEvent+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 streetAddress\" placeholder=\""+streetAddress+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 addressLocality\" placeholder=\""+addressLocality+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-7 postalCode\" placeholder=\""+postalCode+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n"+
            "                <input type=\"text\" name=\"\" class=\"form-control mb-7 addressCountry\" placeholder=\""+addressCountry+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> "
        );
        let row = parseInt(jQuery('#json-format').val().split('\n').length);
        jQuery('#json-format').attr('rows',row);
        sticky.update();
    } else if (jQuery(this).val() == 'online') {
        main.mainEntity[index].eventAttendanceMode = jQuery(this).val();
        main.mainEntity[index].location ={
                "@type": "Place",
                "name": "",
        };
        let namePlace = lang ==='en'?'NamePlace':'NamaTempat';
        jQuery('#formevent2').empty();
        jQuery('#formevent2').append(
            "                <input type=\"text\" name=\"\" class=\"form-control mb-7 nameEvent\" placeholder=\""+namePlace+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\">"
        );
        let row = parseInt(jQuery('#json-format').val().split('\n').length);
        jQuery('#json-format').attr('rows',row);
        sticky.update();
        // console.log("INDEX :",index)

    } else if (jQuery(this).val() == 'mixed') {
        main.mainEntity[index].eventAttendanceMode = jQuery(this).val();
        main.mainEntity[index].location ={
                "@type": "Place",
                "name": "",
                "address": {
                        "@type": "PostalAddress",
                        "streetAddress": "",
                        "addressLocality": "",
                        "postalCode": "",
                        "addressCountry": ""
                    }
        };
        main.mainEntity[index].performer ={
                "@type": "Person",
                "name": ""
    };
        let nameEvent = lang ==='en'?'NameEvent':'NamaEvent';
        let streetAddress = lang ==='en'?'StreetAddress':'AlamatJalan';
        let addressLocality = lang==='en'?'AddressLocality':'AlamatLokal';
        let postalCode = lang==='en'?'PostalCode':'KodePos';
        let addressCountry = lang==='en'?'addressCountry':'AlamatKota';
        let namePerformer = lang==='en'?'NamePerformer':'NamaPerformer';
        jQuery('#formevent2').empty();
        jQuery('#formevent2').append(
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 nameEvent\" placeholder=\""+nameEvent+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 streetAddress\" placeholder=\""+streetAddress+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-5 addressLocality\" placeholder=\""+addressLocality+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n" +
            "                <input type=\"text\" name=\"\" class=\"form-control mb-7 postalCode\" placeholder=\""+postalCode+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> \n"+
            "                <input type=\"text\" name=\"\" class=\"form-control mb-7 addressCountry\" placeholder=\""+addressCountry+" :\" value=\"\" data-id=\""+(main.mainEntity.length-1)+"\"> "
        );
    }
    print();
});

jQuery(document).on('keyup', '.nameEvent', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].location.name = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.streetAddress', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].location.address.streetAddress = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.addressLocality', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].location.address.addressLocality = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.postalCode', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].location.address.postalCode = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.addressCountry', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].location.address.addressCountry = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.performer', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log('index:' + index);
    main.mainEntity[index].performer ={
        "@type": "",
        "name": ""
    }
    main.mainEntity[index].performer['@type'] = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.namePerformer', function () {
    let index = parseInt(jQuery(this).data('id'));
    main.mainEntity[index].performer.name = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.currency', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log("INDEX : ", index)
    main.mainEntity[index].offers.priceCurrency = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.nameOffer', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log("INDEX : ", index)
    main.mainEntity[index].offers.name = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.price', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log("INDEX : ", index)
    main.mainEntity[index].offers.price = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.validFrom', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log("INDEX : ", index)
    main.mainEntity[index].offers.validFrom = jQuery(this).val();
    print();
});

jQuery(document).on('keyup', '.url', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log("INDEX : ", index)
    main.mainEntity[index].offers.url = jQuery(this).val();
    print();
});

jQuery(document).on('change', '.availability', function () {
    let index = parseInt(jQuery(this).data('id'));
    // console.log("INDEX : ", index)
    main.mainEntity[index].offers.availability = jQuery(this).val();
    print();
});




jQuery(document).on('click', '.delete', function () {
    let index = parseInt(jQuery(this).data('id'));
    if (index!==0){
        main.mainEntity.splice(index, 1);
        print();
        for (let i = index + 1; i < main.mainEntity.length + 1; i++) {
            jQuery('.nameOffer[data-id=' + (i - 1) + ']').val(jQuery('.nameOffer[data-id=' + (i) + ']').val())
            jQuery('.price[data-id=' + (i - 1) + ']').val(jQuery('.price[data-id=' + (i) + ']').val())
            jQuery('.validFrom[data-id=' + (i - 1) + ']').val(jQuery('.validFrom[data-id=' + (i) + ']').val())
            jQuery('.url[data-id=' + (i - 1) + ']').val(jQuery('.url[data-id=' + (i) + ']').val())
            jQuery('.availability[data-id=' + (i - 1) + ']').val(jQuery('.availability[data-id=' + (i) + ']').val())

        }
        jQuery('label[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.nameOffer[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.price[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.validFrom[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.url[data-id=' + main.mainEntity.length + ']').remove();
        jQuery('.availability[data-id=' + main.mainEntity.length + ']').remove();


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
