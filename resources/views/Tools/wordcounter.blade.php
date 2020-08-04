@extends('layouts.app')

@section('title', Lang::get('wordcounter.meta-title'))

@section('meta-desc', Lang::get('wordcounter.meta-desc'))

@section('meta-keyword', Lang::get('wordcounter.meta-keyword'))

@section('conical','/en/word-counter')

@section('en-link','/en/word-counter')

@section('id-link','/id/word-counter')

@section('content')
<div class="row">
  <div class="col-lg-8">
    <!--begin::Card-->
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.title') <small>@lang('wordcounter.subtitle')</small></h3>
        </div>
      </div>
      <div class="card-body">
        <div class="row justify-content-center">
          <div class="col-6 col-sm-4 col-md col-lg-4 col-xl" align="center">
            <h6>@lang('wordcounter.character')</h6>
            <h1 id="characterCount">0</h1>
          </div>
          <div class="col-6 col-sm-4 col-md col-lg-4 col-xl" align="center">
            <h6>@lang('wordcounter.word')</h6>
            <h1 id="wordCount">0</h1>
          </div>
          <div class="col-6 col-sm-4 col-md col-lg-4 col-xl" align="center">
            <h6>@lang('wordcounter.sentence')</h6>
            <h1 id="sentenceCount">0</h1>
          </div>
          <div class="col-6 col-sm-4 col-md col-lg-4 col-xl" align="center">
            <h6>@lang('wordcounter.paragraph')</h6>
            <h1 id="paragraphCount">0</h1>
          </div>
          <div class="col-6 col-sm-4 col-md col-lg-4 col-xl" align="center">
            <h6>@lang('wordcounter.reading-time')</h6>
            <h1 id="readingTime">0</h1>
          </div>
        </div>
        <div class="col-md-12">
          <textarea data-autoresize name="name" rows="15" style="resize:none; overflow:hidden" class="form-control" id="textarea"></textarea>
        </div>
      </div>
    </div>
    <!--end::Card-->
  </div>
  <div class="col-lg-4">
    <!--begin::Card-->
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.keyword-density')</h3>
        </div>
      </div>
      <div class="card-body">
        <div class="accordion accordion-toggle-arrow" id="accordionExample1">
          <div class="card">
            <div class="card-header">
              <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                @lang('wordcounter.word-1')
              </div>
            </div>
            <div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
              <div class="card-body" id="topKeywords">
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo1">
                @lang('wordcounter.word-2')
              </div>
            </div>
            <div id="collapseTwo1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body" id="top2">

              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree1">
                @lang('wordcounter.word-3')
              </div>
            </div>
            <div id="collapseThree1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body" id="top3">

              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFour1">
                @lang('wordcounter.word-4')
              </div>
            </div>
            <div id="collapseFour1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body" id="top4">

              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFive1">
                @lang('wordcounter.word-5')
              </div>
            </div>
            <div id="collapseFive1" class="collapse" data-parent="#accordionExample1">
              <div class="card-body" id="top5">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end::Card-->
  </div>
  <!--end::Card-->
