@extends('mcode::site.layouts.mcodes')


@section('styles') 

@endsection

@section('content')

<div class="container">
	<div class="row">
	<div class="mcode_step_holder feature_holder">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Bluetooth
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="feature_box">
                        <ul class="responsive-table">
                            <li class="table-header">
                              <div class="col col-2">Code</div>
                              <div class="col col-4">Description</div>
                              <div class="col col-2">Barcode</div>
                              <div class="col col-1">Select</div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            
                           
                          </ul>
                    </div>
              </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Scan-delay
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="feature_box">
                        <ul class="responsive-table">
                            <li class="table-header">
                              <div class="col col-2">Code</div>
                              <div class="col col-4">Description</div>
                              <div class="col col-2">Barcode</div>
                              <div class="col col-1">Select</div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">M42235</div>
                              <div class="col col-4 feturedesc" data-label="Description">1 Second Duplicate Scan Delay</div>
                              <div class="col col-2" data-label="Barcode">
                                <img src="{{ url('site/img/qr_code.jpg') }}"></div>
                              <div class="col col-1 selectfeture" data-label="Select"><label class="checkbox">
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label></div>
                            </li>
                            
                           
                          </ul>
                    </div>
                </div>
              </div>
            </div>
            
          </div>
        
        
        <div class="button-div">
            <button type="button" class="back">Back</button>
            <button type="button" class="next">Generate</button>
        </div>
			
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


@endsection
