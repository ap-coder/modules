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
   section.section {background: white; border-top: none!important; }
  .thumb-info .thumb-info-title {bottom: 0; }
  .container { display: flex; flex-wrap: wrap; }
  .config-header { flex: 1; }
  .process-container { display: flex; position: relative; flex: 1; margin: 2em 0; }
  .layout-item { display: flex; flex: 1; }
  .process-item { display: flex; flex: 1; }
  .left-side, .right-side { flex-basis: 20%; }
  .layout-item-center { justify-content: space-between; flex-basis: 40%; position: relative; }
  .dot { flex-basis: 20px; }
  .line { flex-basis: 70%; }
  .line::after { content: ''; width: 90%; height: 10px; border-radius: 5px;background: black; display: block; position: relative; top: .25em; margin: 0 auto; }
  .white::after { content: ''; width: 90%; height: 10px; border-radius: 5px;background: white; display: block; position: relative; top: .25em; margin: 0 auto; transition: all .6s ease;}
  input#source_string { font-family: CONSOLAS; font-size: 24px; }
  html.boxed .main { overflow: inherit !important;}

.modal-body.qrmodal  .row .col-md-6:nth-child(1) {margin: 0 auto!important; flex: 0; }
.modal-body.qrmodal  .row .col-md-6:nth-child(2) {margin: 0!important; flex: 1; }

 

 </style>
@endsection

@section('content')

 
 
 <section class="section section-default bg-color-white" style="min-height: calc(100vh - 1000px);">
  
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
                  @if(!\App::environment() === 'local')
                    <img itemprop="url contentUrl" class="img-fluid" src="https://dummyimage.com/400x400/000/fff.jpg">
                  @elseif($product->photo)
                    <img itemprop="url contentUrl" class="img-fluid" src="{{ $product->getFirstMediaUrl('photo') }}">
                    
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
      {{--  @include('mcode::site.mcodes.steps.category')  --}}
    </div>

    <div id="step-3" style="display: none;">
      
    </div>

    <input type="hidden" name="productID" id="productID">
    <input type="hidden" name="categoryIDs" id="categoryIDs">
    <input type="hidden" name="featureIDs" id="featureIDs">
  </form>

</section>
 
<hr class="invisible pb-4">

@endsection


                                   
<!-- The qrdetailmodal Modal -->
<div class="modal qrdetailmodal qrmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      

    </div>
  </div>
</div>

<!-- The generatemodal Modal -->
<div class="modal generatemodal qrmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      

    </div>
  </div>
</div>
 
@section('scripts')
@parent

