

<!-- Modal Header -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <ul class="qr_icons">
      <li><i class="fas fa-share-square"></i></li>
      <li class="seperate" click="false"><img src="{{ url('site/img/modules/icon/seperate.png') }}"></li>
      <li class="downloadPdf"><a href="javascript:void(0);"><img src="{{ url('site/img/modules/icon/download.png') }}"></a></li>
      <li><img src="{{ url('site/img/modules/icon/printer.png') }}"></li>
    </ul>
  </div>

  <!-- Modal body -->
  <div class="modal-body">
    <div class="row" id="combined"> 
      <div class="col-md-5">
        <h2>Includes</h2>
        <ul>
{{--     @foreach($categories as $category)
      <h2>{{ $category->name ?? '' }}</h2>
      
      <ul>
         @foreach ($category->features as $feature)
          <li>
            <strong>{{ $feature->mcode ?? '' }}</strong> <small>{{ $feature->description ?? '' }}</small>  
          </li>
         @endforeach
     </ul>
    @endforeach --}}
          @foreach ($features as $feature)
            <li>{!! $feature->description ?? '' !!} <br> <span>{!! $feature->mcode ?? '' !!}</span></li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-7">
         {{-- <img class="qr_code_img" src="{{ url('site/img/qr_code.jpg') }}"> --}}
 
            {{-- {!! dump($combined_string) !!} --}}

            @if(str_starts_with($checktype, 'M2'))
            {{-- CODE HERE: {!! dump($feature->formatted_source_string) !!}  --}}
            <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'QRCODE',7,7) . '" alt="qrcode"   />'; ?>
            @else
            {{-- CODE HERE: {!!  dump($feature->formatted_source_string)  !!}  --}}
            <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'DATAMATRIX',7,7) . '" alt="barcode"   />'; ?>
            @endif
   
      </div>
    </div>

    <div class="row" id="saprater" style="display: none; text-align:center;">
      @foreach ($features as $key => $feature)
      <div class="col-md-6 saprater @if($key % 2 == 0) sapraterBorder @endif" style="text-align:center;">
            <h2>{{ $feature->mcode ?? '' }}</h2>
       
            @if(str_starts_with($feature->mcode, 'M2'))
            <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode" />'; ?>
            @else
            <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
            @endif
          <h3>{{ $feature->description ?? '' }}</h3>
     
      </div>
      @endforeach
    </div>
  </div>

  <!-- Modal footer -->
  <div class="modal-footer">
    <button type="button" class="finishedBtn">Finished</button>
  </div>