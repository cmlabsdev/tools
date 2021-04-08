@extends('layouts.app')

@section('title', Lang::get('permutation.meta-title'))

@section('meta-desc', Lang::get('permutation.meta-desc'))

@section('conical','/en/keyword-permutation')

@section('en-link')
en/keyword-permutation
@endsection

@section('id-link')
id/keyword-permutation
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('permutation.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('permutation.sub-title')</span>
            <div class="row mt-10">
                <div class="col-md-4">
                    <div class="card card-custom mb-5">
                        <div class="card-body p-0">
                            <div class="container px-4 pt-3">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 text-black"><strong>Keyword 1</strong> <small>(@lang('permutation.one-per-line'))</small></p>
                                    <p class="mb-0 text-primaryblue"><span id="count-keyword-box1">0</span> keywords</p>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <textarea id="box1" data-autoresize name="name" placeholder="{{ Lang::get('permutation.textarea-placeholder') }}" rows="7" style="resize:none;" class="form-control keyword-permutation-text__area"></textarea>
                        </div>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body p-0">
                            <div class="container px-4 pt-3">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 text-black"><strong>Keyword 2</strong> <small>(@lang('permutation.one-per-line'))</small></p>
                                    <p class="mb-0 text-primaryblue"><span id="count-keyword-box2">0</span> keywords</p>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <textarea id="box2" data-autoresize name="name" placeholder="{{ Lang::get('permutation.textarea-placeholder') }}" rows="7" style="resize:none;" class="form-control keyword-permutation-text__area"></textarea>
                        </div>
                    </div>
                    <div class="card card-custom mb-5">
                        <div class="card-body p-0">
                            <div class="container px-4 pt-3">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 text-black"><strong>Keyword 3</strong> <small>(@lang('permutation.one-per-line'))</small></p>
                                    <p class="mb-0 text-primaryblue"><span id="count-keyword-box3">0</span> keywords</p>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <textarea id="box3" data-autoresize name="name" placeholder="{{ Lang::get('permutation.textarea-placeholder') }}" rows="7" style="resize:none;" class="form-control keyword-permutation-text__area"></textarea>
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
                                        <p>@lang('permutation.highlight')</p>
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
                <div class="col-md-8">
                    <div class="card card-custom mb-5">
                        <div class="card-body px-3 pt-3 pb-0">
                            <div class="row">
                                <div class="col-md-7 col-lg-8 mb-3">
                                    <select id="option" class="form-control picker" name="">
                                        <option value="normal">@lang('permutation.broad-match')</option>
                                        <option value="quotes">@lang('permutation.phrase-match')</option>
                                        <option value="square">@lang('permutation.exact-match')</option>
                                    </select>
                                </div>
                                <div class="col-md-5 col-lg-4 mb-3">
                                        <button id="generator" type="button" class="btn btn-generate-permutation btn-block" name="button">@lang('permutation.permutation-btn')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom">
                        <div class="card-body p-0">
                            <div class="container px-4 pt-3">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="mb-0 text-black mr-2"><strong>@lang('permutation.permutation-result')</strong></p>                                        
                                        <small id="copy-text" class="mb-0 mx-2 text-darkgrey text-hover-underline">@lang('permutation.copy-btn')</small>
                                        <small id="reset" class="mb-0 mx-2 text-darkgrey text-hover-underline">@lang('permutation.clear-btn')</small>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0 text-primaryblue"><span id="count-keyword">0</span> keywords</p>

                                    </div>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <textarea id="permutation-textarea-result" data-autoresize name="name" placeholder="{{ Lang::get('permutation.textarea-result-placeholder') }}" rows="25" style="resize:none;" class="form-control keyword-permutation-text__area"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-100">
    <div class="local-collection-mobile bg-white py-5">
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('permutation.highlight')</p>
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
                    <h2 class="text-black">@lang('permutation.desc-1')</h2>
                    <p class="text-black">@lang('permutation.desc-1-1')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2 class="text-black">@lang('permutation.desc-2')</h2>
                    <p class="text-black">@lang('permutation.desc-2-1')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2 class="text-black">@lang('permutation.desc-3')</h2>
                    <p class="text-black">@lang('permutation.desc-3-1')</p>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2 class="text-black">@lang('permutation.desc-4')</h2>
                    <p class="text-black">@lang('permutation.desc-4-1')</p>
                </div>
                <div class="d-none" id="description-tab-5">
                    <h2 class="text-black">@lang('permutation.desc-5')</h2>
                    <p class="text-black">@lang('permutation.desc-5-1')</p>
                </div>
                <div class="d-none" id="description-tab-6">
                    <h2 class="text-black">@lang('permutation.desc-6')</h2>
                    <p class="text-black">@lang('permutation.desc-6-1')</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('permutation.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('permutation.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('permutation.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('permutation.desc-4')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-5">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-5">5</span>
                    </div>
                    <a class="">@lang('permutation.desc-5')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-6">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-6">6</span>
                    </div>
                    <a class="">@lang('permutation.desc-6')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{--
        <div class="row mb-10">
            <div class="col-md-6">
                <h2 class="text-black">@lang('layout.feature-title')</h2>
                <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') @lang('permutation.title')</p>
                <p class="text-black">@lang('permutation.feature-desc')</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <span class="text-primaryblue">cmlabs Technology Lookup</span>
                    <span class="bx bxs-check-circle ml-5 mr-1 text-primaryblue"></span>
                    <small class="text-grey">@lang('layout.updated') 25 Dec, 2020</small>
                </div>
                <p class="font-weight-bold mt-3">@lang('permutation.feature-sub-title')</p>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes12" /><span></span>&nbsp;&nbsp;<bdi>@lang('permutation.feature-1')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features mb-1"><input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes13" /><span></span>&nbsp;&nbsp;<bdi>@lang('permutation.feature-2')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('permutation.feature-3')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('permutation.feature-4')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('permutation.feature-5')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('permutation.feature-6')</bdi></label>
                <label class="checkbox checkbox-disabled checkbox-features features-disabled mb-1"><input type="checkbox" disabled="disabled" name="Checkboxes14" /><span></span>&nbsp;&nbsp;<bdi>@lang('permutation.feature-7')</bdi></label>
            </div>
        </div>
        --}}
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('permutation.title')</h2>
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
                    <span class="alert-features-text">@lang('permutation.whats-new-1')</span>
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
                    <span class="alert-features-text">@lang('permutation.whats-new-2')</span>
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
<script src="{{asset('/js/logic/keyword-permutation.js')}}"></script>
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
    $("#copy-text").click(function () {
        const textarea = $('#permutation-textarea-result');
        textarea.select();
        document.execCommand("copy");
        toastr.info('Copied to Clipboard', 'Information');
    });
    $("#reset").click(function () {
        const textarea = $('#permutation-textarea-result');
        textarea.val('');
    });
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
            "name": "Keyword Permutation",
            "item": "{{url('/')}}/{{$local}}/keyword-permutation"
        }]
    }
</script>
@endpush

@section('keyword-permutation')
active
@endsection

@section('test-n-checker')
active
@endsection
