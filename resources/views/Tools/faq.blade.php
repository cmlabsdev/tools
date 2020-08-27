@extends('layouts.app')

@section('title', Lang::get('faq.meta-title'))

@section('meta-desc', Lang::get('faq.meta-desc'))

@section('meta-keyword', Lang::get('faq.meta-keyword'))

@section('conical','/en/json-ld-faq-schema-generator')

@section('en-link')
en/json-ld-faq-schema-generator
@endsection

@section('id-link')
id/json-ld-faq-schema-generator
@endsection

@section('content')
@push('style')
<style media="screen">
  @media only screen and (max-width: 1200px) and (min-width: 992px) {
    #copy {
      height: 50px;
    }

    #test {
      height: 50px;
    }
  }
</style>
@endpush
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color:#EEF0F8 !important;">
    <li class="breadcrumb-item"><a href="/{{$local}}" class="menu-breadcrumb">Homepage</a></li>
    <li class="breadcrumb-item active" style="color:#2F80ED"><b>JSON-LD FAQ Schema Generator</b></li>
  </ol>
</nav>
<div class="row">
  <div class="col-lg-6">
    <!--begin::Card-->
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h1 class="card-label">JSON-LD FAQ SCHEMA GENERATOR </h1>
          <small>@lang('faq.subtitle')</small>
        </div>
      </div>
      <div class="card-body">
        <div class="mb-5" id="form">
          <input type="text" name="" class="form-control mb-5 question" placeholder="@lang('faq.question') :" value="" data-id="0">
          <input type="text" name="" class="form-control mb-7 answer" placeholder="@lang('faq.answer') :" value="" data-id="0">
        </div>
        <button type="button" class="btn btn btn-light-info" name="button" id="add">
        <i class="flaticon2-plus"></i> @lang('faq.btn-add')
        </button>
      </div>
    </div>
    <!--end::Card-->
  </div>
  <div class="col-lg-6">
    <!--begin::Card-->
    <div class="card card-custom card-stretch gutter-b">
      <form class="" target="_blank" rel="nofollow noopener noreferrer" action="https://search.google.com/test/rich-results" method="post">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <button type="button" id="copy" class="btn btn-text-dark-50 btn-icon-primary font-weight-bold btn-hover-bg-light mr-3 form-control mb-5" name="button">
              <i class="far fa-copy"></i> @lang('faq.btn-copy')
              </button>
            </div>
            <div class="col-lg-6">
              <button type="submit" id="test" class="btn btn-text-dark-50 btn-icon-primary font-weight-bold btn-hover-bg-light mr-3 form-control mb-5" name="button">
              <i class="fas fa-circle"></i> @lang('faq.btn-test')</button>
            </div>
          </div>
          <textarea name="code_snippet" style="resize:none" rows="16" class="form-control" id="json-format"></textarea>
        </div>
      </form>
    </div>
    <!--end::Card-->
  </div>
  <!--end::Card-->
