@extends('layouts.app')

@section('title', Lang::get('pagespeed.meta-title'))

@section('meta-desc', Lang::get('pagespeed.meta-desc'))

@section('meta-keyword', Lang::get('pagespeed.meta-keyword'))

@section('conical','/en/page-speed')

@section('en-link')
en/page-speed
@endsection

@section('id-link')
id/page-speed
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color:#EEF0F8 !important;">
    <li class="breadcrumb-item"><a href="/{{$local}}" class="menu-breadcrumb">Homepage</a></li>
    <li class="breadcrumb-item active" style="color:#2F80ED"><b>Page Speed</b></li>
  </ol>
</nav>
<div class="card card-custom gutter-b">
  <div class="card-header">
    <div class="card-title">
      <h1 class="card-label">@lang('pagespeed.title') </h1>
      <small>@lang('pagespeed.subtitle')</small>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-5 mb-5">
        <div id="spinner">
          <input type="text" name="" class="form-control" value="" id="url" placeholder="@lang('pagespeed.input-hint')">
        </div>
      </div>
      <div class="col-lg-3 col-xl-2 mb-5">
        <button type="button" class="btn btn btn-light-info form-control" name="button" id="analysis-button">
        <i class="flaticon2-heart-rate-monitor"></i> @lang('pagespeed.btn-analysis')</button>
      </div>
    </div>
  </div>
</div>
<div class="card card-custom gutter-b">
  <div class="card-header p-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-5 col-md-4 col-lg col-xl">
          <a href="#result" id="nav-performance">
            <div class="progress performance" data-percentage="0">
              <span class="progress-left">
                <span class="progress-bar progress-bar-performance"></span>
              </span>
              <span class="progress-right">
                <span class="progress-bar progress-bar-performance"></span>
              </span>
              <div class="progress-value" style="width:100%">
                <div class="value-performance">
                  0%
                </div>
              </div>
            </div>
            <h2 class="font-weight-bold text-center mb-4 h6">@lang('pagespeed.performance')</h2>
          </a>
        </div>



        <div class="col-12 col-sm-5 col-md-4 col-lg col-xl">
          <a href="#result" id="nav-accessibility">
            <div class="progress accessibility" data-percentage="0">
              <span class="progress-left">
                <span class="progress-bar progress-bar-accessibility"></span>
              </span>
              <span class="progress-right">
                <span class="progress-bar progress-bar-accessibility"></span>
              </span>
              <div class="progress-value" style="width:100%">
                <div class="value-accessibility">
                  0%
                </div>
              </div>
            </div>
            <h2 class=" font-weight-bold text-center mb-4 h6">@lang('pagespeed.accessibility')</h2>
          </a>
        </div>



        <div class="col-12 col-sm-5 col-md-4 col-lg col-xl">
          <a href="#result" id="nav-best-practices">
            <div class="progress best-practices" data-percentage="0">
              <span class="progress-left">
                <span class="progress-bar progress-bar-best-practices"></span>
              </span>
              <span class="progress-right">
                <span class="progress-bar progress-bar-best-practices"></span>
              </span>
              <div class="progress-value" style="width:100%">
                <div class="value-best-practices">
                  0%
                </div>
              </div>
            </div>
            <h2 class=" font-weight-bold text-center mb-4 h6">@lang('pagespeed.practice')</h2>
          </a>
        </div>



        <div class="col-12 col-sm-5 col-md-4 col-lg col-xl">
          <a href="#result" id="nav-seo">
            <div class="progress seo" data-percentage="0">
              <span class="progress-left">
                <span class="progress-bar progress-bar-seo"></span>
              </span>
              <span class="progress-right">
                <span class="progress-bar progress-bar-seo"></span>
              </span>
              <div class="progress-value" style="width:100%">
                <div class="value-seo">
                  0%
                </div>
              </div>
            </div>
            <h2 class=" font-weight-bold text-center mb-4 h6">@lang('pagespeed.seo')</h2>
          </a>
        </div>



        <div class="col-12 col-sm-5 col-md-4 col-lg col-xl">
          <a href="#result" id="nav-pwa">
            <div class="progress pwa" data-percentage="0">
              <span class="progress-left">
                <span class="progress-bar progress-bar-pwa"></span>
              </span>
              <span class="progress-right">
                <span class="progress-bar progress-bar-pwa"></span>
              </span>
              <div class="progress-value" style="width:100%">
                <div class="value-pwa">
                  0%
                </div>
              </div>

            </div>
            <h2 class=" font-weight-bold text-center mb-4 h6">@lang('pagespeed.pwa')</h2>
          </a>
        </div>


      </div>
    </div>

  </div>
  <div class="card-body">
    <div class="row justify-content-center mb-5">
      <table class="border border-secondary-5">
        <tbody id="result">
          <tr>
            <td style="width:100px; text-align:right"><span class="mb-1 mr-3" style="display: inline-block; width:30%; border-top:4px solid #F64E60; text-align:center"></span>
              0-49
            </td>
            <td style="width:100px; text-align:right"><span class="mb-1 mr-3" style="display: inline-block; width:30%; border-top:4px solid #FFA800; text-align:center"></span>
              50-89
            </td>
            <td style="width:100px; text-align:right"><span class="mb-1 mr-3" style="display: inline-block; width:30%; border-top:4px solid #1BC5BD; text-align:center"></span>
              90-100
            </td>
            <td style="width:20px"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

{{--Performance--}}
<div class="card card-custom gutter-b " id="performance">
  <div class="ribbon ribbon-top">
    <div class="ribbon-target" id="ribbon-performance" style="top: -2px; right: 20px;">PERFORMANCE</div>
  </div>
  <div class="card-body pt-25">
    <div class="col">
      <div class="progress performance" data-percentage="0">
        <span class="progress-left">
          <span class="progress-bar progress-bar-performance"></span>
        </span>
        <span class="progress-right">
          <span class="progress-bar progress-bar-performance"></span>
        </span>
        <div class="progress-value" style="width:100%">
          <div class="value-performance">
            0%
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

{{--accessibility--}}
<div class="card card-custom gutter-b " id="accessibility" style="display:none">
  <div class="ribbon ribbon-top">
    <div class="ribbon-target" id="ribbon-accessibility" style="top: -2px; right: 20px;">ACCESSIBILITY</div>
  </div>
  <div class="card-body pt-25">
    <div class="col">
      <div class="progress accessibility" data-percentage="0">
        <span class="progress-left">
          <span class="progress-bar progress-bar-accessibility"></span>
        </span>
        <span class="progress-right">
          <span class="progress-bar progress-bar-accessibility"></span>
        </span>
        <div class="progress-value" style="width:100%">
          <div class="value-accessibility">
            0%
          </div>
        </div>
      </div>
      <!-- END -->
      <!-- <h6 class=" font-weight-bold text-center mb-4">ACCESIBILITY</h6> -->
    </div>
    <div class="">
      <div class="accordion accordion-light accordion-toggle-arrow accessibility-audit" id="accessibility-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow pass-accessibility-audit" id="pass-accessibility-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow not-app-accessibility-audit" id="not-app-accessibility-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow manual-accessibility-audit" id="manual-accessibility-audit"></div>
    </div>
  </div>
</div>

{{--best practice--}}
<div class="card card-custom gutter-b " id="best-practices" style="display:none">
  <div class="ribbon ribbon-top">
    <div class="ribbon-target" id="ribbon-best-practices" style="top: -2px; right: 20px;">BEST PRACTICES</div>
  </div>
  <div class="card-body pt-25">
    <div class="col">
      <div class="progress best-practices" data-percentage="0">
        <span class="progress-left">
          <span class="progress-bar progress-bar-best-practices"></span>
        </span>
        <span class="progress-right">
          <span class="progress-bar progress-bar-best-practices"></span>
        </span>
        <div class="progress-value" style="width:100%">
          <div class="value-best-practices">
            60%
          </div>
        </div>
      </div>
      <!-- END -->
      <!-- <h6 class=" font-weight-bold text-center mb-4">BEST PRACTICES</h6> -->
    </div>
    <div class="">
      <div class="accordion accordion-light accordion-toggle-arrow best-practices-audit" id="best-practices-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow pass-best-practices-audit" id="pass-best-practices-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow not-app-best-practices-audit" id="not-app-best-practices-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow manual-best-practices-audit" id="manual-best-practices-audit"></div>
    </div>
  </div>
</div>

{{--seo--}}
<div class="card card-custom gutter-b " id="seo" style="display:none">
  <div class="ribbon ribbon-top">
    <div class="ribbon-target" id="ribbon-seo" style="top: -2px; right: 20px;">SEO</div>
  </div>
  <div class="card-body pt-25">
    <div class="col">
      <div class="progress seo" data-percentage="0">
        <span class="progress-left">
          <span class="progress-bar progress-bar-seo"></span>
        </span>
        <span class="progress-right">
          <span class="progress-bar progress-bar-seo"></span>
        </span>
        <div class="progress-value" style="width:100%">
          <div class="value-seo">
            0%
          </div>
        </div>
      </div>
      <!-- END -->
      <!-- <h6 class=" font-weight-bold text-center mb-4">SEO</h6> -->
    </div>
    <div class="">
      <div class="accordion accordion-light accordion-toggle-arrow seo-audit" id="seo-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow pass-pwa-audit" id="pass-seo-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow not-app-pwa-audit" id="not-app-seo-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow manual-pwa-audit" id="manual-seo-audit"></div>
    </div>
  </div>
</div>

{{--pwa--}}
<div class="card card-custom gutter-b " id="pwa" style="display:none">
  <div class="ribbon ribbon-top">
    <div class="ribbon-target" id="ribbon-pwa" style="top: -2px; right: 20px;">PWA</div>
  </div>
  <div class="card-body pt-25">
    <div class="col">
      <div class="progress pwa" data-percentage="0">
        <span class="progress-left">
          <span class="progress-bar progress-bar-pwa"></span>
        </span>
        <span class="progress-right">
          <span class="progress-bar progress-bar-pwa"></span>
        </span>
        <div class="progress-value" style="width:100%">
          <div class="value-pwa">
            0%
          </div>
        </div>
      </div>
      <!-- <h6 class=" font-weight-bold text-center mb-4">PWA</h6> -->
    </div>
    <div class="">
      <div class="accordion accordion-light accordion-toggle-arrow pwa-audit" id="pwa-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow pass-pwa-audit" id="pass-pwa-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow not-app-pwa-audit" id="not-app-pwa-audit"></div>
      <div class="accordion accordion-light accordion-toggle-arrow manual-pwa-audit" id="manual-pwa-audit"></div>
    </div>
  </div>
</div>




<div class="row" data-sticky-container>
  <div class="col-lg-8 mb-5">
    <div class="card card-custom">
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-0')</h2>
        </div>
      </div>
      <div class="card-body">
        @lang('pagespeed.copy-1')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-2')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('pagespeed.copy-3')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-4')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('pagespeed.copy-5')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-6')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('pagespeed.copy-7')</p>
        <table class="table">
          <tbody>
            <tr>
              <th scope="col"></th>
              <th scope="col">@lang('pagespeed.copy-8')</th>
              <th scope="col">@lang('pagespeed.copy-9')</th>
              <th scope="col">@lang('pagespeed.copy-10')</th>
            </tr>
            <tr>
              <th scope="row">@lang('pagespeed.copy-11')</th>
              <td>@lang('pagespeed.copy-12')</td>
              <td>@lang('pagespeed.copy-13')</td>
              <td>@lang('pagespeed.copy-14')</td>
            </tr>
            <tr>
              <th scope="row">@lang('pagespeed.copy-15')</th>
              <td>@lang('pagespeed.copy-16')</td>
              <td>@lang('pagespeed.copy-17')</td>
              <td>@lang('pagespeed.copy-18')</td>
            </tr>
            <tr>
              <th scope="row">@lang('pagespeed.copy-19')</th>
              <td>@lang('pagespeed.copy-20')</td>
              <td>@lang('pagespeed.copy-21')</td>
              <td>@lang('pagespeed.copy-22')</td>
            </tr>
            <tr>
              <th scope="row">@lang('pagespeed.copy-23')</th>
              <td>@lang('pagespeed.copy-24')</td>
              <td>@lang('pagespeed.copy-25')</td>
              <td>@lang('pagespeed.copy-26')</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-27')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('pagespeed.copy-28')</p>
        <p>@lang('pagespeed.copy-29')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-33')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('pagespeed.copy-34')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-35')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('pagespeed.copy-36')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-61')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('pagespeed.copy-37')</p>
        <p>@lang('pagespeed.copy-38')</p>
        <ul>
          <li>@lang('pagespeed.copy-39')
            <div class="btn btn-icon btn-circle bg-success" style="height:15px; width:15px">
            </div>
          </li>
          <li>@lang('pagespeed.copy-40')
            <div class="btn btn-icon btn-circle bg-warning" style="height:15px; width:15px">
            </div>
          </li>
          <li>@lang('pagespeed.copy-41')
            <div class="btn btn-icon btn-circle bg-danger" style="height:15px; width:15px">
            </div>
          </li>
        </ul>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-42')</h2>
        </div>
      </div>
      <div class="card-body">
        @lang('pagespeed.copy-43')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('pagespeed.copy-44')</h2>
        </div>
      </div>
      <div class="card-body">
        <div class="accordion accordion-toggle-arrow" id="accordionExample1">
          <div class="card">
            <div class="card-header">
              <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                @lang('pagespeed.copy-45')
              </div>
            </div>
            <div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
              <div class="card-body">
                @lang('pagespeed.copy-46')
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo1">
                @lang('pagespeed.copy-47')
              </div>
            </div>
            <div id="collapseTwo1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body">
                @lang('pagespeed.copy-48')
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree1">
                @lang('pagespeed.copy-49')
              </div>
            </div>
            <div id="collapseThree1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body">
                @lang('pagespeed.copy-50')
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFour1">
                @lang('pagespeed.copy-51')
              </div>
            </div>
            <div id="collapseFour1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body">
                @lang('pagespeed.copy-52')
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFive1">
                @lang('pagespeed.copy-53')
              </div>
            </div>
            <div id="collapseFive1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body">
                @lang('pagespeed.copy-54')
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseSix1">
                @lang('pagespeed.copy-55')
              </div>
            </div>
            <div id="collapseSix1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body">
                @lang('pagespeed.copy-56')
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseSeven1">
                @lang('pagespeed.copy-57')
              </div>
            </div>
            <div id="collapseSeven1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body">
                @lang('pagespeed.copy-58')
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseEight1">
                @lang('pagespeed.copy-59')
              </div>
            </div>
            <div id="collapseEight1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body">
                @lang('pagespeed.copy-60')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts/stickybar')
</div>

@endsection

@push('style')
<link rel="stylesheet" href="{{asset('css/pagespeed.css')}}">
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.1/showdown.min.js"></script>
@endpush

@push('script')
<script src="{{asset('js/logic/trigerEnterButton.js')}}"></script>
<script src="{{asset('js/logic/pagespeed.js')}}"></script>
@endpush

@section('page-speed')
menu-item-active
@endsection
