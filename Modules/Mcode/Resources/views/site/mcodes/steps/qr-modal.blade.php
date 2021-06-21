<!-- Modal Header -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <ul class="qr_icons">
      <li><i class="fas fa-share-square"></i></li>
      <li class="downloadSingledPdf"><a href="javascript:void(0);"><img src="{{ url('site/img/download.png') }}"></a></li>
      <li><img src="{{ url('site/img/printer.png') }}"></li>
    </ul>
  </div>

  <!-- Modal body -->
  <div class="modal-body">
    <div class="row">
      <div class="col-md-6">
 


 
      </div>
      <div class="col-md-6">
        <h2>Includes</h2>
        <ul>
          <li>{!! $feature->description ?? '' !!} <br> <span>{!! $feature->mcode ?? '' !!}</span></li>
          {{--  <li>1 Second Duplicate Scan Delay <br> <span>CDVASBI000</span></li>  --}}
        </ul>
      </div>
      
    </div>
  </div>

  <!-- Modal footer -->
  <div class="modal-footer productNameonFooter">
    <span>This is for {{ $product->name ?? '' }} configuration.</span>
  </div>