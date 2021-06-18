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
      <div class="col-md-5">
        <h2>Includes</h2>
        <ul>
          <li>{{ $feature->description ?? '' }} <br> <span>{{ $feature->mcode ?? '' }}</span></li>
          {{--  <li>1 Second Duplicate Scan Delay <br> <span>CDVASBI000</span></li>  --}}
        </ul>
      </div>
      <div class="col-md-7">
        {{--  <img class="qr_code_img" src="{{ url('site/img/qr_code.jpg') }}">  --}}
        {{-- {!! QrCode::size(200)->generate($feature->formatted_source_string) !!} --}}

                        @if(str_starts_with($feature->mcode, 'M2'))
                       {{--  <img src="data:image/png;base64, '{{ DNS1D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',3,33) }}'" alt="barcode" /> --}}
                          {!! DNS2D::getBarcodeHTML($feature->formatted_source_string, 'QRCODE') !!}
                        IT DOES
                        @else
                        IT DOES NOT
                          {!! DNS2D::getBarcodeHTML($feature->formatted_source_string, 'DATAMATRIX') !!}
                        @endif

      </div>
    </div>
  </div>

  <!-- Modal footer -->
  <div class="modal-footer productNameonFooter">
    <span>This is for {{ $product->name ?? '' }} configuration.</span>
  </div>