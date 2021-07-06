@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('mcode::global.create') }} {{ trans('mcode::cruds.mcode.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mcodes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('mcode::cruds.mcode.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcode.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('mcode::cruds.mcode.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcode.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('mcode::cruds.mcode.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcode.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="models">{{ trans('mcode::cruds.mcode.fields.models') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('mcode::global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('mcode::global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('models') ? 'is-invalid' : '' }}" name="models[]" id="models" multiple>
                    @foreach($models as $id => $models)
                        <option value="{{ $id }}" {{ in_array($id, old('models', [])) ? 'selected' : '' }}>{{ $models }}</option>
                    @endforeach
                </select>
                @if($errors->has('models'))
                    <span class="text-danger">{{ $errors->first('models') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcode.fields.models_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('mcode::cruds.mcode.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcode.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc">{{ trans('mcode::cruds.mcode.fields.desc') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('desc') ? 'is-invalid' : '' }}" name="desc" id="desc">{!! old('desc') !!}</textarea>
                @if($errors->has('desc'))
                    <span class="text-danger">{{ $errors->first('desc') }}</span>
                @endif
                <span class="help-block">{{ trans('mcode::cruds.mcode.fields.desc_helper') }}</span>
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.mcode.fields.chicklets') }}</label>
                <select class="form-control {{ $errors->has('chicklets') ? 'is-invalid' : '' }}" name="chicklets" id="chicklets">
                    <option value disabled {{ old('chicklets', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Mcode::CHICKLETS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('chicklets', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('chicklets'))
                    <span class="text-danger">{{ $errors->first('chicklets') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mcode.fields.chicklets_helper') }}</span>
            </div>
            
            <div class="form-group">
              <label for="order">{{ trans('mcode::cruds.mcode.fields.order') }}</label>
              <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1">
              @if($errors->has('order'))
                  <span class="text-danger">{{ $errors->first('order') }}</span>
              @endif
              <span class="help-block">{{ trans('mcode::cruds.mcode.fields.order_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.mcodes.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mcode) && $mcode->photo)
      var file = {!! json_encode($mcode->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
                xhr.open('POST', '{{ route('admin.mcodes.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $mcode->id ?? 0 }}');
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

@endsection
