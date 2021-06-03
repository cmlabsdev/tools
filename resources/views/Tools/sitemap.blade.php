@extends('layouts.app')

@section('title', Lang::get('sitemap.meta-title'))

@section('meta-desc', Lang::get('sitemap.meta-desc'))

@section('conical','/en/sitemap-generator')

@section('en-link')
en/sitemap-generator
@endsection

@section('id-link')
id/sitemap-generator
@endsection

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('sitemap.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('sitemap.sub-title')</span>

            <div class="header-blue mt-10 mb-5 px-5 py-1">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                        <i id="noCrawl" class='bx bxs-shield text-white bx-md mr-3'></i>
                        <i id="crawlHttps" style="display: none;" class='bx bxs-check-shield text-white bx-md mr-3'></i>
                        <i id="crawlHttp" style="display: none;" class='bx bxs-shield-x text-white bx-md mr-3'></i>
                        <input id="url" type="url" class="form-control sitemap-url" name="" value="" autocomplete="off" placeholder="https://example.com">
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                        <button id="generate" type="button" class="btn btn-crawl" name="button">@lang('sitemap.btn-generate')</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="px-2 mb-3">
                            <span class="text-black font-15px font-weight-bolder">@lang('layout.result')</span>
                            <span id="length-result" class="font-15px font-weight-bolder" style="color:#9A99A2">(0)</span>
                            {{--
                            <span class="font-15px what-is-this" style="color:#9A99A2">(@lang('layout.what-is-this'))</span>
                            --}}
                        </div>
                        <div id="download-button" class="mb-3">
                        </div>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 px-0">
                            <div class="" id="noCrawlResult">
                                <div class="text-center">
                                    <p class="d-block">@lang('sitemap.no-crawl-result')</p>
                                    <a href="#sitemap-description" class="links">@lang('layout.learn-how-to-use')</a>
                                </div>
                            </div>
                            <div style="display: none;" id="generateCrawlResult">
                                <div class="text-center">
                                    <p class="d-block">@lang('sitemap.generating')</p>
                                </div>
                            </div>
                            <div class="" id=result></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="px-2 mb-3 d-flex align-items-center" style="height:31.88px">
                        <span class="text-black font-15px font-weight-bolder">@lang('layout.progress')</span>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 px-5">
                            <div class="text-center">
                                <p id="info" class="text-black font-weight-bold mb-5">@lang('layout.robot-sleep')</p>
                                {{-- <div class="progress my-3">
                                      <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div> --}}
                                {{-- <div class="">
                                      <div class="spinner spinner-primary spinner-lg "></div>
                                    </div> --}}
                                <p id="detail-progress" style="display: none;" class="text-black font-weight-bold mb-3"></p>
                                <span id="cancel-button"></span>
                            </div>
                        </div>
                    </div>
                    <div id="local-collection-desktop" class="local-collection">
                        <div class="local-collection-header d-flex justify-content-between px-2 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                                <span class="text-black font-15px">@lang('layout.local-history')</span>
                            </div>
                            <div onclick="clearAll()">
                                <span class="clear-all font-15px pointer mr-3">@lang('layout.clear-all')</span>
                            </div>
                        </div>
                        <div class="local-collection-body">
                            <ul class="list-group" id="localsavedesktop"></ul>
                        </div>
                    </div>
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne2">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                                        @lang('layout.version') 2.0
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('sitemap.highlight')</p>
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
        <div class="local-collection-header d-flex justify-content-between mb-3 w-100 px-5">
            <div class="d-flex flex-row align-items-center">
                <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                <span class="text-black font-15px">@lang('layout.local-history')</span>
            </div>
            <div onclick="clearAll()">
                <span class="clear-all font-15px pointer">@lang('layout.clear-all')</span>
            </div>
        </div>
        <div class="local-collection-body mt-3 px-5" id="localsavemobile">
        </div>
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 2.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('sitemap.highlight')</p>
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
<div class="" style="background:white" id="sitemap-description">
    <div class="container container-description">
        <div class="row">
            <div class="col-md-9">
                <div class="" id="description-tab-1">
                    <h2>@lang('sitemap.desc-1')</h2>
                    <p>@lang('sitemap.desc-1-1')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('sitemap.desc-2')</h2>
                    <p>@lang('sitemap.desc-2-1')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('sitemap.desc-3')</h2>
                    <p>@lang('sitemap.desc-3-1')</p>
                    <p>@lang('sitemap.desc-3-2')</p>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2>@lang('sitemap.desc-4')</h2>
                    <p>@lang('sitemap.desc-4-1')</p>
                    <p>@lang('sitemap.desc-4-2')</p>
                    <p>@lang('sitemap.desc-4-3')</p>
                    <p>@lang('sitemap.desc-4-4')</p>
                    <p>@lang('sitemap.desc-4-5')</p>
                    <p>@lang('sitemap.desc-4-6')</p>
                    <p>@lang('sitemap.desc-4-7')</p>
                    <p>@lang('sitemap.desc-4-8')</p>
                </div>
                <div class="d-none" id="description-tab-5">
                    <h2>@lang('sitemap.desc-5')</h2>
                    <p>@lang('sitemap.desc-5-1')</p>
                </div>
                <div class="d-none" id="description-tab-6">
                    <h2>@lang('sitemap.desc-6')</h2>
                    <p>@lang('sitemap.desc-6-1')</p>
                    <p>@lang('sitemap.desc-6-2')</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('sitemap.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('sitemap.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('sitemap.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('sitemap.desc-4')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-5">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-5">5</span>
                    </div>
                    <a class="">@lang('sitemap.desc-5')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-6">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-5">6</span>
                    </div>
                    <a class="">@lang('sitemap.desc-6')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{--
        <div class="row mb-10">
            <div class="col-md-6">
                <h2 class="text-black">@lang('layout.feature-title')</h2>
                <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') <span>@lang('sitemap.title')</span></p>
                <p class="text-black">@lang('layout.feature-desc')</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="text-primaryblue">cmlabs Sitemap Generator</span>
                    <span class="bx bxs-check-circle ml-5 mr-1 text-primaryblue"></span>
                    <small class="text-grey">@lang('layout.updated') 25 Dec, 2020</small>
                </div>
                <p class="font-weight-bold mt-3">CMLABS Analytics opens many possible ways to access, organize, and
                    visualize your SERRPs data to suit your business needs.</p>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes12" /><span></span>&nbsp;&nbsp;<bdi>
                        Daily domain ranking on SERP. Version 1.0
                    </bdi>
                </label>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes13" /><span></span>&nbsp;&nbsp;<bdi>
                        Exact and average Google Search Volume. Version
                        1.3
                    </bdi>
                </label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily
                        domain ranking on SERP. Version 0.1
                    </bdi>
                </label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily
                        domain ranking on SERP. Version 0.1
                    </bdi>
                </label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily
                        domain ranking on SERP. Version 0.1
                    </bdi>
                </label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily
                        domain ranking on SERP. Version 0.1
                    </bdi>
                </label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>Daily
                        domain ranking on SERP. Version 0.1
                    </bdi>
                </label>
            </div>
        </div>
        --}}
        <h2 class="text-black">@lang('layout.whats-new-title') <span>@lang('sitemap.title')</span></h2>
        <div class="row my-5">
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') Mar 15, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('sitemap.whats-new-1')</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') Mar 15, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('sitemap.whats-new-2')</span>
                </div>
            </div>
        </div>
        {{--
        <p class="text-black view-all-release">@lang('layout.view-web-release')</p>
        --}}
    </div>
</div>
@endsection

@push('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x2js/1.2.0/xml2json.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js"></script>
<script>
    const token = "{{csrf_token()}}"
    const URL_API = '{{env('URL_API')}}'
    $('#toggle_button_webmaster').click();
</script>
{{-- <script src="{{asset('js/logic/download.js')}}"></script>
<script src="{{asset('js/logic/vkbeautify.0.99.00.beta.js')}}"></script>
<script src="{{asset('js/logic/trigerEnterButton.js')}}"></script> --}}
<script src="{{ mix('js/app/general.js') }}"></script>
<script src="{{ mix('js/app/helper.js') }}"></script>
<script src="{{ mix('js/app/tools/sitemap.js')}}"></script>
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
            "name": "Sitemap Generator",
            "item": "{{url('/')}}/{{$local}}/sitemap-generator"
        }]
    }
</script>
@endpush

@section('sitemap')
active
@endsection

@section('generator')
active
@endsection
