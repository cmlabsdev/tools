@extends('layouts.app')

@section('title', 'JSON-LD Schema Generator')

@section('meta-desc', 'JSON-LD Schema Generator')

@section('en-link')
en/json-ld-schema-generator
@endsection
@section('id-link')
id/json-ld-schema-generator
@endsection
@push('style')
<style media="screen">
.bx-lg {
  font-size: 3rem !important;
  margin-bottom: 0.5rem;
}

.btn-launch {
  background: white;
  font-weight: bold;
  border: 1px solid var(--darkgrey);
  color: var(--darkgrey);
}

.btn-launch:hover {
  background: white !important;
  border: 1px solid white !important;
  color: var(--primaryblue) !important;
}

.card-home{
  transition: 0.2s;
}

.card-home:hover {
  transition: 0.2s;
  background: var(--primaryblue);
}

.card-home:hover i, .card-home:hover h2, .card-home:hover p  {
  color :white;
}

.card-home:hover .btn-launch {
  background: var(--primaryblue);
  color:white;
  border: 1px solid white;
}
</style>
@endpush
@section('content')

<div class="container container-tools mb-10">
  <div class="d-flex flex-column-fluid">
    <div class="container-fluid px-0">
      <div class="text-center">
        <h1 class="text-black font-weight-light">JSON-LD SCHEMA GENERATOR</h1>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <p class="text-black font-weight-light">JSON-LD SCHEMA GENERATOR is a special tool created by CMLABS to facilitate SEO writers to add schema.org markup to their content.</p>
          </div>
        </div>
      </div>
      <div class="mt-10 row">
        <div class="col-6 col-md-3 mb-8">
          <div class="card card-custom card-stretch card-home">
            <div class="card-body p-7">
              <div class="">
                <i class='bx bxs-chevron-right-square bx-lg text-darkgrey'></i>
                <h2 class="h6 text-darkgrey font-weight-bolder">Breadcrumb</h2>
                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-breadcrumb-desc')</p>
              </div>
            </div>
            <div class="card-footer text-right border-top-0 pt-0">
              <a href="/{{ $local }}/json-ld-breadcrumb-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3 mb-8">
          <div class="card card-custom card-stretch card-home">
            <div class="card-body p-7">
              <div class="">
                <i class='bx bxs-help-circle text-darkgrey bx-lg'></i>
                <h2 class="h6 text-darkgrey font-weight-bolder">FAQ Page</h2>
                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-faq-desc')</p>
              </div>
            </div>
            <div class="card-footer text-right border-top-0 pt-0">
              <a href="/{{ $local }}/json-ld-faq-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3 mb-8">
          <div class="card card-custom card-stretch card-home">
            <div class="card-body p-7">
              <div class="">
                <i class='bx bx-list-check text-darkgrey bx-lg'></i>
                <h2 class="h6 text-darkgrey font-weight-bolder">How-to</h2>
                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-howto-desc')</p>
              </div>
            </div>
            <div class="card-footer text-right border-top-0 pt-0">
              <a href="/{{ $local }}/json-ld-how-to-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3 mb-8">
          <div class="card card-custom card-stretch card-home">
            <div class="card-body p-7">
              <div class="">
                <i class='bx bxs-briefcase text-darkgrey bx-lg' ></i>
                <h2 class="h6 text-darkgrey font-weight-bolder">Job Posting</h2>
                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-jobposting-desc')</p>
              </div>
            </div>
            <div class="card-footer text-right border-top-0 pt-0">
              <a href="/{{ $local }}/json-ld-job-posting-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3 mb-8">
          <div class="card card-custom card-stretch card-home">
            <div class="card-body p-7">
              <div class="">
                <i class='bx bxs-user text-darkgrey bx-lg'></i>
                <h2 class="h6 text-darkgrey font-weight-bolder">Person</h2>
                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-person-desc')</p>
              </div>
            </div>
            <div class="card-footer text-right border-top-0 pt-0">
              <a href="/{{ $local }}/json-ld-person-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3 mb-8">
          <div class="card card-custom card-stretch card-home">
            <div class="card-body p-7">
              <div class="">
                <i class='bx bxs-purchase-tag text-darkgrey bx-lg' ></i>
                <h2 class="h6 text-darkgrey font-weight-bolder">Product</h2>
                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-product-desc')</p>
              </div>
            </div>
            <div class="card-footer text-right border-top-0 pt-0">
              <a href="/{{ $local }}/json-ld-product-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3 mb-8">
          <div class="card card-custom card-stretch card-home">
            <div class="card-body p-7">
              <div class="">
                <i class='bx bxs-receipt text-darkgrey bx-lg'></i>
                <h2 class="h6 text-darkgrey font-weight-bolder">Recipe</h2>
                <p class="text-darkgrey mb-0">@lang('jsonldhome.json-ld-recipe-desc')</p>
              </div>
            </div>
            <div class="card-footer text-right border-top-0 pt-0">
              <a href="/{{ $local }}/json-ld-recipe-schema-generator" type="button" class="btn btn-launch" name="button">LAUNCH</a>
            </div>
          </div>
        </div>

      </div>
      <div class="d-flex align-items-center">
        <i class='bx bxs-check-circle text-darkgrey mr-1' ></i>
        <span class="text-darkgrey">@lang('layout.whats-new-update') 1 Nov, 2020   |   @lang('layout.version') 1.7</span>
      </div>
    </div>
  </div>
</div>


<div class="" style="background:white">
  <div class="container container-description">
    <div class="row">
      <div class="col-md-9">
        <div class="" id="description-tab-1">
          <h2>@lang('jsonldhome.desc-1')</h2>
          <p>@lang('jsonldhome.desc-1-1')</p>
          <p>@lang('jsonldhome.desc-1-2')</p>
          <p>@lang('jsonldhome.desc-1-3')</p>
          <p>@lang('jsonldhome.desc-1-3-1')</p>
          <p>@lang('jsonldhome.desc-1-3-1-1')</p>
          <p>@lang('jsonldhome.desc-1-3-2')</p>
          <p>@lang('jsonldhome.desc-1-3-2-1')</p>
          <p>@lang('jsonldhome.desc-1-4')</p>
        </div>
        <div class="d-none" id="description-tab-2">
          <h2>@lang('jsonldhome.desc-2')</h2>
          <p>@lang('jsonldhome.desc-2-1')</p>
          <p>@lang('jsonldhome.desc-2-2')</p>
          <p>@lang('jsonldhome.desc-2-3')</p>
          <p>@lang('jsonldhome.desc-2-4')</p>
          <p>@lang('jsonldhome.desc-2-5')</p>
          <p>@lang('jsonldhome.desc-2-6')</p>
        </div>
        <div class="d-none" id="description-tab-3">
          <h2>@lang('jsonldhome.desc-3')</h2>
          <p>@lang('jsonldhome.desc-3-1')</p>
          <p>@lang('jsonldhome.desc-3-2')</p>
          <p>@lang('jsonldhome.desc-3-3')</p>
          <p>@lang('jsonldhome.desc-3-4')</p>
          <p>@lang('jsonldhome.desc-3-5')</p>
          <p>@lang('jsonldhome.desc-3-6')</p>
          <pre class="language-html mb-4">
            <code class="language-html">
              &lt;script type="application/ld+json"&gt;
                {
                  "@context": "http://schema.org/",
                  "@type": "Product",
                  "name": "Yoast SEO for WordPress",
                  "image": "https://cdn-images.yoast.com/uploads/2010/10/Yoast_SEO_WP_plugin_FB.png",
                  "description": "Yoast SEO is the most complete WordPress SEO plugin. It handles the technical optimization of your site & assists with optimizing your content.",
                  "brand": {
                    "@type": "Thing",
                    "name": "Yoast"
                  },
                  "offers": {
                    "@type": "Offer",
                    "priceCurrency": "USD",
                    "price": "69.00"
                  }
                }
              &lt;/script&gt;               
            </code>
          </pre>
          <p>@lang('jsonldhome.desc-3-7')</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
          <div class="mr-2" style="width:24px !important; height: 24px !important;">
            <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
          </div>
          <a class="">@lang('jsonldhome.desc-1')</a>
        </div>
        <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
          <div class="mr-2" style="width:24px !important; height: 24px !important;">
            <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
          </div>
          <a class="">@lang('jsonldhome.desc-2')</a>
        </div>
        <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
          <div class="mr-2" style="width:24px !important; height: 24px !important;">
            <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
          </div>
          <a class="">@lang('jsonldhome.desc-3')</a>
        </div>
      </div>
    </div>
    <div class="my-10" style="background:var(--darkgrey); border-radius:20px">
      <div class="row">
        <div class="col-md-6 py-5">
          <div class="robo-container">
            <img src="{{asset('/media/images/robo-footer.png')}}" alt="" class="robo-img">
          </div>
        </div>
        <div class="col-md-6 py-10 pr-10">
          <div class="robo-text-container">
            <h2 class="text-white">@lang('layout.banner-robo-title')</h2>
            <p class="text-white">@lang('layout.banner-robo-desc')</p>
            <button type="button" class="btn btn-explore " name="button">@lang('layout.banner-robo-btn')</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-10">
      <div class="col-md-6">
        <h2 class="text-black">@lang('layout.feature-title')</h2>
        <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') @lang('jsonldhome.title')</p>
        <p class="text-black">@lang('layout.feature-desc')</p>
      </div>
      <div class="col-md-6">
        <div class="d-flex align-items-center">
          <span class="text-primaryblue">cmlabs JSON-LD Schema Generator</span>
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
    <h2 class="text-black">@lang('layout.whats-new-title') @lang('jsonldhome.title')</h2>
    <div class="row my-5">
      <div class="col-md-6 mb-5">
        <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
          <div class="alert-text mb-5">
            <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
            <br />
            <span class="font-weight-light">@lang('layout.whats-new-update') Dec 2, 2020</span>
          </div>
          <div class="alert-close pt-5 pr-5">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
            </button>
          </div>
          <span class="alert-features-text">@lang('jsonldhome.whats-new-1')</span>
        </div>
      </div>
      <div class="col-md-6 mb-5">
        <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
          <div class="alert-text mb-5">
            <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
            <br />
            <span class="font-weight-light">@lang('layout.whats-new-update') Dec 2, 2020</span>
          </div>
          <div class="alert-close pt-5 pr-5">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
            </button>
          </div>
          <span class="alert-features-text">@lang('jsonldhome.whats-new-2')</span>
        </div>
      </div>
    </div>
    <p class="text-black view-all-release">@lang('layout.view-web-release')</p>
  </div>
</div>

{{--
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb" style="background-color:#EEF0F8 !important;">
            <li class="breadcrumb-item active" style="color:#2F80ED"><b>@lang('home.homepage')</b></li>
          </ol>
        </nav>
          <div class="card card-custom mb-5">
            <div class="card-header">
              <div class="card-title">
                <h1 class="card-label">@lang('home.title-0')</h1>
                <small>@lang('home.sub-title-0')</small>
              </div>
            </div>
        </div>
        <div class="row"  data-sticky-container>
            <div class="col-lg-8">
                <div class="card card-custom mb-5">
                    <div class="card-body">
                        <p class="pt-4">@lang('home.desc-1')</p>
                        <p>@lang('home.desc-2')</p>
                        <p>@lang('home.desc-3')</p>
                        <p>@lang('home.desc-4')</p>
                    </div>
                </div>
                <div class="card card-custom mb-5">
                    <div class="card-header border-0">
                      <div class="card-title">
                         <h2 class="card-label pt-4">@lang('home.title-1')</h2>
                       </div>
                      </div>
                    <div class="card-body">
                        @foreach($data as $datum)
                        <table class="mb-10" width="100%">
                          <tr >
                            <th rowspan="2" width="13%" class="image"><span class="svg-icon svg-icon-2x p-4" style="background-color:#EBFAFF; border-radius:5px">
                                {!! $datum['img'] !!}
                            </span></th>
                            <td width="72%" class="title"><span class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3 tools-title">{{$datum['title']}}</span></td>
                            <td rowspan="2" width="15%"><a href="{{'/'.$local.$datum['route']}}"><button class="button btn btn-primary btn-sm font-weight-bolder text-uppercase text-white form-control">Launch</button></a></td>
                          </tr>
                          <tr>
                            <td width="72%">
                                <a
                                    href="#"
                                    class="mr-lg-8 mr-5 mb-lg-0 mb-2 title"
                                    data-toggle="modal"
                                    data-target="#modaldetail"
                                    data-title="{{$datum['title']}}"
                                    data-route="{{'/'.$local.$datum['route']}}"
                                    data-desc="@if(App::getLocale()=='id') {{$datum['description']}} @else {{$datum['description-en']}} @endif"
                                    style="color:#0095EB">
                                    @lang('home.detail-button')
                                </a>
                            </td>
                          </tr>
                        </table>
                        @endforeach
                    </div>
                </div>
                <div class="card card-custom mb-5">
                  <div class="card-header border-0">
                    <div class="card-title">
                      <h2 class="card-label pt-4">@lang('home.title-2')</h2>
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-12">
                              <div id="contributor-slide" class="carousel slide" data-ride="carousel" data-interval="4000">
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row mb-5">
                                             <div class="col-lg-5 col-md-6 col-sm-12 text-center mb-5 contributor-profile">
                                                 <div class="symbol symbol-60 symbol-circle symbol-xl-90 mb-5">
                                                    <div class="symbol-label" style="background-image: url('https://cmlabs.co/wp-content/uploads/2020/06/Andaru-Pramudito-Suhud-110x110.png')"></div>
                                                </div>
                                                <h3 class="font-weight-bold my-2">ANDARU SUHUD</h3>
                                                <div class="text-muted mb-2">DATA SCIENTIST</div>
                                             </div>
                                             <div class="col-lg-7 col-md-6 col-sm-12">
                                                 <div class="contributor-content">
                                                     <a href="@lang('home.url-1')" class="contributor-title" target="_blank"><h4 class="font-weight-bold my-2 mb-4">@lang('home.sub-title-2-1')</h4></a>
                                                     <p>
                                                         @lang('home.desc-2-1-1')
                                                     </p>
                                                 </div>
                                             </div>
                                         </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row mb-5">
                                           <div class="col-lg-5 col-md-6 col-sm-12 text-center mb-5 contributor-profile">
                                               <div class="symbol symbol-60 symbol-circle symbol-xl-90 mb-5">
                                                <div class="symbol-label" style="background-image: url('https://cmlabs.co/wp-content/uploads/2020/06/m-ilman-akbar-110x110.png')"></div>
                                            </div>
                                            <h3 class="font-weight-bold my-2">ILMAN AKBAR</h3>
                                            <div class="text-muted mb-2">DIGITAL MARKETING</div>
                                           </div>
                                           <div class="col-lg-7 col-md-6 col-sm-12">
                                               <div class="contributor-content">
                                                   <a href="@lang('home.url-2')" class="contributor-title" target="_blank"><h4 class="font-weight-bold my-2 mb-4">@lang('home.sub-title-2-2')</h4></a>
                                                   <p>
                                                       @lang('home.desc-2-2-1')
                                                   </p>
                                               </div>
                                           </div>
                                       </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row mb-5">
                                           <div class="col-lg-5 col-md-6 col-sm-12 text-center mb-5 contributor-profile">
                                               <div class="symbol symbol-60 symbol-circle symbol-xl-90 mb-5">
                                                <div class="symbol-label" style="background-image: url('https://cmlabs.co/wp-content/uploads/2020/06/hangga-nuarta-2-110x110.jpeg')"></div>
                                            </div>
                                            <h3 class="font-weight-bold my-2">HANGGA NUARTA</h3>
                                            <div class="text-muted mb-2">SEO SPECIALIST</div>
                                           </div>
                                           <div class="col-lg-7 col-md-6 col-sm-12">
                                               <div class="contributor-content">
                                                   <a href="@lang('home.url-3')" class="contributor-title" target="_blank"><h4 class="font-weight-bold my-2 mb-4">@lang('home.sub-title-2-3')</h4></a>
                                                   <p>
                                                       @lang('home.desc-2-3-1')
                                                   </p>
                                               </div>
                                           </div>
                                       </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row mb-5">
                                             <div class="col-lg-5 col-md-6 col-sm-12 text-center mb-5 contributor-profile">
                                                 <div class="symbol symbol-60 symbol-circle symbol-xl-90 mb-5">
                                                    <div class="symbol-label" style="background-image: url('https://cmlabs.co/wp-content/uploads/2020/06/udhi-vilanata-110x110.jpeg')"></div>
                                                </div>
                                                <h3 class="font-weight-bold my-2">UDHI S VILANATA</h3>
                                                <div class="text-muted mb-2">SEO SPECIALIST</div>
                                             </div>
                                             <div class="col-lg-7 col-md-6 col-sm-12">
                                                 <div class="contributor-content">
                                                     <a href="@lang('home.url-4')" class="contributor-title" target="_blank"><h4 class="font-weight-bold my-2 mb-4">@lang('home.sub-title-2-4')</h4></a>
                                                     <p>
                                                         @lang('home.desc-2-4-1')
                                                     </p>
                                                 </div>
                                             </div>
                                         </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row mb-5">
                                             <div class="col-lg-5 col-md-6 col-sm-12 text-center mb-5 contributor-profile">
                                                 <div class="symbol symbol-60 symbol-circle symbol-xl-90 mb-5">
                                                    <div class="symbol-label" style="background-image: url('https://cmlabs.co/wp-content/uploads/2020/06/foto-rochman-maarif-110x110.jpg')"></div>
                                                </div>
                                                <h3 class="font-weight-bold my-2">ROCHMAN</h3>
                                                <div class="text-muted mb-2">SEO SPECIALIST</div>
                                             </div>
                                             <div class="col-lg-7 col-md-6 col-sm-12">
                                                 <div class="contributor-content">
                                                     <a href="@lang('home.url-5')" class="contributor-title" target="_blank"><h4 class="font-weight-bold my-2 mb-4">@lang('home.sub-title-2-5')</h4></a>
                                                     <p>
                                                         @lang('home.desc-2-5-1')
                                                     </p>
                                                 </div>
                                             </div>
                                         </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row mb-5">
                                             <div class="col-lg-5 col-md-6 col-sm-12 text-center mb-5 contributor-profile">
                                                 <div class="symbol symbol-60 symbol-circle symbol-xl-90 mb-5">
                                                    <div class="symbol-label" style="background-image: url('https://cmlabs.co/wp-content/uploads/2020/08/photo6145300840353737129-1-110x110.jpg')"></div>
                                                </div>
                                                <h3 class="font-weight-bold my-2">SELENA</h3>
                                                <div class="text-muted mb-2">SEO SPECIALIST</div>
                                             </div>
                                             <div class="col-lg-7 col-md-6 col-sm-12">
                                                 <div class="contributor-content">
                                                     <a href="@lang('home.url-6')" class="contributor-title" target="_blank"><h4 class="font-weight-bold my-2 mb-4">@lang('home.sub-title-2-6')</h4></a>
                                                     <p>
                                                         @lang('home.desc-2-6-1')
                                                     </p>
                                                 </div>
                                             </div>
                                         </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-12 text-center">
                             <span>
                                 <a href="#contributor-slide" data-slide="prev">
                                     <button class="btn btn-prev btn-icon btn-circle flaticon2-back btn-light-twitter mr-3"></button>
                                 <a/>
                             </span>
                             <span>
                                 <a href="#contributor-slide" data-slide="next">
                                     <button class="btn btn-next btn-icon btn-circle flaticon2-next btn-light-twitter ml-3"></button>
                                 </a>
                             </span>
                         </div>
                      </div>
                  </div>
                </div>
                <div class="card card-custom mb-5">
                  <div class="card-header border-0">
                    <div class="card-title">
                      <h2 class="card-label pt-4">@lang('home.title-3')</h2>
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="mb-10" width="100%">
                      <tr >
                        <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="svg-icon svg-icon-2x p-4" style="background-color:#EBFAFF; border-radius:5px; color:#0095EB">
                            01
                        </span></th>
                        <td width="90%" class="title-1"><span class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">@lang('home.sub-title-3-1')</span></td>
                      </tr>
                      <tr>
                        <td> <p>@lang('home.desc-3-1-1')</p> </td>
                      </tr>
                    </table>

                    <table class="mb-10" width="100%">
                      <tr >
                        <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="svg-icon svg-icon-2x p-4" style="background-color:#EBFAFF; border-radius:5px; color:#0095EB">
                            02
                        </span></th>
                        <td width="90%" class="title-1"><span class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">@lang('home.sub-title-3-2')</span></td>
                      </tr>
                      <tr>
                        <td> <p>@lang('home.desc-3-2-1')</p> </td>
                      </tr>
                    </table>

                    <table class="mb-10" width="100%">
                      <tr >
                        <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="svg-icon svg-icon-2x p-4" style="background-color:#EBFAFF; border-radius:5px; color:#0095EB">
                            03
                        </span></th>
                        <td width="90%" class="title-1"><span class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">@lang('home.sub-title-3-3')</span></td>
                      </tr>
                      <tr>
                        <td> <p>@lang('home.desc-3-3-1')</p> </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="card card-custom mb-5">
                    <div class="card-header border-0">
                      <div class="card-title">
                        <h2 class="card-label pt-4">@lang('home.title-4')</h2>
                      </div>
                    </div>
                  <div class="card-body">
                      <ul class="nav nav-tabs nav-tabs-line nav-bolder nav-tabs-line-2x justify-content-center mb-5">
                         <li class="nav-item">
                             <a class="nav-link tool-tab mr-10 active" data-toggle="tab" href="#importantnotes">@lang('home.sub-title-4-1')</a>
                         </li>
                         <li class="nav-item ml-10">
                             <a class="nav-link tool-tab" data-toggle="tab" href="#howtouse">@lang('home.sub-title-4-2')</a>
                         </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="importantnotes" role="tabpanel" aria-labelledby="importantnotes">
                            <table width="100%" class="mb-5">
                              <tr valign="center">
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" class="title-2" valign="center">
                                    <p>@lang('home.desc-4-1-1')</p>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" valign="center" class="title-2">
                                    <p>@lang('home.desc-4-1-2')</p>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" valign="center" class="title-2">
                                    <p>@lang('home.desc-4-1-3')</p>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="@if($local == 'id') pt-4 @else pt-1 @endif" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" valign="center" class="title-2">
                                    <p>@lang('home.desc-4-1-4')</p>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" valign="center" class="title-2">
                                    <p>@lang('home.desc-4-1-5')</p>
                                </td>
                              </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="howtouse" role="tabpanel" aria-labelledby="howtouse">
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" class="title-2-0">
                                    <span class="text-dark font-size-h5 font-weight-bold">@lang('home.sub-sub-title-4-2-1')</span>
                                    <ol class="pl-5">
                                      <li>@lang('home.desc-4-2-1-1')</li>
                                      <li>@lang('home.desc-4-2-1-2')</li>
                                      <li>@lang('home.desc-4-2-1-3')</li>
                                      <li>@lang('home.desc-4-2-1-4')</li>
                                    </ol>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" class="title-2-0">
                                    <span class="text-dark font-size-h5 font-weight-bold">@lang('home.sub-sub-title-4-2-2')</span>
                                    <ol class="pl-5">
                                      <li>@lang('home.desc-4-2-2-1')</li>
                                      <li>@lang('home.desc-4-2-2-2')</li>
                                      <li>@lang('home.desc-4-2-2-3')</li>
                                      <li>@lang('home.desc-4-2-2-4')</li>
                                      <li>@lang('home.desc-4-2-2-5')</li>
                                    </ol>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" class="title-2-0">
                                    <span class="text-dark font-size-h5 font-weight-bold">@lang('home.sub-sub-title-4-2-3')</span>
                                    <ol class="pl-5">
                                      <li>@lang('home.desc-4-2-3-1')</li>
                                      <li>@lang('home.desc-4-2-3-2')</li>
                                      <li>@lang('home.desc-4-2-3-3')</li>
                                    </ol>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" class="title-2-0">
                                    <span class="text-dark font-size-h5 font-weight-bold">@lang('home.sub-sub-title-4-2-4')</span>
                                    <ol class="pl-5">
                                      <li>@lang('home.desc-4-2-4-1')</li>
                                      <li>@lang('home.desc-4-2-4-2')</li>
                                      <li>@lang('home.desc-4-2-4-3')</li>
                                      <li>@lang('home.desc-4-2-4-4')</li>
                                    </ol>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" class="title-2-0">
                                    <span class="text-dark font-size-h5 font-weight-bold">@lang('home.sub-sub-title-4-2-5')</span>
                                    <ol class="pl-5">
                                      <li>@lang('home.desc-4-2-5-1')</li>
                                      <li>@lang('home.desc-4-2-5-2')</li>
                                      <li>@lang('home.desc-4-2-5-3')</li>
                                      <li>@lang('home.desc-4-2-5-4')</li>
                                    </ol>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" class="title-2-0">
                                    <span class="text-dark font-size-h5 font-weight-bold">@lang('home.sub-sub-title-4-2-6')</span>
                                    <ol class="pl-5">
                                      <li>@lang('home.desc-4-2-6-1')</li>
                                      <li>@lang('home.desc-4-2-6-2')</li>
                                      <li>@lang('home.desc-4-2-6-3')</li>
                                      <li>@lang('home.desc-4-2-6-4')</li>
                                    </ol>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" class="title-2-0">
                                    <span class="text-dark font-size-h5 font-weight-bold">@lang('home.sub-sub-title-4-2-7')</span>
                                    <ol class="pl-5">
                                      <li>@lang('home.desc-4-2-7-1')</li>
                                      <li>@lang('home.desc-4-2-7-2')</li>
                                      <li>@lang('home.desc-4-2-7-3')</li>
                                    </ol>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" class="mb-5">
                              <tr>
                                <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                                <td width="90%" class="title-2-0">
                                <div class="adjust">
                                    <span class="text-dark font-size-h5 font-weight-bold">@lang('home.sub-sub-title-4-2-8')</span>
                                    <ol class="pl-5">
                                      <li>@lang('home.desc-4-2-8-1')</li>
                                      <li>@lang('home.desc-4-2-8-2')</li>
                                      <li>@lang('home.desc-4-2-8-3')</li>
                                      <li>@lang('home.desc-4-2-8-4')</li>
                                      <ul class="pl-5">
                                        <li>@lang('home.desc-4-2-8-5')</li>
                                        <li>@lang('home.desc-4-2-8-6')</li>
                                      </ul>
                                      <li>@lang('home.desc-4-2-8-7')</li>
                                    </ol>
                                </div>
                                </td>
                              </tr>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card card-custom mb-5">
                  <div class="card-header border-0">
                    <div class="card-title">
                      <h2 class="card-label pt-4">@lang('home.title-5')</h2>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="accordion accordion-light accordion-toggle-arrow" id="accordionExample2">
                     <div class="card">
                      <div class="card-header" id="headingOne2">
                       <div class="card-title" data-toggle="collapse" data-target="#collapseOne2">
                       <div class="faq-title">
                        @lang('home.sub-title-5-1')
                       </div>
                       </div>
                      </div>
                      <div id="collapseOne2" class="collapse show" data-parent="#accordionExample2">
                       <div class="card-body">
                           @lang('home.desc-5-1-1')<br/><br/>
                           @lang('home.desc-5-1-2')<br/><br/>
                           @lang('home.desc-5-1-3')
                       </div>
                      </div>
                     </div>
                     <div class="card">
                      <div class="card-header" id="headingTwo2">
                       <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo2">
                       <div class="faq-title">
                        @lang('home.sub-title-5-2')
                       </div>
                       </div>
                      </div>
                      <div id="collapseTwo2" class="collapse"  data-parent="#accordionExample2">
                       <div class="card-body">
                           <ul>
                               <li>@lang('home.desc-5-2-1')</li>
                               <li>@lang('home.desc-5-2-2')</li>
                               <li>@lang('home.desc-5-2-3')</li>
                               <li>@lang('home.desc-5-2-4')</li>
                               <li>@lang('home.desc-5-2-5')</li>
                               <li>@lang('home.desc-5-2-6')</li>
                               <li>@lang('home.desc-5-2-7')</li>
                           </ul>
                           @lang('home.sub-sub-title-5-2')
                       </div>
                      </div>
                     </div>
                     <div class="card">
                      <div class="card-header" id="headingThree2">
                       <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree2">
                       <div class="faq-title">
                        @lang('home.sub-title-5-3')
                       </div>
                       </div>
                      </div>
                      <div id="collapseThree2" class="collapse" data-parent="#accordionExample2">
                       <div class="card-body">
                               <ul>
                                   <li>@lang('home.desc-5-3-1')</li>
                                   <li>@lang('home.desc-5-3-2')</li>
                                   <li>@lang('home.desc-5-3-3')</li>
                               </ul>
                       </div>
                      </div>
                     </div>
                     <div class="card">
                      <div class="card-header" id="headingFour2">
                       <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFour2">
                       <div class="faq-title">
                        @lang('home.sub-title-5-4')
                       </div>
                       </div>
                      </div>
                      <div id="collapseFour2" class="collapse" data-parent="#accordionExample2">
                       <div class="card-body">
                           @lang('home.desc-5-4-1')
                           @lang('home.desc-5-4-2') <br/><br/>
                           @lang('home.desc-5-4-3') <br/><br/>
                           @lang('home.desc-5-4-4')
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



<!-- Modal Detail Tools-->
<div class="modal fade" id="modaldetail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h2 class="modal-title" id="modal-title"></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <p id="modal-desc"></p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light-primary font-weight-bold px-5" data-dismiss="modal">Close</button>
                <a id="modal-link" href=""><button class="button btn btn-primary btn-sm px-5 font-weight-bolder text-uppercase text-white form-control">Launch</button></a>
            </div>
        </div>
    </div>
</div>

--}}
@endsection

@push('script')
<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('js/slick.js')}}"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
      $('#modaldetail').on('show.bs.modal', function(e) {
          var target = $(e.relatedTarget);
          var title = target.data('title');
          var route = target.data('route');
          var desc = target.data('desc');

          $('#modal-title').text(title);
          $('#modal-link').attr('href', route);
          $('#modal-desc').text(desc);
      });

      $('.contributor-slide').carousel({
          pause: "hover"
      })
    });
</script>
@endpush
@push('script')
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "name": "@lang('home.homepage')"
    }]
  }
</script>
@endpush
<!-- home -->
@section('json-ld')
active
@endsection
