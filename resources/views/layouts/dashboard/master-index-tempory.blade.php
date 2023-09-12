<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - #1 Selling Bootstrap 5 HTML Multi-demo Admin Dashboard ThemePurchase: https://1.envato.market/EA4JPWebsite: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: -->
<html lang="en">
<!--begin::Head-->
<head>
    <base href="../../../">
    <meta charset="utf-8"/>
    <title>{{ $title ?? 'Dashboard' }}</title>
    <meta name="description"
          content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets."/>
    <meta name="keywords"
          content="Metronic, bootstrap, bootstrap 5, Angular 11, VueJs, React, Laravel, admin themes, web design, figma, web development, ree admin themes, bootstrap admin, bootstrap dashboard"/>
    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>

   <link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}"/>

   
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <!-- work for signature -->
    
<style>
     .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* backdrop-filter: blur(10px); Adjust the blur value as needed */
            z-index: 9999; /* Ensure it's above other content */
            display: none; /* Initially hidden */
        }
</style>
    @include('layouts.dashboard.styles')
    @toastr_css
    @yield('styles')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed loader-container"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
      <div class="overlay" id="overlay"></div> <!-- Transparent overlay -->
      <!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Side bar-->
           @include('layouts.dashboard.side-bar')
        <!--end::Side bar-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            @include('layouts.dashboard.header')
            <!--end::Header-->
            <!--begin::Content-->
            @yield('content')
            <!--end::Content-->
            <!--begin::Footer-->
            @include('layouts.dashboard.footer')
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
    <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1"/>
						<path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
			</span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->
@auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endauth()
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
  @jquery  
  
   <!--  <script src="{{asset('js/Jquery-ui-min.js')}}"></script> -->
   <!--  <script src="{{ asset('js/signature.js')}}"></script> -->
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('js/image-uploader.min.js')}}"></script>
    <script type="text/javascript">
           $('.input-images').imageUploader({
               maxFiles: 1,
                imagesInputName: 'file',
           });
           $('.input-imagess').imageUploader({
               maxFiles: 5,
                imagesInputName: 'file',
           });

    </script>
    <script type="text/javascript">
         $('.menuBtn').click(function(){
             if($('.mobileView').css("display")=='block'){
                $('.mobileView').css("display", 'none')
             } else{
                $('.mobileView').css("display","block")
             }
         })
    </script>

    <!-- Using a CDN link for Spin.js -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>
<script>
    // Target the loader element
    var target = document.getElementById("kt_body");

    // Create a new Spinner instance
    var spinner = new Spinner().spin(target);

    // Show the overlay while the loader is active
    document.getElementById("overlay").style.display = "block";

    // Hide the loader and overlay when the DOM content is loaded
    document.addEventListener("DOMContentLoaded", function () {
        spinner.stop();
        // Hide the overlay
        document.getElementById("overlay").style.display = "none";
    });
</script> --}}

@include('layouts.dashboard.scripts')
@toastr_js
@toastr_render

@yield('scripts')
{{-- <script>
    // Show the loader when data loading starts
    $(".loader-container").show();

    // Listen for the complete page load event
    $(window).on("load", function() {
        // Hide the loader when the complete page is loaded
        $(".loader-container").hide();
    });

</script> --}}
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
