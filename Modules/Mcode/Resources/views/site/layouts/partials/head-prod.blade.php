


		{{-- <meta name="google-site-verification" content="mjoFd7udDjgipWDA00XzsK7w3sdTB9J6tj1OWUG_hGk" /> --}}
 		{!! Robots::metaTag() !!}

		{!! SEO::generate(true) !!}

		<!-- Mobile Metas -->

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Permanent+Marker&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('site/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/animate/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
{{--  --}}
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

		<!-- New analytics for the new website / Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-2202525-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-2202525-1');
		</script>

		<!-- Google Tag Manager -->
		<script>
			(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
				var f=d.getElementsByTagName(s)[0], j=d.createElement(s), dl=l!='dataLayer'?'&l='+l:'';j.async=true;
				j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;
				f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-MQ96DWR');
        	</script>


		<!-- Head Libs -->
		<script src="{{ asset('site/vendor/modernizr/modernizr.min.js') }}"></script>
        <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>

