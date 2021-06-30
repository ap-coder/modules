<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    
  @foreach($categories as $ckey => $category)

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading-{{ $loop->iteration }}">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse-{{ $loop->iteration }}" class="collapsed">
          {{ $category->name ?? ''}}  
        </a>
      </h4>
    </div>
    <div id="collapse-{{ $loop->iteration }}" class="panel-collapse in collapse @if($ckey==0) show  @endif" role="tabpanel" aria-labelledby="heading-{{ $loop->iteration }}">
      <div class="panel-body">
          <div class="feature_box">
              <ul class="responsive-table">
                  <li class="table-header">
                    <div class="col col-2">Code</div>
                    <div class="col col-7">Description</div>
                    <div class="col col-2">Barcode</div>
                    <div class="col col-1">Select</div>
                  </li>

                  @foreach($category->categoriesMcodeFeatures as $feature)
                  <li class="table-row">
                    <div class="col col-2 text-4" data-label="Code">{{ $feature->mcode ?? '' }}</div>
                    <div class="col col-7 feturedesc text-3" data-label="Description">{{ $feature->description ?? '' }} <?php // dump($feature->formatted_source_string) ?></div>
                    <div class="col col-2 openQrModal" data-label="Barcode" mid="{{ $feature->id }}">
                      <img src="{{  asset('site/img/modules/qr_click.png') }}" alt="qr click icon" title="Click To Open">
                    

                      {{-- @if(str_starts_with($feature->mcode, 'M1'))            
                      <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',5,5) . '" alt="barcode"   />'; ?>
                      @else
                      <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',5,5) . '" alt="barcode"   />'; ?>                       
                      @endif --}}
                    </div>
                    <div class="col col-1 selectfeture" data-label="Select">
                      <label class="checkbox">
                        <input type="checkbox" name="feturecheckbox" class="feturecheckbox" value="{{ $feature->id }}" />
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
  <button type="button" class="back prevBtn" step="3">Back</button>
  <h2 class="MiddleproductName">{{ $mcode->name }}</h2>
  <button type="button" class="next disabled" disabled id="GenerateButton">Generate</button>
</div>