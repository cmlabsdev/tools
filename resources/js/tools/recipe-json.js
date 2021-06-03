var imageUrlCounter = 0;
var ingredientsCounter = -1;
var stepCounter = -1;
var reviewCounter = 0;

const recipeSchema = class {
    constructor() {
        this.name = '';
        this.image = [""];
        this.description = '';
        this.keywords = '';
        this.author = {
            "@type": "Person",
            "name": ""
        };
        this.datePublished = '';
        this.prepTime = '';
        this.cookTime = '';
        this.totalTime = '';
        this.recipeCategory = undefined;
        this.recipeCuisine = undefined;
        this.recipeYield = undefined;
        this.nutrition = {
            "@type": "NutritionInformation",
            "calories": ""
        }
        this.recipeIngredient = undefined;
        this.recipeInstructions = [];
        this.aggregateRating = undefined;
        this.review = [];
        this.video = undefined;
        this.tempnameVideo = "";
        this.tempdescVideo = "";
        this.tempthumbVideo = [""];
        this.tempuploadDate = "";
        this.tempcontentVideo = "";
        this.tempembedurl = "";
        this.tempaggRate = "";
        this.tempnumOfRate = "";
        this.temphighestval = "";
        this.templowestval = "";
        this.tempPrepTime = 0;
        this.tempCookTime = 0;
        this.tempReviewName = [];
        this.tempReviewBody = [];
        this.tempreviewRatingValue = [];
    }

    resetrender() {
        imageUrlCounter = 0;
        ingredientsCounter = -1;
        stepCounter = -1;
        reviewCounter = -1;
        this.name = '';
        this.image = [""];
        this.description = '';
        this.keywords = '';
        this.author = {
            "@type": "Person",
            "name": ""
        };
        this.datePublished = '';
        this.prepTime = '';
        this.cookTime = '';
        this.totalTime = '';
        this.recipeCategory = undefined;
        this.recipeCuisine = undefined;
        this.recipeYield = undefined;
        this.nutrition = {
            "@type": "NutritionInformation",
            "calories": ""
        }
        this.recipeIngredient = undefined;
        this.recipeInstructions = [];
        this.aggregateRating = undefined;
        this.review = [];
        this.video = undefined;
        this.tempnameVideo = "";
        this.tempdescVideo = "";
        this.tempthumbVideo = [""];
        this.tempuploadDate = "";
        this.tempcontentVideo = "";
        this.tempembedurl = "";
        this.tempaggRate = "";
        this.tempnumOfRate = "";
        this.temphighestval = "";
        this.templowestval = "";
        this.tempPrepTime = 0;
        this.tempCookTime = 0;
        this.tempReviewName = [];
        this.tempReviewBody = [];
        this.tempreviewRatingValue = [];

        const obj = {
            "@context": "https://schema.org/",
            "@type": "Recipe",
            "name": this.name,
            "image": this.image.length === 1 ? this.image[0] : this.image,
            "description": this.description,
            "keywords": this.keywords,
            "author": this.author,
        }

        obj.name = this.name;
        if (this.image.length > 0) {
            if (this.image.length === 1) {
                obj.image = this.image[0];
            } else {
                obj.image = this.image;
            }
        }
        obj.description = this.description;
        obj.keywords = this.keywords;
        if (this.author.name) obj.author.name = this.author.name;
        if (this.datePublished) obj.datePublished = this.datePublished;
        obj.prepTime = this.prepTime;
        obj.cookTime = this.cookTime;
        obj.totalTime = this.totalTime;
        if (this.recipeCategory) obj.recipeCategory = this.recipeCategory;
        if (this.recipeCuisine) obj.recipeCuisine = this.recipeCuisine;
        if (this.recipeYield) obj.recipeYield = this.recipeYield;
        obj.nutrition = this.nutrition;
        if (this.nutrition.servingSize) obj.nutrition.servingSize = this.nutrition.servingSize;
        obj.nutrition.calories = this.nutrition.calories;
        if (this.nutrition.fatContent) obj.nutrition.fatContent = this.nutrition.fatContent;
        if (this.recipeIngredient) {
            if (this.recipeIngredient.length > 0) {
                if (this.recipeIngredient.length === 1) {
                    obj.recipeIngredient = this.recipeIngredient[0];
                } else {
                    obj.recipeIngredient = this.recipeIngredient;
                }
            }
        }
        if (this.recipeInstructions) {
            if (this.recipeInstructions.length > 0) {
                if (this.recipeInstructions.length === 1) {
                    obj.recipeInstructions = this.recipeInstructions[0];
                } else {
                    obj.recipeInstructions = this.recipeInstructions;
                }
            }
        }
        if (this.recipeInstructions) {
            if (this.recipeInstructions.length > 0) {
                if (this.recipeInstructions.length === 1) {
                    obj.recipeInstructions = this.recipeInstructions[0];
                } else {
                    obj.recipeInstructions = this.recipeInstructions;
                }
            }
        }
        if (this.aggregateRating) obj.aggregateRating = this.aggregateRating;
        if (this.review) {
            if (this.review.length > 0) {
                if (this.review.length === 1) {
                    obj.review = this.review[0];
                } else {
                    obj.review = this.review;
                }
            }
        }
        if (this.video) obj.video = this.video;
        print(obj);
        return obj;
    }

    temp() {
        const tempObj = {};

        tempObj.tempnameVideo = this.tempnameVideo;
        tempObj.tempdescVideo = this.tempdescVideo;
        if (this.tempthumbVideo.length > 0) {
            if (this.tempthumbVideo.length === 1) {
                tempObj.tempthumbVideo = this.tempthumbVideo[0];
            } else {
                tempObj.tempthumbVideo = this.tempthumbVideo;
            }
        }
        tempObj.tempuploadDate = this.tempuploadDate;
        tempObj.tempcontentVideo = this.tempcontentVideo;
        tempObj.tempembedurl = this.tempembedurl;
        tempObj.tempPrepTime = this.tempPrepTime;
        tempObj.tempCookTime = this.tempCookTime;
        tempObj.tempaggRate = this.tempaggRate;
        tempObj.tempnumOfRate = this.tempnumOfRate;
        tempObj.temphighestval = this.temphighestval;
        tempObj.templowestval = this.templowestval;
        if (this.tempReviewName.length > 0) {
            if (this.tempReviewName.length === 1) {
                tempObj.tempReviewName = this.tempReviewName[0];
            } else {
                tempObj.tempReviewName = this.tempReviewName;
            }
        }
        tempObj.tempReviewBody = this.tempReviewBody;
        if (this.tempreviewRatingValue.length > 0) {
            if (this.tempreviewRatingValue.length === 1) {
                tempObj.tempreviewRatingValue = this.tempreviewRatingValue[0];
            } else {
                tempObj.tempreviewRatingValue = this.tempreviewRatingValue;
            }
        }
        return tempObj;
    }

    render() {
        const obj = {
            "@context": "https://schema.org/",
            "@type": "Recipe",
            "name": this.name,
            "image": this.image.length === 1 ? this.image[0] : this.image,
            "description": this.description,
            "keywords": this.keywords,
            "author": this.author,
        }

        obj.name = this.name;
        if (this.image.length > 0) {
            if (this.image.length === 1) {
                obj.image = this.image[0];
            } else {
                obj.image = this.image;
            }
        }
        obj.description = this.description;
        obj.keywords = this.keywords;
        if (this.author.name) obj.author.name = this.author.name;
        if (this.datePublished) obj.datePublished = this.datePublished;
        obj.prepTime = this.prepTime;
        obj.cookTime = this.cookTime;
        obj.totalTime = this.totalTime;
        if (this.recipeCategory) obj.recipeCategory = this.recipeCategory;
        if (this.recipeCuisine) obj.recipeCuisine = this.recipeCuisine;
        if (this.recipeYield) obj.recipeYield = this.recipeYield;
        obj.nutrition = this.nutrition;
        if (this.nutrition.servingSize) obj.nutrition.servingSize = this.nutrition.servingSize;
        obj.nutrition.calories = this.nutrition.calories;
        if (this.nutrition.fatContent) obj.nutrition.fatContent = this.nutrition.fatContent;
        if (this.recipeIngredient) {
            if (this.recipeIngredient.length > 0) {
                if (this.recipeIngredient.length === 1) {
                    obj.recipeIngredient = this.recipeIngredient[0];
                } else {
                    obj.recipeIngredient = this.recipeIngredient;
                }
            }
        }
        if (this.recipeInstructions) {
            if (this.recipeInstructions.length > 0) {
                if (this.recipeInstructions.length === 1) {
                    obj.recipeInstructions = this.recipeInstructions[0];
                } else {
                    obj.recipeInstructions = this.recipeInstructions;
                }
            }
        }
        if (this.recipeInstructions) {
            if (this.recipeInstructions.length > 0) {
                if (this.recipeInstructions.length === 1) {
                    obj.recipeInstructions = this.recipeInstructions[0];
                } else {
                    obj.recipeInstructions = this.recipeInstructions;
                }
            }
        }
        if (this.aggregateRating) obj.aggregateRating = this.aggregateRating;
        if (this.review) {
            if (this.review.length > 0) {
                if (this.review.length === 1) {
                    obj.review = this.review[0];
                } else {
                    obj.review = this.review;
                }
            }
        }
        if (this.video) obj.video = this.video;
        print(obj);
        return obj;
    }
}

