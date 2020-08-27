@extends('layouts.app')

@section('title', Lang::get('home.meta-title'))

@section('meta-desc', Lang::get('home.meta-desc'))

@section('meta-keyword', Lang::get('home.meta-keyword'))

@section('en-link')
en
@endsection
@section('id-link')
id
@endsection
@push('style')
<style media="screen">
.nav-link.active{
  border-bottom: 2px solid #0095EB !important;
  color: #0095EB !important;
}
.nav-link:hover{
  color: #0095EB !important;
  border-bottom: 2px solid #0095EB !important;
}
@media only screen and (max-width: 600px) and (min-width: 425px) {
  .button {
    display: none;
  }
  .image{
    width: 20%;
  }
  .title{
    width: 80%;
  }
}

@media only screen and (max-width: 425px) {
  .button {
    display: none;
  }
  .image{
    width: 25%;
  }
  .title{
    width: 75%;
  }
  .contributor-content {
      text-align: center;
  }
}
</style>
@endpush
@section('content')
<div class="d-flex flex-column-fluid mt-5">
  <div class="container">
    <div class="row"  data-sticky-container>
        <div class="col-lg-8 mb-5">
            <div class="card card-custom mb-5">
                <div class="card-body"> 
                    <p class="pt-4">
                      @lang('home.desc')
                        <a href="https://cmlabs.co" style="color: #0095EB"><b>@lang('home.link')</b></a>
                    </p>
                </div>
            </div>
            <div class="card card-custom mb-5">
                <div class="card-header border-0">
                  <div class="card-title">
                     <h2 class="card-label pt-4">@lang('home.feature')</h2>
                   </div>
                  </div>
                <div class="card-body">
                    @foreach($data as $datum)
                    <table class="mb-10" width="100%">
                      <tr >
                        <th rowspan="2" width="13%" class="image"><span class="svg-icon svg-icon-2x p-4" style="background-color:#EBFAFF; border-radius:5px">
                            {!! $datum['img'] !!}
                        </span></th>
                        <td width="72%" class="title"><span class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$datum['title']}}</span></td>
                        <td rowspan="2" width="15%" class="button"><a href="{{'/'.$local.$datum['route']}}" class="btn btn-sm text-white font-weight-bolder text-uppercase form-control" style="background-color: #0095EB">Launch</a></td>
                      </tr>
                      <tr>
                        <td><a href="{{'/'.$local.$datum['route']}}" class="mr-lg-8 mr-5 mb-lg-0 mb-2" style="color:#0095EB">@lang('home.detail-link')</a></td>
                      </tr>
                    </table>
                    @endforeach
                </div>
            </div>
            <div class="card card-custom mb-5">
              <div class="card-header border-0">
                <div class="card-title">
                  <h2 class="card-label pt-4">@lang('home.seo-title')</h2>
                </div>
              </div>
              <div class="card-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="contributor-slider">
                             <div>
                                 <div class="row mb-5">
                                     <div class="col-lg-5 col-md-6 col-sm-12 text-center mb-5">
                                         <div class="symbol symbol-60 symbol-circle symbol-xl-90 mb-5">
                 							<div class="symbol-label" style="background-image: url('media/images/seo-contributor.png')"></div>
                 						</div>
                 						<h4 class="font-weight-bold my-2">Ilman Akbar</h4>
                 						<div class="text-muted mb-2">Digital Marketing</div>
                                     </div>
                                     <div class="col-lg-7 col-md-6 col-sm-12">
                                         <div class="contributor-content">
                                             <h4 class="font-weight-bold my-2 mb-4">Content Writing – Panduan & Cara Buat Artikel SEO</h4>
                                             <p>
                                                 Ingin belajar cara buat artikel SEO? Disini, panduan online cmlabs akan membantu kamu belajar apa itu Content Writing dengan cara yang tepat!
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div>
                                 <div class="row mb-5">
                                     <div class="col-lg-5 col-md-6 col-sm-12 text-center mb-5">
                                         <div class="symbol symbol-60 symbol-circle symbol-xl-90 mb-5">
                 							<div class="symbol-label" style="background-image: url('media/images/seo-contributor-2.png')"></div>
                 						</div>
                 						<h4 class="font-weight-bold my-2">Alif Seyta</h4>
                 						<div class="text-muted mb-2">SEO Content Writer</div>
                                     </div>
                                     <div class="col-lg-7 col-md-6 col-sm-12">
                                         <div class="contributor-content">
                                             <h4 class="font-weight-bold my-2 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit</h4>
                                             <p>
                                                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div>
                                 <div class="row mb-5">
                                     <div class="col-lg-5 col-md-6 col-sm-12 text-center mb-5">
                                         <div class="symbol symbol-60 symbol-circle symbol-xl-90 mb-5">
                 							<div class="symbol-label" style="background-image: url('media/images/seo-contributor-3.png')"></div>
                 						</div>
                 						<h4 class="font-weight-bold my-2">Rifqi Ardhian</h4>
                 						<div class="text-muted mb-2">Web Developer</div>
                                     </div>
                                     <div class="col-lg-7 col-md-6 col-sm-12">
                                         <div class="contributor-content">
                                             <h4 class="font-weight-bold my-2 mb-4">Seberapa Besar Kontribusi SEO dalam Sebuah Website</h4>
                                             <p>
                                                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-12 text-center">
                         <span>
                             <button class="btn btn-prev btn-icon btn-circle flaticon2-back btn-light-twitter mr-3"></button>
                         </span>
                         <span>
                             <button class="btn btn-next btn-icon btn-circle flaticon2-next btn-light-twitter ml-3"></button>
                         </span>
                     </div>
                 </div>
              </div>
            </div>
            <div class="card card-custom mb-5">
              <div class="card-header border-0">
                <div class="card-title">
                  <h2 class="card-label pt-4">Why Choose Us</h2>
                </div>
              </div>
              <div class="card-body">
                <table class="mb-10" width="100%">
                  <tr >
                    <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="svg-icon svg-icon-2x p-4" style="background-color:#EBFAFF; border-radius:5px; color:#0095EB">
                        01
                    </span></th>
                    <td width="90%" class="title"><span class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">Lorem Ipsum</span></td>
                  </tr>
                  <tr>
                    <td> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> </td>
                  </tr>
                </table>

                <table class="mb-10" width="100%">
                  <tr >
                    <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="svg-icon svg-icon-2x p-4" style="background-color:#EBFAFF; border-radius:5px; color:#0095EB">
                        02
                    </span></th>
                    <td width="90%" class="title"><span class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">Lorem Ipsum</span></td>
                  </tr>
                  <tr>
                    <td> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> </td>
                  </tr>
                </table>

                <table class="mb-10" width="100%">
                  <tr >
                    <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="svg-icon svg-icon-2x p-4" style="background-color:#EBFAFF; border-radius:5px; color:#0095EB">
                        03
                    </span></th>
                    <td width="90%" class="title"><span class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">Lorem Ipsum</span></td>
                  </tr>
                  <tr>
                    <td> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="card card-custom mb-5">
              <div class="card-body">
                  <h4>Lorem Ipsum</h4>
                  <ul class="nav nav-tabs nav-tabs-line nav-bolder nav-tabs-line-2x justify-content-center mb-5">
                     <li class="nav-item">
                         <a class="nav-link mr-10 active" data-toggle="tab" href="#importantnotes">Important Notes</a>
                     </li>
                     <li class="nav-item ml-10">
                         <a class="nav-link" data-toggle="tab" href="#howtouse">How To Use</a>
                     </li>
                </ul>
                <div class="tab-content mt-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="importantnotes" role="tabpanel" aria-labelledby="importantnotes">
                        <table width="100%" class="mb-5">
                          <tr>
                            <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                            <td width="90%">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </td>
                          </tr>
                        </table>
                        <table width="100%" class="mb-5">
                          <tr>
                            <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                            <td width="90%">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </td>
                          </tr>
                        </table>
                        <table width="100%" class="mb-5">
                          <tr>
                            <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                            <td width="90%">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </td>
                          </tr>
                        </table>
                        <table width="100%" class="mb-5">
                          <tr>
                            <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                            <td width="90%">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </td>
                          </tr>
                        </table>
                        <table width="100%" class="mb-5">
                          <tr>
                            <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                            <td width="90%">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </td>
                          </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="howtouse" role="tabpanel" aria-labelledby="howtouse">
                        <table width="100%" class="mb-5">
                          <tr>
                            <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                            <td width="90%">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </td>
                          </tr>
                        </table>
                        <table width="100%" class="mb-5">
                          <tr>
                            <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                            <td width="90%">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </td>
                          </tr>
                        </table>
                        <table width="100%" class="mb-5">
                          <tr>
                            <th rowspan="2" class="pt-4" valign="top" width="10%"><span class="flaticon2-check-mark pr-4 pl-4 pt-3 pb-3" style="background-color:#EBFAFF; border-radius:50%; color:#0095EB"></span></th>
                            <td width="90%">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
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
                  <h2 class="card-label pt-4">FAQ</h2>
                </div>
              </div>
              <div class="card-body">
                <div class="accordion accordion-light accordion-toggle-arrow" id="accordionExample2">
                 <div class="card">
                  <div class="card-header" id="headingOne2">
                   <div class="card-title" data-toggle="collapse" data-target="#collapseOne2">
                    Apa itu CMLABS tools?
                   </div>
                  </div>
                  <div id="collapseOne2" class="collapse show" data-parent="#accordionExample2">
                   <div class="card-body">
                    CMLABS tools adalah lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                   </div>
                  </div>
                 </div>
                 <div class="card">
                  <div class="card-header" id="headingTwo2">
                   <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo2">
                    Apa saja yang tools yang sudah rilis?
                   </div>
                  </div>
                  <div id="collapseTwo2" class="collapse"  data-parent="#accordionExample2">
                   <div class="card-body">
                    CMLABS tools adalah lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                   </div>
                  </div>
                 </div>
                 <div class="card">
                  <div class="card-header" id="headingThree2">
                   <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree2">
                    Siapa yang butuh tools ini?
                   </div>
                  </div>
                  <div id="collapseThree2" class="collapse" data-parent="#accordionExample2">
                   <div class="card-body">
                    CMLABS tools adalah lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                   </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
        </div>
        @include('layouts/stickybar')
    </div>
  </div>
</div>
@endsection

@push('script')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('js/slick.js')}}"></script>
@endpush

<!-- home -->
@section('home')
menu-item-active
@endsection
