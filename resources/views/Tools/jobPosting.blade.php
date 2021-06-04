@extends('layouts.app')

@section('title', Lang::get('jobPosting.meta-title'))

@section('meta-desc', Lang::get('jobPosting.meta-desc'))

@section('conical','/en/json-ld-jobPosting-schema-generator')

@section('en-link')
en/json-ld-jobPosting-schema-generator
@endsection

@section('id-link')
id/json-ld-jobPosting-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('jobPosting.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('jobPosting.subtitle')</span>
            <div class="card card-custom mb-5 mt-10">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="row mb-8">
                                <div class="col-12">
                                    <label for="schema-json-ld" class="font-weight-bold text-black h6">@lang('layout.which-schema')</label>
                                    <select class="form-control selectpicker custom-select-blue" tabindex="null" id="schema-json-ld">
                                        <option value="home">Home</option>
                                        <option value="breadcrumb">Breadcrumb</option>
                                        <option value="faq">FAQ Page</option>
                                        <option value="how-to">How-to</option>
                                        <option value="job-posting" selected="selected">Job Posting</option>
                                        <option value="person">Person</option>
                                        <option value="product">Product</option>
                                        <option value="recipe">Recipe</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Job Posting</p>
                            <div class="" id="formjobposting">
                                <form action="javascript:void(0)" id="form">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="jobTitle">@lang('jobPosting.label-jobTitle')</label>
                                            <input type="text" name="" class="form-control jobTitle mb-5" placeholder="@lang('jobPosting.placeholder-jobTitle')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="identifier">@lang('jobPosting.label-identifier')</label>
                                            <input type="text" name="" class="form-control identifier mb-5" placeholder="@lang('jobPosting.placeholder-identifier')" value="" data-id="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="text-black font-weight-bold" for="description">@lang('jobPosting.label-description')</label>
                                            <textarea name="" class="form-control custom-textarea-100px description mb-5" placeholder="@lang('jobPosting.placeholder-description')" data-id="0"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-xl-4">
                                            <label class="text-black font-weight-bold" for="name">@lang('jobPosting.label-name')</label>
                                            <input type="text" name="" class="form-control name mb-5" placeholder="@lang('jobPosting.placeholder-name')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4 mb-5">
                                            <label class="text-black font-weight-bold" for="companyUrl">@lang('jobPosting.label-companyUrl')</label>
                                            <input type="text" name="" class="form-control companyUrl" placeholder="@lang('jobPosting.placeholder-companyUrl')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4">
                                            <label class="text-black font-weight-bold" for="industry">@lang('jobPosting.label-industry')</label>
                                            <input type="text" name="" class="form-control industry mb-5" placeholder="@lang('jobPosting.placeholder-industry')" value="" data-id="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <label class="text-black font-weight-bold" for="employmentType">@lang('jobPosting.label-employmentType')</label>
                                            <select class="form-control selectpicker custom-select-blue employment-type mb-5">
                                                <option value="none">@lang('jobPosting.placeholder-employmentType')</option>
                                                <option value="FULL_TIME">@lang('jobPosting.employmentType-opt-1')</option>
                                                <option value="PART_TIME">@lang('jobPosting.employmentType-opt-2')</option>
                                                <option value="CONTRACTOR">@lang('jobPosting.employmentType-opt-3')</option>
                                                <option value="TEMPORARY">@lang('jobPosting.employmentType-opt-4')</option>
                                                <option value="INTERN">@lang('jobPosting.employmentType-opt-5')</option>
                                                <option value="VOLUNTEER">@lang('jobPosting.employmentType-opt-6')</option>
                                                <option value="PER_DIEM">@lang('jobPosting.employmentType-opt-7')</option>
                                                <option value="OTHER">@lang('jobPosting.employmentType-opt-8')</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <label class="text-black font-weight-bold" for="workHours">@lang('jobPosting.label-workHours')</label>
                                            <input type="text" name="" class="form-control workHours mb-5" placeholder="@lang('jobPosting.placeholder-workHours')" value="" data-id="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="datePosted">@lang('jobPosting.label-datePosted')</label>
                                            <div class="input-group date mb-5">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="bx bx-calendar text-darkgrey"></i>
                                                </span>
                                                </div>
                                                <input type="text" id="kt_datepicker_2" name="" class="form-control custom-date datePosted" readonly placeholder="@lang('jobPosting.placeholder-datePosted')" value="" data-id="0" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="expiredDate">@lang('jobPosting.label-expiredDate')</label>
                                            <div class="input-group date mb-5">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="bx bx-calendar text-darkgrey"></i>
                                                </span>
                                                </div>
                                                <input type="text" id="kt_datepicker_2" name="" class="form-control custom-date expiredDate" readonly placeholder="@lang('jobPosting.placeholder-expiredDate')" value="" data-id="0" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-3 col-xxl-2 align-self-center mt-md-2 mb-5 mb-md-0">
                                            <div class="checkbox-list align-items-center">
                                                <label class="checkbox text-black font-weight-bold">
                                                    <input type="checkbox" id="remoteJob" name="" />
                                                    <span></span>@lang('jobPosting.label-remoteJob')</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5 col-xxl-5">
                                            <label class="text-black font-weight-bold" for="street">@lang('jobPosting.label-street')</label>
                                            <input type="text" name="" class="form-control street mb-5" placeholder="@lang('jobPosting.placeholder-street')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-4 col-xxl-5">
                                            <label class="text-black font-weight-bold" for="city">@lang('jobPosting.label-city')</label>
                                            <input type="text" name="" class="form-control city mb-5" placeholder="@lang('jobPosting.placeholder-city')" value="" data-id="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-8 col-xl-5">
                                            <label class="text-black font-weight-bold" for="province">@lang('jobPosting.label-province')</label>
                                            <div id="hide-province">
                                                <select class="form-control selectpicker custom-select-blue custom-searchbox province mb-5" disabled data-size="4" data-live-search="true" tabindex="null">
                                                    <option value="none">@lang('jobPosting.placeholder-province')</option>
                                                </select>
                                            </div>
                                            <div id="province-show">
                                                <select class="form-control selectpicker custom-select-blue custom-searchbox province mb-5" data-size="4" data-live-search="true" tabindex="null">
                                                    <option value="none">@lang('jobPosting.placeholder-province')</option>
                                                    @foreach($province as $p)
                                                        <option value="{{ $p['code'] }}">{{ $p['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4 col-xl-2">
                                            <label class="text-black font-weight-bold" for="zipCode">@lang('jobPosting.label-zipCode')</label>
                                            <input type="text" name="" class="form-control zipCode mb-5" placeholder="@lang('jobPosting.placeholder-zipCode')" value="" data-id="0">
                                        </div>
                                        <div class="col-8 col-md-12 col-xl-5">
                                            <label class="text-black font-weight-bold" for="country">@lang('jobPosting.label-country')</label>
                                            <select class="form-control selectpicker custom-select-blue custom-searchbox country mb-5" data-size="4" data-live-search="true" tabindex="null">
                                                <option value="none">@lang('jobPosting.placeholder-country')</option>
                                                @foreach($region as $r)
                                                    <option value="{{ $r['code'] }}">{{ $r['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-xl-4 mb-5">
                                            <label class="text-black font-weight-bold" for="salary">@lang('jobPosting.label-salary')</label>
                                            <input type="number" name="" class="form-control salary" placeholder="@lang('jobPosting.placeholder-salary')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 col-xl-3 mb-5">
                                            <label class="text-black font-weight-bold" for="maxSalary">@lang('jobPosting.label-maxSalary')</label>
                                            <input type="number" name="" class="form-control maxSalary" placeholder="@lang('jobPosting.placeholder-maxSalary')" value="" min="0" data-id="0" disabled="disabled">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <label class="text-black font-weight-bold" for="currency">@lang('jobPosting.label-currency')</label>
                                            <select class="form-control selectpicker custom-select-blue custom-searchbox currency mb-5" data-size="4" data-live-search="true" disabled="disabled">
                                                <option value="none">@lang('jobPosting.placeholder-currency')</option>
                                                @foreach($currencies as $c)
                                                    <option value="{{ $c['code'] }}">{{ $c['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 col-xl-2">
                                            <label class="text-black font-weight-bold" for="unitText">Per-</label>
                                            <select class="form-control selectpicker custom-select-blue unitText mb-5" tabindex="null" disabled="disabled">
                                                <option value="none">Nothing Selected</option>
                                                <option value="HOUR">@lang('jobPosting.unitText-opt-1')</option>
                                                <option value="WEEK">@lang('jobPosting.unitText-opt-2')</option>
                                                <option value="MONTH">@lang('jobPosting.unitText-opt-3')</option>
                                                <option value="YEAR">@lang('jobPosting.unitText-opt-4')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <label class="text-black font-weight-bold" for="responsibilities">@lang('jobPosting.label-responsibilities')</label>
                                            <input type="text" name="" class="form-control responsibilities mb-5" placeholder="@lang('jobPosting.placeholder-responsibilities')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-4 mb-5">
                                            <label class="text-black font-weight-bold" for="skills">@lang('jobPosting.label-skills')</label>
                                            <input type="text" name="" class="form-control skills" placeholder="@lang('jobPosting.placeholder-skills')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="text-black font-weight-bold" for="qualifications">@lang('jobPosting.label-qualifications')</label>
                                            <input type="text" name="" class="form-control qualifications mb-5" placeholder="@lang('jobPosting.placeholder-qualifications')" value="" data-id="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <label class="text-black font-weight-bold" for="educationRequirements">@lang('jobPosting.label-educationRequirements')</label>
                                            <input type="text" name="" class="form-control educationRequirements mb-5" placeholder="@lang('jobPosting.placeholder-educationRequirements')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <label class="text-black font-weight-bold" for="experienceRequirements">@lang('jobPosting.label-experienceRequirements')</label>
                                            <input type="text" name="" class="form-control experienceRequirements mb-5" placeholder="@lang('jobPosting.placeholder-experienceRequirements')" value="" data-id="0">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="p-2" style="border: 1px solid #E4E6EF; border-radius: 0.42rem;">
                                <form class="" style="" target="_blank" rel="nofollow noopener noreferrer" action="https://search.google.com/test/rich-results" method="post">
                                    <div class="row mb-2">
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" id="copy" class="btn font-weight-bold" name="button">
                                                <i class='bx bx-copy'></i> <span>@lang('layout.btn-copy')</span></button>
                                        </div>
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="submit" id="test" class="btn font-weight-bold " name="button">
                                                <i class='bx bx-check-circle'></i> <span>@lang('layout.btn-check')</span></button>
                                        </div>
                                        <div id="reset" class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" class="btn font-weight-bold reset" name="button">
                                                <i class='bx bx-refresh'></i> <span>@lang('layout.btn-reset')</span></button>
                                        </div>
                                    </div>
                                    <textarea name="code_snippet" style="resize:none" rows="16" class="form-control" id="json-format" data-key="{{time()}}" readonly></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {{-- <div id="local-collection-desktop" class="local-collection">
            <div class="local-collection-header d-flex justify-content-between px-2 mb-3">
              <div class="d-flex flex-row align-items-center">
                <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                <span class="text-black font-15px">@lang('layout.local-history')</span>
              </div>
              <div onclick="clearAll()">
                <span class="clear-all font-15px pointer">@lang('layout.clear-all')</span>
              </div>
            </div>
            <div class="local-collection-body">
              <ul class="list-group" id="localsavedesktop"></ul>
            </div>
          </div> --}}
                </div>
                <div class="col-md-4">
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne2">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                                        @lang('layout.version') 1.0
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('jobPosting.highlight')</p>
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 15 Mar, 2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-100">
  <div class="local-collection-mobile bg-white py-5">
      {{--
    <div class="local-collection-header d-flex justify-content-between mb-3 w-100 px-5">
      <div class="d-flex flex-row align-items-center">
        <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
        <span class="text-black font-15px">@lang('layout.local-history')</span>
      </div>
      <div>
        <span class="clear-all font-15px pointer">@lang('layout.clear-all')</span>
      </div>
    </div>
    <div id="localsavemobile" class="local-collection-body mt-3 px-5"></div>
     --}}
    <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
        <div class="card bg-transparent" style="">
            <div class="card-header" id="headingOne2">
                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                    @lang('layout.version') 1.0
                </div>
            </div>
            <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                <div class="card-body">
                    <p>@lang('jobPosting.highlight')</p>
                    <div class="d-flex align-items-center">
                        <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                        <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 15 Mar, 2021</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endif
<div class="" style="background:white">
    <div class="container container-description">
        <div class="row">
            <div class="col-md-9">
                <div class="" id="description-tab-1">
                    <h2>@lang('jobPosting.desc-1')</h2>
                    <img class="mb-4" src="{{asset('/media/images/jobPosting-instruction-1.png')}}" alt="jobPosting-instruction-1" width="400">
                    <p>@lang('jobPosting.desc-1-1')</p>
                    <p>@lang('jobPosting.desc-1-2')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('jobPosting.desc-2')</h2>
                    <p>@lang('jobPosting.desc-2-1')</p>
                    <p>@lang('jobPosting.desc-2-2')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('jobPosting.desc-3')</h2>
                    <p>@lang('jobPosting.desc-3-1')</p>
                    <p>@lang('jobPosting.desc-3-2')</p>
                    <pre class="language-html mb-4">
                        <code class="language-html">
                            &lt;script type="application/ld+json"&gt;
                                {
                                    "@context": "https://schema.org/",
                                    "@type": "JobPosting",
                                    "title": "Developer",
                                    "description": "Let's join our code enthusiast and create a new inovation for the world.",
                                    "identifier": {
                                        "@type": "PropertyValue",
                                        "name": "cmlabs",
                                        "value": "12345"
                                    },
                                    "hiringOrganization": {
                                        "@type": "Organization",
                                        "name": "cmlabs",
                                        "sameAs": "cmlabs.co"
                                    },
                                    "industry": "Software House",
                                    "employmentType": "FULL_TIME",
                                    "workHours": "08.00 - 16.00",
                                    "datePosted": "04/20/2021",
                                    "validThrough": "05/11/2021",
                                    "jobLocation": {
                                        "@type": "Place",
                                        "address": {
                                            "@type": "PostalAddress",
                                            "streetAddress": "Malang, Indonesia",
                                            "addressLocality": "Malang",
                                            "addressRegion": "JI",
                                            "postalCode": "65141",
                                            "addressCountry": "ID"
                                        }
                                    },
                                    "baseSalary": {
                                        "@type": "MonetaryAmount",
                                        "currency": "IDR",
                                        "value": {
                                            "@type": "QuantitativeValue",
                                            "value": "2000000",
                                            "unitText": "MONTH"
                                        }
                                    },
                                    "responsibilities": "building API",
                                    "educationRequirements": "Bachelor Degree",
                                    "experienceRequirements": "min. 4 years experience"
                                }
                            &lt;/script&gt;
                        </code>
                    </pre>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2>@lang('jobPosting.desc-4')</h2>
                    <p>@lang('jobPosting.desc-4-1')</p>
                    <p>@lang('jobPosting.desc-4-2')</p>
                    <img class="mb-4" src="{{asset('/media/images/jobPosting-instruction-2.png')}}" alt="jobPosting-instruction-2" width="500">
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('jobPosting.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('jobPosting.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('jobPosting.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('jobPosting.desc-4')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{-- <div class="row mb-10">
      <div class="col-md-6">
        <h2 class="text-black">Available features</h2>
        <p class="text-black" style="font-size:1.5rem">Explore the full features of cmlabs WORD COUNTER</p>
        <p class="text-black">CMLABS will enhance your writing capabilities and incorporate strategical thinking to provide technical advice from the our data.</p>
      </div>
      <div class="col-md-6">
        <div class="d-flex align-items-center">
          <span class="text-primaryblue">cmlabs Words Counter</span>
          <span class="bx bxs-check-circle ml-5 mr-1 text-primaryblue"></span>
          <small class="text-grey">Updated 25 Dec, 2020</small>
        </div>
        <p class="font-weight-bold mt-3">CMLABS Analytics opens many possible ways to access, organize, and visualize your SERRPs data to suit your business needs.</p>
        <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes12" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 1.0</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes13" /><span></span>&nbsp;&nbsp;<bdi>Exact and average Google Search Volume. Version
            1.3</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
        <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily domain ranking on SERP. Version 0.1</bdi></label>
      </div>
    </div> --}}
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('jobPosting.title')</h2>
        <div class="row my-5">
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') 15 Mar, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('jobPosting.whats-new-1')</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') 15 Mar, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('jobPosting.whats-new-2')</span>
                </div>
            </div>
        </div>
        {{-- <p class="text-black view-all-release">View all web-release?</p> --}}
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
@endpush
@push('script')
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "@lang('layout.home')",
            "item": "{{url('/')}}/{{$local}}"
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "JSON-LD Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-schema-generator"
        }, {
            "@type": "ListItem",
            "position": 3,
            "name": "JSON-LD Job Posting Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-job-posting-schema-generator"
        }]
    }
</script>
@endpush
@push('script')
{{-- <script src="{{asset('js/logic/jobPosting-json.js')}}"></script> --}}
<script src="{{ mix('js/app/general.js') }}"></script>
<script src="{{ mix('js/app/tools/jobPosting-json.js') }}"></script>
<script src="{{asset('js/pages/crud/forms/widgets/bootstrap-datepicker.min.js')}}"></script>
@endpush
@section('json-ld')
active
@endsection