let recipeFormat = new recipeSchema();
recipeFormat.render();

$('.name').keyup(function (e) {
    recipeFormat.tempnameVideo = $(this).val();
    recipeFormat.name = $(this).val();
    recipeFormat.temp();
    recipeFormat.render();
});

$('.description').keyup(function (e) {
    recipeFormat.tempdescVideo = $(this).val();
    recipeFormat.description = $(this).val();
    recipeFormat.temp();
    recipeFormat.render();
});

$('.keywords').keyup(function (e) {
    recipeFormat.keywords = $(this).val();
    recipeFormat.render();
});

$('.authorName').keyup(function (e) {
    recipeFormat.author.name = $(this).val();
    recipeFormat.render();
});

$(document).on('keyup', '.image', function () {
    let index = parseInt($(this).data('id'));
    if (recipeFormat.image === 1) {
        recipeFormat.image[0] = $(this).val();
        recipeFormat.tempthumbVideo[0] = $(this).val();
    } else {
        recipeFormat.image[index] = $(this).val();
        recipeFormat.tempthumbVideo[index] = $(this).val();
    }
    recipeFormat.render();
});

$('#add-imageUrl').click(function () {
    imageUrlCounter++;
    recipeFormat.image.push("")
    recipeFormat.tempthumbVideo.push("")
    $('.imageurlList').append(`<div class="col-10 col-sm-11 image-url-data mb-5" data-id="${imageUrlCounter}"> <label class="text-black font-weight-bold" for="image">` + label_image + ` #${imageUrlCounter + 1}</label> <input type="text" name="" class="form-control image" placeholder="` + placeholder_image + `" value="" data-id="${imageUrlCounter}"><div class="invalid-feedback" data-id="${imageUrlCounter}">` + invalid_url + `</div></div><div class="col-2 col-sm-1 deleteImageButton" data-id="${imageUrlCounter}"><div class="d-flex justify-content-center mt-9"> <i class='bx bxs-x-circle bx-md delete deleteImage' data-id="${imageUrlCounter}"></i></div></div></div>`);
    recipeFormat.temp();
    recipeFormat.render();
});

