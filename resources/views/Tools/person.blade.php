@extends('layouts.app')

@section('title', Lang::get('person.meta-title'))

@section('meta-desc', Lang::get('person.meta-desc'))

@section('conical','/en/json-ld-person-schema-generator')

@section('en-link')
en/json-ld-person-schema-generator
@endsection

@section('id-link')
id/json-ld-person-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('person.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('person.subtitle')</span>
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
                                        <option value="job-posting">Job Posting</option>
                                        <option value="person" selected="selected">Person</option>
                                        <option value="product">Product</option>
                                        <option value="recipe">Recipe</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Person</p>
                            <form action="" id="form-person">
                                <div class="" id="formperson">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-5">
                                            <label class="text-black font-weight-bold" for="name">@lang('person.label-name')</label>
                                            <input type="text" name="" class="form-control name" placeholder="@lang('person.placeholder-name')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-6 mb-5">
                                            <label class="text-black font-weight-bold" for="url">URL</label>
                                            <input type="text" name="" class="form-control url" placeholder="@lang('person.placeholder-url')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-5">
                                            <label class="text-black font-weight-bold" for="pictureUrl">@lang('person.label-pictureUrl')</label>
                                            <input type="text" name="" class="form-control pictureUrl" placeholder="@lang('person.placeholder-pictureUrl')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="sosmed">@lang('person.label-social-profiles')</label>
                                            <div class="dropdown bootstrap-select show-tick form-control">
                                                <select class="form-control selectpicker custom-select-blue social-profiles mb-5" multiple="multiple" data-actions-box="false" tabindex="null">
                                                    <option value="twitter">Twitter</option>
                                                    <option value="facebook">Facebook</option>
                                                    <option value="instagram">Instagram</option>
                                                    <option value="youtube">Youtube</option>
                                                    <option value="linkedin">Linkedin</option>
                                                    <option value="pinterest">Pinterest</option>
                                                    <option value="soundcloud">Soundcloud</option>
                                                    <option value="tumblr">Tumblr</option>
                                                    <option value="wikipedia">Wikipedia</option>
                                                    <option value="github">Github</option>
                                                    <option value="website">Website</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="jobTitle">@lang('person.label-jobTitle')</label>
                                            <input type="text" name="" class="form-control jobTitle mb-5" placeholder="@lang('person.placeholder-jobTitle')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="company">@lang('person.label-company')</label>
                                            <input type="text" name="" class="form-control company mb-5" placeholder="@lang('person.placeholder-company')" value="" data-id="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-5">
                                            <div class="social-profile-url">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                        <p>@lang('person.highlight')</p>
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
                        <p>@lang('person.highlight')</p>
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
                    <h2>@lang('person.desc-1')</h2>
                    <p>@lang('person.desc-1-1')</p>
                    <p>@lang('person.desc-1-2')</p>
                    <pre class="language-html">
                        <code class="language-html">
                            &lt;script type="application/ld+json"&gt;
                                {
                                    "@context": "https://schema.org",
                                    "@type": "Person",
                                    "address": {
                                      "@type": "PostalAddress",
                                      "addressLocality": "Freetown",
                                      "addressRegion": "MA",
                                      "postalCode": "02702",
                                      "streetAddress": "3394 Randolph Street"
                                    },
                                    "colleague": [
                                      "http://www.example.com/BestColleague.html",
                                      "http://www.example.com/BestColleague.html"
                                    ],
                                    "email": "info@example.com",
                                    "image": "DonABest.jpg",
                                    "jobTitle": "Cardiographic technician",
                                    "name": "Don A. Best",
                                    "alumniOf": "Dartmouth",
                                    "birthPlace": "Philadelphia, PA",
                                    "birthDate": "1997-13-20",
                                    "height": "72 inches",
                                    "gender": "Male",
                                    "memberOf": "Republican Party",
                                    "nationality": "Albanian",
                                    "telephone": "508-644-7231",
                                    "url": "http://www.example.com",
                                    "sameAs" : [ "https://www.facebook.com/",
                                    "https://www.linkedin.com/",
                                    "http://twitter.com/",
                                    "http://instagram.com/",
                                    "https://plus.google.com/"]
                                }
                            &lt;/script&gt;
                        </code>
                    </pre>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('person.desc-2')</h2>
                    <p>@lang('person.desc-2-1')</p>
                    <img class="mb-4" src="{{asset('/media/images/person-instruction-1.png')}}" alt="person-instruction-1" width="300">
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('person.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('person.desc-2')</a>
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
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('person.title')</h2>
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
                    <span class="alert-features-text">@lang('person.whats-new-1')</span>
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
                    <span class="alert-features-text">@lang('person.whats-new-2')</span>
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
            "name": "JSON-LD Person Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-person-schema-generator"
        }]
    }
</script>
@endpush
@push('script')
{{-- <script src="{{asset('js/logic/person-json.js')}}"></script> --}}
<script src="{{ mix('js/app/general.js')}} "></script>
<script src="{{ mix('js/app/tools/person-json.js') }}"></script>
@endpush

@section('json-ld')
active
@endsection
