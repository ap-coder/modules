<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mcodeCommunication.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.mcodeCommunication.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="mcodeCommunication.name">
        <div class="validation-message">
            {{ $errors->first('mcodeCommunication.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeCommunication.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeCommunication.param') ? 'invalid' : '' }}">
        <label class="form-label" for="param">{{ trans('cruds.mcodeCommunication.fields.param') }}</label>
        <input class="form-control" type="text" name="param" id="param" wire:model.defer="mcodeCommunication.param">
        <div class="validation-message">
            {{ $errors->first('mcodeCommunication.param') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeCommunication.fields.param_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mcodeCommunication.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.mcodeCommunication.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="mcodeCommunication.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('mcodeCommunication.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mcodeCommunication.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.mcode-communications.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>