$(document).on('click', '.deleteImage', function () {
    let index = parseInt($(this).data('id'));
    recipeFormat.image.splice(index, 1);
    recipeFormat.render();
    for (let i = index + 1; i < recipeFormat.image.length + 1; i++) {
        $('.image[data-id=' + (i - 1) + ']').val($('.image[data-id=' + (i) + ']').val())
        $('.deleteImageButton[data-id=' + (i - 1) + ']').val($('.deleteImageButton[data-id=' + (i) + ']').val())
        $('.image-url-data[data-id=' + (i - 1) + ']').val($('.image-url-data[data-id=' + (i) + ']').val())
    }
    $('.image-url-data[data-id=' + recipeFormat.image.length + ']').remove();
    $('.deleteImageButton[data-id=' + recipeFormat.image.length + ']').remove();
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    imageUrlCounter--;
    // if(jsonFormat.supplyItem.length > 0) _supplyCounter--;
});

$('.publishedDate').change(function (e) {
    recipeFormat.tempuploadDate = $(this).val();
    recipeFormat.datePublished = $(this).val();
    if (recipeFormat.video !== undefined) {
        recipeFormat.video.uploadDate = $(this).val();
    }
    recipeFormat.temp();
    recipeFormat.render();
});

$('.prepTime').keyup(function (e) {
    recipeFormat.prepTime = `PT${$(this).val()}M`;
    recipeFormat.tempPrepTime = $(this).val();
    let cooktime = recipeFormat.tempCookTime == 0 ? 0 : parseInt(recipeFormat.tempCookTime);
    let count = parseInt($(this).val()) + cooktime;
    recipeFormat.totalTime = `PT${count}M`;
    recipeFormat.render();
});

