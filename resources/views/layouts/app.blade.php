<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <!--begin::Head-->
  <head>
    @include('partials.head')
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body>
    <!--begin::Main-->
    <script>
      @php
        if (isset($success)){ echo "Swal.fire({title:'Berhasil', text:'$success', icon:'success'})"; } 
        if (isset($error))  { echo "Swal.fire({title:'Error!',   text:'$error',   icon:'error'});"; } 
      @endphp
    </script>
    <div class="d-flex flex-column flex-root">

      <div class="docs-page d-flex flex-row flex-column-fluid">
        @include('partials.sidebar')
        <div class="docs-wrapper d-flex flex-column flex-row-fluid" id="kt_docs_wrapper">
          @include('partials.header')
          <!--begin::Content-->
          <div class="docs-content d-flex flex-column flex-column-fluid" id="kt_docs_content">
            <!--begin::Container-->
            <div class="container" id="kt_docs_content_container">
              <!--begin::Card-->
              <div class="card mb-2">
                <!--begin::Card Body-->
                <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
                  <!--begin::Section-->
                    @yield('content')
                  <!--end::Section-->
                </div>
                <!--end::Card Body-->
              </div>
              <!--end::Card-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Content-->
          <!--begin::Footer-->
            @include('partials.footer')
          <!--end::Footer-->
        </div>
      </div>
      
    </div>
    <!--end::Main-->
    <?php //include("../views/includes/exolore.php")?>
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
      <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
      <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
          <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
        </svg>
      </span>
      <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    @include('partials.script')
  </body>
  <!--end::Body-->
</html>