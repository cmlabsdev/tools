@extends('layouts.app')

@section('title', Lang::get('breadcrumb.meta-title'))

@section('meta-desc', Lang::get('breadcrumb.meta-desc'))

@section('conical','/en/json-ld-breadcrumb-schema-generator')

@section('en-link')
en/json-ld-breadcrumb-schema-generator
@endsection

@section('id-link')
id/json-ld-breadcrumb-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('breadcrumb.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('breadcrumb.subtitle')</span>
            <div class="card card-custom mb-5 mt-10">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="row mb-8">
                                <div class="col-12">
                                    <label for="schema-json-ld" class="font-weight-bold text-black h6">@lang('layout.which-schema')</label>
                                    <select class="form-control selectpicker custom-select-blue" tabindex="null" id="schema-json-ld">
                                        <option value="home">Home</option>
                                        <option value="breadcrumb" selected="selected">Breadcrumb</option>
                                        <option value="faq">FAQ Page</option>
                                        <option value="how-to">How-to</option>
                                        <option value="job-posting">Job Posting</option>
                                        <option value="person">Person</option>
                                        <option value="product">Product</option>
                                        <option value="recipe">Recipe</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Breadcrumb Generator</p>
                            <form action="" id="form-breadcrumb">
                                <div class="">
                                    <div class="row">
                                        <div class="col-10 col-sm-11">
                                            <div class="row">
                                                <div class="col-sm-5 mb-5">
                                                    <label for="pageName" class="font-weight-bold text-black">@lang('breadcrumb.label-page') #1 @lang('breadcrumb.label-name')</label>
                                                    <input type="text" id="pageName" class="form-control pageName" name="" placeholder="{{ Lang::get('breadcrumb.placeholder-pageName') }}" value="" data-id="0">
                                                </div>
                                                <div class="col-sm-7 mb-5">
                                                    <label for="url" class="font-weight-bold text-black">URL #1</label>
                                                    <input type="text" id="url" class="form-control url" name="" placeholder="{{ Lang::get('breadcrumb.placeholder-url') }}" value="" data-id="0">
                                                    <div class="invalid-feedback" data-id="0">@lang('layout.invalid-url')</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-sm-1">
                                            <div class="d-flex justify-content-center mt-9">
                                                <i class='bx bxs-x-circle bx-md btn-delete-disabled delete-bread'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10 col-sm-11">
                                            <div class="row">
                                                <div class="col-sm-5 mb-5">
                                                    <label for="pageName" class="font-weight-bold text-black">@lang('breadcrumb.label-page') #2 @lang('breadcrumb.label-name')</label>
                                                    <input type="text" id="pageName" class="form-control pageName" name="" placeholder="{{ Lang::get('breadcrumb.placeholder-pageName') }}" value="" data-id="1">
                                                </div>
                                                <div class="col-sm-7 mb-5">
                                                    <label for="url" class="font-weight-bold text-black">URL #2</label>
                                                    <input type="text" id="url" class="form-control url" name="" placeholder="{{ Lang::get('breadcrumb.placeholder-url') }}" value="" data-id="1">
                                                    <div class="invalid-feedback" data-id="1">@lang('layout.invalid-url')</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-sm-1">
                                            <div class="d-flex justify-content-center mt-9">
                                                <i class='bx bxs-x-circle bx-md btn-delete-disabled delete-bread'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="formbreadcrumb">

                                    </div>
                                </div>
                                <button type="button" class="btn btn-add-question mb-5 mt-5" name="button" id="add-breadcrumb">
                                    <i class='bx bx-plus'></i> @lang('breadcrumb.btn-add')
                                </button>
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
                                        <p>@lang('breadcrumb.highlight')</p>
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
                        <p>@lang('breadcrumb.highlight')</p>
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
                    <h2>@lang('breadcrumb.desc-1')</h2>
                    <p>@lang('breadcrumb.desc-1-1')</p>
                    <p>@lang('breadcrumb.desc-1-2')</p>
                    <p>@lang('breadcrumb.desc-1-3')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('breadcrumb.desc-2')</h2>
                    <p>@lang('breadcrumb.desc-2-1')</p>
                    <p>@lang('breadcrumb.desc-2-2')</p>
                    <div class="d-flex flex-column px-3 py-3">
                        <div class="title-meta mb-1">
                            Informasi Perusahaan - PT CMLABS INDONESIA DIGITAL
                        </div>
                        <div class="link-meta d-flex flex-row align-items-center color-green mb-1">
                            <span>cmlabs.co › about-us <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                        </div>
                        <div class="desc-meta mb-4">
                            CMLABS. PT CMLABS INDONESIA DIGITAL is a company specializing in SEO services, Digital<br>Marketing and tools to support SEO activities ...
                        </div>
                    </div>
                    <p>@lang('breadcrumb.desc-2-3')</p>
                    <div class="d-flex flex-column px-3 py-3">
                        <div class="title-meta mb-1">
                            Informasi Perusahaan - PT CMLABS INDONESIA DIGITAL
                        </div>
                        <div class="link-meta d-flex flex-row align-items-center color-green mb-1">
                            <span>https://cmlabs.co/about-us/ <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                        </div>
                        <div class="desc-meta mb-4">
                            CMLABS. PT CMLABS INDONESIA DIGITAL is a company specializing in SEO services, Digital<br>Marketing and tools to support SEO activities ...
                        </div>
                    </div>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('breadcrumb.desc-3')</h2>
                    <p>@lang('breadcrumb.desc-3-1')</p>
                    <p>@lang('breadcrumb.desc-3-2')</p>
                    <p>@lang('breadcrumb.desc-3-3')</p>
                    <img src="{{asset('/media/images/breadcrumb-instruction-1.png')}}" alt="breadcrumb-instruction">
                    <p>@lang('breadcrumb.desc-3-4')</p>
                    <p>@lang('breadcrumb.desc-3-5')</p>
                    <p>@lang('breadcrumb.desc-3-6')</p>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2>@lang('breadcrumb.desc-4')</h2>
                    <p>@lang('breadcrumb.desc-4-1')</p>
                    <h3>@lang('breadcrumb.desc-4-1-1')</h3>
                    <p>@lang('breadcrumb.desc-4-1-1-1')</p>
                    <pre class="language-html mb-4">
            <code class="language-html">
              &lt;ul id="breadcrumblist"&gt;
                 &lt;li&gt;&lt;a href="https://cmlabs.co/"&gt;Home&lt;/a&gt;/&lt;/li&gt;
                 &lt;li&gt;&lt;a href="https://cmlabs.co/about-us/"&gt;About Us&lt;/a&gt;/&lt;/li&gt;
               &lt;/ul&gt;
            </code>
          </pre>
                    <p>@lang('breadcrumb.desc-4-1-1-2')</p>
                    <p>@lang('breadcrumb.desc-4-1-1-3')</p>
                    <p>@lang('breadcrumb.desc-4-1-1-4')</p>
                    <ul>
                        <li>@lang('breadcrumb.desc-4-1-1-4-1')</li>
                    </ul>
                    <p>@lang('breadcrumb.desc-4-1-1-5')</p>
                    <ul>
                        <li>@lang('breadcrumb.desc-4-1-1-5-1')</li>
                        <li>@lang('breadcrumb.desc-4-1-1-5-2')</li>
                        <li>@lang('breadcrumb.desc-4-1-1-5-3')</li>
                    </ul>
                    <p>@lang('breadcrumb.desc-4-1-1-6')</p>
                    <pre class="language-html mb-4">
            <code class="language-html">
              &lt;ul id="breadcrumblist" itemscope itemtype="http://schema.org/BreadcrumbList"&gt;
                &lt;li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"&gt;&lt;a itemprop="item" href="https://cmlabs.co/"&gt;&lt;span itemprop="name"&gt;Home&lt;/span&gt;&lt;/a&gt;/&lt;meta itemprop="position" content="1" /&gt;&lt;/li&gt;
                &lt;li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"&gt;&lt;a itemprop="item" href="https://cmlabs.co/about-us/"&gt;&lt;span itemprop="name"&gt;About Us&lt;/span&gt;&lt;/a&gt;&lt;meta itemprop="position" content="2" /&gt;/&lt;/li&gt;
              &lt;/ul&gt;
            </code>
          </pre>
                    <h3>@lang('breadcrumb.desc-4-1-2')</h3>
                    <p>@lang('breadcrumb.desc-4-1-2-1')</p>
                    <pre class="language-html mb-4">
            <code class="language-html">
              &lt;script type="application/ld+json"&gt;
              {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                  "@type": "ListItem",
                  "position": 1,
                  "item": {
                    "@id": "https://cmlabs.co/",
                    "name": "Home"
                  }
                },{
                  "@type": "ListItem",
                  "position": 2,
                  "item": {
                    "@id": "https://cmlabs.co/about-us/",
                    "name": "About Us"
                  }
                }]
              }
              &lt;/script&gt;
            </code>
          </pre>
                </div>
                <div class="d-none" id="description-tab-5">
                    <h2>@lang('breadcrumb.desc-5')</h2>
                    <p>@lang('breadcrumb.desc-5-1')</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('breadcrumb.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('breadcrumb.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('breadcrumb.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('breadcrumb.desc-4')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-5">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-5">5</span>
                    </div>
                    <a class="">@lang('breadcrumb.desc-5')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{-- <div class="row mb-10">
      <div class="col-md-6">
        <h2 class="text-black">@lang('layout.feature-title')</h2>
        <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') @lang('breadcrumb.title')</p>
        <p class="text-black">@lang('layout.feature-desc')</p>
      </div>
      <div class="col-md-6">
        <div class="d-flex align-items-center">
          <span class="text-primaryblue">cmlabs JSON-LD Breadcrumb Schema Generator</span>
          <span class="bx bxs-check-circle ml-5 mr-1 text-primaryblue"></span>
          <small class="text-grey">@lang('layout.updated') 25 Dec, 2020</small>
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
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('breadcrumb.title')</h2>
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
                    <span class="alert-features-text">@lang('breadcrumb.whats-new-1')</span>
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
                    <span class="alert-features-text">@lang('breadcrumb.whats-new-2')</span>
                </div>
            </div>
        </div>
        {{-- <p class="text-black view-all-release">@lang('layout.view-web-release')</p> --}}
    </div>
</div>
@endsection

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
            "name": "JSON-LD Breadcrumb Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-breadcrumb-schema-generator"
        }]
    }
</script>
@endpush
@push('script')
{{-- <script src="{{asset('js/logic/predifine-localstorage.js')}}"></script> --}}
{{-- <script src="{{asset('js/logic/breadcrumb-json.js')}}"></script> --}}
<script src="{{ mix('js/app/general.js') }}"></script>
<script src="{{ mix('js/app/helper.js') }}"></script>
<script src="{{ mix('js/app/tools/breadcrumb-json.js') }}"></script>
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
@endpush

@section('json-ld')
active
@endsection