$('.cookTime').keyup(function (e) {
    recipeFormat.cookTime = `PT${$(this).val()}M`;
    recipeFormat.tempCookTime = $(this).val();
    let preptime = recipeFormat.tempPrepTime == 0 ? 0 : parseInt(recipeFormat.tempPrepTime);
    let count = ($(this).val().length == 0 ? 0 : parseInt($(this).val())) + preptime;
    recipeFormat.totalTime = `PT${count}M`;
    recipeFormat.render();
});

$('.recipeCategory').change(function (e) {
    recipeFormat.recipeCategory = $(this).val();
    recipeFormat.render();
});

$(document).on('keyup', '.ingredients', function () {
    let index = parseInt($(this).data('id'));
    recipeFormat.recipeIngredient[index] = $(this).val();
    recipeFormat.render();
});

$('#add-ingredients').click(function () {
    ingredientsCounter++;
    if (recipeFormat.recipeIngredient === undefined) {
        recipeFormat.recipeIngredient = [""];
    } else {
        recipeFormat.recipeIngredient.push("")
    }
    $('#ingredients').append("<div class=\"ingredients-col\" data-id=\"" + (ingredientsCounter) + "\"></div><div class=\"row ingredients-col-data\" data-id=\"" + (ingredientsCounter) + "\"><div class=\"col-10 col-sm-11\"><label class=\"text-black font-weight-bold\" for=\"ingredients\" data-id=\"" + (ingredientsCounter) + "\">" + label_ingredients + " #" + (ingredientsCounter + 1) + "</label>\n" +
        "                <input type=\"text\" name=\"\" class=\"form-control ingredients mb-5\" placeholder=\"" + placeholder_ingredients + "\" value=\"\" data-id=\"" + (ingredientsCounter) + "\"></div><div class=\"col-2 col-sm-1 delete-data-ingredients\" data-id=\"" + (ingredientsCounter) + "\"><div class=\"d-flex justify-content-center mt-9\"><i class=\'bx bxs-x-circle bx-md delete deleteIngredients\' data-id=\"" + (ingredientsCounter) + "\"></i></div></div></div></div>\n"
    );
    recipeFormat.render();
});

$(document).on('click', '.deleteIngredients', function () {
    let index = parseInt($(this).data('id'));
    recipeFormat.recipeIngredient.splice(index, 1);
    recipeFormat.render();
    for (let i = index + 1; i < recipeFormat.recipeIngredient.length + 1; i++) {
        $('.ingredients[data-id=' + (i - 1) + ']').val($('.ingredients[data-id=' + (i) + ']').val())
        $('.ingredients-col-data[data-id=' + (i - 1) + ']').val($('.ingredients-col-data[data-id=' + (i) + ']').val())
        $('.delete-data-ingredients[data-id=' + (i - 1) + ']').val($('.delete-data-ingredients[data-id=' + (i) + ']').val())
    }
    $('.ingredients-col-data[data-id=' + recipeFormat.recipeIngredient.length + ']').remove();
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    ingredientsCounter--;
});

$('.recipeCuisine').keyup(function () {
    let index = parseInt($(this).data('id'));
    recipeFormat.recipeCuisine = $(this).val();
    recipeFormat.render();
});

$('.recipeServings').keyup(function () {
    let index = parseInt($(this).data('id'));
    recipeFormat.recipeYield = $(this).val();
    recipeFormat.render();
});

$('.servingSize').keyup(function (e) {
    recipeFormat.nutrition.servingSize = $(this).val();
    recipeFormat.render();
});

$('.calories').keyup(function (e) {
    recipeFormat.nutrition.calories = $(this).val() + " cal";
    recipeFormat.render();
});

