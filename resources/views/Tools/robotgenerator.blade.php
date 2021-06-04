@extends('layouts.app')

@section('title', Lang::get('robot.meta-title'))

@section('meta-desc', Lang::get('robot.meta-desc'))

@section('conical','/en/robotstxt-generator')

@section('en-link','/en/robotstxt-generator')

@section('id-link','/id/robotstxt-generator')

@section('content')
@if ($is_maintenance)
    @include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('robot.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('robot.subtitle')</span>
            <div class="card card-custom mb-5 mt-10">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="" id="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="robotAccess" class="text-black font-weight-bold">@lang('robot.label-robot-access')</label>
                                            <select class="form-control" name="" id="robotAccess">
                                                <option value="" disabled selected>@lang('robot.placeholder-robot-access')</option>
                                                <option value="Allow">@lang('robot.robot-access-opt-1')</option>
                                                <option value="Disallow">@lang('robot.robot-access-opt-2')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="crawlDelay" class="text-black font-weight-bold">@lang('robot.label-crawl-delay')</label>
                                            <select class="form-control" name="" id="crawlDelay">
                                                <option value="" disabled selected>@lang('robot.placeholder-crawl-delay')</option>
                                                <option value="">@lang('robot.crawl-delay-opt-1')</option>
                                                <option value="5">@lang('robot.crawl-delay-opt-2')</option>
                                                <option value="10">@lang('robot.crawl-delay-opt-3')</option>
                                                <option value="20">@lang('robot.crawl-delay-opt-4')</option>
                                                <option value="60">@lang('robot.crawl-delay-opt-5')</option>
                                                <option value="120">@lang('robot.crawl-delay-opt-6')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sitemap" class="text-black font-weight-bold">@lang('robot.label-sitemap')</label>
                                            <span class="text-darkgrey">@lang('robot.label-sitemap-helper')</span>
                                            <input type="text" id="sitemap" class="form-control" name="" value="" placeholder="https://example.com/sitemap.xml">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="d-none text-black font-weight-bold" for="" id="directive-title">@lang('robot.label-directive')</label>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-add-question d-flex align-items-center justify-content-center" name="button" id="add">
                                <i class='bx bx-plus'></i>
                                <span id="add-directive">@lang('robot.btn-add')</span>
                                <span class="d-none" id="add-more-directive">@lang('robot.btn-add')</span>
                            </button>
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
                                            <button type="button" id="export" class="btn font-weight-bold " name="button">
                                                <i class='bx bx-download'></i> <span>@lang('layout.btn-export')</span></button>
                                        </div>
                                        <div class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" id="reset" class="btn font-weight-bold" name="button">
                                                <i class='bx bx-refresh'></i> <span>@lang('layout.btn-reset')</span></button>
                                        </div>
                                    </div>
                                    <textarea name="code_snippet" style="resize:none" rows="16" class="form-control" id="json-format" readonly></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {{--<div id="local-collection-desktop" class="local-collection">--}}
                        {{--<div class="local-collection-header d-flex justify-content-between px-2 mb-3">--}}
                            {{--<div class="d-flex flex-row align-items-center">--}}
                                {{--<i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>--}}
                                {{--<span class="text-black font-15px">@lang('layout.local-history')</span>--}}
                            {{--</div>--}}
                            {{-- <div> --}}
                                {{-- <span class="clear-all font-15px pointer clear-history--btn">@lang('layout.clear-all')</span> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- <div class="local-collection-body"> --}}
                            {{-- <ul class="list-group" id="local-history"> --}}
                            {{-- </ul> --}}
                        {{-- </div> --}}
                    {{-- </div> --}}
                </div>
                <div class="col-md-4">
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne2">
                                    <div class="card-title collapsed pt-0" data-toggle="collapse" data-target="#collapseOne2">
                                        @lang('layout.version') 2.0
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('robot.highlight')</p>
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
        {{-- <div class="local-collection-header d-flex justify-content-between mb-3 w-100 px-5"> --}}
            {{-- <div class="d-flex flex-row align-items-center"> --}}
                {{-- <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i> --}}
                {{-- <span class="text-black font-15px">@lang('layout.local-history')</span> --}}
            {{-- </div> --}}
            {{-- <div> --}}
                {{-- <span class="clear-all font-15px pointer clear-history--btn">@lang('layout.clear-all')</span> --}}
            {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div class="local-collection-body mt-3 px-5" id="local-history-mobile"></div> --}}
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 2.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('robot.highlight')</p>
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
                    <h2>@lang('robot.desc-1')</h2>
                    <p>@lang('robot.desc-1-1')</p>
                    <p>@lang('robot.desc-1-2')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('robot.desc-2')</h2>
                    <p>@lang('robot.desc-2-1')</p>
                    <p>@lang('robot.desc-2-2')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('robot.desc-3')</h2>
                    <p>@lang('robot.desc-3-1')</p>
                    <p>@lang('robot.desc-3-2')</p>
                    <p>@lang('robot.desc-3-3')</p>
                    <p>@lang('robot.desc-3-4')</p>
                    <p>@lang('robot.desc-3-5')</p>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2>@lang('robot.desc-4')</h2>
                    <p>@lang('robot.desc-4-1')</p>
                    <p>@lang('robot.desc-4-2')</p>
                </div>
                <div class="d-none" id="description-tab-5">
                    <h2>@lang('robot.desc-5')</h2>
                    <p>@lang('robot.desc-5-1')</p>
                    <ol>
                        <li>@lang('robot.desc-5-1-1')</li>
                        <li>@lang('robot.desc-5-1-2')</li>
                        <li>@lang('robot.desc-5-1-3')</li>
                        <li>@lang('robot.desc-5-1-4')</li>
                    </ol>
                    <p>@lang('robot.desc-5-2')</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('robot.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('robot.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('robot.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('robot.desc-4')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-5">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-5">5</span>
                    </div>
                    <a class="">@lang('robot.desc-5')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{--
        <div class="row mb-10">
            <div class="col-md-6">
                <h2 class="text-black">@lang('layout.feature-title') @lang('robot.title')</h2>
                <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title')</p>
                <p class="text-black">@lang('layout.feature-desc')</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="text-primaryblue">cmlabs Robot.txt Generator</span>
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
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('robot.title')</h2>
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
                    <span class="alert-features-text">@lang('robot.whats-new-1')</span>
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
                    <span class="alert-features-text">@lang('robot.whats-new-2')</span>
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
{{-- <script src="{{asset('js/logic/robotgenerator.js')}}"></script> --}}
<script src="{{ mix('js/app/general.js') }}"></script>
<script src="{{ mix('js/app/tools/robotgenerator.js') }}"></script>
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
            "name": "Robot.txt Generator",
            "item": "{{url('/')}}/{{$local}}/robotstxt-generator"
        }]
    }
</script>
@endpush

@section('robotstxt-generator')
active
@endsection

@section('generator')
active
@endsection
