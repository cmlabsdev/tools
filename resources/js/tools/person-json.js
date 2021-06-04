var counterSocial = 0;

let facebookVal = "";
let twitterVal = "";
let linkedinVal = "";
let wikipediaVal = "";
let websiteVal = "";
let pinterestVal = "";
let githubVal = "";
let tumblrVal = "";
let soundcloudVal = "";
let instagramVal = "";
let youtubeVal = "";

const labelSocial = `<label class="text-black font-weight-bold" for="sosmedName">Social profile URL</label>`;

let twitter = (id) => `<div class="row mb-5" id="twitter">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-twitter bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="twitter" placeholder="`+ placeholder_sosmedUrl1 + ` twitter ` + placeholder_sosmedUrl2 + `" value="${twitterVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let facebook = (id) => `<div class="row mb-5" id="facebook">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-facebook-square bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="facebook" placeholder="`+ placeholder_sosmedUrl1 + ` facebook ` + placeholder_sosmedUrl2 + `" value="${facebookVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let instagram = (id) => `<div class="row mb-5" id="instagram">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-instagram-alt bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="instagram" placeholder="`+ placeholder_sosmedUrl1 + ` instagram ` + placeholder_sosmedUrl2 + `" value="${instagramVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let youtube = (id) => `<div class="row mb-5" id="youtube">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-youtube bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="youtube" placeholder="`+ placeholder_sosmedUrl1 + ` youtube ` + placeholder_sosmedUrl2 + `" value="${youtubeVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let linkedin = (id) => `<div class="row mb-5" id="linkedin">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-linkedin-square bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="linkedin" placeholder="`+ placeholder_sosmedUrl1 + ` linkedin ` + placeholder_sosmedUrl2 + `" value="${linkedinVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let pinterest = (id) => `<div class="row mb-5" id="pinterest">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-pinterest bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="pinterest" placeholder="`+ placeholder_sosmedUrl1 + ` pinterest ` + placeholder_sosmedUrl2 + `" value="${pinterestVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let soundcloud = (id) => `<div class="row mb-5" id="soundcloud">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-soundcloud bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="soundcloud" placeholder="`+ placeholder_sosmedUrl1 + ` soundcloud ` + placeholder_sosmedUrl2 + `" value="${soundcloudVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let tumblr = (id) => `<div class="row mb-5" id="tumblr">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-tumblr bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="tumblr" placeholder="`+ placeholder_sosmedUrl1 + ` tumblr ` + placeholder_sosmedUrl2 + `" value="${tumblrVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let wikipedia = (id) => `<div class="row mb-5" id="wikipedia">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-wikipedia bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="wikipedia" placeholder="`+ placeholder_sosmedUrl1 + ` wikipedia ` + placeholder_sosmedUrl2 + `" value="${wikipediaVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let github = (id) => `<div class="row mb-5" id="github">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bxl-github bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="github" placeholder="`+ placeholder_sosmedUrl1 + ` github ` + placeholder_sosmedUrl2 + `" value="${githubVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

let website = (id) => `<div class="row mb-5" id="website">
      <div class="col-2 col-sm-1 my-auto">
        <div class="d-flex justify-content-center">
          <i class='bx bx-world bx-md text-black'></i>
        </div>
      </div>
      <div class="col-10 col-sm-11 pl-0">
        <input type="text" name="" class="form-control sosmedName" data-sosmed="wolrd" placeholder="`+ placeholder_sosmedUrl1 + ` website ` + placeholder_sosmedUrl2 + `" value="${websiteVal}" data-id="${id}">
        <div class="invalid-feedback">`+ invalid_url + `</div>
      </div>
    </div>`;

const socialData = {
  facebook: facebook,
  twitter: twitter,
  linkedin: linkedin,
  wikipedia: wikipedia,
  website: website,
  pinterest: pinterest,
  github: github,
  tumblr: tumblr,
  soundcloud: soundcloud,
  instagram: instagram,
  youtube: youtube
}

const personSchema = class {
  constructor() {
    this.name = '';
    this.url = '';
    this.image = '';
    this.sameAs = [];
    this.jobTitle = undefined;
    this.worksFor = {
      "@type": "Organization",
      "name": ""
    }
    this.socialMedia = [];
    this.tempSocial = [];
    this.facebookVal = "";
    this.twitterVal = "";
    this.linkedinVal = "";
    this.wikipediaVal = "";
    this.websiteVal = "";
    this.pinterestVal = "";
    this.githubVal = "";
    this.tumblrVal = "";
    this.soundcloudVal = "";
    this.instagramVal = "";
    this.youtubeVal = "";
  }

  resetrender() {
    counterSocial = 0;

    facebookVal = "";
    twitterVal = "";
    linkedinVal = "";
    wikipediaVal = "";
    websiteVal = "";
    pinterestVal = "";
    githubVal = "";
    tumblrVal = "";
    soundcloudVal = "";
    instagramVal = "";
    youtubeVal = "";

    this.name = '';
    this.url = '';
    this.image = '';
    this.sameAs = [];
    this.jobTitle = undefined;
    this.worksFor = {
      "@type": "Organization",
      "name": ""
    }
    this.socialMedia = [];
    this.tempSocial = [];
    this.facebookVal = "";
    this.twitterVal = "";
    this.linkedinVal = "";
    this.wikipediaVal = "";
    this.websiteVal = "";
    this.pinterestVal = "";
    this.githubVal = "";
    this.tumblrVal = "";
    this.soundcloudVal = "";
    this.instagramVal = "";
    this.youtubeVal = "";

    const obj = {
      "@context": "https://schema.org/",
      "@type": "Person",
      "name": this.name,
      "url": this.url,
      "image": this.image
    }

    obj.name = this.name;
    obj.url = this.url;
    obj.image = this.image;
    if (this.sameAs.length > 0) obj.sameAs = this.sameAs;
    if (this.jobTitle) obj.jobTitle = this.jobTitle;
    if (this.worksFor.name) obj.worksFor = this.worksFor;

    print(obj);
    return obj;
  }

  temp() {
    const tempObj = {};

    tempObj.facebookVal = this.facebookVal;
    facebookVal = this.facebookVal;
    tempObj.twitterVal = this.twitterVal;
    twitterVal = this.twitterVal;
    tempObj.linkedinVal = this.linkedinVal;
    linkedinVal = this.linkedinVal;
    tempObj.wikipediaVal = this.wikipediaVal;
    wikipediaVal = this.wikipediaVal;
    tempObj.websiteVal = this.websiteVal;
    websiteVal = this.websiteVal;
    tempObj.pinterestVal = this.pinterestVal;
    pinterestVal = this.pinterestVal;
    tempObj.githubVal = this.githubVal;
    githubVal = this.githubVal;
    tempObj.tumblrVal = this.tumblrVal;
    tumblrVal = this.tumblrVal;
    tempObj.soundcloudVal = this.soundcloudVal;
    soundcloudVal = this.soundcloudVal;
    tempObj.instagramVal = this.instagramVal;
    instagramVal = this.instagramVal;
    tempObj.youtubeVal = this.youtubeVal;
    youtubeVal = this.youtubeVal;

    return tempObj;
  }

  render() {
    const obj = {
      "@context": "https://schema.org/",
      "@type": "Person",
      "name": this.name,
      "url": this.url,
      "image": this.image
    }

    obj.name = this.name;
    obj.url = this.url;
    obj.image = this.image;

    if (this.sameAs.length > 0) obj.sameAs = this.sameAs;
    if (this.jobTitle) obj.jobTitle = this.jobTitle;
    if (this.worksFor.name) obj.worksFor = this.worksFor;

    print(obj);
    return obj;
  }
}

let personFormat = new personSchema();
personFormat.render();

$('.name').keyup(function (e) {
  personFormat.name = $(this).val();
  personFormat.render();
});

$('.url').keyup(function (e) {
  personFormat.url = $(this).val();
  personFormat.render();
});

$('.pictureUrl').keyup(function (e) {
  personFormat.image = $(this).val();
  personFormat.render();
});

$('.jobTitle').keyup(function (e) {
  personFormat.jobTitle = $(this).val();
  personFormat.render();
});

$('.company').keyup(function (e) {
  personFormat.worksFor.name = $(this).val();
  personFormat.render();
});

$('.social-profiles').change(function (e) {
  if (personFormat.tempSocial.length > $(this).val().length) {
    for (let i = 0; i < personFormat.tempSocial.length; i++) {
      if ($.inArray(personFormat.tempSocial[i], $(this).val()) == -1) {
        $('#' + personFormat.tempSocial[i] + '').remove();
        personFormat.tempSocial.splice(i, 1);
        personFormat.sameAs.splice(i, 1);
        // counterSocial--;
      }
    }
  }
  for (let i = 0; i < $(this).val().length; i++) {
    if ($.inArray($(this).val()[i], personFormat.tempSocial) == -1) {
      // counterSocial++;
      $('.social-profile-url').append(eval('socialData.' + $(this).val()[i] + '(' + i + ')'));
      personFormat.tempSocial.push($(this).val()[i])
      if (eval('personFormat.' + $(this).val()[i] + 'Val' + '') != "") {
        personFormat.sameAs.push(eval('personFormat.' + $(this).val()[i] + 'Val'));
      } else {
        personFormat.sameAs.push("");
      }
    }
  }
  personFormat.render();
});

$(document).on('keyup', '.sosmedName', function () {
  let index = parseInt($(this).data('id'));
  let sosmedData = $(this).attr('data-sosmed');

  if (sosmedData == 'facebook') {
    personFormat.facebookVal = $(this).val();
  } else if (sosmedData == 'twitter') {
    personFormat.twitterVal = $(this).val();
  } else if (sosmedData == 'linkedin') {
    personFormat.linkedinVal = $(this).val();
  } else if (sosmedData == 'wikipedia') {
    personFormat.wikipediaVal = $(this).val();
  } else if (sosmedData == 'website') {
    personFormat.websiteVal = $(this).val();
  } else if (sosmedData == 'pinterest') {
    personFormat.pinterestVal = $(this).val();
  } else if (sosmedData == 'github') {
    personFormat.githubVal = $(this).val();
  } else if (sosmedData == 'tumblr') {
    personFormat.tumblrVal = $(this).val();
  } else if (sosmedData == 'soundcloud') {
    personFormat.soundcloudVal = $(this).val();
  } else if (sosmedData == 'instagram') {
    personFormat.instagramVal = $(this).val();
  } else if (sosmedData == 'youtube') {
    personFormat.youtubeVal = $(this).val();
  }

  personFormat.sameAs[index] = $(this).val();
  personFormat.temp();
  personFormat.render();
});

$('.reset').click(function (e) {
  $('#form-person').trigger("reset");
  $('.social-profiles').val(1)
  $('.social-profiles').change()
  $('.social-profile-url').html('')
  personFormat.resetrender()
});

// let deletes = lang === 'en' ? 'Delete' : 'Hapus';
// let name = lang === 'en' ? 'Name' : 'Nama';
// let url = lang === 'en' ? 'Url' : 'Url';
// let pictureUrl = lang === 'en' ? 'PictureUrl' : 'UrlGambar';
// let jobTitle = lang === 'en' ? 'JobTitle' : 'Jabatan';
// let sosmed = lang === 'en' ? 'Sosmed' : 'Medsos';
// let sosmedName = lang === 'en' ? 'Name' : 'Nama';
// let invalid_url = lang === 'en' ? 'Invalid URL' : 'URL Tidak Valid';
// let placeholder_type = lang === 'en' ? 'Type your' : 'Ketik URL';
// let placeholder_url = lang === 'en' ? 'URL here..' : 'Anda di sini..';

// $('#schema-json-ld').change(function () {
//   if ($(this).val() !== 'home') {
//     window.location = 'json-ld-' + $(this).val() + '-schema-generator'
//   } else {
//     window.location = 'json-ld-schema-generator'
//   }
// });

// $('#copy').click(function () {
//   const copyText = $('#json-format');
//   copyText.select();
//   document.execCommand("copy");
//   toastr.success('Copied to Clipboard', 'Information');
// });
