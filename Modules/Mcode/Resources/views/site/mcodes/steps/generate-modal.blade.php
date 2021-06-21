@php
    // $ss=implode(' ', $features->pluck('source_string')->toArray());

    // $string = Modules\Mcode\Helpers\Format::combinedSource($ss);
@endphp

<!-- Modal Header -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <ul class="qr_icons">
      <li><i class="fas fa-share-square"></i></li>
      <li class="seperate" click="false"><img src="{{ url('site/img/seperate.png') }}"></li>
      <li class="downloadPdf"><a href="javascript:void(0);"><img src="{{ url('site/img/download.png') }}"></a></li>
      <li><img src="{{ url('site/img/printer.png') }}"></li>
    </ul>
  </div>

  <!-- Modal body -->
  <div class="modal-body">
    <div class="row" id="combined"> 
      <div class="col-md-5">
        <h2>Includes</h2>
        <ul>
          @foreach ($features as $feature)
            <li>{!! $feature->description ?? '' !!} <br> <span>{!! $feature->mcode ?? '' !!}</span></li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-7">
         {{-- <img class="qr_code_img" src="{{ url('site/img/qr_code.jpg') }}"> --}}



          blah blah blah 

            {{-- {!! dump($ss) !!} --}}

            {{-- @if(str_starts_with($feature->mcode, 'M2'))
            CODE HERE: {!! dump($feature->formatted_source_string) !!} 
            <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
            @else
            CODE HERE: {!!  dump($feature->formatted_source_string)  !!} 
            <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
            @endif --}}
   
      </div>
    </div>

    <div class="row" id="saprater" style="display: none;">
      @foreach ($features as $key => $feature)
      <div class="col-md-6 saprater @if($key % 2 == 0) sapraterBorder @endif">
        {{-- {!! QrCode::size(150)->generate($feature->formatted_source_string) !!} --}}
        {{-- <h2>{{ $feature->mcode ?? '' }}</h2> --}}
        <h3>{{ $feature->description ?? '' }}</h3>
        <span>{{ $feature->mcode ?? '' }}</span>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Modal footer -->
  <div class="modal-footer">
    <button type="button" class="finishedBtn">Finished</button>
  </div>