<script>
  
  $(document.body).on('click', '.downloadPdf' ,function(){
    var productID=$('#productID').val();
    var categoryIDs=$('#categoryIDs').val();
    var featureIDs=$('#featureIDs').val();
    var url="{{ url('mcode/getPdf') }}?productID="+productID+"&categoryIDs="+categoryIDs+"&featureIDs="+featureIDs;
    window.open(
      url,
  '_blank' // <- This is what makes it open in a new window.
);
  });

  $(document.body).on('click', '.downloadSingledPdf' ,function(){
    var productID=$('#productID').val();
    var categoryIDs=$('#categoryIDs').val();
    var featureIDs=$('#featureIDs').val();
    var url="{{ url('mcode/getSinglePdf') }}?productID="+productID+"&categoryIDs="+categoryIDs+"&featureIDs="+featureIDs;
    window.open(
      url,
  '_blank' // <- This is what makes it open in a new window.
);
  });

  $(document.body).on('click', '.seperate' ,function(){
    var click = $(this).attr('click');
    if (click=='false') {
      $(this).attr('click','true');
      $(this).addClass('active');
      $('#combined').hide();
      $('#saprater').show();
    } else {
      $(this).attr('click','false');
      $(this).removeClass('active');
      $('#combined').show();
      $('#saprater').hide();
    }
  });

  $(document.body).on('click', '.nextBtn' ,function(){
    var step=$(this).attr('step');
    if(step==1){
      var productID=$(this).attr('productID');
      $('#productID').val(productID);

      var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ url('mcode/getCategory') }}",
            dataType:'json',
            method:"POST",
            data:{productID:productID, _token:_token},
            success:function(data){
              $('#step-2').html(data.html);
            }
          });

      $('#step-1').hide();
      $('#step-2').fadeIn(1000);
      $('.stepone').addClass('white');
      $('.stepone i').removeClass('far');
      $('.stepone i').addClass('fas');
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
      $('#step-3').fadeIn(1000);
      $('.steptwo').addClass('white');
      $('.steptwo i').removeClass('far');
      $('.steptwo i').addClass('fas');
    }
  });

  $(document.body).on('click', '.prevBtn' ,function(){
    var step=$(this).attr('step');
    if(step==2){
      $('#step-2').hide();
      $('#step-1').fadeIn(1000);
      $('.stepone').removeClass('white');
      $('.stepone i').removeClass('fas');
      $('.stepone i').addClass('far');
    }else if(step==3){
      $('#step-3').hide();
      $('#step-2').fadeIn(1000);
      
      $('.steptwo').removeClass('white');
      $('.steptwo i').removeClass('fas');
      $('.steptwo i').addClass('far');
    }
  });

  $(document.body).on('change', '.category_box .checkboxinput' ,function(){
    var checkboxValues = [];
      $('input[name=category]:checked').map(function() {
          checkboxValues.push($(this).val());
      });

    if (checkboxValues.length>0) {
      $('#categoryButton').prop("disabled", false);
      $('#categoryButton').removeClass('disabled');
    }else{
      $('#categoryButton').prop("disabled", true);
      $('#categoryButton').addClass('disabled');
    }
      
  });

  $(document.body).on('change', '.selectfeture .feturecheckbox' ,function(){
    var feturecheckbox = [];
      $('input[name=feturecheckbox]:checked').map(function() {
        feturecheckbox.push($(this).val());
      });
      $('#featureIDs').val(feturecheckbox);

    if (feturecheckbox.length>0) {
      $('#GenerateButton').prop("disabled", false);
      $('#GenerateButton').removeClass('disabled');
    }else{
      $('#GenerateButton').prop("disabled", true);
      $('#GenerateButton').addClass('disabled');
    }
      
  });
</script>

<script>
  $(document.body).on('click', '.openQrModal' ,function(){
    var id=$(this).attr('mid');
    $('#featureIDs').val(id);
    var productID=$('#productID').val();
    var _token = $('input[name="_token"]').val();
    
          $.ajax({
            url:"{{ url('mcode/getQrModalDetails') }}",
            dataType:'json',
            method:"POST",
            data:{id:id,productID:productID, _token:_token},
            success:function(data){
              $('.qrdetailmodal .modal-content').html(data.html);
              $('.qrdetailmodal').modal('show');
            }
          });
  });
  $(document.body).on('click', '#GenerateButton' ,function(){
    var checkboxValues = [];
      $('input[name=feturecheckbox]:checked').map(function() {
          checkboxValues.push($(this).val());
      });
      $('#featureIDs').val(checkboxValues);
    var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ url('mcode/getGenerateModalDetails') }}",
            dataType:'json',
            method:"POST",
            data:{ids:checkboxValues, _token:_token},
            success:function(data){
              $('.generatemodal .modal-content').html(data.html);
              $('.generatemodal').modal('show');
            }
          });
  });

</script>

<script>
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("categorybox");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

function FilterNext() {
  var checkboxes = document.getElementById("categorybox");
  checkboxes.style.display = "none";
  expanded = false;
}



var expandedRadio = false;

function showRadioboxes() {
  var checkboxes = document.getElementById("orderby");
  if (!expandedRadio) {
    checkboxes.style.display = "block";
    expandedRadio = true;
  } else {
    checkboxes.style.display = "none";
    expandedRadio = false;
  }
}

function SearchIcon() {
  var checkboxes = document.getElementById("categorybox");
  var radios = document.getElementById("orderby");
  checkboxes.style.display = "none";
  expanded = false;
  radios.style.display = "none";
  expandedRadio = false;
}
</script>

<script src="{{ asset('site/js/examples/examples.portfolio.js') }}"></script>
 

 

@endsection