$('.fat').keyup(function (e) {
    recipeFormat.nutrition.fatContent = $(this).val() + " g";
    recipeFormat.render();
});

$('#add-recipe-step').click(function () {
    stepCounter++;
    let index = parseInt($(this).data('id'));
    $('#step').append("<div class=\"row step-data\" data-id=\"" + (stepCounter) + "\"><div class=\"col-6 col-md-3\"><label class=\"text-black font-weight-bold\" for=\"step\" data-id=\"" + (stepCounter) + "\">" + label_step + " #" + (stepCounter + 1) + ": " + label_text + "</label><input type=\"text\" name=\"\" class=\"form-control step mb-5\" placeholder=\"" + placeholder_step + "\" value=\"\" data-id=\"" + (stepCounter) + "\"></div>" +
        "                <div class=\"col-6 col-md-2 mb-5\"><label class=\"text-black font-weight-bold\" for=\"nameStep\" data-id=\"" + (stepCounter) + "\">" + label_name + "</label><input type=\"text\" name=\"\" class=\"form-control nameStep\" placeholder=\"" + placeholder_name + "\" value=\"\" data-id=\"" + (stepCounter) + "\"></div>" +
        "                <div class=\"col-6 col-md-3 mb-5\"><label class=\"text-black font-weight-bold\" for=\"url\" data-id=\"" + (stepCounter) + "\">URL</label><input type=\"text\" name=\"\" class=\"form-control url\" placeholder=\"" + placeholder_url_step + "\" value=\"\" data-id=\"" + (stepCounter) + "\"><div class=\"invalid-feedback\">" + invalid_url + "</div></div>" +
        "                <div class=\"col-5 col-md-3 mb-5\"><label class=\"text-black font-weight-bold\" for=\"imageStep\" data-id=\"" + (stepCounter) + "\">" + label_image + "</label><input type=\"text\" name=\"\" class=\"form-control imageStep\" placeholder=\"" + placeholder_url_step + "\" value=\"\" data-id=\"" + (stepCounter) + "\"><div class=\"invalid-feedback\">" + invalid_url + "</div></div>" +
        "                <div class=\"col-1\"><div class=\"d-flex justify-content-center mt-9\"><i class=\'bx bxs-x-circle bx-md delete deleteStep\' data-id=\"" + (stepCounter) + "\"></i></div></div>"

    );
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    recipeFormat.recipeInstructions.push({
        "@type": "HowToStep",
        "text": ""
    });
    recipeFormat.render();
});

$(document).on('click', '.deleteStep', function () {
    let index = parseInt($(this).data('id'));
    recipeFormat.recipeInstructions.splice(index, 1);
    recipeFormat.render();
    for (let i = index + 1; i < recipeFormat.recipeInstructions.length + 1; i++) {
        $('.step-data[data-id=' + (i - 1) + ']').val($('.step-data[data-id=' + (i) + ']').val())
        $('.daleteStep[data-id=' + (i - 1) + ']').val($('.deleteStep[data-id=' + (i) + ']').val())
        $('.step[data-id=' + (i - 1) + ']').val($('.step[data-id=' + (i) + ']').val())
        $('.nameStep[data-id=' + (i - 1) + ']').val($('.nameStep[data-id=' + (i) + ']').val())
        $('.url[data-id=' + (i - 1) + ']').val($('.url[data-id=' + (i) + ']').val())
        $('.imageStep[data-id=' + (i - 1) + ']').val($('.imageStep[data-id=' + (i) + ']').val())
    }
    $('.step-data[data-id=' + recipeFormat.recipeInstructions.length + ']').remove();
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    stepCounter--;
});

$(document).on('keyup', '.step', function () {
    let index = $(this).data('id');
    recipeFormat.recipeInstructions[index].text = $(this).val();
    recipeFormat.render();
});

$(document).on('keyup', '.nameStep', function () {
    let index = $(this).data('id');
    recipeFormat.recipeInstructions[index].name = $(this).val();
    recipeFormat.render();
});

$(document).on('keyup', '.url', function () {
    let index = $(this).data('id');
    recipeFormat.recipeInstructions[index].url = $(this).val();
    recipeFormat.render();
});

