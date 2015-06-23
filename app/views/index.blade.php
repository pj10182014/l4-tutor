@extends('layouts.master')
@section('css')
	<!-- Page level plugin styles START -->
	{{ HTML::style('assets/global/plugins/fancybox/source/jquery.fancybox.css'); }}
	{{ HTML::style('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css'); }}
	{{ HTML::style('assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css'); }}
	<!-- Page level plugin styles END -->
@stop
@section('contents')
	<body class='corporate'>
    @include('sliders.homepageSlider') 
@stop

@section('js')
	<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
	{{ HTML::script('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js'); }}
	{{ HTML::script('assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js'); }}
	<!-- End PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->

  <!-- BEGIN RevolutionSlider -->
  {{ HTML::script('assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js'); }}
  {{ HTML::script('assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js'); }}
  {{ HTML::script('assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js'); }}
  {{ HTML::script('assets/frontend/pages/scripts/revo-slider-init.js'); }}

	<script type="text/javascript">
        $(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            RevosliderInit.initRevoSlider();
            Layout.initTwitter();
            Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            Layout.initNavScrolling(); 
        });
    </script>
    <!-- END RevolutionSlider -->
@stop