</div>
<div class="row" data-sticky-container>


  <div class="col-lg-8 mb-5">
    <!--begin::Card-->
    <div class="card card-custom card-stretch-half">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-title-1')</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-1-1')</p>
        <center>
          <div class="col-12 col-md-9">
            <img class="" width="100%" src="https://cmlabs.co/wp-content/uploads/2020/06/cmlabs-word-counter.jpg" alt="">

          </div>
        </center>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-title-2')</h3>
        </div>
      </div>
      <div class="card-body">
        <p> @lang('wordcounter.copy-desc-2-1')</p>
        <ol>
          <li>@lang('wordcounter.copy-li-1')</li>
          <li>@lang('wordcounter.copy-li-2')</li>
          <li>@lang('wordcounter.copy-li-3')</li>
          <li>@lang('wordcounter.copy-li-4')</li>
          <li>@lang('wordcounter.copy-li-5')</li>
          <li>@lang('wordcounter.copy-li-6')</li>
          <li>@lang('wordcounter.copy-li-7')</li>
        </ol>
        <h5>@lang('wordcounter.copy-sub-title-2')</h5>
        <table class="table">
          <tbody>
            <tr>
              <th scope="row">{{ucfirst(strtolower(__('wordcounter.character')))}}</th>
              <td>@lang('wordcounter.copy-desc-3-1')</td>
            </tr>
            <tr>
              <th scope="row">{{ucfirst(strtolower(__('wordcounter.word')))}}</th>
              <td>@lang('wordcounter.copy-desc-3-2')</td>
            </tr>
            <tr>
              <th scope="row">{{ucfirst(strtolower(__('wordcounter.sentence')))}}</th>
              <td>@lang('wordcounter.copy-desc-3-3')</td>
            </tr>
            <tr>
              <th scope="row">{{ucfirst(strtolower(__('wordcounter.paragraph')))}}</th>
              <td>@lang('wordcounter.copy-desc-3-4')</td>
            </tr>
            <tr>
              <th scope="row">{{ucfirst(strtolower(__('reading-time')))}}</th>
              <td>@lang('wordcounter.copy-desc-3-5')</td>
            </tr>
          </tbody>
        </table>
        <h5> @lang('wordcounter.copy-sub-title-3')</h5>
        <p>@lang('wordcounter.copy-desc-4-1')</p>
        <p>@lang('wordcounter.copy-desc-4-2')</p>
        <table class="table">
          <tbody>
            <tr>
              <th scope="row">@lang('wordcounter.word-1')</th>
              <td>@lang('wordcounter.copy-td-1')</td>
            </tr>
            <tr>
              <th scope="row">@lang('wordcounter.word-2')</th>
              <td>@lang('wordcounter.copy-td-2')</td>
            </tr>
            <tr>
              <th scope="row">@lang('wordcounter.word-3')</th>
              <td>@lang('wordcounter.copy-td-3')</td>
            </tr>
            <tr>
              <th scope="row">@lang('wordcounter.word-4')</th>
              <td>@lang('wordcounter.copy-td-4')</td>
            </tr>
            <tr>
              <th scope="row">@lang('wordcounter.word-5')</th>
              <td>@lang('wordcounter.copy-td-5')</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-0')</h3>
        </div>
        <div class="card-body">
          <p>@lang('wordcounter.copy-desc-6-1')</p>
          <p>@lang('wordcounter.copy-desc-6-2')</p>
          <div class="p-5" style="background-color: #F4F4F4">
            <h5 class="font-weight-bold">@lang('wordcounter.copy-desc-6-3')</h5>
          </div>
        </div>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-4')</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-5')</p>
        <table class="table" border="1px" bordercolor="#EBEDF3">
          <tbody>
            <tr>
              <th class="align-middle" style="text-align:center"> <i class="far fa-lightbulb icon-2x"></i> </th>
              <td class="align-middle">
                <p>@lang('wordcounter.copy-desc-6-6')</p>
              </td>
            </tr>
          </tbody>
        </table>
        @lang('wordcounter.copy-desc-6-7')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-8')</h3>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-8-1')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-8-2')</h3>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-9')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-10')</h3>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-11')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-12')</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-13')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-14')</h3>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-15')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-16')</h3>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-17')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-18')</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-19')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-20')</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-21')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-desc-6-22')</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-23')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('wordcounter.copy-title-5')</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-24') <a href="https://cmlabs.co/tipe-konten/"><u style="color:blue">@lang('wordcounter.copy-desc-6-25')</u></a> @lang('wordcounter.copy-desc-6-26')</p>
        <div class="row">
          <div class="col-md-6 mb-5">
            <div class="container p-10" style="background-color:#53F9AD">
              <h3>@lang('wordcounter.copy-sub-title-5-1')</h3>
              <p>@lang('wordcounter.copy-desc-5-2')</p>
            </div>
          </div>
          <div class="col-md-6 mb-5">
            <div class="container p-10" style="background-color:#53F9AD; height:100%">
              <h3>@lang('wordcounter.copy-sub-title-5-2')</h3>
              <p>@lang('wordcounter.copy-desc-5-2')</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end::Card-->
  </div>
  <div class="col-lg-4">
    <div class="card card-custom sticky" data-sticky="true" data-margin-top="100" data-sticky-for="1000">
      <!--begin::List Widget 4-->
      <div class="card card-custom card-stretch">
        <!--begin::Header-->
        <div class="card-header border-0">
          <h3 class="card-title font-weight-bolder text-dark">cmlabs Blog</h3>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
          <!--begin::Item-->
          <div class="d-flex align-items-center">
            <!--begin::Bullet-->
            <span class="bullet bullet-bar bg-success align-self-stretch"></span>
            <!--end::Bullet-->
            <!--begin::Text-->
            <div class="d-flex flex-column flex-grow-1 mx-4">
              <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">9 Plugin SEO Terbaik untuk Optimasi Web</a>
              <span class="text-muted font-weight-bold">2020-07-27T07:01:52</span>
            </div>
            <!--end::Text-->
          </div>
          <!--end:Item-->

          <!--begin::Item-->
          <div class="d-flex align-items-center mt-10">
            <!--begin::Bullet-->
            <span class="bullet bullet-bar bg-info align-self-stretch"></span>
            <!--end::Bullet-->
            <!--begin::Text-->
            <div class="d-flex flex-column flex-grow-1 mx-4">
              <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">5 Tips Blogging Menarik untuk Situs eCommerce</a>
              <span class="text-muted font-weight-bold">2020-07-26T14:27:29</span>
            </div>
            <!--end::Text-->
          </div>
          <!--end:Item-->

          <!--begin::Item-->
          <div class="d-flex align-items-center mt-10">
            <!--begin::Bullet-->
            <span class="bullet bullet-bar bg-warning align-self-stretch"></span>
            <!--end::Bullet-->
            <!--begin::Text-->
            <div class="d-flex flex-column flex-grow-1 mx-4">
              <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">SEO Hacks untuk Meningkatkan Traffic Website Bisnis</a>
              <span class="text-muted font-weight-bold">2020-07-26T14:17:06</span>
            </div>
            <!--end::Text-->
          </div>
          <!--end:Item-->

          <!--begin::Item-->
          <div class="d-flex align-items-center mt-10">
            <!--begin::Bullet-->
            <span class="bullet bullet-bar bg-danger align-self-stretch"></span>
            <!--end::Bullet-->
            <!--begin::Text-->
            <div class="d-flex flex-column flex-grow-1 mx-4">
              <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">Tips Masuk First Page Google dengan Google Trends</a>
              <span class="text-muted font-weight-bold">2020-07-26T14:22:51</span>
            </div>
            <!--end::Text-->
          </div>
          <!--end:Item-->

          <!--begin::Item-->
          <div class="d-flex align-items-center mt-10">
            <!--begin::Bullet-->
            <span class="bullet bullet-bar bg-primary align-self-stretch"></span>
            <!--end::Bullet-->
            <!--begin::Text-->
            <div class="d-flex flex-column flex-grow-1 mx-4">
              <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">7 Hal Paling Berpengaruh Terhadap Kualitas Artikel</a>
              <span class="text-muted font-weight-bold">2020-07-26T14:24:38</span>
            </div>
            <!--end::Text-->
          </div>
          <!--end:Item-->
        </div>
        <!--end::Body-->
      </div>
      <!--end:List Widget 4-->
    </div>
  </div>
</div>

@endsection

@push('script')
<script type="text/javascript">
  jQuery.each(jQuery('textarea[data-autoresize]'), function() {
    var offset = this.offsetHeight - this.clientHeight;

    var resizeTextarea = function(el) {
      jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() {
      resizeTextarea(this);
    }).removeAttr('data-autoresize');
  });
</script>
@endpush

@push('script')
<script src="{{asset('js/logic/word-counter.js')}}"></script>
@endpush

@section('word-counter')
active
@endsection