</div>
<div class="row" data-sticky-container>
  <div class="col-lg-8 mb-5">
    <!--begin::Card-->
    <div class="card card-custom">
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('faq.title')</h2>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <td style="width:60%;" class="align-middle">
                <p>@lang('faq.desc-1-1')</p>
              </td>
              <td class="align-middle"> <img id="1" data-toggle="modal" data-target="#myModal" src="https://cmlabs.co/wp-content/uploads/2020/06/json-1-min-1024x898.png" class="form-control" style="height:auto" alt="json 1 min"> </td>
            </tr>
            <tr>
              <td class="align-middle">
                <p>@lang('faq.desc-1-2')</p>
              </td>
              <td class="align-middle"> <img id="2" data-toggle="modal" data-target="#myModal" src="https://cmlabs.co/wp-content/uploads/2020/06/json-2-min-1024x509.png" class="form-control" style="height:auto" alt="json 2 min"> </td>
            </tr>
            <tr>
              <td class="align-middle">
                <p>@lang('faq.desc-1-3')</p>
              </td>
              <td class="align-middle"> <img id="3" data-toggle="modal" data-target="#myModal" src="https://cmlabs.co/wp-content/uploads/2020/06/json-3-min-1024x502.png" class="form-control" style="height:auto" alt="json 3 min"> </td>
            </tr>
            <tr>
              <td class="align-middle">
                <p>@lang('faq.desc-1-4')</p>
                <p>@lang('faq.desc-1-5')</p>
              </td>
              <td class="align-middle"> <img id="4" data-toggle="modal" data-target="#myModal" src="https://cmlabs.co/wp-content/uploads/2020/06/json-4-min-1024x556.png" class="form-control" style="height:auto" alt="json 4 min"> </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('faq.title-2')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('faq.desc-2-1')</p>
        <p>@lang('faq.desc-2-2')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('faq.title-3')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('faq.desc-3-1')</p>
        <p>@lang('faq.desc-3-2')</p>
        <table class="table" border="1px" bordercolor="#EBEDF3">
          <tbody>
            <tr>
              <th class="align-middle"> <i class="far fa-lightbulb icon-2x"></i> </th>
              <td>@lang('faq.desc-3-3')</td>
            </tr>
          </tbody>
        </table>
        <p>@lang('faq.desc-3-4')</p>
        <ul>
          <li>@lang('faq.li-1')</li>
          <li>@lang('faq.li-2')</li>
          <li>@lang('faq.li-3')</li>
        </ul>
        <p>@lang('faq.desc-3-5')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('faq.title-4')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('faq.desc-4-1')</p>
        <p>@lang('faq.desc-4-2')</p>
        <p>@lang('faq.desc-4-3')</p>
        <p>@lang('faq.desc-4-4')</p>
        <p>@lang('faq.desc-4-5')</p>
        <p>@lang('faq.desc-4-6')</p>
        <p>@lang('faq.desc-4-7')</p>
        <p>@lang('faq.desc-4-8')</p>
        <p>@lang('faq.desc-4-9')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">@lang('faq.title-5')</h2>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('faq.desc-5-1')</p>
        <p>@lang('faq.desc-5-2')</p>
        <h3 class="font-weight-bold">@lang('faq.title-6')</h3>
        <p>@lang('faq.desc-6-1')</p>
        <p>@lang('faq.desc-6-2')</p>
        <p>@lang('faq.desc-6-3')</p>
        <h3 class="font-weight-bold">@lang('faq.title-7')</h3>
        <p>@lang('faq.desc-7-1')</p>
        <p>@lang('faq.desc-7-2')</p>
        <p>@lang('faq.desc-7-3')</p>
        <p>@lang('faq.desc-7-4')</p>
        <h3 class="font-weight-bold">@lang('faq.title-8')</h3>
        <p>@lang('faq.desc-8-1')</p>
        <p>@lang('faq.desc-8-2')</p>
        <p>@lang('faq.desc-8-3')</p>
        <p>@lang('faq.desc-8-4')</p>
        <h3 class="font-weight-bold">@lang('faq.title-9')</h3>
        <p>@lang('faq.desc-9-1')</p>
        <p>@lang('faq.desc-9-2')</p>
        <p>@lang('faq.desc-9-3')</p>
        <p>@lang('faq.desc-9-4')</p>
        <p>@lang('faq.desc-9-5')</p>
      </div>
    </div>
    <!--end::Card-->
  </div>
  @include('layouts/stickybar')
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <img class="img-responsive form-control" alt="image modal" style="height:auto;" src="" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('script')
<script type="text/javascript">
  $(document).ready(function() {
    $('#myModal').on('show.bs.modal', function(e) {
      var image = $(e.relatedTarget).attr('src');
      $(".img-responsive").attr("src", image);
    });
  });
</script>
@endpush

@push('script')
<script src="{{asset('js/logic/faq-json-ld.js')}}"></script>
@endpush
@section('json-ld')
menu-item-active
@endsection
