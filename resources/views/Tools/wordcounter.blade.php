@extends('layouts.app')

@section('title', Lang::get('wordcounter.meta-title'))

@section('meta-desc', Lang::get('wordcounter.meta-desc'))

@section('meta-keyword', Lang::get('wordcounter.meta-keyword'))

@section('conical','/en/word-counter')

@section('en-link')
en/word-counter
@endsection

@section('id-link')
id/word-counter
@endsection

@push('style')
  <style media="screen">  
  @media only screen and (max-width: 320px) {
    .tulisan {
      font-size: 60%;
    }
  }

  @media only screen and (min-width: 320px) {
    .tulisan {
      font-size: 65%;
    }
  }

  @media only screen and (min-width: 375px) {
    .tulisan {
      font-size: 80%;
    }
  }

  @media only screen and (min-width: 425px) {
    .tulisan {
      font-size: 90%;
    }
  }

  @media only screen and (min-width: 768px) {
    .tulisan {
      font-size: 120%;
    }
  }

  </style>
@endpush

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color:#EEF0F8 !important;">
    <li class="breadcrumb-item"><a href="/{{$local}}" class="menu-breadcrumb">Homepage</a></li>
    <li class="breadcrumb-item active" style="color:#2F80ED"><b>Word Counter</b></li>
  </ol>
</nav>
<div class="row">
  <div class="col-lg-8">
    <!--begin::Card-->
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h1 class="card-label">@lang('wordcounter.title') </h1>
          <small>@lang('wordcounter.subtitle')</small>
        </div>
      </div>
      <div class="card-body">
        <div class="row justify-content-center">
          <div class="col col-sm col-md col-lg col-xl mb-10" style="padding:0" align="center">
            <span class="tulisan">@lang('wordcounter.character')</span>
            <br>
            <span class="h1" id="characterCount">0</span>
          </div>
          <div class="col col-sm col-md col-lg col-xl mb-10" style="padding:0" align="center">
            <span class="tulisan">@lang('wordcounter.word')</span>
            <br>
            <span class="h1" id="wordCount">0</span>
          </div>
          <div class="col col-sm col-md col-lg col-xl mb-10" style="padding:0" align="center">
            <span class="tulisan">@lang('wordcounter.sentence')</span>
            <br>
            <span class="h1" id="sentenceCount">0</span>
          </div>
          <div class="col col-sm col-md col-lg col-xl mb-10" style="padding:0" align="center">
            <span class="tulisan">@lang('wordcounter.paragraph')</span>
            <br>
            <span class="h1" id="paragraphCount">0</span>
          </div>
          <div class="col col-sm col-md col-lg col-xl mb-10" style="padding:0" align="center">
            <span class="tulisan">@lang('wordcounter.reading-time')</span>
            <br>
            <span class="h1" id="readingTime">0</span>
          </div>
        </div>
        <div class="col-md-12">
          <textarea
            data-autoresize name="name"
            rows="15" style="resize:none; overflow:hidden"
            class="form-control" id="textarea"
            data-placement="bottom" data-trigger="click"
            data-toggle="popover" data-html="true"
            title="@lang('wordcounter.popover-title')"
            data-content="@lang('wordcounter.popover-content')"
            onclick="myFunction()"></textarea>
            <div class="text-center mt-5">
                <button type="button" class="btn btn-primary btn-sm" id="reset">@lang('wordcounter.btn-reset')</button>
            </div>
        </div>
      </div>
    </div>
    <!--end::Card-->
  </div>
  <div class="col-lg-4">
    <!--begin::Card-->
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-header">
        <div id="word1" class="card-title">
          <h2 class="card-label">@lang('wordcounter.keyword-density')</h2>
        </div>
      </div>
      <div class="card-body">
        <div class="accordion accordion-toggle-arrow" id="accordionExample1">
          <div class="card" id="kd">
            <div class="card-header">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne1">
                @lang('wordcounter.word-1')
              </div>
            </div>
            <div id="collapseOne1" class="collapse" data-parent="#accordionExample1">
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
          <h2 class="card-label">@lang('wordcounter.copy-title-1')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-1-1')</p>
        <center>
          <div class="col-12 col-md-9">
            <img class="" width="100%" src="https://cmlabs.co/wp-content/uploads/2020/06/cmlabs-word-counter.jpg" alt="cmlabs word counter">

          </div>
        </center>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-title-2')</h2>
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
        <h3 id="@lang('wordcounter.jumpto-link-1')" >@lang('wordcounter.copy-sub-title-2')</h3>
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
        <h3 id="@lang('wordcounter.jumpto-link-2')"> @lang('wordcounter.copy-sub-title-3')</h3>
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
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-0')</h2>
        </div>
        <div class="card-body">
          <p>@lang('wordcounter.copy-desc-6-1')</p>
          <p>@lang('wordcounter.copy-desc-6-2')</p>
          <div class="p-5" style="background-color: #F4F4F4">
            <h3 class="font-weight-bold">@lang('wordcounter.copy-desc-6-3')</h3>
          </div>
        </div>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-4')</h2>
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
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-8')</h2>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-8-1')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-8-2')</h2>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-9')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-10')</h2>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-11')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-12')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-13')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-14')</h2>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-15')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-16')</h2>
        </div>
      </div>
      <div class="card-body">
        @lang('wordcounter.copy-desc-6-17')
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-18')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-19')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-20')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-21')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('wordcounter.copy-desc-6-22')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-23')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 id ="@lang('wordcounter.jumpto-link-3')" class="card-label">@lang('wordcounter.copy-title-5')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('wordcounter.copy-desc-6-24') <a href="https://cmlabs.co/tipe-konten/" target="_blank"><u style="color:blue">@lang('wordcounter.copy-desc-6-25')</u></a> @lang('wordcounter.copy-desc-6-26')</p>
        <div class="row">
          <div class="col-md-6 mb-5">
            <div class="container p-10" style="background-color:#f2f2f2; border-radius: 7px;">
              <h3>@lang('wordcounter.copy-sub-title-5-1')</h3>
              <p>@lang('wordcounter.copy-desc-5-2')</p>
            </div>
          </div>
          <div class="col-md-6 mb-5">
            <div class="container p-10" style="background-color:#f2f2f2; height:100%; border-radius: 7px;">
              <h3>@lang('wordcounter.copy-sub-title-5-2')</h3>
              <p>@lang('wordcounter.copy-desc-5-3')</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end::Card-->
  </div>
  @include('layouts/stickybar')
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
<script>
function myFunction() {
  document.getElementById("kd").style.borderBottom = "2px solid #24daff";
}
</script>
@endpush

@push('script')
<script src="{{asset('js/logic/word-counter.js')}}"></script>
@endpush

@section('word-counter')
menu-item-active
@endsection
