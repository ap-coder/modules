@extends('mcode::site.layouts.mcodes')


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
                              <div class="col col-4 feturedesc" data-label="Description">{{ $feature->description ?? '' }}</div>
                              <div class="col col-2" data-label="Barcode">
                                {{  asset('site/img/modules/qr_click.png') }}
                                 {{-- {{ QrCode::size(100)->generate($feature->source_string) }} --}}
                          
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
    
        

        {{-- , SYDATMSMR1, SYDATMSRX1 --}}
        
        <div class="button-div">
            <button type="button" class="back">Back</button>
            <button type="button" class="next">Generate</button>
        </div>
      
    </div>
 
{{-- </div> --}}

  
{{-- {!! QrCode::generate(chr(1).'Y' . chr(29).chr(2). $feature->source_string . chr(3). chr(4)) !!} --}}

<hr class="invisible">
<hr class="invisible pb-4">

{{-- <span>REBOOT</span>
{!! QrCode::generate(chr(1).'Y' . chr(29).chr(2).'RDCMRB1' . chr(3). chr(4)) !!} <br> --}}

 {!! QrCode::generate(chr(1).'Y' . chr(29).chr(2).'CDOPSPX""'.chr(3).'CDOPSFO1' . chr(3). chr(4)) !!}
 

<hr class="invisible">
<hr class="invisible pb-4">

@endsection

@section('below-content')
@endsection

@section('scripts')
@parent


@endsection
