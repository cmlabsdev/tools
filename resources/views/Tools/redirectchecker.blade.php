@extends('layouts.app')

@section('title', Lang::get('redirectchecker.meta-title'))

@section('meta-desc', Lang::get('redirectchecker.meta-desc'))

@section('conical','/en/redirect-checker')

@section('en-link')
en/redirect-checker
@endsection

@section('id-link')
id/redirect-checker
@endsection

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('redirectchecker.title')</h1>
            <p class="text-darkgrey h4 font-weight-normal mb-10">@lang('redirectchecker.sub-title')</p>
            @include('components.cta_form', ["message" => "Oops, we can’t see your targeted URL. Fix your targeted URL here."])
            <div class="header-blue mb-5 px-5 py-1">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-6 col-md-7 col-lg-6 col-xl-7 d-flex align-items-center py-1">
                        <i id="empty-url" class='bx bxs-shield text-white bx-md mr-3'></i>
                        <i id="secure-url" class='bx bxs-check-shield text-white bx-md mr-3' style="display: none"></i>
                        <i id="unsecure-url" class='bx bxs-shield-x text-white bx-md mr-3' style="display: none"></i>
                        <input type="url" class="form-control redirect-url" name="" value="" placeholder="http://example.com" id="input-url" autocomplete="off">
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-6 col-xl-5 d-flex align-items-center py-1">
                        <select class="form-control selectpicker user-agent mx-2" id="user-agent-select">
                            <option value="" disabled selected>@lang('redirectchecker.user-agent')</option>
                            <option value="*">All</option>
                            <option value="NinjaBot">NinjaBot</option>
                            <option value="Googlebot">Googlebot</option>
                            <option value="Googlebot-Mobile">Googlebot-Mobile</option>
                            <option value="Googlebot-Image">Googlebot-Image</option>
                            <option value="Mediapartners-Google">Mediapartners-Google</option>
                            <option value="Adsbot-Google">Adsbot-Google</option>
                            <option value="Bingbot">Bingbot</option>
                            <option value="Slurp">Slurp</option>
                            <option value="msnbot">msnbot</option>
                            <option value="msnbot-media">msnbot-media</option>
                            <option value="Teoma">Teoma</option>
                            <option value="twiceler">twiceler</option>
                            <option value="Gigabot">Gigabot</option>
                            <option value="Scrubby">Scrubby</option>
                            <option value="Robozilla">Robozilla</option>
                            <option value="ia_archiver">ia_archiver</option>
                            <option value="baiduspider">baiduspider</option>
                            <option value="naverbot">naverbot</option>
                            <option value="yeti">yeti</option>
                            <option value="yahoo-mmcrawler">yahoo-mmcrawler</option>
                            <option value="psbot">psbot</option>
                            <option value="asterias">asterias</option>
                            <option value="yahoo-blogs">yahoo-blogs</option>
                            <option value="Yandex">Yandex</option>
                            <option value="Specify">Specify</option>
                        </select>

                        <button id="analyze-btn" type="button" class="btn btn-crawl" name="button">@lang('redirectchecker.check-btn')
                        </button>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="px-2 mb-3">
                        <span class="text-black font-15px font-weight-bolder">@lang('layout.result')</span>
                        {{--
                        <span class="font-15px what-is-this" style="color:#9A99A2">(@lang('layout.what-is-this'))</span>
                        --}}
                    </div>
                    <div class="card card-custom">
                        <div class="card-body py-4 px-0">
                            <div class="" id="redirect-result-empty">
                                <div class="text-center">
                                    <p class="d-block">@lang('redirectchecker.result-none')</p>
                                    <a href="#redirect-description" class="links">@lang('layout.learn-how-to-use')</a>
                                </div>
                            </div>
                            <div class="" id="redirect-result-container" style="display: none;">
                                <div class="row px-5 mb-5">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <p class="font-weight-bolder text-black h6">URL</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="font-weight-bolder text-black h6">@lang('redirectchecker.status-codes')</p>
                                            <p class="font-weight-bolder text-black h6">@lang('redirectchecker.date')</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="redirect-result">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="px-2 mb-3 d-flex align-items-center">
                        <span class="text-black font-15px font-weight-bolder">@lang('layout.progress')</span>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 px-5">
                            <div class="text-center">
                                <p class="text-black font-weight-bold mb-0" id="progress-stop-message">@lang('layout.robot-sleep')</p>
                                <p class="text-black font-weight-bold mb-0" id="progress-start-message" style="display: none">@lang('layout.robot-progress')</p>
                                <p class="text-black font-weight-bold mb-0" id="progress-finish-message" style="display: none">@lang('layout.robot-done')</p>
                                <div class="progress my-3">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="progress-bar-loader">

                                    </div>
                                </div>
                                <button type="button" class="btn btn-cancel-disabled" disabled name="button" id="cancel-request-btn">@lang('layout.cancel-btn')
                                </button>
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
                                        @lang('layout.version') 1.0
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('redirectchecker.highlight')</p>
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
            <div>
                <span class="clear-all font-15px pointer clear-history--btn">@lang('layout.clear-all')</span>
            </div>
        </div>
        <div class="local-collection-body mt-3 px-5" id="local-history-mobile">

        </div>
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('redirectchecker.highlight')</p>
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

