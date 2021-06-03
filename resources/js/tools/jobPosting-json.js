var checkBox = 0;

const jobSchema = class {
    constructor() {
        this.country = '';
        this.streetAddress = '';
        this.addressLocality = '';
        this.postalCode = '';
        this.title = '';
        this.description = '';
        this.salaryValue = '';
        this.identify = {
            "@type": "PropertyValue",
            "name": "",
            "value": ""
        };
        this.hiring = {
            "@type": "Organization",
            "name": ""
        };
        this.industry = undefined;
        this.employmentType = undefined;
        this.workHours = undefined;
        this.datePosted = '';
        this.validThrough = '';
        this.jobLocation = {};
        this.applicantLocationRequirements = undefined;
        this.baseSalary = {};
        this.tempStreetAdd = "";
        this.tempaddressLocality = "";
        this.tempPostalCode = "";
        this.tempAddressCountry = "";
        this.tempAddressRegion = "";
        this.unitTextCur = "";
        this.tempcurrency = "";
        this.responsibilities = undefined;
        this.skills = undefined;
        this.qualifications = undefined;
        this.educationRequirements = undefined;
        this.experienceRequirements = undefined;
        this.tempCompanyName = "";
    }

    resetrender() {
        this.country = '';
        this.streetAddress = '';
        this.addressLocality = '';
        this.postalCode = '';
        this.title = '';
        this.description = '';
        this.salaryValue = '';
        this.identify = {
            "@type": "PropertyValue",
            "name": "",
            "value": ""
        };
        this.hiring = {
            "@type": "Organization",
            "name": ""
        };
        this.industry = undefined;
        this.employmentType = undefined;
        this.workHours = undefined;
        this.datePosted = '';
        this.validThrough = '';
        this.jobLocation = {
            "@type": "Place",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "",
                "addressLocality": "",
                "postalCode": "",
                "addressCountry": ""
            }
        };
        this.applicantLocationRequirements = undefined;
        this.baseSalary = {
            "@type": "MonetaryAmount",
            "currency": "",
            "value": {
                "@type": "QuantitativeValue",
                "value": "",
                "unitText": ""
            }
        };
        this.tempStreetAdd = "";
        this.tempaddressLocality = "";
        this.tempPostalCode = "";
        this.tempAddressCountry = "";
        this.tempAddressRegion = "";
        this.unitTextCur = "";
        this.tempcurrency = "";
        this.responsibilities = undefined;
        this.skills = undefined;
        this.qualifications = undefined;
        this.educationRequirements = undefined;
        this.experienceRequirements = undefined;
        this.tempCompanyName = "";

        const resetObj = {
            "@context": "https://schema.org/",
            "@type": "JobPosting",
            title: this.title,
            description: this.description,
        }

        resetObj.title = this.title;
        resetObj.description = this.description;
        if (this.identify.name || this.identify.value) resetObj.identifier = this.identify;
        resetObj.hiringOrganization = this.hiring;
        if (this.industry) resetObj.industry = this.industry;
        if (this.employmentType) resetObj.employmentType = this.employmentType;
        if (this.workHours) resetObj.workHours = this.workHours;
        resetObj.datePosted = this.datePosted;
        resetObj.validThrough = this.validThrough;
        if (this.hiring.length > 0) {
            if (this.hiring.length === 1) {
                resetObj.hiringOrganization = this.hiring[0];
            } else {
                resetObj.hiringOrganization = this.hiring;
            }
        }
        resetObj.jobLocation = this.jobLocation;
        // if(this.jobLocationReg) obj.jobLocation = this.jobLocationReg;
        if (this.applicantLocationRequirements) resetObj.applicantLocationRequirements = this.applicantLocationRequirements;
        resetObj.baseSalary = this.baseSalary;
        if (this.responsibilities) resetObj.responsibilities = this.responsibilities;
        if (this.skills) resetObj.skills = this.skills;
        if (this.qualifications) resetObj.qualifications = this.qualifications;
        if (this.educationRequirements) resetObj.educationRequirements = this.educationRequirements;
        if (this.experienceRequirements) resetObj.experienceRequirements = this.experienceRequirements;
        print(resetObj);
        return resetObj;
    }

    temp() {
        const tempObj = {};

        if (this.streetAddress) {
            tempObj.streetAddress = this.streetAddress;
        }
        if (this.addressLocality) {
            tempObj.addressLocality = this.addressLocality;
        }
        if (this.postalCode) {
            tempObj.postalCode = this.postalCode;
        }
        tempObj.tempStreetAdd = this.tempStreetAdd;
        tempObj.tempaddressLocality = this.tempaddressLocality;
        tempObj.tempPostalCode = this.tempPostalCode;
        tempObj.tempAddressRegion = this.tempAddressRegion;
        tempObj.tempAddressCountry = this.tempAddressCountry;
        tempObj.unitTextCur = this.unitTextCur;
        tempObj.tempcurrency = this.tempcurrency;
        tempObj.tempCompanyName = this.tempCompanyName;
        if (this.salaryValue) tempObj.salaryValue = this.salaryValue;
        tempObj.country = this.country;
        return tempObj;
    }

    render() {
        const obj = {
            "@context": "https://schema.org/",
            "@type": "JobPosting",
            title: this.title,
            description: this.description,
        }

        obj.title = this.title;
        obj.description = this.description;
        if (this.identify.name || this.identify.value) obj.identifier = this.identify;
        obj.hiringOrganization = this.hiring;
        if (this.industry) obj.industry = this.industry;
        if (this.employmentType) obj.employmentType = this.employmentType;
        if (this.workHours) obj.workHours = this.workHours;
        obj.datePosted = this.datePosted;
        obj.validThrough = this.validThrough;
        if (this.hiring.length > 0) {
            if (this.hiring.length === 1) {
                obj.hiringOrganization = this.hiring[0];
            } else {
                obj.hiringOrganization = this.hiring;
            }
        }
        obj.jobLocation = this.jobLocation;
        // if(this.jobLocationReg) obj.jobLocation = this.jobLocationReg;
        if (this.applicantLocationRequirements) obj.applicantLocationRequirements = this.applicantLocationRequirements;
        if (this.baseSalary) obj.baseSalary = this.baseSalary;
        if (this.responsibilities) obj.responsibilities = this.responsibilities;
        if (this.skills) obj.skills = this.skills;
        if (this.qualifications) obj.qualifications = this.qualifications;
        if (this.educationRequirements) obj.educationRequirements = this.educationRequirements;
        if (this.experienceRequirements) obj.experienceRequirements = this.experienceRequirements;
        print(obj);
        return obj;
    }
}

