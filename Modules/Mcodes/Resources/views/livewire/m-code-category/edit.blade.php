<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mCodeCategory.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.mCodeCategory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="mCodeCategory.name">
        <div class="validation-message">
            {{ $errors->first('mCodeCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mCodeCategory.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.m-code-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>