<div class="" style="background:white" id="redirect-description">
    <div class="container container-description">
        <div class="row">
            <div class="col-md-9">
                <div class="" id="description-tab-1">
                    <h2 class="text-black">@lang('redirectchecker.desc-1')</h2>
                    <p class="text-black">@lang('redirectchecker.desc-1-1')</p>
                    <p class="text-black">@lang('redirectchecker.desc-1-2')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2 class="text-black">@lang('redirectchecker.desc-2')</h2>
                    <ul>
                        <li class="text-black">@lang('redirectchecker.desc-2-1')</li>
                        <li class="text-black">@lang('redirectchecker.desc-2-2')</li>
                        <li class="text-black">@lang('redirectchecker.desc-2-3')</li>
                        <li class="text-black">@lang('redirectchecker.desc-2-4')</li>
                        <li class="text-black">@lang('redirectchecker.desc-2-5')</li>
                        <li class="text-black">@lang('redirectchecker.desc-2-6')</li>
                        <li class="text-black">@lang('redirectchecker.desc-2-7')</li>
                    </ul>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2 class="text-black">@lang('redirectchecker.desc-3')</h2>
                    <p class="text-black">@lang('redirectchecker.desc-3-1')</p>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2 class="text-black">@lang('redirectchecker.desc-4')</h2>
                    <p class="text-black">@lang('redirectchecker.desc-4-1')</p>
                    <p class="text-black">@lang('redirectchecker.desc-4-2')</p>
                    <p class="text-black">@lang('redirectchecker.desc-4-3')</p>
                </div>
                <div class="d-none" id="description-tab-5">
                    <h2 class="text-black">@lang('redirectchecker.desc-5')</h2>
                    <p class="text-black">@lang('redirectchecker.desc-5-1')</p>
                    <p class="text-black">@lang('redirectchecker.desc-5-2')</p>
                    <ul>
                        <li class="text-black">@lang('redirectchecker.desc-5-3')</li>
                        <li class="text-black">@lang('redirectchecker.desc-5-4')</li>
                        <li class="text-black">@lang('redirectchecker.desc-5-5')</li>
                        <li class="text-black">@lang('redirectchecker.desc-5-6')</li>
                    </ul>
                </div>
                <div class="d-none" id="description-tab-6">
                    <h2 class="text-black">@lang('redirectchecker.desc-6')</h2>
                    <p class="text-black">@lang('redirectchecker.desc-6-1')</p>
                    <p class="text-black">@lang('redirectchecker.desc-6-2')</p>
                    <p class="text-black">@lang('redirectchecker.desc-6-3')</p>
                    <p class="text-black">@lang('redirectchecker.desc-6-4')</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('redirectchecker.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('redirectchecker.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('redirectchecker.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('redirectchecker.desc-4')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-5">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-5">5</span>
                    </div>
                    <a class="">@lang('redirectchecker.desc-5')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-6">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-6">6</span>
                    </div>
                    <a class="">@lang('redirectchecker.desc-6')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{--
        <div class="row mb-10">
            <div class="col-md-6">
                <h2 class="text-black">@lang('layout.feature-title')</h2>
                <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') @lang('redirectchecker.title')</p>
                <p class="text-black">@lang('redirectchecker.feature-desc')</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="text-primaryblue">cmlabs Redirect Checker</span>
                    <span class="bx bxs-check-circle ml-5 mr-1 text-primaryblue"></span>
                    <small class="text-grey">@lang('layout.updated') 25 Dec, 2020</small>
                </div>
                <p class="font-weight-bold mt-3">@lang('redirectchecker.feature-sub-title')</p>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes12" /><span></span>&nbsp;&nbsp;<bdi>@lang('redirectchecker.feature-1')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes13" /><span></span>&nbsp;&nbsp;<bdi>@lang('redirectchecker.feature-2')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('redirectchecker.feature-3')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('redirectchecker.feature-4')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('redirectchecker.feature-5')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('redirectchecker.feature-6')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('redirectchecker.feature-7')</bdi></label>
            </div>
        </div>
        --}}
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('redirectchecker.title')</h2>
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
                    <span class="alert-features-text">@lang('redirectchecker.whats-new-1')</span>
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
                    <span class="alert-features-text">@lang('redirectchecker.whats-new-2')</span>
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
<script>
    const REDIRECT_CHAIN_CHECKER_API_URL = '{{ route('api.analyze-redirect-chain') }}';
    $('#toggle_button_webmaster').click();

    function myFunction(x) {
        if (x.matches) { // If media query matches
            $('.desktopDate').hide();
            $('.mobileDate').show();
        } else {
            $('.desktopDate').show();
            $('.mobileDate').hide();
        }
    }

    var x = window.matchMedia("(max-width: 767px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes
</script>
{{-- <script src="{{ asset('js/logic/redirect-chain-checker.js') }}"></script> --}}
<script src="{{ mix('js/app/general.js') }}"></script>
<script src="{{ mix('js/app/tools/redirect-chain-checker.js') }}"></script>
<script>
    $(document).ready(function() {
        getHistories();
    })
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
            "name": "Redirect Checker",
            "item": "{{url('/')}}/{{$local}}/redirect-checker"
        }]
    }
</script>
@endpush

@section('redirect-checker')
active
@endsection

@section('test-n-checker')
active
@endsection
