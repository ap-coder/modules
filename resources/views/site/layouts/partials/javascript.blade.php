

		<!-- Vendor -->
		<script src="{{ asset('site/vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('site/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
		<script src="{{ asset('site/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
		<script src="{{ asset('site/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
		<script src="{{ asset('site/vendor/popper/umd/popper.min.js') }}"></script>
		<script src="{{ asset('site/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

		<script src="{{ asset('site/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('site/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
		<script src="{{ asset('site/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
		{{-- <script src="{{ asset('site/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script> --}}

		<script src="{{ asset('site/vendor/lazysizes/lazysizes.min.js') }}"></script>

		{{-- <script src="{{ asset('site/vendor/isotope/jquery.isotope.min.js') }}"></script> --}}
		<script src="{{ asset('site/js/isotope.pkgd.js') }}"></script>
		<script src="{{ asset('site/js/packery.pkgd.min.js') }}"></script>
		<script src="{{ asset('site/js/infinite-scroll.pkgd.min.js') }}"></script>


		<script src="{{ asset('site/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('site/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

		<script src="{{ asset('site/vendor/vide/jquery.vide.min.js') }}"></script>
		<script src="{{ asset('site/vendor/vivus/vivus.min.js') }}"></script>
		<script src="{{ asset('site/js/jquery-modal-video.min.js') }}"></script>



		<script src="{{ asset('site/vendor/bootstrap-star-rating/js/star-rating.min.js') }}"></script>
		<script src="{{ asset('site/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js') }}"></script>
		<script src="{{ asset('site/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
		<script src="{{ asset('site/vendor/elevatezoom/jquery.elevatezoom.min.js') }}"></script>

		<script src="{{ asset('site/js/bootstrap4-toggle.min.js') }}"></script>

	        <script>
	        	$('a').css('cursor', 'pointer');
	        	$("figure.image img").addClass("img-fluid");
			$('#flash-overlay-modal').modal();
			$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
			$(".js-video-button").modalVideo({
				youtube:{
					controls:0,
					nocookie: true
				}
			});
		</script>
        <script src="{{ asset('site/js/jquery.equalheights.js') }}"></script>



  		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('site/js/theme.js') }}"></script>
		<!-- Current Page Vendor and Views -->
		<script src="{{ asset('site/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js') }}"></script>
		{{-- {{ url()->current() }} --}}
		{{-- @if(request->is('home')) --}}
		{{-- @if(Request::url() === '/') --}}
		{{-- @if(Route::is('home')) --}}
		<script src="{{ asset('site/js/views/view.home.js') }}"></script>
		{{-- @endif --}}

		<!-- Theme Custom -->
		{{-- <script src="{{ asset('site/js/custom.js') }}"></script> --}}
		<!-- Theme Initialization Files -->
		<script src="{{ asset('site/js/theme.init.js') }}"></script>
		<script src="{{ asset('site/js/examples/examples.gallery.js') }}"></script>

