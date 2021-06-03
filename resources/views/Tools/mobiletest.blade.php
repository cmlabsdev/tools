@extends('layouts.app')

@section('title', Lang::get('mobiletest.meta-title'))

@section('meta-desc', Lang::get('mobiletest.meta-desc'))

@section('conical','/en/mobile-test')

@section('en-link')
en/mobile-test
@endsection

@section('id-link')
id/mobile-test
@endsection

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('mobiletest.title')</h1>
            <p class="text-darkgrey h4 font-weight-normal mb-10">@lang('mobiletest.sub-title')</p>
            @include('components.cta_form', ["message" => "It seems like your website still hasn't passed our mobile-friendly test. You can discuss your problem with our team by fulfilling your problem here."])
            <div class="header-blue mb-5 px-5 py-1">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                        <i id="noCrawl" class='bx bxs-shield text-white bx-md mr-3 d-none'></i>
                        <i id="crawlHttps" class='bx bxs-check-shield text-white bx-md mr-3 d-none'></i>
                        <i id="crawlHttp" class='bx bxs-shield-x text-white bx-md mr-3 d-none'></i>
                        <input type="url" class="form-control sitemap-url" name="" value="" autocomplete="off" placeholder="https://example.com" id="tested_url">
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                        <button id="generateButton" type="button" class="btn btn-crawl" name="button">@lang('mobiletest.btn-check')</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="px-2 mb-3">
                        <span class="text-black font-15px font-weight-bolder">@lang('layout.result')</span>
                        {{--
                        <span class="font-15px what-is-this" style="color:#9A99A2">(@lang('layout.what-is-this'))</span>
                        --}}
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 px-0">
                            <div class="" id="noCrawlResult">
                                <div class="text-center">
                                    <p class="d-block text-black">@lang('mobiletest.no-test-result')</p>
                                    <a href="#mobiletest-description" class="links">@lang('layout.learn-how-to-use')</a>
                                </div>
                            </div>
                            <div id="crawlResult" class="d-none justify-content-between align-items-center px-5 mb-5">
                                <div class="">
                                    <p class="text-darkgrey" id="result-date"></p>
                                    <p class="h3 text-black" id="result-title"></p>
                                    <p class="mb-0 text-darkgrey" id="result-subtitle"></p>
                                </div>
                                <div class="">
                                    <img id="mobileFriendlyIcon" class="d-none" src="{{asset('/media/images/bx_bx-mobile.png')}}" alt="Mobile Friendly Icon">
                                    <img id="notMobileFriendlyIcon" class="d-none" src="{{asset('/media/images/bx_bx-mobilered.png')}}" alt="Not Mobile Friendly Icon">
                                </div>
                            </div>
                            <div id="pageIssues" class="d-none px-5">
                                <p class="font-weight-boldest text-black">@lang('mobiletest.page-issues')</p>
                                <div id="page-issues-content"></div>
                            </div>
                            <div id="mobileIssues" class="d-none px-5">
                                <p class="font-weight-boldest text-black">@lang('mobiletest.mobile-issues')</p>
                                <div id="mobile-issues-content"></div>
                            </div>
                        </div>
                    </div>
                    <div id="local-collection-desktop" class="local-collection">
                        <div class="local-collection-header d-flex justify-content-between px-2 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                                <span class="text-black font-15px">@lang('layout.local-history')</span>
                            </div>
                            <div>
                                <span class="clear-all font-15px pointer mr-3 clear-history--btn">@lang('layout.clear-all')</span>
                            </div>
                        </div>
                        <div class="local-collection-body">
                            <ul class="list-group" id="local-history">
                            </ul>
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
                                        <p>@lang('mobiletest.highlight')</p>
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
                <div class="col-md-5">
                    <div class="px-2 mb-3 d-flex align-items-center">
                        <span class="text-black font-15px font-weight-bolder">@lang('layout.progress')</span>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 px-5">
                            <div class="text-center">
                                <p class="text-black font-weight-bold mb-0" id="task-sleeping">@lang('layout.robot-sleep')</p>
                                <p class="d-none text-black font-weight-bold mb-0" id="task-progress">@lang('layout.robot-progress')</p>
                                <p class="d-none text-black font-weight-bold mb-0" id="task-done">@lang('layout.robot-done')</p>
                                <div class="progress my-3">
                                    <div class="progress-bar" role="progressbar" id="progress-bar-loader" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <button type="button" class="btn btn-cancel-disabled" disabled name="button" id="cancel-request-btn">@lang('layout.cancel-btn')</button>
                            </div>
                        </div>
                    </div>
                    <div class="px-2 mb-3 d-flex align-items-center">
                        <span class="text-black font-15px font-weight-bolder">@lang('mobiletest.label-mobile-preview')</span>
                    </div>
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="" id="noCrawlResultPreview">
                                <div class="text-center">
                                    <p class="d-block">@lang('mobiletest.no-test-result')</p>
                                    <a href="#mobiletest-description" class="links">@lang('layout.learn-how-to-use')</a>
                                </div>
                            </div>
                            <div class="d-none" id="CrawlResultPreview">
                                <img src="" id="mobile-image-preview" alt="Mobile Test Preview" width="100%">
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
            <div>
                <span class="clear-all font-15px pointer clear-history--btn">@lang('layout.clear-all')</span>
            </div>
        </div>
        <div class="local-collection-body mt-3 px-5" id="local-history-mobile"></div>

        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 2.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('mobiletest.highlight')</p>
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
<div class="" style="background:white" id="mobiletest-description">
    <div class="container container-description">
        <div class="row">
            <div class="col-md-9">
                <div class="" id="description-tab-1">
                    <h2>@lang('mobiletest.desc-1')</h2>
                    <p>@lang('mobiletest.desc-1-1')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('mobiletest.desc-2')</h2>
                    <p>@lang('mobiletest.desc-2-1')</p>
                    <p>@lang('mobiletest.desc-2-2')</p>
                    <h3>@lang('mobiletest.desc-2-3')</h3>
                    <p>@lang('mobiletest.desc-2-3-1')</p>
                    <p>@lang('mobiletest.desc-2-3-2')</p>
                    <h3>@lang('mobiletest.desc-2-4')</h3>
                    <p>@lang('mobiletest.desc-2-4-1')</p>
                    <ul>
                        <li>@lang('mobiletest.desc-2-4-1-1')</li>
                        <li>@lang('mobiletest.desc-2-4-1-2')</li>
                        <li>@lang('mobiletest.desc-2-4-1-3')</li>
                        <li>@lang('mobiletest.desc-2-4-1-4')</li>
                    </ul>
                    <h3>@lang('mobiletest.desc-2-5')</h3>
                    <p>@lang('mobiletest.desc-2-5-1')</p>
                    <h3>@lang('mobiletest.desc-2-6')</h3>
                    <p>@lang('mobiletest.desc-2-6-1')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('mobiletest.desc-3')</h2>
                    <p>@lang('mobiletest.desc-3-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-1')</h3>
                    <p>@lang('mobiletest.desc-3-1-1-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-2')</h3>
                    <p>@lang('mobiletest.desc-3-1-2-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-3')</h3>
                    <p>@lang('mobiletest.desc-3-1-3-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-4')</h3>
                    <p>@lang('mobiletest.desc-3-1-4-1')</p>
                    <h3>@lang('mobiletest.desc-3-1-5')</h3>
                    <p>@lang('mobiletest.desc-3-1-5-1')</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('mobiletest.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('mobiletest.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('mobiletest.desc-3')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{--
        <div class="row mb-10">
            <div class="col-md-6">
                <h2 class="text-black">@lang('layout.feature-title')</h2>
                <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') <span>@lang('mobiletest.title')</span></p>
                <p class="text-black">@lang('layout.feature-desc')</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="text-primaryblue">cmlabs Mobile Friendly Test</span>
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
        </div>
        --}}
        <h2 class="text-black">@lang('layout.whats-new-title') <span>@lang('mobiletest.title')</span></h2>
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
                    <span class="alert-features-text">@lang('mobiletest.whats-new-1')</span>
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
                    <span class="alert-features-text">@lang('mobiletest.whats-new-2')</span>
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
{{-- <script src="{{asset('js/logic/trigerEnterButton.js')}}"></script> --}}
{{-- <script src="{{asset('js/logic/mobiletest.js')}}"></script> --}}
<script src="{{ mix('js/app/general.js') }}"></script>
<script src="{{ mix('js/app/helper.js') }}"></script>
<script src="{{ mix('js/app/tools/mobiletest.js') }}"></script>
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
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
            "name": "Mobile Friendly Test",
            "item": "{{url('/')}}/{{$local}}/mobile-friendly-test"
        }]
    }
</script>
@endpush

@section('mobile-test')
active
@endsection

@section('test-n-checker')
active
@endsection
