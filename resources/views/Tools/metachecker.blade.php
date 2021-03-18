@extends('layouts.app')

@section('title', Lang::get('metachecker.meta-title'))

@section('meta-desc', Lang::get('metachecker.meta-desc'))

@section('conical','/en/page-title-meta-description-checker')

@section('en-link')
en/page-title-meta-description-checker
@endsection

@section('id-link')
id/page-title-meta-description-checker
@endsection

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('metachecker.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('metachecker.sub-title')</span>
            <div class="header-blue py-3 mb-5 px-4 mt-10">
                <div class="row d-flex align-items-center">
                    <div class="col-md-3 text-left pl-0 col-mobile">
                        <div class="d-flex align-items-center metachecker-option">
                            <div class="metachecker-background-text-size-left-edge d-flex justify-content-center align-items-center p-2 ml-5">
                                <i class='bx bxs-cog text-white'></i>
                            </div>
                            <div id="manualModeOff" class="d-block metachecker-background-text-size text-white font-weight-bolder justify-content-center align-items-center p-2" data-toggle="tooltip" data-theme="dark"
                                title="{{ Lang::get('metachecker.tooltip-manual-off') }}">
                                MANUAL
                            </div>
                            <div id="manualModeOn" class="d-none metachecker-background-text-size active text-white font-weight-bolder justify-content-center align-items-center p-2" data-toggle="tooltip" data-theme="dark"
                                title="{{ Lang::get('metachecker.tooltip-manual-on') }}">
                                MANUAL
                            </div>
                            <div id="botModeOff" class="d-none metachecker-background-text-size metachecker-background-text-size-right-edge text-white font-weight-bolder justify-content-center align-items-center p-2" data-toggle="tooltip"
                                data-theme="dark" title="{{ Lang::get('metachecker.tooltip-bot-off') }}">
                                BOT
                            </div>
                            <div id="botModeOn" class="d-block metachecker-background-text-size active metachecker-background-text-size-right-edge text-white font-weight-bolder justify-content-center align-items-center p-2" data-toggle="tooltip"
                                data-theme="dark" title="{{ Lang::get('metachecker.tooltip-bot-on') }}">
                                BOT
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-mobile">
                        <input id="url" type="text" class="input-url text-center w-100" placeholder="https://example.com" value="" autocomplete="off">
                    </div>
                    <div class="col-md-3 text-right col-mobile">
                        <button id="crawlURL" class="btn btn-crawl px-10">@lang('metachecker.btn-crawl')</button>
                    </div>
                </div>
            </div>
            <div id="manual-mode" class="mb-5 d-none">
                <div class="bg-info bg-primaryblue border-radius-5px mb-5 px-9 py-5">
                    <div class="row d-flex flex-column ">
                        <div class="d-flex align-items-center flex-row">
                            <span class="meta-title mr-5">PAGE TITLE</span>
                            <div class="progress-bar_wrap">
                                <div id="titlebar1" class="progress-bar_item progress-bar_item-1 blank"></div>
                                <div id="titlebar2" class="progress-bar_item progress-bar_item-2 blank"></div>
                                <div id="titlebar3" class="progress-bar_item progress-bar_item-3 blank"></div>
                            </div>
                        </div>
                        <input id="title" type="text" class="form-control bg-primaryblue text-white px-0 input-meta-title" id="meta-title" placeholder="{{ Lang::get('metachecker.input-hint-manual') }}">
                    </div>
                </div>
                <div class="bg-info py-5 px-9 bg-primaryblue border-radius-5px">
                    <div class="row d-flex flex-column">
                        <div class="d-flex align-items-center flex-row">
                            <span class="meta-desc mr-5">META DESCRIPTION</span>
                            <div class="progress-bar_wrap">
                                <div id="descbar1" class="progress-bar_item progress-bar_item-1 blank"></div>
                                <div id="descbar2" class="progress-bar_item progress-bar_item-2 blank"></div>
                                <div id="descbar3" class="progress-bar_item progress-bar_item-3 blank"></div>
                            </div>
                        </div>
                        <textarea id="desc" data-autoresize rows="1" class="form-control bg-primaryblue text-white px-0 input-meta-description" placeholder="{{ Lang::get('metachecker.input-hint-manual') }}"
                            style="resize:none; overflow:hidden"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div id="DesktopResult" class="col-lg-7">
                    <div class="card card-custom mb-5">
                        <div class="card-body px-0">
                            <div class="d-flex flex-column px-10 py-3">
                                <div class="link-meta d-flex flex-row align-items-center mb-2">
                                    <strong class="mr-2">Ad</strong>
                                    <span>visa-insurance.eu <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                </div>
                                <div class="title-meta mb-2">
                                    Buy ‪Travel Insurance Schengen‬ - Officially accepted for visa
                                </div>
                                <div class="desc-meta">
                                    Travel medical insurance to all Schengen Area. Refund if visa denied! Buy in 5 minutes. Pay with credit/deibt and get insurance documents instantly via email. No age limit.
                                </div>
                            </div>
                            <div class="d-flex flex-column px-10 py-3">
                                <div class="link-meta d-flex flex-row align-items-center mb-2">
                                    <span>www.traveloka.com › en-id › insurance › travel › visa-schengen <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                </div>
                                <div class="title-meta mb-2">
                                    Buy Your Schengen Visa Travel Insurance at Traveloka
                                </div>
                                <div class="desc-meta">
                                    When arranging a Schengen Visa, tourists must equip themselves with travel insurance. Travel insurance is very important to provide protection as long as you are in this country. Without adequate travel insurance,
                                    your Schengen
                                    Visa application will be refused.
                                </div>
                            </div>
                            <div class="d-flex flex-column px-10 py-3 bg-color-lightyellow">
                                <div class="link-meta d-flex flex-row align-items-center mb-2">
                                    <span><span id="resulturl">www.schengenvisainfo.com</span> › schengen-visa-insurance <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                </div>
                                <div id="resulttitle" class="title-meta mb-2 color-green">
                                    Schengen Travel Visa Insurance – Europe Travel Insurance
                                </div>
                                <div id="resultdesc" class="desc-meta">
                                    Dec 10, 2020 — Schengen Visa Insurance Requirements · Minimum coverage of at least 30,000 EUR (equivalent to 34,000 USD). · It should cover all member ...
                                </div>
                            </div>
                            <div class="d-flex flex-column px-10 py-3">
                                <div class="link-meta d-flex flex-row align-items-center mb-2">
                                    <span>www.schengenvisainfo.com › schengen-visa-insurance <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                </div>
                                <div class="title-meta mb-2">
                                    Schengen Travel Visa Insurance – Europe Travel Insurance
                                </div>
                                <div class="desc-meta">
                                    Dec 10, 2020 — Schengen Visa Insurance Requirements · Minimum coverage of at least 30,000 EUR (equivalent to 34,000 USD). · It should cover all member ...
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="local-collection">
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
                            <ul class="list-group" id="localsavedesktop">
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="MobileResult" class="col-lg-5">
                    <div class="card card-custom mb-5">
                        <div class="card-body px-0">
                            <div class="d-flex flex-column px-10 py-3">
                                <div class="link-meta d-flex align-items-center mb-2">
                                    <strong class="mr-2">Ad</strong>
                                    <span>visa-insurance.eu <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                </div>
                                <div class="title-meta mb-2">
                                    Buy ‪Travel Insurance Schengen‬ - Officially accepted for visa
                                </div>
                                <div class="desc-meta">
                                    Travel medical insurance to all Schengen Area. Refund if visa denied! Buy in 5 minutes. Pay with credit/deibt and get insurance documents instantly via email. No age limit.
                                </div>
                            </div>
                            <div class="d-flex flex-column px-10 py-3">
                                <div class="link-meta d-flex flex-row align-items-center mb-2">
                                    <span>www.traveloka.com › en-id › insurance › travel › visa-schengen <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                </div>
                                <div class="title-meta mb-2">
                                    Buy Your Schengen Visa Travel Insurance at Traveloka
                                </div>
                                <div class="desc-meta">
                                    When arranging a Schengen Visa, tourists must equip themselves with travel insurance. Travel insurance is very important to provide protection as long as you are in this country. Without adequate travel insurance,
                                    your Schengen
                                    Visa application will be refused.
                                </div>
                            </div>
                            <div class="d-flex flex-column px-10 py-3 bg-color-lightyellow">
                                <div class="link-meta d-flex flex-row align-items-center mb-2">
                                    <span><span id="resulturlmobile">www.schengenvisainfo.com</span> › schengen-visa-insurance <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                </div>
                                <div id="resulttitlemobile" class="title-meta mb-2 color-green">
                                    Schengen Travel Visa Insurance – Europe Travel Insurance
                                </div>
                                <div id="resultdescmobile" class="desc-meta">
                                    Dec 10, 2020 — Schengen Visa Insurance Requirements · Minimum coverage of at least 30,000 EUR (equivalent to 34,000 USD). · It should cover all member ...
                                </div>
                            </div>
                            <div class="d-flex flex-column px-10 py-3">
                                <div class="link-meta d-flex flex-row align-items-center mb-2">
                                    <span>www.schengenvisainfo.com › schengen-visa-insurance <i class='bx bx-caret-down ml-1' style="color: #4D5156; vertical-align: text-bottom;"></i></span>
                                </div>
                                <div class="title-meta mb-2">
                                    Schengen Travel Visa Insurance – Europe Travel Insurance
                                </div>
                                <div class="desc-meta">
                                    Dec 10, 2020 — Schengen Visa Insurance Requirements · Minimum coverage of at least 30,000 EUR (equivalent to 34,000 USD). · It should cover all member ...
                                </div>
                            </div>
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
                                        <p>@lang('metachecker.highlight')</p>
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
        <div class="local-collection-body mt-3 px-5" id="localsavemobile"></div>
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 2.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('metachecker.highlight')</p>
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
                    <h2>@lang('metachecker.desc-1')</h2>
                    <p>@lang('metachecker.desc-1-1')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('metachecker.desc-2')</h2>
                    <p>@lang('metachecker.desc-2-1')</p>
                    <p>@lang('metachecker.desc-2-2')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('metachecker.desc-3')</h2>
                    <p>@lang('metachecker.desc-3-1')</p>
                    <h3>@lang('metachecker.desc-3-2')</h3>
                    <ul>
                        <li>@lang('metachecker.desc-3-2-1')</li>
                        <li>@lang('metachecker.desc-3-2-2')</li>
                        <li>@lang('metachecker.desc-3-2-3')</li>
                        <li>@lang('metachecker.desc-3-2-4')</li>
                    </ul>
                    <h3>@lang('metachecker.desc-3-3')</h3>
                    <ul>
                        <li>
                            <p>@lang('metachecker.desc-3-3-1')</p>
                            <p>@lang('metachecker.desc-3-3-1-1')</p>
                        </li>
                        <li>
                            <p>@lang('metachecker.desc-3-3-2')</p>
                            <p>@lang('metachecker.desc-3-3-2-1')</p>
                        </li>
                    </ul>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2>@lang('metachecker.desc-4')</h2>
                    <p>@lang('metachecker.desc-4-1')</p>
                    <h3>@lang('metachecker.desc-4-2')</h3>
                    <ul>
                        <li>
                            <p>@lang('metachecker.desc-4-2-1')</p>
                            <p>@lang('metachecker.desc-4-2-1-1')</p>
                            <p>@lang('metachecker.desc-4-2-1-2')</p>
                        </li>
                        <li>
                            <p>@lang('metachecker.desc-4-2-2')</p>
                            <p>@lang('metachecker.desc-4-2-2-1')</p>
                            <p>@lang('metachecker.desc-4-2-2-2')</p>
                        </li>
                        <li>
                            <p>@lang('metachecker.desc-4-2-3')</p>
                            <p>@lang('metachecker.desc-4-2-3-1')</p>
                        </li>
                        <li>
                            <p>@lang('metachecker.desc-4-2-4')</p>
                            <p>@lang('metachecker.desc-4-2-4-1')</p>
                            <p>@lang('metachecker.desc-4-2-4-2')</p>
                            <p>@lang('metachecker.desc-4-2-4-3')</p>
                            <ul>
                                <li>
                                    <p>@lang('metachecker.desc-4-2-4-3-1')</p>
                                    <p>@lang('metachecker.desc-4-2-4-3-1-1')</p>
                                </li>
                                <li>
                                    <p>@lang('metachecker.desc-4-2-4-3-2')</p>
                                    <p>@lang('metachecker.desc-4-2-4-3-2-1')</p>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="d-none" id="description-tab-5">
                    <h2>@lang('metachecker.desc-5')</h2>
                    <p>@lang('metachecker.desc-5-1')</p>
                    <p>@lang('metachecker.desc-5-2')</p>
                    <p>@lang('metachecker.desc-5-2-1')</p>
                    <h3>@lang('metachecker.desc-5-3')</h3>
                    <p>@lang('metachecker.desc-5-3-1')</p>
                    <ul>
                        <li>
                            <p>@lang('metachecker.desc-5-3-2')</p>
                            <p>@lang('metachecker.desc-5-3-2-1')</p>
                        </li>
                        <li>
                            <p>@lang('metachecker.desc-5-3-3')</p>
                            <p>@lang('metachecker.desc-5-3-3-1')</p>
                        </li>
                        <li>
                            <p>@lang('metachecker.desc-5-3-4')</p>
                            <p>@lang('metachecker.desc-5-3-4-1')</p>
                        </li>
                        <li>
                            <p>@lang('metachecker.desc-5-3-5')</p>
                            <p>@lang('metachecker.desc-5-3-5-1')</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('metachecker.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('metachecker.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('metachecker.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('metachecker.desc-4')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-5">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-5">5</span>
                    </div>
                    <a class="">@lang('metachecker.desc-5')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{--
        <div class="row mb-10">
            <div class="col-md-6">
                <h2 class="text-black">@lang('layout.feature-title')</h2>
                <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') <span>@lang('metachecker.title')</span></p>
                <p class="text-black">@lang('layout.feature-desc')</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="text-primaryblue">cmlabs Title & Meta Description Checker</span>
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
        <h2 class="text-black">@lang('layout.whats-new-title') <span>@lang('metachecker.title')</span></h2>
        <div class="row my-5">
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') Mar 15, 2021</span>
                    </div>
                    <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div>
                    <span class="alert-features-text">@lang('metachecker.whats-new-1')</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') Mar 15, 2021</span>
                    </div>
                    <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div>
                    <span class="alert-features-text">@lang('metachecker.whats-new-2')</span>
                </div>
            </div>
        </div>
        {{--
        <p class="text-black view-all-release">@lang('layout.view-web-release')</p>
        --}}
    </div>
</div>
    <span id="titlesizer"></span>
    <span id="descsizer"></span>
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
            "name": "Title & Meta Description Checker",
            "item": "{{url('/')}}/{{$local}}/page-title-meta-description-checker"
        }]
    }
</script>
<script>const META_CHECKER_URL = '{{route('api.analyze-meta')}}'</script>
<script src="{{asset('js/logic/predifine-localstorage.js')}}"></script>
<script src="{{asset('js/logic/metachecker.js')}}"></script>
<script type="text/javascript">
    $('#toggle_button_writer').click();
</script>
@endpush

@section('title-checker')
active
@endsection
