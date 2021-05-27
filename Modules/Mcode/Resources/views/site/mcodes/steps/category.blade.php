@extends('mcode::site.layouts.mcodes')


@section('styles') 

@endsection

@section('content')

<div class="container">
	<div class="row">
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
                                <input type="checkbox" />
                                <span class="primary"></span>
                            </label>
						</div>
					</td>
				</tr>
                @endforeach
			</table>
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
