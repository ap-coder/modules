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
        @if(str_starts_with($feature->mcode, 'M2'))
          <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
        @else
          <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
        @endif
 
      </div>
      <div class="col-md-6">
        <h2>Includes</h2>
        <ul style="list-style: none!important;">
          <li><span class="text-4">{!! $feature->description ?? '' !!}</span> </li>
          <li><span class="text-4">({!! $feature->mcode ?? '' !!})</span></li>
        </ul>
      </div>
      
    </div>
  </div>
      {{-- <div class="center">
        {!! dump($feature->formatted_source_string) !!}
      </div> --}}
  <!-- Modal footer -->
  <div class="modal-footer productNameonFooter">
    <span>This is for {{ $product->name ?? '' }} configuration.</span>
  </div>