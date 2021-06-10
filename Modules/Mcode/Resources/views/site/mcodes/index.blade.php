@extends('mcode::site.layouts.mcodes')

@section('layout',  "boxed mcodes cc-100")
@section('htmlschema', "Website")
@section('bodyschema', "WebPage")
@section('main-classes', "")


@section('above-main')
    @include('mcode::site.mcodes.partials.process-header')
@endsection

@section('styles') 
  <style>
    .thumb-info .thumb-info-title {background: rgba(59, 69, 80, 0.4); max-width: 100%; width: 100%; overflow: visible; bottom: 2%; }
    .full-width-div {
      margin-left: calc(-100vw / 2 + 500px / 2);
      margin-right: calc(-100vw / 2 + 500px / 2);
    }

    .full-width-1 {
      overflow: visible;
      width: 100vw;
      position: absolute;
      left: 50%;
      right: 50%;
      margin-left: -50vw;
      margin-right: -50vw;
    }
  </style>
@endsection

@section('content')


        <section class="  bg-color-light-scale-7 page-header-md full-width-7">
          <div class="container-fluid">
            <div class="row align-items-center">

              <div class="col">
                <div class="row">
                  <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <div class="overflow-hidden pb-2">
                      <h1 class="text-dark font-weight-bold text-9 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="100" style="animation-delay: 100ms;">4 Columns</h1>
                    </div>
                  </div>
                  <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="300" style="animation-delay: 300ms;">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Portfolio</a></li>
                      <li class="active">Grid</li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>
 
 <section class="section section-default">
  <div class="container"> 

  <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="team" data-option-key="filter">
    <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
    <li class="nav-item" data-option-value=".current"><a class="nav-link text-1 text-uppercase" href="#">Current</a></li>
    <li class="nav-item" data-option-value=".discontinued"><a class="nav-link text-1 text-uppercase" href="#">Discontinued</a></li>
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
</div>
</section>

 
 
<hr class="invisible pb-4">

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