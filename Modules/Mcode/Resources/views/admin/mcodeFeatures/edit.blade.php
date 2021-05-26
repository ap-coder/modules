@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('mcode::global.edit') }} {{ trans('mcode::cruds.mcodeFeature.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mcode-features.update", [$mcodeFeature->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $mcodeFeature->published || old('published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('mcode::cruds.mcodeFeature.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mcode">{{ trans('mcode::cruds.mcodeFeature.fields.mcode') }}</label>
                <input class="form-control {{ $errors->has('mcode') ? 'is-invalid' : '' }}" type="text" name="mcode" id="mcode" value="{{ old('mcode', $mcodeFeature->mcode) }}">
                @if($errors->has('mcode'))
                    <span class="text-danger">{{ $errors->first('mcode') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.mcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('mcode::cruds.mcodeFeature.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $mcodeFeature->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('mcode::cruds.mcodeFeature.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $mcodeFeature->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="source_string">{{ trans('mcode::cruds.mcodeFeature.fields.source_string') }}</label>
                <input class="form-control {{ $errors->has('source_string') ? 'is-invalid' : '' }}" type="text" name="source_string" id="source_string" value="{{ old('source_string', $mcodeFeature->source_string) }}">
                @if($errors->has('source_string'))
                    <span class="text-danger">{{ $errors->first('source_string') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.source_string_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="safe_source">{{ trans('mcode::cruds.mcodeFeature.fields.safe_source') }}</label>
                <input class="form-control {{ $errors->has('safe_source') ? 'is-invalid' : '' }}" type="text" name="safe_source" id="safe_source" value="{{ old('safe_source', $mcodeFeature->safe_source) }}">
                @if($errors->has('safe_source'))
                    <span class="text-danger">{{ $errors->first('safe_source') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.safe_source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_name">{{ trans('mcode::cruds.mcodeFeature.fields.client_name') }}</label>
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name" value="{{ old('client_name', $mcodeFeature->client_name) }}">
                @if($errors->has('client_name'))
                    <span class="text-danger">{{ $errors->first('client_name') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.client_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_description">{{ trans('mcode::cruds.mcodeFeature.fields.client_description') }}</label>
                <textarea class="form-control {{ $errors->has('client_description') ? 'is-invalid' : '' }}" name="client_description" id="client_description">{{ old('client_description', $mcodeFeature->client_description) }}</textarea>
                @if($errors->has('client_description'))
                    <span class="text-danger">{{ $errors->first('client_description') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.client_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('mcode::cruds.mcodeFeature.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', $mcodeFeature->state) }}">
                @if($errors->has('state'))
                    <span class="text-danger">{{ $errors->first('state') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="template">{{ trans('mcode::cruds.mcodeFeature.fields.template') }}</label>
                <textarea class="form-control {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template" id="template">{{ old('template', $mcodeFeature->template) }}</textarea>
                @if($errors->has('template'))
                    <span class="text-danger">{{ $errors->first('template') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="defaults">{{ trans('mcode::cruds.mcodeFeature.fields.defaults') }}</label>
                <input class="form-control {{ $errors->has('defaults') ? 'is-invalid' : '' }}" type="text" name="defaults" id="defaults" value="{{ old('defaults', $mcodeFeature->defaults) }}">
                @if($errors->has('defaults'))
                    <span class="text-danger">{{ $errors->first('defaults') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.defaults_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categories">{{ trans('mcode::cruds.mcodeFeature.fields.categories') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('mcode::global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('mcode::global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple>
                    @foreach($categories as $id => $categories)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $mcodeFeature->categories->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <span class="text-danger">{{ $errors->first('categories') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.categories_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="models">{{ trans('mcode::cruds.mcodeFeature.fields.models') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('mcode::global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('mcode::global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('models') ? 'is-invalid' : '' }}" name="models[]" id="models" multiple>
                    @foreach($models as $id => $models)
                        <option value="{{ $id }}" {{ (in_array($id, old('models', [])) || $mcodeFeature->models->contains($id)) ? 'selected' : '' }}>{{ $models }}</option>
                    @endforeach
                </select>
                @if($errors->has('models'))
                    <span class="text-danger">{{ $errors->first('models') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcodeFeature.fields.models_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('mcode::global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
