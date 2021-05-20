@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.mcodeFeature.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mcode-features.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.mcodeFeature.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mcode">{{ trans('cruds.mcodeFeature.fields.mcode') }}</label>
                <input class="form-control {{ $errors->has('mcode') ? 'is-invalid' : '' }}" type="text" name="mcode" id="mcode" value="{{ old('mcode', '') }}">
                @if($errors->has('mcode'))
                    <span class="text-danger">{{ $errors->first('mcode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.mcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.mcodeFeature.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.mcodeFeature.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="source_string">{{ trans('cruds.mcodeFeature.fields.source_string') }}</label>
                <input class="form-control {{ $errors->has('source_string') ? 'is-invalid' : '' }}" type="text" name="source_string" id="source_string" value="{{ old('source_string', '') }}">
                @if($errors->has('source_string'))
                    <span class="text-danger">{{ $errors->first('source_string') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.source_string_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="safe_source">{{ trans('cruds.mcodeFeature.fields.safe_source') }}</label>
                <input class="form-control {{ $errors->has('safe_source') ? 'is-invalid' : '' }}" type="text" name="safe_source" id="safe_source" value="{{ old('safe_source', '') }}">
                @if($errors->has('safe_source'))
                    <span class="text-danger">{{ $errors->first('safe_source') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.safe_source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_name">{{ trans('cruds.mcodeFeature.fields.client_name') }}</label>
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name" value="{{ old('client_name', '') }}">
                @if($errors->has('client_name'))
                    <span class="text-danger">{{ $errors->first('client_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.client_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_description">{{ trans('cruds.mcodeFeature.fields.client_description') }}</label>
                <textarea class="form-control {{ $errors->has('client_description') ? 'is-invalid' : '' }}" name="client_description" id="client_description">{{ old('client_description') }}</textarea>
                @if($errors->has('client_description'))
                    <span class="text-danger">{{ $errors->first('client_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.client_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.mcodeFeature.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', 'Approved') }}">
                @if($errors->has('state'))
                    <span class="text-danger">{{ $errors->first('state') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="template">{{ trans('cruds.mcodeFeature.fields.template') }}</label>
                <textarea class="form-control {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template" id="template">{{ old('template') }}</textarea>
                @if($errors->has('template'))
                    <span class="text-danger">{{ $errors->first('template') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_models">{{ trans('cruds.mcodeFeature.fields.product_models') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('product_models') ? 'is-invalid' : '' }}" name="product_models[]" id="product_models" multiple>
                    @foreach($product_models as $id => $product_models)
                        <option value="{{ $id }}" {{ in_array($id, old('product_models', [])) ? 'selected' : '' }}>{{ $product_models }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_models'))
                    <span class="text-danger">{{ $errors->first('product_models') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.product_models_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categories">{{ trans('cruds.mcodeFeature.fields.categories') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple>
                    @foreach($categories as $id => $categories)
                        <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <span class="text-danger">{{ $errors->first('categories') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.categories_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="defaults">{{ trans('cruds.mcodeFeature.fields.defaults') }}</label>
                <input class="form-control {{ $errors->has('defaults') ? 'is-invalid' : '' }}" type="text" name="defaults" id="defaults" value="{{ old('defaults', '') }}">
                @if($errors->has('defaults'))
                    <span class="text-danger">{{ $errors->first('defaults') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcodeFeature.fields.defaults_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection