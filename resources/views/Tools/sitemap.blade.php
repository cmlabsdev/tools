@extends('layouts.app')

@section('title', Lang::get('sitemap.meta-title'))

@section('meta-desc', Lang::get('sitemap.meta-desc'))

@section('meta-keyword', Lang::get('sitemap.meta-keyword'))

@section('conical','/en/sitemap-generator')

@section('en-link')
en/sitemap-generator
@endsection

@section('id-link')
id/sitemap-generator
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color:#EEF0F8 !important;">
    <li class="breadcrumb-item"><a href="/{{$local}}" class="menu-breadcrumb">Homepage</a></li>
    <li class="breadcrumb-item active" style="color:#2F80ED"><b>Sitemap Generator</b></li>
  </ol>
</nav>
<div class="card card-custom gutter-b">
  <div class="card-header">
    <div class="card-title">
      <h1 class="card-label">SITEMAP GENERATOR </h1>
      <small>@lang('sitemap.sub-title')</small>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-5 gutter-b">
        <div class="" id="spin">
          <input id="url" type="text" class="form-control" name="" value="" placeholder="@lang('sitemap.input-hint')">
        </div>
      </div>
      <div class="col-lg-3 col-xl-3 col-xxl-2 gutter-b">
        <button type="button" class="btn btn btn-light-info  form-control" name="button" id="generate">
        <i class="flaticon2-heart-rate-monitor"></i> @lang('sitemap.btn-generate')</button>
      </div>
    </div>
    <center>
      <div class="col-sm-12 col-md-6 col-lg-5" id="add" style="display:none">
        <img id="screeshoot" src="https://cmlabs.co/wp-content/uploads/2020/06/mural-cmlabs.jpg" width="100%" class="gutter-b" alt="mural cmlabs">
      </div>
    </center>
{{--    <div class="progress mb-2" style="height:20px">--}}
{{--      <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="progress-bar">0%</div>--}}
{{--    </div>--}}
{{--    <center><span id="detail-progress">0 of 0 Pages Crawled</span></center>--}}
  </div>
</div>
<div class="card card-custom gutter-b" id="table" style="display:none">
  <div class="card-header">
    <div class="card-title">
      <h2 class="card-label">@lang('sitemap.result-title')</h2>
    </div>
  </div>
  <div class="card-body">
    <button id="download" type="button" class="btn btn-info" name="button">@lang('sitemap.btn-download')</button>
    <table class="table table-striped" id="url-table">
      <thead>
        <tr>
          <th scope="col" width="70px">Page #</th>
          <th scope="col">URL</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>
<div class="row" data-sticky-container>
  <div class="col-lg-8 mb-5">
    <div class="card card-custom">
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('sitemap.copy-title-1')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('sitemap.copy-1-1')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('sitemap.copy-title-2')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('sitemap.copy-2-1')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('sitemap.copy-title-3')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('sitemap.copy-3-1')</p>
        <p>@lang('sitemap.copy-3-2')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('sitemap.copy-title-4')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('sitemap.copy-4-1')</p>
        <p>@lang('sitemap.copy-4-2')</p>
        <p>@lang('sitemap.copy-4-3')</p>
        <p>@lang('sitemap.copy-4-4')</p>
        <p>@lang('sitemap.copy-4-5')</p>
        <p>@lang('sitemap.copy-4-6')</p>
        <p>@lang('sitemap.copy-4-7')</p>
        <p>@lang('sitemap.copy-4-8')</p>
        <p>@lang('sitemap.copy-4-9')</p>
        <p>@lang('sitemap.copy-4-10')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('sitemap.copy-title-5')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('sitemap.copy-5-1')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('sitemap.copy-title-6')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('sitemap.copy-6-1')</p>
        <p>@lang('sitemap.copy-6-2')</p>
      </div>
    </div>
  </div>
  @include('layouts/stickybar')
</div>


@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x2js/1.2.0/xml2json.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script>
  const token = "{{csrf_token()}}"
</script>
<script src="{{asset('js/logic/download.js')}}"></script>
<script src="{{asset('js/logic/vkbeautify.0.99.00.beta.js')}}"></script>
<script src="{{asset('js/logic/trigerEnterButton.js')}}"></script>
<script src="{{asset('js/logic/sitemap.js')}}"></script>
@endpush

@section('sitemap')
menu-item-active
@endsection