let jobFormat = new jobSchema();

jobFormat.baseSalary = {
    "@type": "MonetaryAmount",
    "currency": "",
    "value": {
        "@type": "QuantitativeValue",
        "value": "",
        "unitText": jobFormat.unitTextCur
    }
}

if ($('#hide-province').is(":visible")) {
    jobFormat.jobLocation = {
        "@type": "Place",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": jobFormat.tempStreetAdd,
            "addressLocality": jobFormat.tempaddressLocality,
            "postalCode": jobFormat.tempPostalCode,
            "addressCountry": jobFormat.tempAddressCountry
        }
    }
} else {
    jobFormat.jobLocation = {
        "@type": "Place",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": jobFormat.tempStreetAdd,
            "addressLocality": jobFormat.tempaddressLocality,
            "addressRegion": jobFormat.tempAddressRegion,
            "postalCode": jobFormat.tempPostalCode,
            "addressCountry": jobFormat.tempAddressCountry
        }
    }
}
jobFormat.temp();
jobFormat.render();

$("#province-show").hide();

$('.name').keyup(function (e) {
    let index = parseInt($(this).data('id'));
    jobFormat.hiring.name = $(this).val();
    jobFormat.identify.name = $(this).val();
    jobFormat.render();
});

$('.jobTitle').keyup(function (event) {
    jobFormat.title = $(this).val();
    jobFormat.render();
});

$('.description').keyup(function (event) {
    jobFormat.description = $(this).val();
    jobFormat.render();
});

$('.identifier').keyup(function () {
    jobFormat.identify.value = $(this).val();
    jobFormat.render();
});

$('.company-name').keyup(function (e) {
    jobFormat.identify.name = $(this).val();
    jobFormat.hiring.name = $(this).val();
    jobFormat.render();
});

$('.companyUrl').keyup(function (e) {
    jobFormat.hiring.sameAs = $(this).val();
    jobFormat.render();
});

$('.industry').keyup(function (e) {
    jobFormat.industry = $(this).val();
    jobFormat.render();
});

$('.employment-type').change(function (e) {
    if ($(this).val() == "none") {
        delete jobFormat.employmentType;
    } else {
        jobFormat.employmentType = $(this).val();
    }
    jobFormat.render();
});

