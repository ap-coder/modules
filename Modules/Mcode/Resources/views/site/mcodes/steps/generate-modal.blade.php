<!-- Modal Header -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <ul class="qr_icons">
      <li><i class="fas fa-share-square"></i></li>
      <li class="seperate" click="false"><img src="{{ url('site/img/seperate.png') }}"></li>
      <li><a target="_blank" href="{{ url('mcode/getPdf') }}"><img src="{{ url('site/img/download.png') }}"></a></li>
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
            <li>{{ $feature->description ?? '' }} <br> <span>{{ $feature->mcode ?? '' }}</span></li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-7">
         {{-- <img class="qr_code_img" src="{{ url('site/img/qr_code.jpg') }}"> --}}
        @php
            $mcodes=implode(' ',$features->pluck('mcode')->toArray());
            $string = Modules\Mcode\Helpers\Format::combinedSource($mcodes);
        @endphp

        <img src="data:image/png;base64, {!! base64_encode(QrCode::eyeColor(0, 204,0,0, 204,0,0 )->eyeColor(2, 204,0,0, 0,0,0 )->eyeColor(1, 204,0,0, 0,0,0 )->format('png')->size(300)->generate($string)) !!} ">
      </div>
    </div>

    <div class="row" id="saprater" style="display: none;">
      @foreach ($features as $key => $feature)
      <div class="col-md-6 saprater @if($key % 2 == 0) sapraterBorder @endif">
        {!! QrCode::eyeColor(0, 204,0,0, 204,0,0 )->eyeColor(2, 204,0,0, 0,0,0 )->eyeColor(1, 204,0,0, 0,0,0 )->size(150)->generate($feature->formatted_source_string) !!}
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