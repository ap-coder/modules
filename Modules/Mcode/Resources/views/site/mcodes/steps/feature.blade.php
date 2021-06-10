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



{{-- <div class="container"> --}}

   
 
    <div class="mcode_step_holder feature_holder">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


          @foreach($categories as $category)
 
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="heading-{{ $loop->iteration }}">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse-{{ $loop->iteration }}" class="collapsed">
                    {{ $category->name ?? ''}}  
                  </a>
                </h4>
              </div>
              <div id="collapse-{{ $loop->iteration }}" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="heading-{{ $loop->iteration }}">
                <div class="panel-body">
                    <div class="feature_box">
                        <ul class="responsive-table">
                            <li class="table-header">
                              <div class="col col-2">Code</div>
                              <div class="col col-4">Description</div>
                              <div class="col col-2">Barcode</div>
                              <div class="col col-1">Select</div>
                            </li>

                            @foreach($category->categoriesMcodeFeatures as $feature)
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">{{ $feature->mcode ?? '' }}</div>
                              <div class="col col-4 feturedesc" data-label="Description">
                                {{ $feature->description ?? '' }}
                                <div class="row">
                                Models: &nbsp; 
                                  @foreach($feature->models as $model)
                                  <span><strong>{{ $model->model }}</strong></span>, 
                                  @endforeach
                                </div>


                                
                                {{-- @json($feature->formatted_source_string) --}}
                       
                              </div>
                              <div class="col col-2 openQrModal" data-label="Barcode" mid="{{ $feature->id }}">
                                <img src="{{  asset('site/img/modules/qr_click.png') }}" alt="qr clip to open modal" title="Click To Open">
                                 {{-- {!! QrCode::generate($feature->formatted_source_string) !!} --}}

                                  {{-- {!! dd($feature->formatted_source_string) !!} --}}
                                  {{-- {{ dd("\x01Y\x1D\x02CMCPSPM1,E01\x03\x04") }} --}}
                                {{-- {!! QrCode::generate("\x01Y\x1D\x02CMCPSPM1,EO1\x03\x04") !!} --}}

                                    {{-- {!! QrCode::eyeColor(0, 204,0,0, 204,0,0 )->eyeColor(2, 204,0,0, 0,0,0 )->eyeColor(1, 204,0,0, 0,0,0 )->size(200)->generate($feature->formatted_source_string) !!} --}}

                              </div>
                              <div class="col col-1 selectfeture" data-label="Select">
                                <label class="checkbox">
                                  <input type="checkbox" />
                                  <span class="primary"></span>
                                </label>
                              </div>
                            </li>
                            @endforeach
                           
                          </ul>
                    </div>
                </div>
              </div>
            </div>


            @endforeach

            
          </div>
   
        
        <div class="button-div">
            <button type="button" class="back">Back</button>
            <button type="button" class="next">Generate</button>
        </div>
      
    </div>
 

                                   
<!-- The Modal -->
<div class="modal qrdetailmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      

    </div>
  </div>
</div>

<hr class="invisible">
<hr class="invisible pb-4">

@endsection

@section('below-content')
@endsection

@section('scripts')
@parent

<script>
  $('.openQrModal').click(function(){
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

@endsection

