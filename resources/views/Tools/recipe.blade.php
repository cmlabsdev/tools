@extends('layouts.app')

@section('title', Lang::get('recipe.meta-title'))

@section('meta-desc', Lang::get('recipe.meta-desc'))

@section('conical','/en/json-ld-recipe-schema-generator')

@section('en-link')
en/json-ld-recipe-schema-generator
@endsection

@section('id-link')
id/json-ld-recipe-schema-generator
@endsection

@section('content')
@if ($is_maintenance)
@include('layouts.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <h1 class="text-darkgrey font-weight-normal">@lang('recipe.title')</h1>
            <span class="text-darkgrey h4 font-weight-normal">@lang('recipe.subtitle')</span>
            <div class="card card-custom mb-5 mt-10">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-5">
                            <div class="row mb-8">
                                <div class="col-12">
                                    <label for="schema-json-ld" class="text-black font-weight-bold h6">@lang('layout.which-schema')</label>
                                    <select class="form-control selectpicker custom-select-blue" tabindex="null" id="schema-json-ld">
                                        <option value="home">Home</option>
                                        <option value="breadcrumb">Breadcrumb</option>
                                        <option value="faq">FAQ Page</option>
                                        <option value="how-to">How-to</option>
                                        <option value="job-posting">Job Posting</option>
                                        <option value="person">Person</option>
                                        <option value="product">Product</option>
                                        <option value="recipe" selected="selected">Recipe</option>
                                    </select>
                                </div>
                            </div>
                            <p class="h6 text-black mb-5">Recipe</p>
                            <form action="" id="form-recipe">
                                <div class="" id="formrecipe">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <label class="text-black font-weight-bold" for="name">@lang('recipe.label-name')</label>
                                            <input type="text" name="" class="form-control name mb-5" placeholder="@lang('recipe.placeholder-name')" value="" data-id="0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="text-black font-weight-bold" for="keywords">@lang('recipe.label-keywords')</label>
                                                    <input type="text" name="" class="form-control keywords mb-5" placeholder="@lang('recipe.placeholder-keywords')" value="" min="0" data-id="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-8 mb-lg-5">
                                            <label class="text-black font-weight-bold" for="description">@lang('recipe.label-description')</label>
                                            <textarea name="" class="form-control custom-textarea-82 description" placeholder="@lang('recipe.placeholder-description')" data-id="0"></textarea>
                                        </div>
                                    </div>
                                    <div class="row imageurlList">
                                        <div class="col-10 col-sm-11 mb-5">
                                            <label class="text-black font-weight-bold" for="image">@lang('recipe.label-image') #1</label>
                                            <input type="text" name="" class="form-control image" placeholder="@lang('recipe.placeholder-image')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                        <div class="col-2 col-sm-1">
                                            <div class="d-flex justify-content-center mt-9">
                                                <i class='bx bxs-x-circle bx-md btn-delete-disabled'></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div id="image"></div>
                                        </div>
                                        <div class="col-12 col-md-5 col-xl-4">
                                            <button type="button" class="btn btn-block btn-add-question mb-5 mt-5" name="button" id="add-imageUrl">
                                                <i class='bx bx-plus'></i> @lang('recipe.btn-addImageUrl')
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-12 col-md-6 mb-5 mb-md-0">
                                            <label class="text-black font-weight-bold" for="videoContent">@lang('recipe.label-videoContent')</label>
                                            <input type="text" name="" class="form-control videoContent" placeholder="@lang('recipe.placeholder-videoContent')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="text-black font-weight-bold" for="videoEmbed">@lang('recipe.label-videoEmbed')</label>
                                            <input type="text" name="" class="form-control videoEmbed" placeholder="@lang('recipe.placeholder-videoEmbed')" value="" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-url')</div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-12 col-md-6 col-xl-3 col-xxl-5 mb-5">
                                            <label class="text-black font-weight-bold" for="authorName">@lang('recipe.label-authorName')</label>
                                            <input type="text" name="" class="form-control authorName" placeholder="@lang('recipe.placeholder-authorName')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 col-xxl-3 mb-5">
                                            <label class="text-black font-weight-bold" for="publishedDate">@lang('recipe.label-publishedDate')</label>
                                            <div class="input-group date">
                                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="bx bx-calendar text-darkgrey"></i>
                                            </span>
                                                </div>
                                                <input type="text" id="kt_datepicker_2" name="" class="form-control custom-date publishedDate" readonly placeholder="@lang('recipe.placeholder-publishedDate')" value="" data-id="0" />
                                            </div>
                                        </div>
                                        <div class="col-6 col-xl-3 col-xxl-2">
                                            <label class="text-black font-weight-bold" for="prepTime">@lang('recipe.label-prepTime')</label>
                                            <input type="number" name="" class="form-control prepTime" placeholder="@lang('recipe.placeholder-prepTime')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 col-xl-3 col-xxl-2">
                                            <label class="text-black font-weight-bold" for="cookTime">@lang('recipe.label-cookTime')</label>
                                            <input type="number" name="" class="form-control cookTime" placeholder="@lang('recipe.placeholder-cookTime')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-12 col-md-4 mb-5 mb-md-0">
                                            <label class="text-black font-weight-bold" for="recipeCategory">@lang('recipe.label-recipeCategory')</label>
                                            <select class="form-control selectpicker custom-select-blue recipeCategory">
                                                <option value="Appetizer">@lang('recipe.recipe-category-opt-1')</option>
                                                <option value="Entree">@lang('recipe.recipe-category-opt-2')</option>
                                                <option value="Dessert">@lang('recipe.recipe-category-opt-3')</option>
                                                <option selected="selected" value="Not specified">@lang('recipe.recipe-category-opt-4')</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 mb-5 mb-md-0">
                                            <label class="text-black font-weight-bold" for="recipeCuisine">@lang('recipe.label-recipeCuisine')</label>
                                            <input type="text" name="" class="form-control recipeCuisine" placeholder="@lang('recipe.placeholder-recipeCuisine')" value="" data-id="0">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="text-black font-weight-bold" for="recipeServings">@lang('recipe.label-recipeServings')</label>
                                            <input type="number" name="" class="form-control recipeServings" placeholder="@lang('recipe.placeholder-recipeServings')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div id="ingredients"></div>
                                        </div>
                                        <div class="col-12 col-md-5 col-xl-4">
                                            <button type="button" class="btn btn-block btn-add-question mb-5 mt-5" name="button" id="add-ingredients">
                                                <i class='bx bx-plus'></i> @lang('recipe.btn-addIngredients')
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-12 col-md-4 mb-5 mb-md-0">
                                            <label class="text-black font-weight-bold" for="servingSize">@lang('recipe.label-servingSize')</label>
                                            <input type="text" name="" class="form-control servingSize" placeholder="@lang('recipe.placeholder-servingSize')" value="" data-id="0">
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <label class="text-black font-weight-bold" for="calories">@lang('recipe.label-calories')</label>
                                            <input type="number" name="" class="form-control calories" placeholder="@lang('recipe.placeholder-calories')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <label class="text-black font-weight-bold" for="fat">@lang('recipe.label-fat')</label>
                                            <input type="number" name="" class="form-control fat" placeholder="@lang('recipe.placeholder-fat')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div id="step"></div>
                                        </div>
                                        <div class="col-12 col-md-5 col-xl-4">
                                            <button type="button" class="btn btn-block btn-add-question mt-5 mb-5" name="button" id="add-recipe-step">
                                                <i class='bx bx-plus'></i> @lang('recipe.btn-addStep')
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-5">
                                            <label class="text-black font-weight-bold" for="aggregate">@lang('recipe.label-aggregate')</label>
                                            <input type="number" name="" class="form-control aggregate" placeholder="@lang('recipe.placeholder-aggregate')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 mb-5">
                                            <label class="text-black font-weight-bold" for="ratings">@lang('recipe.label-ratings')</label>
                                            <input type="number" name="" class="form-control ratings" placeholder="@lang('recipe.placeholder-ratings')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 mb-5">
                                            <label class="text-black font-weight-bold" for="highest">@lang('recipe.label-highest')</label>
                                            <input type="number" name="" class="form-control highest" placeholder="@lang('recipe.placeholder-highest')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                        <div class="col-6 mb-5">
                                            <label class="text-black font-weight-bold" for="lowest">@lang('recipe.label-lowest')</label>
                                            <input type="number" name="" class="form-control lowest" placeholder="@lang('recipe.placeholder-lowest')" value="" min="0" data-id="0">
                                            <div class="invalid-feedback">@lang('layout.invalid-number')</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="addReview"></div>
                                        </div>
                                        <div class="col-12 col-md-5 col-xl-4">
                                            <button type="button" class="btn btn-block btn-add-question mt-5 mb-5" name="button" id="add-recipe-review">
                                                <i class='bx bx-plus'></i> @lang('recipe.btn-addReview')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="p-2" style="border: 1px solid #E4E6EF; border-radius: 0.42rem;">
                                <form class="" target="_blank" rel="nofollow noopener noreferrer" action="https://search.google.com/test/rich-results" method="post">
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
                                        <p>@lang('recipe.highlight')</p>
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
                        <p>@lang('recipe.highlight')</p>
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
                    <h2 class="text-black">@lang('recipe.desc-1')</h2>
                    <p class="text-black">@lang('recipe.desc-1-1')</p>
                    <p class="text-black">@lang('recipe.desc-1-2')</p>
                    <p class="text-black">@lang('recipe.desc-1-3')</p>
                </div>
                <div class="d-none" id="description-tab-2">
                    <h2 class="text-black">@lang('recipe.desc-2')</h2>
                    <p class="text-black">@lang('recipe.desc-2-1')</p>
                    <p class="text-black">@lang('recipe.desc-2-2')</p>
                    <p class="text-black">@lang('recipe.desc-2-3')</p>
                </div>
                <div class="d-none" id="description-tab-3">
                    <h2 class="text-black">@lang('recipe.desc-3')</h2>
                    <pre class="language-html">
                        <code class="language-html">
                            &lt;script type="application/ld+json"&gt;
                                {
                                    "@context": "https://schema.org",
                                    "@type": "Recipe",
                                    "author": "Jake Smith",
                                    "cookTime": "PT2H",
                                    "datePublished": "2015-05-18",
                                    "description": "Your recipe description goes here",
                                    "image": "http://www.example.com/images.jpg",
                                    "recipeIngredient": [
                                      "ingredient 1",
                                      "ingredient 2",
                                      "ingredient 3",
                                      "ingredient 4",
                                      "ingredient 5"
                                    ],
                                    "interactionStatistic": {
                                      "@type": "InteractionCounter",
                                      "interactionType": "http://schema.org/Comment",
                                      "userInteractionCount": "5"
                                    },
                                    "name": "Rand's Cookies",
                                    "nutrition": {
                                      "@type": "NutritionInformation",
                                      "calories": "1200 calories",
                                      "carbohydrateContent": "12 carbs",
                                      "proteinContent": "9 grams of protein",
                                      "fatContent": "9 grams fat"
                                    },
                                    "prepTime": "PT15M",
                                    "recipeInstructions": "This is the long part, etc.",
                                    "recipeYield": "12 cookies"
                                }
                            &lt;/script&gt;
                        </code>
                    </pre>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-1">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description active" id="nav-label-tab-1">1</span>
                    </div>
                    <a class="">@lang('recipe.desc-1')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-2">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-2">2</span>
                    </div>
                    <a class="">@lang('recipe.desc-2')</a>
                </div>
                <div class="d-flex align-items-center mb-5 tools-description-points" id="nav-desc-tab-3">
                    <div class="mr-2" style="width:24px !important; height: 24px !important;">
                        <span class="label label-lg label-tools-description" id="nav-label-tab-3">3</span>
                    </div>
                    <a class="">@lang('recipe.desc-3')</a>
                </div>
            </div>
        </div>
        @include('layouts.roboDesc')
        {{-- <div class="row mb-10">
      <div class="col-md-6">
        <h2 class="text-black">@lang('layout.feature-title')</h2>
        <p class="text-black" style="font-size:1.5rem">@lang('layout.feature-sub-title') @lang('recipe.title')</p>
        <p class="text-black">@lang('layout.feature-desc')</p>
      </div>
      <div class="col-md-6">
        <div class="d-flex align-items-center">
          <span class="text-primaryblue">cmlabs JSON-LD Recipe Schema Generator</span>
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
        <h2 class="text-black">@lang('layout.whats-new-title') @lang('recipe.title')</h2>
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
                    <span class="alert-features-text">@lang('recipe.whats-new-1')</span>
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
                    <span class="alert-features-text">@lang('recipe.whats-new-2')</span>
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
            "name": "JSON-LD Recipe Schema Generator",
            "item": "{{url('/')}}/{{$local}}/json-ld-recipe-schema-generator"
        }]
    }
</script>
@endpush

@push('script')
{{-- <script src="{{asset('js/logic/recipe-json.js')}}"></script> --}}
<script src="{{ mix('js/app/general.js')}} "></script>
<script src="{{ mix('js/app/tools/recipe-json.js') }}"></script>
<script src="{{asset('js/pages/crud/forms/widgets/bootstrap-datepicker.min.js')}}"></script>
@endpush

@section('json-ld')
active
@endsection
