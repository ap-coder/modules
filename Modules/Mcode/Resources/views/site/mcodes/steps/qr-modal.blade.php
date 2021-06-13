<!-- Modal Header -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <ul class="qr_icons">
      <li><i class="fas fa-share-square"></i></li>
      <li><img src="{{ url('site/img/seperate.png') }}"></li>
      <li><a target="_blank" href="{{ url('mcode/getPdf') }}"><img src="{{ url('site/img/download.png') }}"></a></li>
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
        {!! QrCode::eyeColor(0, 204,0,0, 204,0,0 )->eyeColor(2, 204,0,0, 0,0,0 )->eyeColor(1, 204,0,0, 0,0,0 )->size(200)->generate($feature->formatted_source_string) !!}
      </div>
    </div>
  </div>

  <!-- Modal footer -->
  <div class="modal-footer">
    <button type="button" class="finishedBtn">Finished</button>
  </div>