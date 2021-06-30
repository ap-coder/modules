@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.mCodeFeature.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.m-code-features.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.mCodeFeature.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="code">{{ trans('cruds.mCodeFeature.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', '') }}">
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="category">{{ trans('cruds.mCodeFeature.fields.category') }}</label>
                            <input class="form-control" type="text" name="category" id="category" value="{{ old('category', '') }}">
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="template">{{ trans('cruds.mCodeFeature.fields.template') }}</label>
                            <input class="form-control" type="text" name="template" id="template" value="{{ old('template', '') }}">
                            @if($errors->has('template'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('template') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.template_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="feature_name">{{ trans('cruds.mCodeFeature.fields.feature_name') }}</label>
                            <input class="form-control" type="text" name="feature_name" id="feature_name" value="{{ old('feature_name', '') }}">
                            @if($errors->has('feature_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('feature_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.feature_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="feature_code">{{ trans('cruds.mCodeFeature.fields.feature_code') }}</label>
                            <input class="form-control" type="text" name="feature_code" id="feature_code" value="{{ old('feature_code', '') }}">
                            @if($errors->has('feature_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('feature_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.feature_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.mCodeFeature.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description') !!}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.mCodeFeature.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mcode_categories">{{ trans('cruds.mCodeFeature.fields.mcode_categories') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="mcode_categories[]" id="mcode_categories" multiple>
                                @foreach($mcode_categories as $id => $mcode_categories)
                                    <option value="{{ $id }}" {{ in_array($id, old('mcode_categories', [])) ? 'selected' : '' }}>{{ $mcode_categories }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mcode_categories'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mcode_categories') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.mcode_categories_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="order">{{ trans('cruds.mCodeFeature.fields.order') }}</label>
                            <input class="form-control" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1">
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="feature_image">{{ trans('cruds.mCodeFeature.fields.feature_image') }}</label>
                            <div class="needsclick dropzone" id="feature_image-dropzone">
                            </div>
                            @if($errors->has('feature_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('feature_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.feature_image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="featured_image">{{ trans('cruds.mCodeFeature.fields.featured_image') }}</label>
                            <div class="needsclick dropzone" id="featured_image-dropzone">
                            </div>
                            @if($errors->has('featured_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('featured_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mCodeFeature.fields.featured_image_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.m-code-features.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $mCodeFeature->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.featureImageDropzone = {
    url: '{{ route('frontend.m-code-features.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1200,
      height: 1200
    },
    success: function (file, response) {
      $('form').find('input[name="feature_image"]').remove()
      $('form').append('<input type="hidden" name="feature_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="feature_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mCodeFeature) && $mCodeFeature->feature_image)
      var file = {!! json_encode($mCodeFeature->feature_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="feature_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('frontend.m-code-features.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1200,
      height: 1200
    },
    success: function (file, response) {
      $('form').find('input[name="featured_image"]').remove()
      $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="featured_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mCodeFeature) && $mCodeFeature->featured_image)
      var file = {!! json_encode($mCodeFeature->featured_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection