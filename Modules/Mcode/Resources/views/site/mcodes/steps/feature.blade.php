

    <div class="mcode_step_holder feature_holder">
      <div class="feature-filter row">
        <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
            <label class="control-label" for="keywords">Keywords</label>
            <div class="inner-addon left-addon">
                <i class="fa fa-search"></i>
                <input placeholder="type keywords here..." class="form-control form-text" id="keywords" name="keywords" type="text">
            </div>
            <span class="notice">Add keywords that describe your settings to help make search results more accurate.</span>
        </div>
        <div class="col-lg-2 col-md-12 col-xs-12 col-sm-12">
            <div class="multiselect">
              <div class="selectBox" onclick="showCheckboxes()">
                <select>
                  <option>Category</option>
                </select>
                <div class="overSelect"></div>
              </div>
              <div class="checkboxes" id="categorybox">
                <div class="checkboxlabelimg">
                  Category <label class="checkboximg">
                    <img src="https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png" alt="">
                  </label>
                </div>
                @foreach ($filterCategories as $category)
                <div class="checkboxlabel">
                  {{ $category->name }} <label class="checkbox">
                    <input type="checkbox" name="filtercategory[]" value="{{ $category->id }}">
                    <span class="primary"></span>
                  </label>
                </div>
                @endforeach
                
                <div class="checkboxbtn">
                  <button class="checkBtn" type="button" onclick="FilterNext();">Next</button>
                </div>
                
              </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-xs-12 col-sm-12">
            <div class="multiselect">
              <div class="selectBox" onclick="showRadioboxes()">
                <select>
                  <option>Order By</option>
                </select>
                <div class="overSelect"></div>
              </div>
              <div class="checkboxes" id="orderby">
                <div class="checkboxlabel">
                  A - Z<label class="checkbox radio">
                    <input type="radio" name="orderby">
                    <span class="primary"></span>
                  </label>
                </div>
                <div class="checkboxlabel">
                  Numerical <label class="checkbox radio">
                    <input type="radio" name="orderby">
                    <span class="primary"></span>
                  </label>
                </div>
                <div class="checkboxlabel">
                  Popular <label class="checkbox radio">
                    <input type="radio" name="orderby">
                    <span class="primary"></span>
                  </label>
                </div>
                
              </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-xs-12 col-sm-12">
            <div class="lastBtn" onclick="SearchIcon()">
              <img src="https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png" alt="">
            </div>
        </div>
    </div>
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
                              <div class="col col-5">Description</div>
                              <div class="col col-2">Barcode</div>
                              <div class="col col-1">Select</div>
                            </li>

                            @foreach($category->categoriesMcodeFeatures as $feature)
                            <li class="table-row">
                              <div class="col col-2" data-label="Code">{{ $feature->mcode ?? '' }}</div>
                              <div class="col col-5 feturedesc text-3" data-label="Description">{{ $feature->description ?? '' }}</div>
                              <div class="col col-2 openQrModal" data-label="Barcode" mid="{{ $feature->id }}">
                                <img src="{{  asset('site/img/modules/qr_click.png') }}" alt="qr click icon" title="Click To Open">
                                 {{-- {!! QrCode::generate($feature->formatted_source_string) !!} --}} 

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
            <button type="button" class="next disabled" disabled id="GenerateButton">Generate</button>
        </div>
      
    </div>
 