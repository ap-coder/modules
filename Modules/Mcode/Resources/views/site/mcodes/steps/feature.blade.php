@extends('mcode::site.layouts.mcodes')


@section('styles') 

@endsection

@section('content')

<div class="container">
	<div class="row">
	<div class="mcode_step_holder feature_holder">
        <h2>Scan-delay</h2>
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
        
        <div class="button-div">
            <button type="button" class="back">Back</button>
            <button type="button" class="next">Next</button>
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
