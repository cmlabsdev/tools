<div id="kt_header" class="header header-fixed" >
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Left-->
        <div class="d-flex align-items-stretch mr-2">
            <!--begin::Page Title-->
            @if(request()->path() == "/")
            <h1 class="d-none text-dark d-lg-flex align-items-center mr-10 mb-0 h3">@lang('layout.title')</h1>
            @else
            <span class="d-none text-dark d-lg-flex align-items-center mr-10 mb-0 h3">@lang('layout.title')</span>
            @endif
            <!--end::Page Title-->
        </div>
        <!--end::Left-->
        <!--begin::Topbar-->
        <div class="topbar">

            <!--begin::User-->

            <div class="topbar-item">

            @if($local == "id")
                <a href="/analytics" style="margin-right:25px; color: black;">
                    Analitik
                </a>
                @else
                <a href="/analytics" style="margin-right:25px; color: black;">
                     Analytics
                </a>
                @endif

                @if($local == "id")
                <!-- <a href="https://cmlabs.co/" class="mr-3"> -->
                <div class="dropdown dropdown-inline">
                    <a href="#" data-toggle="dropdown" aria-expanded="false" style="margin-right:25px; color: black;">
                        Blog & Panduan
                    </a>
                    <div class="dropdown-menu dropdown-menu-md py-5">
                        <ul class="navi navi-hover">
                            <li class="navi-item">
                                <a class="navi-link" href="https://cmlabs.co/kamus-seo/">
                                <span class="navi-icon"><i class="fa fa-bookmark text-black-90"></i></span>
                                    <span class="navi-text">Kamus SEO</span>
                                    <span class="label label-dark-80 font-weight-bold label-inline">50+</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link" href="https://cmlabs.co/panduan-seo/">
                                    <span class="navi-icon"><i class="fa fa-bookmark text-black-90"></i></span>
                                    <span class="navi-text">Panduan SEO</span>
                                    <span class="label label-dark-80 font-weight-bold label-inline">20+</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link" href="https://cmlabs.co/blog/">
                                <span class="navi-icon"><i class="fa fa-bookmark text-black-90"></i></span>
                                    <span class="navi-text">Blog</span>
                                    <span class="label label-dark-80 font-weight-bold label-inline">50+</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                <a href="https://cmlabs.co/en/" class="mr-3">
                <div class="dropdown dropdown-inline">
                    <a href="#" data-toggle="dropdown" aria-expanded="false" style="margin-right:25px; color: black">
                        Blog & Resource
                    </a>
                    <div class="dropdown-menu dropdown-menu-md py-5">
                        <ul class="navi navi-hover">
                            <li class="navi-item">
                                <a class="navi-link" href="https://cmlabs.co/en/seo-terms/">
                                <span class="navi-icon"><i class="fa fa-bookmark text-black-90"></i></span>
                                    <span class="navi-text">SEO Terms</span>
                                    <span class="label label-dark-80 font-weight-bold label-inline">50+</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link" href="https://cmlabs.co/en/seo-guide/">
                                <span class="navi-icon"><i class="fa fa-bookmark text-black-90"></i></span>
                                    <span class="navi-text">SEO Guide</span>
                                    <span class="label label-dark-80 font-weight-bold label-inline">20+</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a class="navi-link" href="https://cmlabs.co/en/blog/">
                                <span class="navi-icon"><i class="fa fa-bookmark text-black-90"></i></span>
                                    <span class="navi-text">Blog's</span>
                                    <span class="label label-dark-80 font-weight-bold label-inline">50+</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif

                <div class="dropdown mr-3">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right:25px; color: black">
                    @lang('layout.language')
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/en/version" style="margin-right:25px; color: black">
                           <span class="ml-1">English</span>
                         </a>
                        <a class="dropdown-item" href="/id/version" style="margin-right:25px; color: black">
                           <span class="ml-1">Indonesia</span>
                        </a>
                    </div>
                </div>
                  <!-- <button type="button" class="btn btn-fixed-height" name="button" style="background-color:#32D1FF; color:white">
                    <img alt="Logo" src="{{asset('media/logos/logo-letter-10.png')}}" height="26px" class="mr-1" />
                    cmlabs</button>
                </a> -->
                <!-- <a href="/construction" class="btn btn-info pulse pulse-light btn-fixed-height">
                    <div class="pulse pulse-light">
                        <span class="pulse-ring" style="margin: -7px;"></span>
                      <span class="svg-icon svg-icon-light svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect opacity="0.300000012" x="0" y="0" width="24" height="24"/>
                              <polygon fill="#000000" fill-rule="nonzero" opacity="0.3" points="7 4.89473684 7 21 5 21 5 3 11 3 11 4.89473684"/>
                              <path d="M10.1782982,2.24743315 L18.1782982,3.6970464 C18.6540619,3.78325557 19,4.19751166 19,4.68102291 L19,19.3190064 C19,19.8025177 18.6540619,20.2167738 18.1782982,20.3029829 L10.1782982,21.7525962 C9.63486295,21.8510675 9.11449486,21.4903531 9.0160235,20.9469179 C9.00536265,20.8880837 9,20.8284119 9,20.7686197 L9,3.23140966 C9,2.67912491 9.44771525,2.23140966 10,2.23140966 C10.0597922,2.23140966 10.119464,2.2367723 10.1782982,2.24743315 Z M11.9166667,12.9060229 C12.6070226,12.9060229 13.1666667,12.2975724 13.1666667,11.5470105 C13.1666667,10.7964487 12.6070226,10.1879981 11.9166667,10.1879981 C11.2263107,10.1879981 10.6666667,10.7964487 10.6666667,11.5470105 C10.6666667,12.2975724 11.2263107,12.9060229 11.9166667,12.9060229 Z" fill="#000000"/>
                          </g>
                        </svg>
                      </span>
                        @lang('layout.paid-tools')
                    </div>
                </a> -->
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
