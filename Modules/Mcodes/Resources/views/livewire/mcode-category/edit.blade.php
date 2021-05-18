<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mcodeCategory.published') ? 'invalid' : '' }}">
        <label class="form-label" for="published">{{ trans('cruds.mcodeCategory.fields.published') }}</label>
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="mcodeCategory.published">
        <div class="validation-message">
            {{ $errors->first('mcodeCategory.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeCategory.fields.published_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeCategory.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.mcodeCategory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="mcodeCategory.name">
        <div class="validation-message">
            {{ $errors->first('mcodeCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeCategory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeCategory.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.mcodeCategory.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="mcodeCategory.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('mcodeCategory.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeCategory.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeCategory.slug') ? 'invalid' : '' }}">
        <label class="form-label" for="slug">{{ trans('cruds.mcodeCategory.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" wire:model.defer="mcodeCategory.slug">
        <div class="validation-message">
            {{ $errors->first('mcodeCategory.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeCategory.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeCategory.order') ? 'invalid' : '' }}">
        <label class="form-label" for="order">{{ trans('cruds.mcodeCategory.fields.order') }}</label>
        <input class="form-control" type="number" name="order" id="order" wire:model.defer="mcodeCategory.order" step="1">
        <div class="validation-message">
            {{ $errors->first('mcodeCategory.order') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeCategory.fields.order_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.mcode-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>