$('.workHours').keyup(function (e) {
    jobFormat.workHours = $(this).val();
    jobFormat.render();
});

$('.datePosted').change(function (e) {
    jobFormat.datePosted = $(this).val();
    jobFormat.render();
});

$('.expiredDate').change(function (e) {
    jobFormat.validThrough = $(this).val();
    jobFormat.render();
});

$('.street').keyup(function (e) {
    jobFormat.jobLocation.address.streetAddress = $(this).val();
    jobFormat.tempStreetAdd = $(this).val();
    jobFormat.temp();
    jobFormat.render();
});

$('.city').keyup(function (e) {
    jobFormat.jobLocation.address.addressLocality = $(this).val();
    jobFormat.tempaddressLocality = $(this).val();
    jobFormat.temp();
    jobFormat.render();
});

$('.zipCode').keyup(function (e) {
    jobFormat.jobLocation.address.postalCode = $(this).val();
    jobFormat.tempPostalCode = $(this).val();
    jobFormat.temp();
    jobFormat.render();
});

$('.country').change(function (e) {
    if ($(this).val() == "ID") {

    } else {
        if ($(this).val() == "none") {
            delete jobFormat.jobLocation.address.addressCountry;
            jobFormat.tempAddressCountry = "";
        }
        jobFormat.tempAddressRegion = "";
        jobFormat.jobLocation.address.addressRegion = "";
        jobFormat.temp();
        jobFormat.render();
    }

    jobFormat.country = $(this).val();
    if ($(this).val() == "none") {
        if (checkBox == 1) {
            jobFormat.applicantLocationRequirements.name = "";
        } else {
            if ($(this).val() == 'ID') {
                $("#province").hide();
                $("#province-show").show();
            } else {
                $("#province").show();
                $("#province-show").hide();
            }
            jobFormat.jobLocation.address.addressCountry = "";
        }
        jobFormat.tempAddressCountry = "";
        $("#hide-province").show();
    } else {
        if (checkBox == 1) {
            jobFormat.applicantLocationRequirements.name = $(this).val();
            $("#hide-province").show();
        } else {
            if ($(this).val() == 'ID') {
                $("#hide-province").hide();
                $("#province-show").show();
            } else {
                $("#hide-province").show();
                $("#province-show").hide();
            }
            jobFormat.jobLocation.address.addressCountry = $(this).val();
        }
        jobFormat.tempAddressCountry = $(this).val();
    }
    jobFormat.temp();
    jobFormat.render();

    if ($('#hide-province').is(":visible")) {
        jobFormat.jobLocation = {
            "@type": "Place",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": jobFormat.tempStreetAdd,
                "addressLocality": jobFormat.tempaddressLocality,
                "postalCode": jobFormat.tempPostalCode,
                "addressCountry": jobFormat.tempAddressCountry
            }
        }
    } else {
        jobFormat.jobLocation = {
            "@type": "Place",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": jobFormat.tempStreetAdd,
                "addressLocality": jobFormat.tempaddressLocality,
                "addressRegion": jobFormat.tempAddressRegion,
                "postalCode": jobFormat.tempPostalCode,
                "addressCountry": jobFormat.tempAddressCountry
            }
        }
    }
});

$("#remoteJob").change(function () {
    if (this.checked) {
        $(".street, .city, div.province > button, .zipCode").attr("disabled", true);
        checkBox = 1;
        delete jobFormat.jobLocation;
        jobFormat.applicantLocationRequirements = {
            "@type": "Country",
            "name": jobFormat.country
        };
    } else {
        checkBox = 0;
        delete jobFormat.applicantLocationRequirements;

        if ($('.country').find(":selected").text() == 'Indonesia') {
            jobFormat.jobLocation = {
                "@type": "Place",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": jobFormat.tempStreetAdd,
                    "addressLocality": jobFormat.tempaddressLocality,
                    "addressRegion": jobFormat.tempAddressRegion,
                    "postalCode": jobFormat.tempPostalCode,
                    "addressCountry": jobFormat.tempAddressCountry
                }
            }
        } else {
            jobFormat.jobLocation = {
                "@type": "Place",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": jobFormat.tempStreetAdd,
                    "addressLocality": jobFormat.tempaddressLocality,
                    "postalCode": jobFormat.tempPostalCode,
                    "addressCountry": jobFormat.tempAddressCountry
                }
            }
        }
        $(".street, .city, div.province > button, .zipCode").removeAttr("disabled");
    }
    jobFormat.render();
});

