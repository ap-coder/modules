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
        CODE HERE: {!! $feature->formatted_source_string !!} 
        <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
          {{-- <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?> --}}
        IT DOES
        @else
        IT DOES NOT <br>
        CODE HERE: {!!  $feature->formatted_source_string  !!} 
        <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
          {{-- <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10). '" alt="barcode"   />'; ?> --}}
        @endif


                   {{--      @if(str_starts_with($feature->mcode, 'M2'))
                        
                          <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodeHTML($feature->formatted_source_string, 'QRCODE') . '" alt="barcode"   />'; ?>
                        IT DOES
                        @else
                        IT DOES NOT
                          <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodeHTML($feature->formatted_source_string, 'DATAMATRIX'). '" alt="barcode"   />'; ?>
                        @endif --}}

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