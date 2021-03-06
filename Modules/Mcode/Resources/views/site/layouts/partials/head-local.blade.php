
		<!-- LOCAL HEADER -->

		 {!! SEO::generate() !!}


		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
		{{-- {!! Minify::stylesheet(array('//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light')) !!} --}}
		<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Permanent+Marker&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('site/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/animate/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
 
		<link rel="stylesheet" href="{{ asset('site/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/magnific-popup/magnific-popup.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/bootstrap-star-rating/css/star-rating.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/css/bootstrap4-toggle.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/css/modal-video.min.css') }}">

		<!-- Theme CSS -->
{{--		{!! Minify::stylesheetDir('site/css/')->withFullUrl() !!}--}}
		<link rel="stylesheet" href="{{ asset('site/css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('site/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('site/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('site/css/theme-shop.css') }}">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{ asset('site/vendor/circle-flip-slideshow/css/component.css') }}">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('site/css/default.css') }}">
		{{-- <link rel="stylesheet" href="{{ asset('site/css/skins/default-old.css') }}"> --}}
		<link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}">
@yield('styles')
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">

 		<script src="{{ asset('site/vendor/modernizr/modernizr.min.js') }}"></script>
        <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>