$(".salary").keyup(function () {
    if (this.value.length > 0) {
        $(".maxSalary, .currency, .unitText").removeAttr("disabled");
        $(".currency, .unitText").selectpicker("refresh");
        if ($('.maxSalary').val().length > 0) {
            jobFormat.baseSalary.value.minValue = $(this).val();
            jobFormat.salaryValue = $(this).val();
        } else {
            jobFormat.baseSalary.value.value = $(this).val();
            jobFormat.salaryValue = $(this).val();
        }
    } else {
        $(".maxSalary, .currency, .unitText").attr("disabled", true);
        $(".currency, .unitText").selectpicker("refresh");
    }
    jobFormat.render();
});

$('.province').change(function () {
    jobFormat.jobLocation.address.addressRegion = $(this).val();
    jobFormat.tempAddressRegion = $(this).val();
    jobFormat.temp();
    jobFormat.render();
});

$('.maxSalary').keyup(function () {
    if (this.value.length > 0) {
        jobFormat.baseSalary = {
            "@type": "MonetaryAmount",
            "currency": jobFormat.tempcurrency,
            "value": {
                "@type": "QuantitativeValue",
                "minValue": jobFormat.salaryValue,
                "maxValue": $(this).val(),
                "unitText": jobFormat.unitTextCur
            }
        }
    } else {
        jobFormat.baseSalary = {
            "@type": "MonetaryAmount",
            "currency": jobFormat.tempcurrency,
            "value": {
                "@type": "QuantitativeValue",
                "value": jobFormat.salaryValue,
                "unitText": jobFormat.unitTextCur
            }
        }
    }
    jobFormat.render();
});

$('.currency').change(function (e) {
    jobFormat.baseSalary.currency = $(this).val();
    jobFormat.tempcurrency = $(this).val();
    jobFormat.temp();
    jobFormat.render();
});

$('.unitText').change(function (e) {
    jobFormat.baseSalary.value.unitText = $(this).val();
    jobFormat.unitTextCur = $(this).val();
    jobFormat.temp();
    jobFormat.render();
});

$('.responsibilities').keyup(function (e) {
    jobFormat.responsibilities = this.value;
    jobFormat.render();
});

$('.skills').keyup(function (e) {
    jobFormat.skills = this.value;
    jobFormat.render();
});

$('.qualifications').keyup(function (e) {
    jobFormat.qualifications = this.value;
    jobFormat.render();
});

$('.educationRequirements').keyup(function (e) {
    jobFormat.educationRequirements = this.value;
    jobFormat.render();
});

$('.experienceRequirements').keyup(function (e) {
    jobFormat.experienceRequirements = this.value;
    jobFormat.render();
});

$("#remoteJob").change(function () {
    if (this.checked) {
        $(".street, .city, div.province > button, .zipCode").attr("disabled", true);
    } else {
        $(".street, .city, div.province > button, .zipCode").removeAttr("disabled");
    }
});

$(".salary").keyup(function () {
    if (this.value.length > 0) {
        $(".maxSalary, .currency, .unitText").removeAttr("disabled");
        $(".currency, .unitText").selectpicker("refresh");
    } else {
        $(".maxSalary, .currency, .unitText").attr("disabled", true);
        $(".currency, .unitText").selectpicker("refresh");
    }
});

$('.reset').click(function (e) {
    checkBox = 0;
    $(".street, .city, div.province > button, .zipCode").removeAttr("disabled");
    $(".maxSalary, .currency, .unitText").attr("disabled", true);
    $("#hide-province").show();
    $("#province-show").hide();
    $('.province').val(1);
    $('.province').change();
    $(".country").val(1);
    $(".country").change();
    $(".currency").val(1);
    $(".currency").change();
    $(".unitText").val(1);
    $(".unitText").change();
    $('#form').trigger("reset");
    jobFormat.resetrender();
});

// $('#schema-json-ld').change(function () {
//     if ($(this).val() !== 'home') {
//         window.location = 'json-ld-' + $(this).val() + '-schema-generator'
//     } else {
//         window.location = 'json-ld-schema-generator'
//     }
// });

// $('#copy').click(function () {
//     const copyText = jQuery('#json-format');
//     copyText.select();
//     document.execCommand("copy");
//     toastr.success('Copied to Clipboard', 'Information');
// });
