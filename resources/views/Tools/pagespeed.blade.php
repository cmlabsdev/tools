@extends('layouts.app')

@section('title', Lang::get('pagespeed.meta-title'))

@section('meta-desc', Lang::get('pagespeed.meta-desc'))

@section('conical','/en/pagespeed-test')

@section('en-link')
en/pagespeed-test
@endsection

@section('id-link')
id/pagespeed-test
@endsection

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('pagespeed.title')</h1>
            <p class="text-darkgrey h4 font-weight-normal mb-10">@lang('pagespeed.sub-title')</p>

            <div class="mb-5" id="cta-good" style="display: none">
                <div class="cta-yellow px-5 py-1 cta-border-bottom">
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                            <i class='bx bxs-tachometer bx-md mr-3 text-black'></i>
                            <p class="mb-0 text-black">Good job! Do you wanna make it 100%? Visit our website and find out for yourself.</p>
                        </div>
                        <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                            <a href="https://cmlabs.co/en-id/pricing/seo-consultant" target="_blank" rel="noreferrer nofollow external" type="button" class="btn btn-cta" name="button">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mb-5" id="cta-warning" style="display: none">
                <div class="cta-yellow px-5 py-1 cta-border-bottom">
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                            <i class='bx bxs-like bx-md mr-3 text-black'></i>
                            <p class="mb-0 text-black">Your website is still on the standard speed. To speed up your website, go to this site and get a quote!</p>
                        </div>
                        <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                            <a href="https://cmlabs.co/en-id/pricing/seo-consultant" target="_blank" rel="noreferrer nofollow external" type="button" class="btn btn-cta" name="button">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            @include('components.cta_form', ["message" => "Ouch! Turns out your website speed is still not good. But you can discuss with us to maximize your website performance."])

            <div class="header-blue mb-5 px-5 py-1">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                        <i id="noCrawl" class='bx bxs-shield text-white bx-md mr-3 '></i>
                        <i id="crawlHttps" class='bx bxs-check-shield text-white bx-md mr-3' style="display: none;"></i>
                        <i id="crawlHttp" class='bx bxs-shield-x text-white bx-md mr-3' style="display: none;"></i>
                        <input type="url" id="url" class="form-control pagespeed-url" name="" value="" autocomplete="off" placeholder="https://example.com">
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                        <button id="analysis-button" type="button" class="btn btn-crawl" name="button">@lang('pagespeed.generate-btn')</button>
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
                            <div class="row justify-content-center px-4" id="pagespeed-tab">
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl">
                                    <div class="circleProgressBar active" id="performancePB">
                                        <div class="progress progress-red performance" data-percentage="0">
                                            <span class="progress-left">
                                                <span class="progress-bar progress-bar-performance"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar progress-bar-performance"></span>
                                            </span>
                                            <div class="progress-value" style="width:100%">
                                                <div class="value-performance value-red">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="font-weight-bold text-center mb-4 h6 text-black">Peformance</h2>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl">
                                    <div class="circleProgressBar" id="accessibilityPB">
                                        <div class="progress progress-red accessibility" data-percentage="0">
                                            <span class="progress-left">
                                                <span class="progress-bar progress-bar-accessibility"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar progress-bar-accessibility"></span>
                                            </span>
                                            <div class="progress-value" style="width:100%">
                                                <div class="value-accessibility value-red">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="font-weight-bold text-center mb-4 h6 text-black">Accesibility</h2>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl">
                                    <div class="circleProgressBar" id="practicePB">
                                        <div class="progress progress-red best-practices" data-percentage="0">
                                            <span class="progress-left">
                                                <span class="progress-bar progress-bar-best-practices"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar progress-bar-best-practices"></span>
                                            </span>
                                            <div class="progress-value" style="width:100%">
                                                <div class="value-best-practices value-red">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class=" font-weight-bold text-center mb-4 h6 text-black">Best Practices</h2>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl">
                                    <div class="circleProgressBar" id="seoPB">
                                        <div class="progress progress-red seo" data-percentage="0">
                                            <span class="progress-left">
                                                <span class="progress-bar progress-bar-seo"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar progress-bar-seo"></span>
                                            </span>
                                            <div class="progress-value" style="width:100%">
                                                <div class="value-seo value-red">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class=" font-weight-bold text-center mb-4 h6 text-black">SEO</h2>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl">
                                    <div class="circleProgressBar" id="pwaPB">
                                        <div class="progress progress-red pwa" data-percentage="0">
                                            <span class="progress-left">
                                                <span class="progress-bar progress-bar-pwa"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar progress-bar-pwa"></span>
                                            </span>
                                            <div class="progress-value" style="width:100%">
                                                <div class="value-pwa value-red">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class=" font-weight-bold text-center mb-4 h6 text-black">PWA</h2>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="d-flex justify-content-end align-items-center">
                                <div class="d-flex align-items-center mr-2">
                                    <i class='bx bx-minus bx-md' style="color:#FF5656"></i>
                                    <span>0-49</span>
                                </div>
                                <div class="d-flex align-items-center mr-2">
                                    <i class='bx bx-minus bx-md' style="color:#FBC918"></i>
                                    <span>50-89</span>
                                </div>
                                <div class="d-flex align-items-center mr-2">
                                    <i class='bx bx-minus bx-md' style="color:#84DB15"></i>
                                    <span>90-100</span>
                                </div>
                            </div>
                            <hr>
                            <div class="" id="performance">
                                <div class="mx-5">
                                    <p class="h4">Performance</p>
                                    <div class="col">
                                        <div class="">
                                            <div class="progress progress-red performance result" data-percentage="0">
                                                <span class="progress-left">
                                                    <span class="progress-bar progress-bar-performance"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar progress-bar-performance"></span>
                                                </span>
                                                <div class="progress-value" style="width:100%">
                                                    <div class="value-performance value-red">
                                                        0
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="accordion accordion-light accordion-toggle-arrow performance-audit" id="performance-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow pass-performance-audit" id="pass-performance-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow not-app-performance-audit" id="not-app-performance-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow manual-performance-audit" id="manual-performance-audit"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="accessibility">
                                <div class="mx-5">
                                    <p class="h4">Accesibility</p>
                                    <div class="col">
                                        <div class="">
                                            <div class="progress progress-red accessibility result" data-percentage="0">
                                                <span class="progress-left">
                                                    <span class="progress-bar progress-bar-accessibility"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar progress-bar-accessibility"></span>
                                                </span>
                                                <div class="progress-value" style="width:100%">
                                                    <div class="value-accessibility value-red">
                                                        0
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="accordion accordion-light accordion-toggle-arrow accessibility-audit" id="accessibility-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow pass-accessibility-audit" id="pass-accessibility-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow not-app-accessibility-audit" id="not-app-accessibility-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow manual-accessibility-audit" id="manual-accessibility-audit"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="best-practices">
                                <div class="mx-5">
                                    <p class="h4">Best Practices</p>
                                    <div class="col">
                                        <div class="">
                                            <div class="progress progress-red best-practices result" data-percentage="0">
                                                <span class="progress-left">
                                                    <span class="progress-bar progress-bar-best-practices"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar progress-bar-best-practices"></span>
                                                </span>
                                                <div class="progress-value" style="width:100%">
                                                    <div class="value-best-practices value-red">
                                                        0
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="accordion accordion-light accordion-toggle-arrow best-practices-audit" id="best-practices-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow pass-best-practices-audit" id="pass-best-practices-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow not-app-best-practices-audit" id="not-app-best-practices-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow manual-best-practices-audit" id="manual-best-practices-audit"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="seo">
                                <div class="mx-5">
                                    <p class="h4">SEO</p>
                                    <div class="col">
                                        <div class="">
                                            <div class="progress progress-red seo result" data-percentage="0">
                                                <span class="progress-left">
                                                    <span class="progress-bar progress-bar-seo"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar progress-bar-seo"></span>
                                                </span>
                                                <div class="progress-value" style="width:100%">
                                                    <div class="value-seo value-red">
                                                        0
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="accordion accordion-light accordion-toggle-arrow seo-audit" id="seo-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow pass-seo-audit" id="pass-seo-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow not-app-seo-audit" id="not-app-seo-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow manual-seo-audit" id="manual-seo-audit"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="pwa">
                                <div class="mx-5">
                                    <p class="h4">PWA</p>
                                    <div class="col">
                                        <div class="">
                                            <div class="progress progress-red pwa result" data-percentage="0">
                                                <span class="progress-left">
                                                    <span class="progress-bar progress-bar-pwa"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar progress-bar-pwa"></span>
                                                </span>
                                                <div class="progress-value" style="width:100%">
                                                    <div class="value-pwa value-red">
                                                        0
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="accordion accordion-light accordion-toggle-arrow pwa-audit" id="pwa-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow pass-pwa-audit" id="pass-pwa-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow not-app-pwa-audit" id="not-app-pwa-audit"></div>
                                        <div class="accordion accordion-light accordion-toggle-arrow manual-pwa-audit" id="manual-pwa-audit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
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
                            <ul class="list-group" id="localsavedesktop">
                            </ul>
                        </div>
                    </div>
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample3">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne3">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne3">
                                        @lang('layout.version') 2.0
                                    </div>
                                </div>
                                <div id="collapseOne3" class="collapse" data-parent="#accordionExample3">
                                    <div class="card-body">
                                        <p>@lang('pagespeed.highlight')</p>
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
                <span class="clear-all font-15px pointer clear-history--btn">@lang('layout.clear-all')</span>
            </div>
        </div>
        <div class="local-collection-body mt-3 px-5" id="localsavemobile">

        </div>
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample3">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne3">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne3">
                        @lang('layout.version') 2.0
                    </div>
                </div>
                <div id="collapseOne3" class="collapse" data-parent="#accordionExample3">
                    <div class="card-body">
                        <p>@lang('pagespeed.highlight')</p>
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
                    <h2 class="text-black">@lang('pagespeed.desc-1')</h2>
                    <p class="text-black">@lang('pagespeed.desc-1-1')</p>
                    <p class="text-black">@lang('pagespeed.desc-1-2')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2 class="text-black">@lang('pagespeed.desc-2')</h2>
                    <p class="text-black">@lang('pagespeed.desc-2-1')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2 class="text-black">@lang('pagespeed.desc-3')</h2>
                    <p class="text-black">@lang('pagespeed.desc-3-1')</p>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2 class="text-black">@lang('pagespeed.desc-4')</h2>
                    <p class="text-black">@lang('pagespeed.desc-4-1')</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>@lang('pagespeed.desc-4-2')</th>
                                <th>@lang('pagespeed.desc-4-3')</th>
                                <th>@lang('pagespeed.desc-4-4')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col">FCP</td>
                                <td>[0, 1000ms]</td>
                                <td>(1000ms, 3000ms)</td>
                                <td>Over 3000ms</td>
                            </tr>
                            <tr>
                                <td scope="col">FID</td>
                                <td>[0, 100ms]</td>
                                <td>(100ms, 300ms)</td>
                                <td>Over 300ms</td>
                            </tr>
                            <tr>
                                <td scope="col">LCP</td>
                                <td>[0, 2500ms]</td>
                                <td>(2500ms, 4000ms)</td>
                                <td>Over from 4000ms</td>
                            </tr>
                            <tr>
                                <td scope="col">CLS</td>
                                <td>[0, 0,1]</td>
                                <td>(0,1, 0,25)</td>
                                <td>Over from 0,25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-none" id="description-tab-5">
                    <h2 class="text-black">@lang('pagespeed.desc-5')</h2>
                    <p class="text-black">@lang('pagespeed.desc-5-1')</p>
                    <p class="text-black">@lang('pagespeed.desc-5-2')</p>
                </div>
                <div class="d-none" id="description-tab-6">
                    <h2 class="text-black">@lang('pagespeed.desc-6')</h2>
                    <p class="text-black">@lang('pagespeed.desc-6-1')</p>
                </div>
                <div class="d-none" id="description-tab-7">
                    <h2 class="text-black">@lang('pagespeed.desc-7')</h2>
                    <p class="text-black">@lang('pagespeed.desc-7-1')</p>
                </div>
                <div class="d-none" id="description-tab-8">
                    <h2 class="text-black">@lang('pagespeed.desc-8')</h2>
                    <p class="text-black">@lang('pagespeed.desc-8-1')</p>
                    <p class="text-black">@lang('pagespeed.desc-8-2')</p>
                    <ul>
                        <li>@lang('pagespeed.desc-8-3')</li>
                        <li>@lang('pagespeed.desc-8-4')</li>
                        <li>@lang('pagespeed.desc-8-5')</li>
                    </ul>
                </div>
                <div class="d-none" id="description-tab-9">
                    <h2 class="text-black">@lang('pagespeed.desc-9')</h2>
                    <p class="text-black">@lang('pagespeed.desc-9-1')</p>
                    <ul>
                        <li>@lang('pagespeed.desc-9-2')</li>
                        <li>@lang('pagespeed.desc-9-3')</li>
                        <li>@lang('pagespeed.desc-9-4')</li>
                    </ul>
                </div>
                <div class="d-none" id="description-tab-10">
                    <h2 class="text-black">@lang('pagespeed.desc-10')</h2>
                    <div class="accordion accordion-light accordion-toggle-arrow" id="accordionExample2">
                        <div class="card">
                            <div class="card-header" id="headingOne2">
                                <div class="card-title" data-toggle="collapse" data-target="#collapseOne2">
                                    @lang('pagespeed.desc-10-1')
                                </div>
                            </div>
                            <div id="collapseOne2" class="collapse show" data-parent="#accordionExample2">
                                <div class="card-body">
                                    @lang('pagespeed.desc-10-2')
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo2">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo2">
                                    @lang('pagespeed.desc-10-3')
                                </div>
                            </div>
                            <div id="collapseTwo2" class="collapse" data-parent="#accordionExample2">
                                <div class="card-body">
                                    @lang('pagespeed.desc-10-4')
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree2">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree2">
                                    @lang('pagespeed.desc-10-5')
                                </div>
                            </div>
                            <div id="collapseThree2" class="collapse" data-parent="#accordionExample2">
                                <div class="card-body">
                                    @lang('pagespeed.desc-10-6')
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour2">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFour2">
                                    @lang('pagespeed.desc-10-7')
                                </div>
                            </div>
                            <div id="collapseFour2" class="collapse" data-parent="#accordionExample2">
                                <div class="card-body">
                                    @lang('pagespeed.desc-10-8')
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive2">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFive2">
                                    @lang('pagespeed.desc-10-9')
                                </div>
                            </div>
                            <div id="collapseFive2" class="collapse" data-parent="#accordionExample2">
                                <div class="card-body">
                                    @lang('pagespeed.desc-10-10')
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSix2">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseSix2">
                                    @lang('pagespeed.desc-10-11')
                                </div>
                            </div>
                            <div id="collapseSix2" class="collapse" data-parent="#accordionExample2">
                                <div class="card-body">
                                    @lang('pagespeed.desc-10-12')
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSeven2">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseSeven2">
                                    @lang('pagespeed.desc-10-13')
                                </div>
                            </div>
                            <div id="collapseSeven2" class="collapse" data-parent="#accordionExample2">
                                <div class="card-body">
                                    @lang('pagespeed.desc-10-14')
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingEight2">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseEight2">
                                    @lang('pagespeed.desc-10-15')
                                </div>
                            </div>
                            <div id="collapseEight2" class="collapse" data-parent="#accordionExample2">
                                <div class="card-body">
                                    @lang('pagespeed.desc-10-16')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-4')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-5">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-5">5</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-5')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-6">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-6">6</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-6')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-7">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-7">7</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-7')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-8">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-8">8</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-8')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-9">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-9">9</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-9')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-10">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-10">10</span>
                    </div>
                    <a class="">@lang('pagespeed.desc-10')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{--
        <div class="row mb-10">
            <div class="col-md-6">
                <h2 class="text-black">@lang('layout.feature-title')</h2>
                <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') @lang('pagespeed.title')</p>
                <p class="text-black">@lang('pagespeed.feature-desc')</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="text-primaryblue">cmlabs Page Speed Test</span>
                    <span class="bx bxs-check-circle ml-5 mr-1 text-primaryblue"></span>
                    <small class="text-grey">@lang('layout.updated') 25 Dec, 2020</small>
                </div>
                <p class="font-weight-bold mt-3">@lang('pagespeed.feature-sub-title')</p>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes12" /><span></span>&nbsp;&nbsp;<bdi>@lang('pagespeed.feature-1')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes13" /><span></span>&nbsp;&nbsp;<bdi>@lang('pagespeed.feature-2')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('pagespeed.feature-3')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('pagespeed.feature-4')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('pagespeed.feature-5')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('pagespeed.feature-6')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('pagespeed.feature-7')</bdi></label>
            </div>
        </div>
        --}}
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('pagespeed.title')</h2>
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
                    <span class="alert-features-text">@lang('pagespeed.whats-new-1')</span>
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
                    <span class="alert-features-text">@lang('pagespeed.whats-new-2')</span>
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
            "name": "Page Speed",
            "item": "{{url('/')}}/{{$local}}/pagespeed-test"
        }]
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.1/showdown.min.js"></script>
{{-- <script src="{{asset('js/logic/trigerEnterButton.js')}}"></script> --}}
{{-- <script src="{{asset('js/logic/pagespeed.js')}}"></script> --}}
<script src="{{ mix('js/app/general.js') }}"></script>
<script src="{{ mix('js/app/helper.js') }}"></script>
<script src="{{ mix('js/app/tools/pagespeed.js') }}"></script>
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
@endpush

@push('style')
<link rel="stylesheet" href="{{asset('css/pagespeed.css')}}">
@endpush

@section('page-speed')
active
@endsection

@section('test-n-checker')
active
@endsection
