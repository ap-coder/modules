@extends('mcode::site.layouts.mcodes')

@section('slider')
    @include('mcode::site.mcodes.partials.masthead')
@endsection

@section('styles') 
{{-- <link href="{{ asset('multiple/multiple.css') }}" rel="stylesheet"> --}}

{{-- https://multiple.js.org/ --}}

<style>
.thumb-info .thumb-info-title {background: rgba(59, 69, 80, 0.4); max-width: 100%; width: 100%; overflow: visible; bottom: 2%; }

.config-header {
  display: flex;
  flex-wrap: wrap;
}



.wizard-container::before,
.wizard-container::after {
  /* content: ""; */
  /* flex-basis: 100%;  */
  /* order: 2; */
   display: flex;
   flex-flow: column wrap;
   
   
}

.wizard-container {
  display: flex; 
  justify-content: space-between;
  
}

.layout-item {
  height: 100px;
  width: 100px; 

}


.layout-item-center {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.process-item  {
    
  margin-left: 2%;
  justify-content: space-between;
  flex-direction:;
}

.layout-item .dot  { width: 10%; }
.layout-item .line  { width: 40%; }

 


</style>
@endsection

@section('content')

	<section class="page-header page-header-modern page-header-background page-header-background-pattern page-header-background-sm overlay overlay-color-dark overlay-show overlay-op-5">
		<div class="container">
			<div class="row config-header">

				<div id="top-block" class="col-md-12 align-self-center p-static order-2 text-center">
			 
					<h1 class="logo-mask">Welcome, what hardware would you like to configure?</h1>
				</div>
				<div class="wizard-container">
					<div class="layout-item"></div>
					<div class="layout-item layout-item-center">
						<div class="process-item dot"><i class="fas fa-circle"></i></div>
						<div class="process-item line"><i class="fas fa-horizontal-rule"></i></div>
						<div class="process-item dot"><i class="far fa-circle"></i></div>
						<div class="process-item line"></div>
						<div class="process-item dot"><i class="far fa-circle"></i></div>
						<div class="process-item line"></div>
						<div class="process-item dot"><i class="far fa-circle"></i></div>	
					</div>
					<div class="layout-item"></div>
				</div>


			</div>
		</div>
	</section>

 

<ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="team" data-option-key="filter">
	<li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
	<li class="nav-item" data-option-value=".leadership"><a class="nav-link text-1 text-uppercase" href="#">Leadership</a></li>
	<li class="nav-item" data-option-value=".marketing"><a class="nav-link text-1 text-uppercase" href="#">Marketing</a></li>
	<li class="nav-item" data-option-value=".development"><a class="nav-link text-1 text-uppercase" href="#">Development</a></li>
	<li class="nav-item" data-option-value=".design"><a class="nav-link text-1 text-uppercase" href="#">Design</a></li>
</ul>

<div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
	<div class="row team-list sort-destination" data-sort-id="team">
		@foreach($mcodes as $product)
		<div class="col-12 col-sm-6 col-lg-3 isotope-item leadership">
			<span class="thumb-info thumb-info-hide-wrapper-bg mb-4">
				<span class="thumb-info-wrapper">
					<a href="about-me.html">
						@if(\App::environment() === 'local')
							<img itemprop="url contentUrl" class="img-fluid" src="https://dummyimage.com/400x400/000/fff.jpg">
						@elseif($product->photo)
							{{-- <img itemprop="url contentUrl" class="img-fluid" src="https://dummyimage.com/400x400/000/fff.jpg"> --}}
							{{ $product->getFirstMediaUrl('photo') }}
						@else
							<img itemprop="url contentUrl" class="img-fluid" src="https://dummyimage.com/400x400/000/fff.jpg">
						@endif

						<span class="thumb-info-title">
							<span class="thumb-info-inner">{{ $product->name ?? '' }}</span>
							{{-- <span class="thumb-info-type"></span> --}}
						</span>
					</a>
				</span>
				 
			</span>
		</div>
		@endforeach
	</div>
</div>



 


			<div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
				<div class="row team-list sort-destination" data-sort-id="configs">

					{{-- @if (isset($mcodes)) --}}
					@foreach($mcodes as $product)
					{{-- @foreach($product->associatedProductsDocs as $doc) --}}
						{{-- @foreach ($doc->doctypes as $type) --}}
							{{-- @if($type->slug == 'm-code') --}}


							<div class="col-12 col-sm-6 col-lg-3 isotope-item ">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-4">
									<span class="thumb-info-wrapper">



											{{-- @foreach($doc->files as $key => $media) --}}
											<a href=" " target="_blank">

											{{-- @if($env == 'local') --}}
												<img itemprop="url contentUrl" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" src="https://dummyimage.com/400x400/000/fff.jpg">
											{{-- @elseif($doc->m_code_image)
												<img src="{{ $doc->m_code_image->getUrl('mcode') }}" class="img-fluid" alt="">
		 									@elseif($product->config_catalog_image)
					                          	<img src="{{ $product->config_catalog_image->getUrl('shop') }}" class="img-fluid" alt="">
					                        @else
					                            	<img itemprop="url contentUrl" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" src="https://dummyimage.com/400x400/000/fff.jpg">
					                        @endif --}}

											<span class="thumb-info-title lightbackground">
												<span class="thumb-info-inner">  $product->name  </span>
												<span class="thumb-info-type bg-secondary">   App\Models\Doc::CONFIG_CATALOG_FILTER_SELECT[$doc->config_catalog_filter] </span>
											</span>
										</a>
										{{-- @endforeach --}}
									</span>
								</span>
							</div>
							{{-- @endif --}}
						{{-- @endforeach --}}
					{{-- @endforeach --}}
				@endforeach
					{{-- @endif --}}






			</div>

		</div>

<hr class="invisible">
<hr class="invisible pb-4">

@endsection

@section('below-content')
@endsection

@section('scripts')
@parent



<script src="{{ asset('site/js/examples/examples.portfolio.js') }}"></script>

{{-- <script src="{{ asset('multiple/multiple.min.js') }}"></script> --}}

 
<script>
	var granimInstance = new Granim({
	    element: '#logo-canvas',
	    direction: 'left-right',
	    states : {
	        "default-state": {
	            gradients: [
	                ['#EB3349', '#F45C43'],
	                ['#FF8008', '#FFC837'],
	                ['#4CB8C4', '#3CD3AD'],
	                ['#24C6DC', '#514A9D'],
	                ['#FF512F', '#DD2476'],
	                ['#DA22FF', '#9733EE']
	            ],
	            transitionSpeed: 2000
	        },
		        "dark-state": {
	            gradients: [
	                ['#757F9A', '#D7DDE8'],
	                ['#5C258D', '#4389A2']
	            ],
	            transitionSpeed: 5000,
	            loop: true
	        }
	    },
		     onStart: function() {
	        console.log('Granim: onStart');
	    },
	    onGradientChange: function(colorDetails) {
	        console.log('Granim: onGradientChange, details: ');
	        console.log(colorDetails);
	    },
	    onEnd: function() {
	        console.log('Granim: onEnd');
	    }
	});
</script>

@endsection



{{-- 

https://colorlib.com/etc/bwiz/colorlib-wizard-1/index.html
https://colorlib.com/wp/free-bootstrap-wizards/

https://bbbootstrap.com/snippets/multi-step-form-wizard-30467045


 --}}