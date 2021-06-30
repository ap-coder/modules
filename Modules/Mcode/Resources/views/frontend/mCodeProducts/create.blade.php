@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.mCodeProduct.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.m-code-products.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="product_id">{{ trans('cruds.mCodeProduct.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id">
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeProduct.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pdf_cover">{{ trans('cruds.mCodeProduct.fields.pdf_cover') }}</label>
                            <input class="form-control" type="text" name="pdf_cover" id="pdf_cover" value="{{ old('pdf_cover', '') }}">
                            @if($errors->has('pdf_cover'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pdf_cover') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeProduct.fields.pdf_cover_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pdf_nicename">{{ trans('cruds.mCodeProduct.fields.pdf_nicename') }}</label>
                            <input class="form-control" type="text" name="pdf_nicename" id="pdf_nicename" value="{{ old('pdf_nicename', '') }}">
                            @if($errors->has('pdf_nicename'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pdf_nicename') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeProduct.fields.pdf_nicename_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="product_image">{{ trans('cruds.mCodeProduct.fields.product_image') }}</label>
                            <input class="form-control" type="text" name="product_image" id="product_image" value="{{ old('product_image', '') }}">
                            @if($errors->has('product_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeProduct.fields.product_image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.mCodeProduct.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeProduct.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="model_id">{{ trans('cruds.mCodeProduct.fields.model') }}</label>
                            <select class="form-control select2" name="model_id" id="model_id">
                                @foreach($models as $id => $entry)
                                    <option value="{{ $id }}" {{ old('model_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('model'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('model') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeProduct.fields.model_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection