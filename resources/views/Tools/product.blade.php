@extends('layouts.app')

@section('title', Lang::get('product.meta-title'))

@section('meta-desc', Lang::get('product.meta-desc'))

@section('conical','/en/json-ld-product-schema-generator')

@section('en-link')
en/json-ld-product-schema-generator
@endsection

@section('id-link')
id/json-ld-product-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('product.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('product.subtitle')</span>
            <div class="card card-custom mb-5 mt-10">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="row mb-8">
                                <div class="col-12">
                                    <label for="schema-json-ld" class="font-weight-bold text-black h6">@lang('layout.which-schema')</label>
                                    <select class="form-control selectpicker custom-select-blue" tabindex="null" id="schema-json-ld">
                                        <option value="home">Home</option>
                                        <option value="breadcrumb">Breadcrumb</option>
                                        <option value="faq">FAQ Page</option>
                                        <option value="how-to">How-to</option>
                                        <option value="job-posting">Job Posting</option>
                                        <option value="person">Person</option>
                                        <option value="product" selected="selected">Product</option>
                                        <option value="recipe">Recipe</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Product</p>
                            <form action="" id="form-product">
                                <div class="" id="formproduct">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="name">@lang('product.label-name')</label>
                                            <input type="text" name="" class="form-control name mb-5" placeholder="@lang('product.placeholder-name')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-6 mb-5">
                                            <label class="text-black font-weight-bold" for="image">@lang('product.label-image')</label>
                                            <input type="text" name="" class="form-control image" placeholder="@lang('product.placeholder-image')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <label class="text-black font-weight-bold" for="productBrand">@lang('product.label-productBrand')</label>
                                            <input type="text" name="" class="form-control productBrand mb-5" placeholder="@lang('product.placeholder-productBrand')" value="" data-id="0">
                                            <div class="row">
                                                <div class="col-12 mb-5">
                                                    <label class="text-black font-weight-bold" for="identifier">@lang('product.label-identifier')</label>
                                                    <div class="dropdown bootstrap-select show-tick form-control">
                                                        <select class="form-control selectpicker custom-select-blue identifier" multiple="multiple" data-actions-box="false" tabindex="null">
                                                            <option value="none">Nothing Selected</option>
                                                            <option value="sku">sku</option>
                                                            <option value="gtin8">gtin8</option>
                                                            <option value="gtin13">gtin13</option>
                                                            <option value="gtin14">gtin14</option>
                                                            <option value="mpn">mpn</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-8 mb-lg-5">
                                            <label class="text-black font-weight-bold" for="description">@lang('product.label-description')</label>
                                            <textarea name="" class="form-control custom-textarea-82 description" placeholder="@lang('product.placeholder-description')" data-id="0"></textarea>
                                        </div>
                                    </div>
                                    <div class="row product-description">
                                        <input type="hidden" id="skulang" value="@lang('product.placeholder-sku')">
                                        <input type="hidden" id="gtin8lang" value="@lang('product.placeholder-gtin8')">
                                        <input type="hidden" id="gtin13lang" value="@lang('product.placeholder-gtin13')">
                                        <input type="hidden" id="gtin14lang" value="@lang('product.placeholder-gtin14')">
                                        <input type="hidden" id="mpnlang" value="@lang('product.placeholder-mpn')">
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-3">
                                            <label class="text-black font-weight-bold" for="offerType">@lang('product.label-offer-type') @type</label>
                                            <select class="form-control selectpicker custom-select-blue offerType mb-5">
                                                <option value="None">@lang('product.offer-type-opt-1')</option>
                                                <option value="Offer">@lang('product.offer-type-opt-2')</option>
                                                <option value="Aggregate Offer">@lang('product.offer-type-opt-3')</option>
                                            </select>
                                        </div>
                                        <div class="col-6 col-md-3 mb-5">
                                            <label class="text-black font-weight-bold" for="url">URL</label>
                                            <input type="text" name="" class="form-control url" placeholder="@lang('product.placeholder-url')" value="" data-id="0" disabled>
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="text-black font-weight-bold" for="priceCurrency">@lang('product.label-currency')</label>
                                            <select class="form-control selectpicker custom-select-blue custom-searchbox priceCurrency mb-5" data-size="4" data-live-search="true" disabled>
                                                <option value="None">@lang('product.placeholder-currency')</option>
                                                @foreach($currencies as $c)
                                                    <option value="{{ $c['code'] }}">{{ $c['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 col-md-3 mb-5">
                                            <label class="text-black font-weight-bold" for="price">@lang('product.label-price')</label>
                                            <input type="number" name="" class="form-control price" placeholder="@lang('product.placeholder-price')" value="" data-id="0" disabled>
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                    </div>
                                    <div id="offer" class="row d-none">
                                        <div class="col-md-4">
                                            <label class="text-black font-weight-bold" for="validThrough">@lang('product.label-validThrough')</label>
                                            <div class="input-group date mb-5">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="bx bx-calendar text-darkgrey"></i>
                                                </span>
                                                </div>
                                                <input type="text" id="kt_datepicker_2" name="" class="form-control custom-date validThrough" readonly placeholder="@lang('product.placeholder-validThrough')" value="" data-id="0" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="text-black font-weight-bold" for="availability">@lang('product.label-availability')</label>
                                            <select class="form-control selectpicker custom-select-blue availability mb-5">
                                                <option value="none">Nothing Selected</option>
                                                <option value="In stock">@lang('product.availability-opt-1')</option>
                                                <option value="Out of stock">@lang('product.availability-opt-2')</option>
                                                <option value="Online only">@lang('product.availability-opt-3')</option>
                                                <option value="In store only">@lang('product.availability-opt-4')</option>
                                                <option value="Pre-order">@lang('product.availability-opt-5')</option>
                                                <option value="Pre-sale">@lang('product.availability-opt-6')</option>
                                                <option value="Limited availability">@lang('product.availability-opt-7')</option>
                                                <option value="Sold out">@lang('product.availability-opt-8')</option>
                                                <option value="Discontinued">@lang('product.availability-opt-9')</option>
                                                <option class="font-italic" value="Not specified">@lang('product.availability-opt-10')</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="text-black font-weight-bold" for="condition">@lang('product.label-condition')</label>
                                            <select class="form-control selectpicker custom-select-blue condition mb-5">
                                                <option value="none">Nothing Selected</option>
                                                <option value="New">@lang('product.condition-opt-1')</option>
                                                <option value="Used">@lang('product.condition-opt-2')</option>
                                                <option value="Refurbished">@lang('product.condition-opt-3')</option>
                                                <option value="Damaged">@lang('product.condition-opt-4')</option>
                                                <option value="Pre-order">@lang('product.condition-opt-5')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="ag_offer" class="row d-none">
                                        <div class="col-md-6 mb-5">
                                            <label class="text-black font-weight-bold" for="highPrice">@lang('product.label-highPrice')</label>
                                            <input type="number" name="" class="form-control highPrice" placeholder="@lang('product.placeholder-highPrice')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="text-black font-weight-bold" for="offer">@lang('product.label-offer')</label>
                                            <input type="number" name="" class="form-control offer" placeholder="@lang('product.placeholder-offer')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-5">
                                            <label class="text-black font-weight-bold" for="ratingValue">@lang('product.label-ratingValue')</label>
                                            <input type="number" name="" class="form-control ratingValue" placeholder="@lang('product.placeholder-ratingValue')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 mb-5">
                                            <label class="text-black font-weight-bold" for="ratingCount">@lang('product.label-ratingCount')</label>
                                            <input type="number" name="" class="form-control ratingCount" disabled placeholder="@lang('product.placeholder-ratingCount')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 mb-5">
                                            <label class="text-black font-weight-bold" for="bestRating">@lang('product.label-bestRating')</label>
                                            <input type="number" name="" class="form-control bestRating" disabled placeholder="@lang('product.placeholder-bestRating')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 mb-5">
                                            <label class="text-black font-weight-bold" for="worstRating">@lang('product.label-worstRating')</label>
                                            <input type="number" name="" class="form-control worstRating" disabled placeholder="@lang('product.placeholder-worstRating')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="addReview"></div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <button type="button" class="btn btn-block btn-add-question mt-5 mb-5" name="button" id="add-product-review">
                                                <i class='bx bx-plus'></i> @lang('product.btn-addReview')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                            <button type="submit" id="test" class="btn font-weight-bold " name="button">
                                                <i class='bx bx-check-circle'></i> <span>@lang('layout.btn-check')</span></button>
                                        </div>
                                        <div id="reset" class="col-4 d-flex justify-content-center px-0 button-result">
                                            <button type="button" class="btn font-weight-bold reset" name="button">
                                                <i class='bx bx-refresh'></i> <span>@lang('layout.btn-reset')</span></button>
                                        </div>
                                    </div>
                                    <textarea name="code_snippet" style="resize:none" rows="16" class="form-control" id="json-format" data-key="{{time()}}" readonly></textarea>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {{-- <div id="local-collection-desktop" class="local-collection">
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
              <ul class="list-group" id="localsavedesktop"></ul>
            </div>
          </div> --}}
                </div>
                <div class="col-md-4">
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
                                        <p>@lang('product.highlight')</p>
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
        {{--
    <div class="local-collection-header d-flex justify-content-between mb-3 w-100 px-5">
      <div class="d-flex flex-row align-items-center">
        <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
        <span class="text-black font-15px">@lang('layout.local-history')</span>
      </div>
      <div>
        <span class="clear-all font-15px pointer">@lang('layout.clear-all')</span>
      </div>
    </div>
    <div id="localsavemobile" class="local-collection-body mt-3 px-5"></div>
     --}}
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('product.highlight')</p>
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
                    <h2>@lang('product.desc-1')</h2>
                    <p>@lang('product.desc-1-1')</p>
                    <p>@lang('product.desc-1-2')</p>
                    <p>@lang('product.desc-1-3')</p>
                    <img class="mb-4" src="{{asset('/media/images/product-instruction-1.png')}}" alt="product-instruction-1" width="300">
                    <p>@lang('product.desc-1-4')</p>
                    <ul>
                        <li>@lang('product.desc-1-4-1')</li>
                        <li>@lang('product.desc-1-4-2')</li>
                    </ul>
                    <p>@lang('product.desc-1-5')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2>@lang('product.desc-2')</h2>
                    <p>@lang('product.desc-2-1')</p>
                    <p>@lang('product.desc-2-2')</p>
                    <p>@lang('product.desc-2-3')</p>
                    <img class="mb-4" src="{{asset('/media/images/product-instruction-2.png')}}" alt="product-instruction-2" width="300">
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2>@lang('product.desc-3')</h2>
                    <p>@lang('product.desc-3-1')</p>
                    <p>@lang('product.desc-3-2')</p>
                    <p>@lang('product.desc-3-3')</p>
                </div>
                <div class="d-none" id="description-tab-4">
                    <h2>@lang('product.desc-4')</h2>
                    <p>@lang('product.desc-4-1')</p>
                    <pre class="language-html mb-4">
                        <code class="language-html">
                            &lt;html&gt;
                                &lt;head&gt;
                                    &lt;title&gt;Executive Anvil&lt;/title&gt;
                                    &lt;script type="application/ld+json"&gt;
                                        {
                                          "@context": "http://schema.org/",
                                          "@type": "Product",
                                          "name": "cmlabs SEO Tools",
                                          "image": "https://tools.cmlabs.co/media/logos/new/new-logo-default.png",
                                          "description": "Choose structured data for recipe, job posting and product schema and build the markup with JSON-LD Generator.",
                                          "brand": {
                                            "@type": "Thing",
                                            "name": "cmlabs"
                                          },
                                          "offers": {
                                            "@type": "Offer",
                                            "priceCurrency": "USD",
                                            "price": "79.00"
                                          }
                                        }
                                    &lt;/script&gt;
                                &lt;/head&gt;
                                &lt;body&gt;
                                &lt;/body&gt;
                            &lt;/html&gt;
                        </code>
                    </pre>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('product.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('product.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('product.desc-3')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-4">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-4">4</span>
                    </div>
                    <a class="">@lang('product.desc-4')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{-- <div class="row mb-10">
      <div class="col-md-6">
        <h2 class="text-black">@lang('layout.feature-title')</h2>
        <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') @lang('product.title')</p>
        <p class="text-black">@lang('layout.feature-desc')</p>
      </div>
      <div class="col-md-6">
        <div class="d-flex align-items-center">
          <span class="text-primaryblue">cmlabs JSON-LD Product Schema Generator</span>
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
    </div> --}}
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('product.title')</h2>
        <div class="row my-5">
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') 15 Mar, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('product.whats-new-1')</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="alert alert-custom alert-features-new fade show card card-custom card-stretch" role="alert" style="background: var(--lightgrey); display:block">
                    <div class="alert-text mb-5">
                        <span class="h4 alert-title">@lang('layout.whats-new-sub-title')</span>&nbsp;&nbsp;<span class="label label-dot label-alert-features"></span>
                        <br />
                        <span class="font-weight-light">@lang('layout.whats-new-update') 15 Mar, 2021</span>
                    </div>
                    <!-- <div class="alert-close pt-5 pr-5">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close icon-alert-close"></i></span>
                        </button>
                    </div> -->
                    <span class="alert-features-text">@lang('product.whats-new-2')</span>
                </div>
            </div>
        </div>
        {{-- <p class="text-black view-all-release">@lang('layout.view-web-release')</p> --}}
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
</script>
@endpush
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
            "name": "JSON-LD Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-schema-generator"
        }, {
            "@type": "ListItem",
            "position": 3,
            "name": "JSON-LD Product Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-product-schema-generator"
        }]
    }
</script>
@endpush
@push('script')
{{-- <script src="{{asset('js/logic/product-json.js')}}"></script> --}}
<script src="{{ mix('js/app/general.js')}} "></script>
<script src="{{ mix('js/app/tools/product-json.js') }}"></script>
<script src="{{asset('js/pages/crud/forms/widgets/bootstrap-datepicker.min.js')}}"></script>
@endpush

@section('json-ld')
active
@endsection
