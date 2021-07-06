@foreach ($allCategories as $category)
                      <div class="checkboxlabel">
                        {{ $category->name }} 
                        <label class="checkbox">
                          <input type="checkbox" name="filtercategory" value="{{ $category->id }}"
                           @if (in_array($category->id,$ids))
                              checked
                          @endif>
                          <span class="primary"></span>
                        </label>
                      </div>
                      @endforeach