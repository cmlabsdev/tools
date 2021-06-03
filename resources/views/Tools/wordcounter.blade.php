@extends('layouts.app')

@section('title', Lang::get('wordcounter.meta-title'))

@section('meta-desc', Lang::get('wordcounter.meta-desc'))

@section('conical','/en/word-counter')

@section('en-link')
    en/word-counter
@endsection

@section('id-link')
    id/word-counter
@endsection

@section('content')
    @if ($is_maintenance)
        @include('layouts.maintenance')
    @else
        <div class="container container-tools mb-10">
            <div class="d-flex flex-column-fluid">
                <div class="container-fluid px-0">
                    <h1 class="text-darkgrey font-weight-normal">@lang('wordcounter.title')</h1>
                    <span class="text-darkgrey h4 font-weight-normal">@lang('wordcounter.subtitle')</span>
                    <div class="row mt-10">
                        <div class="col-md-8">
                            <div class="card card-custom mb-5">
                                <div class="card-body py-3 px-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i id="copy-text"
                                               class='bx bxs-copy-alt bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                               data-toggle="tooltip" data-theme="dark"
                                               title="{{ Lang::get('wordcounter.tooltip-copy') }}"></i>
                                            <i id="reset" class='bx bxs-trash bx-sm mx-2 text-darkgrey text-hover-red'
                                               data-toggle="tooltip" data-theme="dark"
                                               title="{{ Lang::get('wordcounter.tooltip-clear') }}"></i>
                                            <div
                                                class="wordcounter-background-text-size-left-edge d-flex justify-content-center align-items-center p-2 ml-5">
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 24 24"
                                                 style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
												<path
                                                    d="M5 12L3 12 3 21 12 21 12 19 5 19zM12 5L19 5 19 12 21 12 21 3 12 3z"
                                                    style="fill:white"></path>
											</svg>
										</span>
                                            </div>
                                            <div id="set-font-size-12px"
                                                 class="wordcounter-background-text-size active text-white font-weight-bolder d-flex justify-content-center align-items-center p-2"
                                                 data-toggle="tooltip" data-theme="dark"
                                                 title="{{ Lang::get('wordcounter.tooltip-set-font-size') }} 12px">
                                                12px
                                            </div>
                                            <div id="set-font-size-15px"
                                                 class="wordcounter-background-text-size text-white d-flex justify-content-center font-weight-bolder align-items-center p-2"
                                                 data-toggle="tooltip" data-theme="dark"
                                                 title="{{ Lang::get('wordcounter.tooltip-set-font-size') }} 15px">
                                                15px
                                            </div>
                                            <div id="set-font-size-18px"
                                                 class="wordcounter-background-text-size wordcounter-background-text-size-right-edge text-white font-weight-bolder d-flex justify-content-center align-items-center p-2"
                                                 data-toggle="tooltip" data-theme="dark"
                                                 title="{{ Lang::get('wordcounter.tooltip-set-font-size') }} 18px">
                                                18px
                                            </div>
                                        </div>
                                        <div id="autosaveParam" data-autosave="on" class="">
                                            <i id="new-text"
                                               class='bx bxs-collection bx-sm mx-2 text-darkgrey text-hover-primaryblue'
                                               data-toggle="tooltip" data-theme="dark"
                                               title="{{ Lang::get('wordcounter.tooltip-new-local-history') }}"></i>
                                            <i id="autoSaveOff"
                                               class='bx bxs-server bx-sm mx-2 text-darkgrey text-hover-primaryblue auto-save-off'
                                               data-html="true" data-placement="top"
                                               title="{{ Lang::get('wordcounter.autosave-off') }}"></i>
                                            <i id="autoSaveOn"
                                               class='bx bxs-server bx-sm mx-2 text-primaryblue text-hover-primaryblue auto-save-on'
                                               data-html="true" data-placement="top"
                                               title="{{ Lang::get('wordcounter.autosave-on') }}"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-custom mb-5">
                                <div class="card-header pb-0 px-4">
                                    <div class="container px-0 pt-3">
                                        <div class="row">
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.character')</p>
                                                <span class="h4 mb-0" id="characterCount">0</span>
                                            </div>
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.word')</p>
                                                <span class="h4 mb-0" id="wordCount">0</span>
                                            </div>
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.sentence')</p>
                                                <span class="h4 mb-0" id="sentenceCount">0</span>
                                            </div>
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.paragraph')</p>
                                                <span class="h4 mb-0" id="paragraphCount">0</span>
                                            </div>
                                            <div class="col-lg col-md-3 col-sm-4 col-5">
                                                <p class="mb-0">@lang('wordcounter.reading-time')</p>
                                                <span class="h4 mb-0" id="readingTime">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <textarea data-key="{{time()}}" data-autoresize name="name"
                                              placeholder="{{ Lang::get('wordcounter.textarea-placeholder') }}"
                                              rows="15" style="resize:none; overflow:hidden"
                                              class="form-control word-counter-text-area font-size-12px"
                                              id="textarea"></textarea>
                                </div>
                            </div>
                            <div id="local-collection-desktop" class="local-collection word__counter-local">
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
                        <div class="col-md-4 word-counter-result-card-desktop">
                            <div class="card card-custom mb-5">
                                <div class="card-body py-3 px-4">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div
                                            class="wordcounter-background-density wordcounter-background-density-left-edge font-weight-bolder d-flex justify-content-center align-items-center p-2">
                                            @lang('wordcounter.keyword-density')
                                        </div>
                                        <div id="showWords1Desktop"
                                             class="wordcounter-background-density active font-weight-bolder d-flex justify-content-center align-items-center p-2">
                                            1
                                        </div>
                                        <div id="showWords2Desktop"
                                             class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                                            2
                                        </div>
                                        <div id="showWords3Desktop"
                                             class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                                            3
                                        </div>
                                        <div id="showWords4Desktop"
                                             class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                                            4
                                        </div>
                                        <div id="showWords5Desktop"
                                             class="wordcounter-background-density wordcounter-background-density-right-edge font-weight-bolder d-flex justify-content-center align-items-center p-2">
                                            5
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-custom mb-5">
                                <div class="card-body p-5">
                                    <div class="" id="top1">
                                    </div>
                                    <div class="" id="top2">
                                    </div>
                                    <div class="" id="top3">
                                    </div>
                                    <div class="" id="top4">
                                    </div>
                                    <div class="" id="top5">
                                    </div>
                                </div>
                            </div>
                            <div class="word-counter-version-desktop">
                                <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion"
                                     id="accordionExample2">
                                    <div class="card bg-transparent" style="">
                                        <div class="card-header" id="headingOne2">
                                            <div class="card-title collapsed" data-toggle="collapse"
                                                 data-target="#collapseOne2">
                                                @lang('layout.version') 2.0
                                            </div>
                                        </div>
                                        <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                            <div class="card-body">
                                                <p>@lang('wordcounter.highlight')</p>
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
            </div>
            <div class="bg-white p-5 word-counter-result-card-mobile">
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <div
                        class="wordcounter-background-density wordcounter-background-density-left-edge font-weight-bolder d-flex justify-content-center align-items-center p-2">
                        @lang('wordcounter.keyword-density')
                    </div>
                    <div id="showWords1Mobile"
                         class="wordcounter-background-density active font-weight-bolder d-flex justify-content-center align-items-center p-2">
                        1
                    </div>
                    <div id="showWords2Mobile"
                         class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                        2
                    </div>
                    <div id="showWords3Mobile"
                         class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                        3
                    </div>
                    <div id="showWords4Mobile"
                         class="wordcounter-background-density d-flex justify-content-center font-weight-bolder align-items-center p-2">
                        4
                    </div>
                    <div id="showWords5Mobile"
                         class="wordcounter-background-density wordcounter-background-density-right-edge font-weight-bolder d-flex justify-content-center align-items-center p-2">
                        5
                    </div>
                </div>
                <div class="" id="top1Mobile">
                </div>
                <div class="" id="top2Mobile">
                </div>
                <div class="mb-5" id="top3Mobile">
                </div>
                <div class="mb-5" id="top4Mobile">
                </div>
                <div class="mb-5" id="top5Mobile">
                </div>
                <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion"
                     id="accordionExample2">
                    <div class="card bg-transparent" style="">
                        <div class="card-header" id="headingOne2">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                                @lang('layout.version') 2.0
                            </div>
                        </div>
                        <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                            <div class="card-body">
                                <p>@lang('wordcounter.highlight')</p>
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
                        <h2>@lang('wordcounter.desc-1')</h2>
                        <p>@lang('wordcounter.desc-1-1')</p>
                    </div>

                    <div class="d-none" id="description-tab-2">
                        <h2>@lang('wordcounter.desc-2')</h2>
                        <p>@lang('wordcounter.desc-2-1')</p>
                        <ul>
                            <li>@lang('wordcounter.desc-2-1-1')</li>
                            <li>@lang('wordcounter.desc-2-1-2')</li>
                            <li>@lang('wordcounter.desc-2-1-3')</li>
                            <li>@lang('wordcounter.desc-2-1-4')</li>
                            <li>@lang('wordcounter.desc-2-1-5')</li>
                            <li>@lang('wordcounter.desc-2-1-6')</li>
                            <li>@lang('wordcounter.desc-2-1-7')</li>
                        </ul>
                    </div>

                    <div class="d-none" id="description-tab-3">
                        <h2>@lang('wordcounter.desc-3')</h2>
                        <table class="table">
                            <tr>
                                <td scope="col">@lang('wordcounter.desc-3-1')</td>
                                <td>@lang('wordcounter.desc-3-1-1')</td>
                            </tr>
                            <tr>
                                <td scope="col">@lang('wordcounter.desc-3-2')</td>
                                <td>@lang('wordcounter.desc-3-2-1')</td>
                            </tr>
                            <tr>
                                <td scope="col">@lang('wordcounter.desc-3-3')</td>
                                <td>@lang('wordcounter.desc-3-3-1')</td>
                            </tr>
                            <tr>
                                <td scope="col">@lang('wordcounter.desc-3-4')</td>
                                <td>@lang('wordcounter.desc-3-4-1')</td>
                            </tr>
                            <tr>
                                <td scope="col">@lang('wordcounter.desc-3-5')</td>
                                <td>@lang('wordcounter.desc-3-5-1')</td>
                            </tr>
                        </table>
                    </div>

                    <div class="d-none" id="description-tab-4">
                        <h2>@lang('wordcounter.desc-4')</h2>
                        <p>@lang('wordcounter.desc-4-1')</p>
                    </div>

                    <div class="d-none" id="description-tab-5">
                        <h2>@lang('wordcounter.desc-5')</h2>
                        <p>@lang('wordcounter.desc-5-1')</p>
                        <p>@lang('wordcounter.desc-5-2')</p>
                    </div>
                    <div class="d-none" id="description-tab-6">
                        <h2>@lang('wordcounter.desc-6')</h2>
                        <p>@lang('wordcounter.desc-6-1')</p>
                        <p>@lang('wordcounter.desc-6-2')</p>
                        <table class="table">
                            <tr>
                                <td scope="col">@lang('wordcounter.desc-6-3')</td>
                                <td>@lang('wordcounter.desc-6-3-1')</td>
                            </tr>
                            <tr>
                                <td scope="col">@lang('wordcounter.desc-6-4')</td>
                                <td>@lang('wordcounter.desc-6-4-1')</td>
                            </tr>
                            <tr>
                                <td scope="col">@lang('wordcounter.desc-6-5')</td>
                                <td>@lang('wordcounter.desc-6-5-1')</td>
                            </tr>
                        </table>
                        <h3>@lang('wordcounter.desc-6-6-1')</h3>
                        <p>@lang('wordcounter.desc-6-6-1-1')</p>
                        <p>@lang('wordcounter.desc-6-6-1-2')</p>
                        <p>@lang('wordcounter.desc-6-6-1-3')</p>
                        <p>@lang('wordcounter.desc-6-6-1-4')</p>
                        <p>@lang('wordcounter.desc-6-6-1-5')</p>
                        <h3>@lang('wordcounter.desc-6-6-2')</h3>
                        <p>@lang('wordcounter.desc-6-6-2-1')</p>
                        <p>@lang('wordcounter.desc-6-6-2-2')</p>
                    </div>

                    <div class="d-none" id="description-tab-7">
                        <h2>@lang('wordcounter.desc-7')</h2>
                        <p>@lang('wordcounter.desc-7-1')</p>
                        <p>@lang('wordcounter.desc-7-2')</p>
                        <p>@lang('wordcounter.desc-7-3')</p>
                    </div>

                    <div class="d-none" id="description-tab-8">
                        <h2>@lang('wordcounter.desc-8')</h2>
                        <p>@lang('wordcounter.desc-8-1')</p>
                        <p>@lang('wordcounter.desc-8-2')</p>
                        <h3>@lang('wordcounter.desc-8-2-1')</h3>
                        <p>@lang('wordcounter.desc-8-2-1-1')</p>
                        <h3>@lang('wordcounter.desc-8-2-2')</h3>
                        <p>@lang('wordcounter.desc-8-2-2-1')</p>
                        <p>@lang('wordcounter.desc-8-2-2-2')</p>
                        <h3>@lang('wordcounter.desc-8-2-3')</h3>
                        <p>@lang('wordcounter.desc-8-2-3-1')</p>
                        <p>@lang('wordcounter.desc-8-2-3-2')</p>
                        <h3>@lang('wordcounter.desc-8-2-4')</h3>
                        <p>@lang('wordcounter.desc-8-2-4-1')</p>
                    </div>

                    <div class="d-none" id="description-tab-9">
                        <h2>@lang('wordcounter.desc-9')</h2>
                        <p>@lang('wordcounter.desc-9-1')</p>
                    </div>

                    <div class="d-none" id="description-tab-10">
                        <h2>@lang('wordcounter.desc-10')</h2>
                        <p>@lang('wordcounter.desc-10-1')</p>
                    </div>

                    <div class="d-none" id="description-tab-11">
                        <h2>@lang('wordcounter.desc-11')</h2>
                        <p>@lang('wordcounter.desc-11-1')</p>
                        <div class="row">
                            <div class="col-sm-6 mb-5">
                                <div class="card card-word-counter card-custom  card-stretch">
                                    <div class="card-body">
                                        <p class="h4">@lang('wordcounter.desc-11-2')</p>
                                        <p>@lang('wordcounter.desc-11-3')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-5">
                                <div class="card card-word-counter card-custom card-stretch">
                                    <div class="card-body">
                                        <p class="h4">@lang('wordcounter.desc-11-4')</p>
                                        <p>@lang('wordcounter.desc-11-5')</p>
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
                        <a class="">@lang('wordcounter.desc-1')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-2')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-3')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-4')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-5">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-5">5</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-5')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-6">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-6">6</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-6')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-7">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-7">7</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-7')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-8">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-8">8</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-8')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-9">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-9">9</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-9')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-10">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-10">10</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-10')</a>
                    </div>
                    <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-11">
                        <div class="mr-2" style="width:24px !important; height: 24px !important;">
                            <span class="label label-lg label-tools-description" id="nav-label-tab-11">11</span>
                        </div>
                        <a class="">@lang('wordcounter.desc-11')</a>
                    </div>
                </div>
            </div>
            @include('layouts.roboDesc')
            {{--
            <div class="row mb-10">
                <div class="col-md-6">
                    <h2 class="text-black">@lang('layout.feature-title')</h2>
                    <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') <span>@lang('wordcounter.title')</span></p>
                    <p class="text-black">@lang('layout.feature-desc')</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <span class="text-primaryblue">cmlabs Words Counter</span>
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
            <h2 class="text-black">@lang('layout.whats-new-title') <span>@lang('wordcounter.title')</span></h2>
            <div class="row my-5">
                <div class="col-md-6 mb-5">
                    <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch"
                         role="alert" style="background: var(--lightgrey); display:block">
                        <div class="alert-text mb-5">
                            <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span
                                class="label label-dot label-alert-features"></span>
                            <br/>
                            <span class="font-weight-light">@lang('layout.whats-new-update') Mar 15, 2021</span>
                        </div>
                        <!-- <div class="alert-close pt-5 pr-5">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                            </button>
                        </div> -->
                        <span class="alert-features-text">@lang('wordcounter.whats-new-1')</span>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch"
                         role="alert" style="background: var(--lightgrey); display:block">
                        <div class="alert-text mb-5">
                            <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span
                                class="label label-dot label-alert-features"></span>
                            <br/>
                            <span class="font-weight-light">@lang('layout.whats-new-update') Mar 15, 2021</span>
                        </div>
                        <!-- <div class="alert-close pt-5 pr-5">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                            </button>
                        </div> -->
                        <span class="alert-features-text">@lang('wordcounter.whats-new-2')</span>
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
    {{-- <script src="{{asset('js/logic/predifine-localstorage.js')}}"></script>
    <script src="{{asset('js/logic/State.js')}}"></script> --}}
    {{-- <script src="{{asset('js/logic/word-counter.js')}}"></script> --}}
    <script src="{{ mix('js/app/general.js') }} "></script>
    <script src="{{ mix('js/app/helper.js') }}"></script>
    <script src="{{ mix('js/app/tools/word-counter.js') }}"></script>
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
			"name": "Word Counter",
			"item": "{{url('/')}}/{{$local}}/word-counter"
		}]
	}

    </script>
@endpush

@section('word-counter')
    active
@endsection
