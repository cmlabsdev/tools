<div class="col-lg-4">
  <div class="card card-custom sticky" data-sticky="true" data-margin-top="100" data-sticky-for="991">
    <!--begin::List Widget 4-->
    <div class="card card-custom card-stretch">
      <!--begin::Header-->
      <div class="card-header">
        <div class="card-title">
            <h2 class="card-label font-weight-bolder text-dark">@lang('layout.title-3')</h2>
        </div>
      </div>
      <!--end::Header-->
      <!--begin::Body-->
      <div class="card-body">
        @for ($i = 0; $i < count($dataEN); $i++)
        <!--begin::Item-->
        @if ($i == 0)
        <div class="d-flex align-items-center">
        @else
        <div class="d-flex align-items-center mt-10">
        @endif
            <div class="d-flex flex-column flex-grow-1 mx-4">
              @if($local == "en")
              <a href="{{$dataEN[$i]['link']}}" target="_blank" title="{{$dataEN[$i]['title']}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{$dataEN[$i]['title']}}</a>
              <span class="text-muted font-weight-bold">{{$dataEN[$i]['date']}}</span>
              @else
              <a href="{{$dataID[$i]['link']}}" target="_blank" title="{{$dataID[$i]['title']}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{$dataID[$i]['title']}}</a>
              <span class="text-muted font-weight-bold">{{$dataID[$i]['date']}}</span>
              @endif
          </div>
        </div>
        <!--end:Item-->
        @endfor
      </div>
      <!--end::Body-->
    </div>
    <!--end:List Widget 4-->
  </div>
</div>
