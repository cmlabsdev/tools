@extends('layouts.app')

@section('title', Lang::get('sslchecker.meta-title'))

@section('meta-desc', Lang::get('sslchecker.meta-desc'))

@section('meta-keyword', Lang::get('sslchecker.meta-keyword'))

@section('conical','/en/ssl-checker')

@section('en-link')
en/ssl-checker
@endsection

@section('id-link')
id/ssl-checker
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color:#EEF0F8 !important;">
    <li class="breadcrumb-item"><a href="/{{$local}}" class="menu-breadcrumb">Homepage</a></li>
    <li class="breadcrumb-item active" style="color:#2F80ED"><b>SSL Checker</b></li>
  </ol>
</nav>
    <div class="card card-custom mb-5">
        <div class="card-header">
            <div class="card-title">
                <h1 class="card-label">@lang('sslchecker.title')</h1>
                <small>@lang('sslchecker.subtitle')</small>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5 mb-5">
                    <div id="input">
                        <input id="url" type="text" name="" class="form-control" value="" placeholder="@lang('sslchecker.placeholder')">
                    </div>
                </div>
                <div class="col-lg-3 col-xl-2 mb-5">
                    <button id="btn-ssl" type="button" class="btn btn btn-light-info form-control" name="button">
                    <i class="flaticon2-heart-rate-monitor"></i> @lang('sslchecker.copy-1')
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-sticky-container>
        <div class="col-lg-8">
            <div class="card card-custom mb-5" id="result" style="display: none">
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="card-label">@lang('sslchecker.copy-1')</h2>
                    </div>
                </div>
                <div class="card-body">
                    <h3 id="nothing" style="display: none"><i class="fa fa-times-circle text-danger mr-5"></i>@lang('sslchecker.copy-8')</h3>
                    <div class="accordion accordion-light accordion-toggle-arrow" id="accordionExample5">
                        <div class="card">
                            <div class="card-header" id="headingTwo5">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo5">
                                    <i class="fas fa-check text-success"></i> TLS Certificate
                                </div>
                            </div>
                            <div id="collapseTwo5" class="collapse show" data-parent="#accordionExample5">
                                <div class="card-body" id="tls-certificate">
                                    <p>Common Name = tools.cmlabs.co</p>
                                    <p>Subject Alternative Names = tools.cmlabs.co</p>
                                    <p>Issuer = Let's Encrypt Authority X3</p>
                                    <p>Serial Number = 4676161E51F10CE0193E8DD10CB359879F9</p>
                                    <p>SHA1 Thumbprint = DDBF7706688D098176F8242B3842845C1890CE21</p>
                                    <p>Key Length = 2048</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour5">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFour5">
                                    <i id="date-ex" class=""></i> TLS Certificate expiration
                                </div>
                            </div>
                            <div id="collapseFour5" class="collapse" data-parent="#accordionExample5">
                                <div class="card-body">
                                    <p id="date">The certificate expires October 21, 2020 (77 days from today)</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSix5">
                                <div class="card-title collapsed" data-toggle="collapse" id="correct" data-target="#collapseSix5">

                                </div>
                            </div>
                            <div id="collapseSix5" class="collapse" data-parent="#accordionExample5">
                                <div class="card-body">
                                    <p id="congrats">Congratulations! This certificate is correctly installed.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="card-label">@lang('sslchecker.copy-2')</h2>
                    </div>
                </div>
                <div class="card-body">
                    <p>@lang('sslchecker.copy-3')</p>
                    <p>@lang('sslchecker.copy-4')</p>
                </div>
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="card-label">@lang('sslchecker.copy-5')</h2>
                    </div>
                </div>
                <div class="card-body">
                    <p>@lang('sslchecker.copy-6')</p>
                    <p>@lang('sslchecker.copy-7')</p>
                </div>
            </div>
        </div>
        @include('layouts/stickybar')
    </div>
@endsection

@push('script')
    <script src="{{asset('js/logic/trigerEnterButton.js')}}"></script>
    <script src="{{asset('js/logic/sslchecker.js')}}"></script>
@endpush
@section('ssl-checker')
    menu-item-active
@endsection

{{--test--}}
