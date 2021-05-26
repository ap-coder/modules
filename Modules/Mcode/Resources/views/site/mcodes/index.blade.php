@extends('mcode::site.layouts.mcodes')

@section('slider')
    @include('mcode::site.mcodes.partials.masthead')
@endsection

@section('content')

	<section class="page-header page-header-modern page-header-background page-header-background-pattern page-header-background-sm overlay overlay-color-dark overlay-show overlay-op-5" style="background-image: url({{ asset('site/img/patterns/wild_oliva.png') }});">
		<div class="container">
			<div class="row">

				<div class="col-md-12 align-self-center p-static order-2 text-center">
					<h1>MCODE <strong>CONFIGURATOR</strong></h1>
				</div>


			</div>
		</div>
	</section>



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

@endsection