$(document).on('keyup', '.imageStep', function () {
    let index = $(this).data('id');
    recipeFormat.recipeInstructions[index].image = $(this).val();
    recipeFormat.render();
});

$('.videoContent').keyup(function (e) {
    if (recipeFormat.tempembedurl.length > 0) {
        recipeFormat.video = {
            "@type": "VideoObject",
            "name": recipeFormat.tempnameVideo,
            "description": recipeFormat.tempdescVideo,
            "thumbnailUrl": recipeFormat.tempthumbVideo.length === 1 ? recipeFormat.tempthumbVideo[0] : recipeFormat.tempthumbVideo,
            "uploadDate": recipeFormat.tempuploadDate,
            "contentUrl": $(this).val(),
            "embedUrl": recipeFormat.tempembedurl
        }
    } else {
        recipeFormat.video = {
            "@type": "VideoObject",
            "name": recipeFormat.tempnameVideo,
            "description": recipeFormat.tempdescVideo,
            "thumbnailUrl": recipeFormat.tempthumbVideo.length === 1 ? recipeFormat.tempthumbVideo[0] : recipeFormat.tempthumbVideo,
            "uploadDate": recipeFormat.tempuploadDate,
            "contentUrl": $(this).val()
        }
    }
    recipeFormat.tempcontentVideo = $(this).val();
    recipeFormat.temp();
    recipeFormat.render();
});

$('.videoEmbed').keyup(function (e) {
    recipeFormat.video = {
        "@type": "VideoObject",
        "name": recipeFormat.tempnameVideo,
        "description": recipeFormat.tempdescVideo,
        "thumbnailUrl": recipeFormat.tempthumbVideo.length === 1 ? recipeFormat.tempthumbVideo[0] : recipeFormat.tempthumbVideo,
        "uploadDate": recipeFormat.tempuploadDate,
        "contentUrl": recipeFormat.tempcontentVideo,
        "embedUrl": $(this).val()
    }
    recipeFormat.tempembedurl = $(this).val();
    recipeFormat.temp();
    recipeFormat.render();
});

$('.keywords').keyup(function () {
    let index = parseInt($(this).data('id'));
    main.keywords = $(this).val();
    print();
});

$('.creator').keyup(function () {
    let index = parseInt($(this).data('id'));
    main.author.name = $(this).val();
    print();
});

$('.servingSize').keyup(function () {
    let index = parseInt($(this).data('id'));
    main.nutrition.servingSize = $(this).val();
    print();
});

$('.calories').change(function () {
    let index = parseInt($(this).data('id'));
    main.nutrition.calories = $(this).val();
    print();
});

$('.fatContent').change(function () {
    let index = parseInt($(this).data('id'));
    main.nutrition.fatContent = $(this).val();
    print();
});

$('.aggregate').keyup(function (e) {
    if ($(this).val().length < 1) {
        $('.ratings').attr('disabled')
        $('.highest').attr('disabled')
        $('.lowest').attr('disabled')
        delete recipeFormat.aggregateRating;
        $('.ratings').val('');
        $('.highest').val('');
        $('.lowest').val('');
    } else {
        $('.ratings').removeAttr('disabled')
        $('.highest').removeAttr('disabled')
        $('.lowest').removeAttr('disabled')
        recipeFormat.aggregateRating = {
            "@type": "AggregateRating",
            "ratingValue": $(this).val(),
            "bestRating": recipeFormat.temphighestval,
            "worstRating": recipeFormat.templowestval,
            "ratingCount": recipeFormat.tempnumOfRate
        }
        recipeFormat.tempaggRate = $(this).val();
    }
    recipeFormat.temp();
    recipeFormat.render();
});

$('.ratings').keyup(function (e) {
    recipeFormat.aggregateRating.ratingCount = $(this).val();
    recipeFormat.tempnumOfRate = $(this).val();
    recipeFormat.temp();
    recipeFormat.render();
});

$('.highest').keyup(function (e) {
    recipeFormat.aggregateRating.bestRating = $(this).val();
    recipeFormat.temphighestval = $(this).val();
    recipeFormat.temp();
    recipeFormat.render();
});

$('.lowest').keyup(function (e) {
    recipeFormat.aggregateRating.worstRating = $(this).val();
    recipeFormat.templowestval = $(this).val();
    recipeFormat.temp();
    recipeFormat.render();
});

