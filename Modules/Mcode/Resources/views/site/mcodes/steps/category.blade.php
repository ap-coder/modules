	<div class="mcode_step_holder category_holder">
        <h2>What type of category are you looking for?</h2>
        <div class="category_box">
            <table width="100%">
                @foreach ($categories as $category)
                <tr>
					<td>{{ $category->name }}</td>
					<td>
						<div>
							<label class="checkbox">
                                <input type="checkbox" name="category" id="category" class="checkboxinput" value="{{ $category->id }}"/>
                                <span class="primary"></span>
                            </label>
						</div>
					</td>
				</tr>
                @endforeach
			</table>
        </div>
        
        <div class="button-div">
            <button type="button" class="back prevBtn" step="2">Back</button>
            <button type="button" class="next nextBtn disabled" disabled step="2" id="categoryButton">Update</button>
        </div>
			
 
	</div>