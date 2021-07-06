
          <div class="feature-filter feature-filter-row row">
            <div class="searchFilter">
            <div class="keyword-filter-input">
                <label class="control-label" for="keywords">Keywords</label>
                <div class="inner-addon left-addon">
                    <i class="fa fa-search"></i>
                    <input placeholder="type keywords here..." class="form-control form-text" id="keywords" name="keywords" type="text">
                </div>
                <span class="notice">Add keywords that describe your settings to help make search results more accurate.</span>
            </div>
            </div>
            <div class="categorySelectFilter">
              <div class="category-filter-options">
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
                        <img src="{{ url('site/img/modules/icon/br_down.png') }}" alt="">
                      </label>
                    </div>
                    @foreach ($categories as $category)
                    <div class="checkboxlabel">
                      {{ $category->name }} 
                      <label class="checkbox">
                        <input type="checkbox" name="filtercategory" value="{{ $category->id }}">
                        <span class="primary"></span>
                      </label>
                    </div>
                    @endforeach
                    
                    <div class="checkboxbtn">
                      <button class="checkBtn" type="button" onclick="CategoryFilter();">Update</button>
                    </div>
                    
                  </div>
                </div>
            </div>
            </div>
            {{--  <div class="col-lg-2 col-md-12 col-xs-12 col-sm-12">
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
            </div>  --}}
            <div class="optionsDropdown">
                <div class="lastBtn" onclick="SearchIcon()">
                  <img src="{{ url('site/img/modules/icon/br_down.png') }}" alt="">
                </div>
            </div>
            </div>