$('#add-recipe-review').click(function () {
    let index = parseInt($(this).data('id'));
    $('#addReview').append("<div class=\"row review-data\" data-id=\"" + (reviewCounter) + "\"><div class=\"col-12 col-lg-6\"><label class=\"text-black font-weight-bold\" for=\"review\">#" + (reviewCounter + 1) + " " + label_review_name + "</label><input type=\"text\" name=\"\" class=\"form-control review mb-5\" placeholder=\"" + placeholder_review_name + "\" value=\"\" data-id=\"" + (reviewCounter) + "\">" +
        "                   <div class=\"row\"><div class=\"col-6 col-md-4 mb-5\"><label class=\"text-black font-weight-bold\" for=\"rating\">" + label_review_rating + "</label><input type=\"number\" name=\"\" class=\"form-control rating\" placeholder=\"0\" value=\"\" min=\"0\" data-id=\"" + (reviewCounter) + "\"><div class=\"invalid-feedback\" data-id=" + (reviewCounter) + ">" + invalid_number + "</div></div>" +
        "                   <div class=\"col-6 col-md-8\"><label class=\"text-black font-weight-bold\" for=\"dateReview\">" + label_review_date + "</label><div class=\"input-group date\"><div class=\"input-group-append\"><span class=\"input-group-text\"><i class=\"bx bx-calendar text-darkgrey\"></i></span></div>" +
        "                   <input type=\"text\" id=\"kt_datepicker_2\" name=\"\" class=\"form-control custom-date dateReview\" readonly  placeholder=\"" + placeholder_review_date + "\" value=\"\" data-id=\"" + (reviewCounter) + "\"/></div></div></div></div>" +
        "                   <div class=\"col-12 col-lg-6 mb-8 mb-lg-5\"><label class=\"text-black font-weight-bold\" for=\"reviewBody\">" + label_review_body + "</label><textarea name=\"\" class=\"form-control custom-textarea-82 reviewBody\" placeholder=\"" + placeholder_review_body + "\" data-id=\"" + (reviewCounter) + "\"></textarea></div></div>" +
        "                   <div class=\"row mb-5 author-data\" data-id=\"" + (reviewCounter) + "\"><div class=\"col-5\"><label class=\"text-black font-weight-bold\" for=\"authorReview\">" + label_review_author + "</label><input type=\"text\" name=\"\" class=\"form-control authorReview\" placeholder=\"" + placeholder_review_author + "\" value=\"\" data-id=\"" + (reviewCounter) + "\"></div>" +
        "                   <div class=\"col-6\"><label class=\"text-black font-weight-bold\" for=\"publisher\">" + label_review_publisher + "</label><input type=\"text\" name=\"\" class=\"form-control publisher\" placeholder=\"" + placeholder_review_publisher + "\" value=\"\" data-id=\"" + (reviewCounter) + "\"></div>" +
        "                   <div class=\"col-1\"><div class=\"d-flex justify-content-center mt-9\"><i class=\"bx bxs-x-circle bx-md delete deleteReview\" data-id=\"" + (reviewCounter) + "\"></i></div></div></div>"
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
    $('#json-format').attr('rows', row);

    recipeFormat.review.push({
        "@type": "Review",
        "reviewBody": "",
        "author": { "@type": "Person", "name": "" }
    });
    recipeFormat.render();
    reviewCounter++;
});

$(document).on('click', '.deleteReview', function () {
    let index = parseInt($(this).data('id'));
    let reviewIndex = $(this).index('.deleteReview');
    recipeFormat.review.splice(reviewIndex, 1);
    recipeFormat.render();
    for (let i = index + 1; i < recipeFormat.review.length + 1; i++) {
        $('.review-data[data-id=' + (i - 1) + ']').val($('.review-data[data-id=' + (i) + ']').val())
        $('.author-data[data-id=' + (i - 1) + ']').val($('.author-data[data-id=' + (i) + ']').val())
        $('.daleteReview[data-id=' + (i - 1) + ']').val($('.daleteReview[data-id=' + (i) + ']').val())
        // $('.review[data-id=' + (i - 1) + ']').val($('.review[data-id=' + (i) + ']').val())
        // $('.reviewBody[data-id=' + (i - 1) + ']').val($('.reviewBody[data-id=' + (i) + ']').val())
        // $('.rating[data-id=' + (i - 1) + ']').val($('.rating[data-id=' + (i) + ']').val())
        // $('.dateReview[data-id=' + (i - 1) + ']').val($('.dateReview[data-id=' + (i) + ']').val())
        // $('.authorReview[data-id=' + (i - 1) + ']').val($('.authorReview[data-id=' + (i) + ']').val())
        // $('.publisher[data-id=' + (i - 1) + ']').val($('.publisher[data-id=' + (i) + ']').val())
    }
    $('.review-data[data-id=' + index + ']').remove();
    $('.author-data[data-id=' + index + ']').remove();
    let row = parseInt($('#json-format').val().split('\n').length);
    $('#json-format').attr('rows', row);
    reviewCounter--;
});

$(document).on('keyup', '.review', function () {
    let index = parseInt($(this).data('id'));
    delete recipeFormat.review[index]['@type']
    recipeFormat.review[index] = Object.assign({ "@type": "Review", "name": "" }, recipeFormat.review[index])
    if ($(this).val().length == 0) {
        delete recipeFormat.review[index].name;
    } else {
        recipeFormat.review[index].name = $(this).val();
    }
    recipeFormat.render();
});

$(document).on('keyup', '.reviewBody', function () {
    let index = parseInt($(this).data('id'));
    recipeFormat.review[index].reviewBody = $(this).val();
    recipeFormat.tempReviewBody[index] = $(this).val()
    recipeFormat.temp();
    recipeFormat.render();
});

$(document).on('keyup', '.rating', function () {
    let index = parseInt($(this).data('id'));
    recipeFormat.review[index] = Object.assign(recipeFormat.review[index], { "reviewRating": { "@type": "Rating", "ratingValue": "" } })
    if ($(this).val().length == 0) {
        recipeFormat.review[index].reviewRating;
    } else {
        recipeFormat.review[index].reviewRating.ratingValue = $(this).val();
    }
    // recipeFormat.tempreviewRatingValue[index] =  $(this).val();
    // if($('.review').val().length == 0){
    //     recipeFormat.review[index] = {
    //         "@type": "Review",
    //         "name": recipeFormat.tempReviewName[index],
    //         "reviewBody": recipeFormat.tempReviewBody[index],
    //         "reviewRating" : {
    //             "@type": "Rating",
    //             "ratingValue": $(this).val()
    //         },
    //         "author": {"@type": "Person", "name": ""}
    //     };
    // } else {
    //     recipeFormat.review[index] = {
    //         "@type": "Review",
    //         "reviewBody": recipeFormat.tempReviewBody[index],
    //         "reviewRating" : {
    //             "@type": "Rating",
    //             "ratingValue": $(this).val()
    //         },
    //         "author": {"@type": "Person", "name": ""}
    //     };
    // }
    // recipeFormat.temp();
    recipeFormat.render();
});

$(document).on('change', '.dateReview', function () {
    let index = parseInt($(this).data('id'));
    if ($(this).val().length == 0) {
        delete recipeFormat.review[index].datePublished;
    } else {
        recipeFormat.review[index].datePublished = $(this).val();
    }
    recipeFormat.render();
});

$(document).on('keyup', '.authorReview', function () {
    let index = parseInt($(this).data('id'));
    recipeFormat.review[index].author.name = $(this).val();
    recipeFormat.render();
});

$(document).on('keyup', '.publisher', function () {
    let index = parseInt($(this).data('id'));
    if ($(this).val().length == 0) {
        delete recipeFormat.review[index].publisher;
    } else {
        recipeFormat.review[index].publisher = {
            "@type": "Organization", "name": $(this).val()
        }
    }
    recipeFormat.render();
});

$('.reset').click(function (e) {
    $('.form-recipe').trigger('reset')
    $('.imageurlList').parent().find('.image-url-data').remove();
    $('.imageurlList').parent().find('.deleteImageButton').remove();
    $('.recipeCategory').val(1)
    $('.recipeCategory').change()
    $('#ingredients').html('')
    $('#step').html('')
    $('#addReview').html('')
    recipeFormat.resetrender();
});

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
// });
