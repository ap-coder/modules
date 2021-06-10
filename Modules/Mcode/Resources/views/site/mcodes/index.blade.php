@extends('mcode::site.layouts.mcodes')

@section('layout',  "boxed mcodes cc-100")
@section('htmlschema', "Website")
@section('bodyschema', "WebPage")
@section('main-classes', "")
 
@section('above-main')
    @include('mcode::site.mcodes.partials.process-header')
@endsection

@section('styles') 
 
@endsection

@section('content')

 
 
 <section class="section section-default bg-color-white">
  
  <form action="#" method="POST" enctype="multipart/form-data">
  @csrf
  
    <div id="step-1">
      <div class="container"> 
      <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="mcodes" data-option-key="filter">
        <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
        <li class="nav-item" data-option-value=".current"><a class="nav-link text-1 text-uppercase" href="#">Current</a></li>
        <li class="nav-item" data-option-value=".discontinued"><a class="nav-link text-1 text-uppercase" href="#">Discontinued</a></li>
      </ul>
    
      <div class=" mt-4 pt-2">
        <div class="row team-list " data-sort-id="mcodes">
          @foreach($mcodes as $product)
          <div class="col-12 col-sm-6 col-lg-3 isotope-item leadership">
            <span class="thumb-info thumb-info-hide-wrapper-bg mb-4 nextBtn" step="1" productID="{{ $product->id }}">
              <span class="thumb-info-wrapper">
                <a href="javascript:void(0);">
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
    </div>

    <div id="step-2" style="display: none;">
      @include('mcode::site.mcodes.steps.category')
    </div>

    <div id="step-3" style="display: none;">
      
    </div>

    <input type="hidden" name="productID" id="productID">
    <input type="hidden" name="categoryIDs" id="categoryIDs">
  </form>

</section>
 
<hr class="invisible pb-4">

@endsection


                                   
<!-- The Modal -->
<div class="modal qrdetailmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      

    </div>
  </div>
</div>
 
@section('scripts')
@parent

<script>
  $(document.body).on('click', '.nextBtn' ,function(){
    var step=$(this).attr('step');
    if(step==1){
      $('#productID').val($(this).attr('productID'));
      $('#step-1').hide();
      $('#step-2').fadeIn(300);
    }else if(step==2){
      var checkboxValues = [];
      $('input[name=category]:checked').map(function() {
          checkboxValues.push($(this).val());
      });
      $('#categoryIDs').val(checkboxValues);

      var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ url('mcode/getFeature') }}",
            dataType:'json',
            method:"POST",
            data:{ids:checkboxValues, _token:_token},
            success:function(data){
              $('#step-3').html(data.html);
            }
          });

      $('#step-2').hide();
      $('#step-3').fadeIn(300);
    }
  });

  $(document.body).on('click', '.prevBtn' ,function(){
    var step=$(this).attr('step');
    if(step==2){
      $('#step-2').hide();
      $('#step-1').fadeIn(300);
    }else if(step==3){
      $('#step-3').hide();
      $('#step-2').fadeIn(300);
    }
  });


</script>

<script>
  $(document.body).on('click', '.openQrModal' ,function(){
    var id=$(this).attr('mid');
    var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ url('mcode/getQrModalDetails') }}",
            dataType:'json',
            method:"POST",
            data:{id:id, _token:_token},
            success:function(data){
              $('.qrdetailmodal .modal-content').html(data.html);
              $('.qrdetailmodal').modal('show');
            }
          });
  });
</script>

<script src="{{ asset('site/js/examples/examples.portfolio.js') }}"></script>
 

 

@endsection