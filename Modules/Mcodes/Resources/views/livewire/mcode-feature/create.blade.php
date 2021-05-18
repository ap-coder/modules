<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mcodeFeature.published') ? 'invalid' : '' }}">
        <label class="form-label" for="published">{{ trans('cruds.mcodeFeature.fields.published') }}</label>
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="mcodeFeature.published">
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.published_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeFeature.state') ? 'invalid' : '' }}">
        <label class="form-label" for="state">{{ trans('cruds.mcodeFeature.fields.state') }}</label>
        <input class="form-control" type="text" name="state" id="state" wire:model.defer="mcodeFeature.state">
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.state') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.state_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeFeature.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.mcodeFeature.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="mcodeFeature.name">
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeFeature.content_name') ? 'invalid' : '' }}">
        <label class="form-label" for="content_name">{{ trans('cruds.mcodeFeature.fields.content_name') }}</label>
        <input class="form-control" type="text" name="content_name" id="content_name" wire:model.defer="mcodeFeature.content_name">
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.content_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.content_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeFeature.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.mcodeFeature.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="mcodeFeature.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeFeature.content_description') ? 'invalid' : '' }}">
        <label class="form-label" for="content_description">{{ trans('cruds.mcodeFeature.fields.content_description') }}</label>
        <textarea class="form-control" name="content_description" id="content_description" wire:model.defer="mcodeFeature.content_description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.content_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.content_description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('catagories') ? 'invalid' : '' }}">
        <label class="form-label" for="catagories">{{ trans('cruds.mcodeFeature.fields.catagories') }}</label>
        <x-select-list class="form-control" id="catagories" name="catagories" wire:model="catagories" :options="$this->listsForFields['catagories']" multiple />
        <div class="validation-message">
            {{ $errors->first('catagories') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.catagories_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('communication_modes') ? 'invalid' : '' }}">
        <label class="form-label" for="communication_modes">{{ trans('cruds.mcodeFeature.fields.communication_modes') }}</label>
        <x-select-list class="form-control" id="communication_modes" name="communication_modes" wire:model="communication_modes" :options="$this->listsForFields['communication_modes']" multiple />
        <div class="validation-message">
            {{ $errors->first('communication_modes') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.communication_modes_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeFeature.template') ? 'invalid' : '' }}">
        <label class="form-label" for="template">{{ trans('cruds.mcodeFeature.fields.template') }}</label>
        <textarea class="form-control" name="template" id="template" wire:model.defer="mcodeFeature.template" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.template') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.template_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeFeature.mcode') ? 'invalid' : '' }}">
        <label class="form-label" for="mcode">{{ trans('cruds.mcodeFeature.fields.mcode') }}</label>
        <input class="form-control" type="text" name="mcode" id="mcode" wire:model.defer="mcodeFeature.mcode">
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.mcode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.mcode_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeFeature.source_string') ? 'invalid' : '' }}">
        <label class="form-label" for="source_string">{{ trans('cruds.mcodeFeature.fields.source_string') }}</label>
        <input class="form-control" type="text" name="source_string" id="source_string" wire:model.defer="mcodeFeature.source_string">
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.source_string') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.source_string_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeFeature.safe_source') ? 'invalid' : '' }}">
        <label class="form-label" for="safe_source">{{ trans('cruds.mcodeFeature.fields.safe_source') }}</label>
        <input class="form-control" type="text" name="safe_source" id="safe_source" wire:model.defer="mcodeFeature.safe_source">
        <div class="validation-message">
            {{ $errors->first('mcodeFeature.safe_source') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeFeature.fields.safe_source_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.mcode-features.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>